<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');

//        $this->load->library('auth_check');
//
//        if (!$this->auth_check->hasPermission('access', 'user')) {
//            redirect('permission');
//        }
    }

    public function index()
    {
        $this->get_form();
    }
}