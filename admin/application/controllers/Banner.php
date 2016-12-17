<?php

class Banner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth_check');      //ฟังค์ชั่นการใช้สิทธิ์การเข้าถึง
        $this->load->model("employee/employee_model");

        if (!$this->auth_check->hasPermission('access', 'banner')) {
            redirect('permission');
        }

    }

    public function index(){
        
    }


}