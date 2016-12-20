<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }
    public function index()
    {

        $navigation =  $this->Home_model->get_pages();

        $data['navigation'] = $navigation;

        $data['page'] = 'pages/home';
        $this->load->view('template', $data);
    }

    public function get_pages(){


        echo '----------------';
    }

    public function get_news(){
        echo '----------------';
    }

    public function get_blog(){
        echo '----------------';
    }
}
