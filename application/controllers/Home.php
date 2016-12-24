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

        $news=  $this->Home_model->get_news(5);
//        var_dump($news );
        foreach($news as $item){

            $news_info=  $this->Home_model->get_news_field($item['blog_id']);

            $data_news[] = array(
                'blog_id' => $item['blog_id']
              ,'blog_title' => $item['blog_title']
              ,'news_info' => $news_info
            );

        }
        $data['news'] = $data_news;

//        echo var_dump($news);
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
