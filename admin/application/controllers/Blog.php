<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->model('User_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'customer')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_all();
    }

    public function get_form()
    {

        if ($this->input->get('blog_id')) {

            $data_info = $this->Blog_model->get_data($this->input->get('blog_id'));
//            echo var_dump($data_info);
//            exit(0);

            $blog_field = $this->Blog_model->get_blog_field($data_info[0]['category_type_id']);

//            echo var_dump($blog_field);
//            exit(0);

            $data['blog_field'] = $blog_field;

//            $data_user = $this->User_model->get_user_all();

            if (!empty($data_info)) {

                $data['blog_id'] = $this->input->get('blog_id');

                foreach ($data_info as $info) {
                    $data['blog_id'] = $info['blog_id'];
                    $data['blog_title'] = $info['blog_title'];
                    $data['blog_status'] = $info['blog_status'];
                    $data['priority_level'] = $info['priority_level'];
                }
            }

            $data["action"] = base_url() . "blog/edit_blog";

        } else {

            $data['blog_id'] = "";
            $data['blog_title'] = "";
            $data['blog_status'] = "";
            $data['priority_level'] = "";

//            $data['create_date'] = date("Y-m-d H:i:s");
//            $data['create_by'] = $this->session->userdata("user_id");

            $data["action"] = base_url() . "blog/add_blog";
        }

        $data["page"] = 'pages/blog_form';

        $this->load->view('template', $data);
    }

    public function get_all()
    {
        $data_user = $this->Blog_model->search_filter($this->input->post("txtSearch"), 0, 10, -1, -1);

        $total_user = $this->Blog_model->count();
        $paging = (int)$total_user / 10;
        $over_page = $total_user % 10;
        if ($paging == 0) {
            $paging = 1;
        }
        if ($over_page != 0) {
            $paging++;
        }

        $data["paging"] = $paging;

        $data["list"] = $data_user;

        $data["page"] = 'pages/blog';

        $this->load->view('template', $data);

    }

    public function get_paging()
    {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $status = $this->input->post("filter-status");

        if ($filter_number == -1) {
            $page = 1;
        } else {
            $start_filter = $filter_number * $page;
            $total_user = $this->Blog_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status);

            if (!isset($total_user["total"])) {
                $data["paging"] = 1;
                $jsonResult['Data'] = $data;
                echo json_encode($jsonResult);
                return;
            }
            $paging = (int)((int)$total_user["total"] / (int)$filter_number);
            $over_page = (int)((int)$total_user["total"] % (int)$filter_number);

//            echo var_dump($total_user);
//            exit(0);
            if ($paging == 0) {
                $page = 1;
            } else {
                $page = $paging;
            }

            if ($over_page != 0 && $paging != 0) {
                $page++;
            }
        }

        $data["paging"] = $page;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }



    public function add_blog()
    {
        $result =false;
        if ($this->input->post()) {
            $data["blog_id"] = $this->Blog_model->add_blog($this->input->post());
            if($data["blog_id"]){
                $result = true;
            }
        }

        $jsonResult['Result'] = $result;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function add_category_field()
    {
        $result =false;
        if ($this->input->post()) {
            $all_category_field = $this->input->post('category_field');
            foreach($all_category_field as $item){
                $data["category_field_id"] = $this->Blog_model->add_category_field($item);
            }
            $result =true;
        }

        $jsonResult['Result'] = $result;
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }



    public function edit_blog()
    {
        $result =false;

        $data_blog = $this->input->post('data_blog');
        $all_category_field = $this->input->post('category_field');

        if ($this->input->post()) {
            $data["blog_id"] = $this->Blog_model->edit_blog($data_blog);

            $this->Blog_model->delete_category_field($data_blog['blog_id']);

            foreach($all_category_field as $item){
                $data["category_field_id"] = $this->Blog_model->add_category_field($item);
            }
            $result =true;
        }

        $jsonResult['Result'] = $result;
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_category_field()
    {
        $result =false;
        if ($this->input->post()) {
            $all_category_field = $this->input->post('category_field');
            foreach($all_category_field as $item){
                $data["category_field_id"] = $this->Blog_model->add_category_field($item);
            }
            $result =true;
        }

        $jsonResult['Result'] = $result;
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function search()
    {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $status = $this->input->post("filter-status");

        if ($page > 0) {
            $page--;
        }

//        $result = array();
        if ($filter_number == -1) {
            $result = $this->Blog_model->getall();
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Blog_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }


    public function validate_form()
    {

        if ((strlen($this->input->post('blog_title')) < 3) || (strlen($this->input->post('blog_title')) > 255)) {
            $this->error['blog_title'] = "???????????????????";
        }

        if ((strlen($this->input->post('priority_level')) < 1) || (strlen($this->input->post('priority_level')) > 255)) {
            $this->error['priority_level'] = "???????????????????????";
        }

        if (isset($this->error)) {
            $jsonResult['error'] = $this->error;
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";

        echo json_encode($jsonResult);
    }


}