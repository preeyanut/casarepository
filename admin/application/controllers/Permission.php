<?php
class Permission extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth_check');
    }

    public function index()
    {
        $data=array(
            "layout"=>"errors/html/error_permission",
        );

        $this->load->view('pages',$data);
    }
}