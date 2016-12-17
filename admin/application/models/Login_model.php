<?php

/**
 * Created by PhpStorm.
 * User: G7Studio
 * Date: 11/7/2558
 * Time: 17:30
 */
class login_model extends CI_Model
{
    var $details;

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('localisation/language_model');
    }

    //ส่วนของ การเข้าสู่ระบบ ของเจ้าของร้าน
    public function employee_login($data,$setting_time)
    {
        $this->load->library('encrypt');

        $username = $data['username'];
        $password = $data['password'];
        $q = $this->db->get_where('user', array('username' => $username));

        if ($q->num_rows() == 0) {
            return -1;
        }

        $query = $this->db->query("SELECT * From user WHERE username = '" . $username . "'");

        $data = $query->row_array();

        $password_result = $this->encrypt->encode($data['password']);
        $password_decode = $this->encrypt->decode($this->encrypt->decode($password_result));


        if ($password === $password_decode){

            if($data['is_login']==='1'){
//                if($data['last_action']!==null&&$data['last_action']!==''){
//                    if($setting_time > time()-(int)$data['last_action']){
//                        return 2;
//                    }
//                }
            }

            $tStamp = date("Y-m-d H:i:s");

            $this->set_session($data,$tStamp);
            $language_id = '1';

            $this->db->query("UPDATE `" . "" . "user` SET "
                . " is_login = '1' WHERE user_id = '" . (int)$data["user_id"] . "'");

            $this->db->where('user_id', (int)$data["user_id"]);
            $this->db->update('user', array('last_login'=>$tStamp));

            // $this->set_session($data,$tStamp);
            // $language_id = '1';

            $this->stamp((int)$data["user_id"]);

//            echo 1 ;
//            exit(0);

           return (int)$data["user_status"];
        }

        return -1;
    }

    public function set_session($data,$tStamp)  //  No Language
    {
        $data = array(
            'user_id' => $data['user_id'],
            'username' => $data['username'],
            'user_group_id' => (int)$data['user_group_id'],
            'password' => $this->encrypt->encode($data['password']),
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'user_email' => $data['user_email'],
            'user_telephone' => $data['user_telephone'],
            'user_status' => (int)$data['user_status'],

            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id"),
            'is_login' => true,
            'login_time' => $tStamp
        );
        $this->session->set_userdata($data);

//        echo var_dump($data);
//        exit(0);
    }

    public function lose_login($user_id,$login_time){
        $this->db->select('user_id')
            ->from('user')
            ->where('last_login', $login_time)
            ->where('user_id', $user_id);
        $data = $this->db->get();
        return $data->num_rows();
    }

    public function stamp($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->update('user', array('last_action'=>time()));
    }

    public function logout($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->update('user', array('is_login'=>0));
        // $this->stamp($user_id);
    }

    public function time_last_action($user_id){
        $this->db->select('last_action')
            ->from('user')
            ->where('user_id', $user_id);
        $data = $this->db->get();
        return $data->row()->last_action;
    }

//    public function set_session()  //  No Language
//    {
//        $data = array(
//            'user_id' => $this->details->user_id,
//            'user_group_id' => $this->details->user_group_id,
//            'username' => $this->details->username,
//            'firstname' => $this->details->firstname,
//            'lastname' => $this->details->lastname,
//            'user_email' => $this->details->user_email,
//            'date_added' => $this->details->date_added,
//            'user_status' => $this->details->user_status,
//            //'image' => $this->details->image,
//            'Islogin' => true
//        );
//        $this->session->set_userdata($data);
//    }


//    public function set_session($language)
//    {
//        $data = array(
//            'employee_id' => $this->details->employee_id,
//            'employee_category_id' => $this->details->employee_category_id,
//            'username' => $this->details->username,
//            'firstname' => $this->details->firstname,
//            'lastname' => $this->details->lastname,
//            'email' => $this->details->email,
//            //  'language' => $language,
//            'date_created' => $this->details->date_created,
//            'lastlogin' => $this->details->lastlogin,
//            'lastlogout' => $this->details->lastlogout,
//            'status' => $this->details->status,
//            'Islogin' => true
//        );
//        $this->session->set_userdata($data);
//    }


}