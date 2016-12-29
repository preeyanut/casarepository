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
        //------------------ Get Page
        $navigation = $this->Home_model->get_pages();
        $data['navigation'] = $navigation;
        //------------------ Get Banner
        $data_banners = $this->Home_model->get_banners();
        $data['home_banners'] = $data_banners;

        //------------------ Get CASA GUIDE
        $casa_guides = $this->Home_model->get_casa_guide(4);
        if ($casa_guides) {
            foreach ($casa_guides as $item) {
                $casa_guide_info = $this->Home_model->get_blog_field($item['blog_id']);
                $data_casa_guides[] = array(
                    'blog_id' => $item['blog_id']
                    , 'blog_title' => $item['blog_title']
                    , 'casa_guide_info' => $casa_guide_info
                );
            }
            $data['casa_guides'] = $data_casa_guides;
        }

        $news = $this->Home_model->get_news(5);
        if ($news) {
            foreach ($news as $item) {
                $news_info = $this->Home_model->get_blog_field($item['blog_id']);
                $data_news[] = array(
                    'blog_id' => $item['blog_id']
                , 'blog_title' => $item['blog_title']
                , 'news_info' => $news_info
                );
            }
            $data['news'] = $data_news;
        }

        $hilights = $this->Home_model->get_hilights(4);

        if ($hilights) {
            foreach ($hilights as $item) {
                $hilights_info = $this->Home_model->get_blog_field($item['blog_id']);
                $data_hilights[] = array(
                    'blog_id' => $item['blog_id']
                , 'blog_title' => $item['blog_title']
                , 'hilights_info' => $hilights_info
                );
            }
            $data['hilights'] = $data_hilights;
        }

        $data['page'] = 'pages/home';
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
