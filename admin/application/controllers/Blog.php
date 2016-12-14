<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'user')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $data["layout"] = 'layout/blog';

        $this->load->view('layout', $data);
    }

    public function get_form()
    {
        $this->load->library('encrypt');

        if ($this->input->get('blog_id')) {

            $result_blog_id = $this->Blog_model->get_all_my_sub_user();
            $array_blog_id = explode(",", $result_blog_id);
            if (!in_array($this->input->get('blog_id'), $array_blog_id)) {
                redirect('user');
            }

            $user_info = $this->Blog_model->get_user($this->input->get('blog_id'));

            if (!empty($user_info)) {

                $password_result = $this->encrypt->encode($user_info['password']);
                $password_decode = $this->encrypt->decode($this->encrypt->decode($password_result));

                $data['blog_id'] = $user_info['blog_id'];
                $data['username'] = $user_info['username'];
                $data['password'] = $password_decode;
                $data['confirm'] = $password_decode;
                $data['user_group_id'] = $user_info['user_group_id'];
                $data['user_group_name'] = $user_info['user_group_name'];

                $data['firstname'] = $user_info['firstname'];
                $data['lastname'] = $user_info['lastname'];
                $data['user_email'] = $user_info['user_email'];
                $data['user_telephone'] = $user_info['user_telephone'];
                $data['user_status'] = $user_info['user_status'];

                $data['bank'] = $user_info['bank'];
                $data['bank_code'] = $user_info['bank_code'];
                $data['bank_name'] = $user_info['bank_name'];
                $data['user_credit'] = $user_info['user_credit'];
            }

            $data["action"] = base_url() . "user/edit";

        } else {

            $data['blog_id'] = "";
            $data['username'] = "";
            $data['password'] = "";
            $data['confirm'] = "";
            $data['user_group_id'] = "";
            $data['user_group_name'] = "";

            $data['firstname'] = "";
            $data['lastname'] = "";
            $data['user_email'] = "";
            $data['user_telephone'] = "";
            $data['user_status'] = "";

            $data['bank'] = "";
            $data['bank_code'] = "";
            $data['bank_name'] = "";
            $data['user_credit'] = "";

            $data["action"] = base_url() . "user/add";

        }
        $data["user_groups"] = $this->User_group_model->get_all_user_group();

        $data["layout"] = 'layout/user';

        $this->load->view('layout', $data);
    }
}