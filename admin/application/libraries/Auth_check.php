<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: G7Studio
 * Date: 9/5/2558
 * Time: 1:54
 */



class Auth_check
{
    private $permission = array();
    var $SC;

    public function __construct()
    {
        $this->SC =& get_instance();
        $this->SC->load->helper('url');
        $this->SC->load->library('session');
        $this->SC->load->library('encryption');
        $this->SC->load->model('login_model');
        $this->SC->load->model('user_model');
        $this->SC->load->model('user_group_model');

        if (isset($_COOKIE['oclirm'])  && ($this->SC->session->userdata('username')==null)){
            $decrypt_string = $this->SC->encryption->decrypt($_COOKIE['oclirm']);

            $cookie_arr = explode("||", $decrypt_string);

            $data=array(
                'username'=>$cookie_arr[0],
                'password'=>$cookie_arr[1]
            );

            log_message('error', 'decrypted cookie=' . $data['username'] . ',' . $data['password']);

            if($data && $this->SC->login_model->employee_login($data)){
                //redirect('manager/dashboard');
            }else{
                redirect(site_url('login'));
            }
        }elseif (isset($_REQUEST['oclirm'])  && ($this->SC->session->userdata('username')==null)) {
            $jsonResult['Result']="";
            $jsonResult['Data']="";

            $decrypt_string = $this->SC->encryption->decrypt($_REQUEST['oclirm']);

            $authen_token_arr = explode("||", $decrypt_string);

            if(count($authen_token_arr) == 3){
                $data=array(
                    'username'=>$authen_token_arr[0],
                    'password'=>$authen_token_arr[1]
                );
                $expired_time = $authen_token_arr[2];
            }else{
                $response["code"]=3;
                $response["message"]="Invalid token. Please check you request.";
                $response["session_id"]=0;

                $jsonResult['Result']=false;
                $jsonResult['Data']=$response;
                log_message('debug', 'Invalid token. Please check you request. token='.$_REQUEST['oclirm']);
                echo json_encode($jsonResult);

                exit(0);
            }

            if($expired_time < time()){
                $response["code"]=2;
                $response["message"]="Expired auth token. Please check you request.";
                $response["session_id"]=0;

                $jsonResult['Result']=false;
                $jsonResult['Data']=$response;
                log_message('debug', 'Expired auth token. Please check you request. token='.$_REQUEST['oclirm']);
                echo json_encode($jsonResult);

                exit(0);
            }

            $result = $this->SC->login_model->employee_login($data);
            if($data && $result){
                //redirect('manager/dashboard');
            }else{
                $response["code"]=0;
                $response["message"]="Failed authentication. Please check you request.";
                $response["session_id"]=0;

                $jsonResult['Result']=false;
                $jsonResult['Data']=$response;
                log_message('debug', 'Failed authentication. Please check you request. token='.$_REQUEST['oclirm']);
                echo json_encode($jsonResult);

                exit(0);
            }

        }elseif ($this->SC->session->userdata('user_group_id')==null or $this->SC->session->userdata('user_id')==null){
            redirect(site_url('login'));
        }

        $user_id = $this->SC->session->userdata('user_id');
        if (isset($user_id)){
            $row = $this->SC->user_model->get_user($user_id);
            if (isset($row)){
                $user_group_id = $row['user_group_id'];
                $user_group_row = $this->SC->user_group_model->get_user_group($user_group_id);
//                echo var_dump($user_group_row);
                //echo var_dump(json_decode($user_group_row['permission'], true));
                $permissions = json_decode($user_group_row['permission'], true);

                if (is_array($permissions)) {
                    foreach ($permissions as $key => $value){
                        $this->permission[$key] = $value;
                    }
                }
            } else {
                $this->logout();
            }
        }else{
            $this->logout();
        }
    }

    public function hasPermission($key, $value){
        if (isset($this->permission[$key])){
            return in_array($value, $this->permission[$key]);
        } else {
            return false;
        }
    }

    //logout
    public function logout(){
        $this->session->unset_userdata('Islogin');
        $this->session->sess_destroy();
        $this->input->set_cookie('oclirm', '', '');
        redirect(site_url('login'));
    }
}

