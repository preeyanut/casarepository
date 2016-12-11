<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_action
{

    var $CI;

    public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->model('login_model');

        $this->run_action();
    }

    public function run_action(){
        if($this->CI->session->userdata('user_id')===null){ return; }
        else{
            $actionNow = time();
            $lastActionTime = $this->CI->login_model->time_last_action($this->CI->session->userdata('user_id'));
            if($lastActionTime===null||$lastActionTime===''){
                $this->CI->login_model->stamp($this->CI->session->userdata('user_id'));
            }
            else{
                $action_space = (int)$actionNow - (int)$lastActionTime;
                $setting_duration = $this->CI->config->item('login_rank_duration');
                // $this->CI->login_model->lose_login($this->CI->session->userdata('user_id'),$this->CI->session->userdata('login_time'))!=1
                if($action_space>=$setting_duration){
                    $this->CI->login_model->logout($this->CI->session->userdata('user_id'));
                    $this->CI->session->unset_userdata('Islogin');
                    $this->CI->session->sess_destroy();
                    $this->CI->input->set_cookie('oclirm', '', '');
                    header('location:'.base_url());
                    die();
                }
                elseif($this->CI->login_model->lose_login($this->CI->session->userdata('user_id'),$this->CI->session->userdata('login_time'))!=1){
                    $this->CI->session->unset_userdata('Islogin');
                    $this->CI->session->sess_destroy();
                    $this->CI->input->set_cookie('oclirm', '', '');
                    header('location:'.base_url());
                    die();
                }
                else{ $this->CI->login_model->stamp($this->CI->session->userdata('user_id')); }
            }
            // echo var_dump($lastActionTime);
        }
    }

}