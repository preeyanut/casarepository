<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
//        $this->load->library('CKEditor');
//        $this->load->library('ckfinder');
//
//        //configure base path of ckeditor folder
//        $this->ckeditor->basePath = base_url() . 'assets/ckeditor/';
//        $this->ckeditor->config['language'] = 'en';
//        $this->ckeditor->config['height'] = '400';
//        $this->ckeditor->returnOutput = true;
//
//        //configure ckfinder with ckeditor config
//        $this->ckfinder->BasePath = base_url() . 'assets/ckfinder/';
//        $this->ckfinder->SetupCKEditor($this->ckeditor, base_url() . 'assets/ckfinder/');

        $data['page'] = 'pages/home';
        $this->load->view('template', $data);
    }
}
