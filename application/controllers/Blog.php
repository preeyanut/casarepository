<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->model('Home_model');
    }

    public function index()
    {

        if (!$this->input->get('blog_id')) {
            redirect('home');
            return;
        } else {
            $navigation = $this->Home_model->get_pages();

            $blog_id = $this->input->get('blog_id');
<<<<<<< HEAD
            $blog_data = $this->Blog_model->get_blog_data($blog_id);

            $data['blog_id'] = $blog_data[0]['blog_id'];
            $data['blog_title'] = $blog_data[0]['blog_title'];
            $data['blog_data'] = $blog_data;
            $data['navigation'] = $navigation;
        }
=======

            if($blog_id == true){
                $this->get_list_news();

            }else {
                $blog_data = $this->Blog_model->get_blog_data($blog_id);

//            var_dump($blog_data);

                $data['blog_id'] = $blog_data[0]['blog_id'];
                $data['blog_title'] = $blog_data[0]['blog_title'];
                $data['blog_data'] = $blog_data;
                $data['navigation'] = $navigation;
            }

        }


>>>>>>> 57ba7b8acec83218ecbefa2f8b7d76c52ed0f40f
        $data['page'] = 'pages/blog';
        $this->load->view('template', $data);
    }

    public function get_pages()
    {
        echo '----------------';
    }

    public function get_news()
    {
        echo '----------------';
    }

    public function get_blog()
    {
        echo '----------------';
    }
}
