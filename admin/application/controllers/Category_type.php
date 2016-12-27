<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_type extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_type_model');
        $this->load->model('Category_model');
        $this->load->model('Blog_model');
        $this->load->model('User_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'category_type')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_form();
    }

    public function get_form()
    {

        if ($this->input->get('category_type_id')) {

            $data_info = $this->Category_type_model->get_data($this->input->get('category_type_id'));
            if (!empty($data_info)) {

                $data['category_type_id'] = $this->input->get('category_type_id');

                foreach ($data_info as $info) {
                    $data['category_type_id'] = $info['category_type_id'];
                    $data['category_type_name'] = $info['category_type_name'];
                    $data['category_type_status'] = $info['category_type_status'];
                    $data['prioriy_level'] = $info['priority_level'];
                }
            }

            $data["action"] = base_url() . "category_type/edit_type";

        } else {

            $data['category_type_id'] = "";
            $data['category_type_name'] = "";
            $data['category_type_status'] = "";

            $data['priority_level'] = "";
            $data['type_status'] = "";

            $data['create_date'] = date("Y-m-d H:i:s");
            $data['create_by'] = $this->session->userdata("user_id");

            $data["action"] = base_url() . "category_type/add_type";

            $data["groups"] = $this->Category_type_model->get_all();

        }

        $data["category_field"] = $this->Category_type_model->get_category_field($data['category_type_id']);

        $data["page"] = 'pages/category_type_form';

        $this->load->view('template', $data);
    }

    public function add_category_type()
    {
        $result = false;
        if ($this->input->post()) {
            $data["category_type_id"] = $this->Category_type_model->add_category_type($this->input->post());
            if ($data["category_type_id"]) {
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
        $result = false;
        if ($this->input->post()) {
            $all_category_field = $this->input->post('category_field');
            foreach ($all_category_field as $item) {
                $data["category_field_id"] = $this->Category_type_model->add_category_field($item);
            }
            $result = true;
        }

        $jsonResult['Result'] = $result;
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_category_type()
    {
        $result = false;

        $data_category_type = $this->input->post('data_category_type');
        $all_category_field = $this->input->post('category_field');

        if ($this->input->post()) {
            $data["category_type_id"] = $this->Category_type_model->edit_category_type($data_category_type);

            $this->Category_type_model->delete_category_field($data_category_type['category_type_id']);

            foreach ($all_category_field as $item) {
                $data["category_field_id"] = $this->Category_type_model->add_category_field($item);
            }
            $result = true;
        }

        $jsonResult['Result'] = $result;
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_category_field()
    {
        $result = false;
        if ($this->input->post()) {
            $all_category_field = $this->input->post('category_field');
            foreach ($all_category_field as $item) {
                $data["category_field_id"] = $this->Category_type_model->add_category_field($item);
            }
            $result = true;
        }

        $jsonResult['Result'] = $result;
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function delete_category_type()
    {
        $result = false;
        if ($this->input->post()) {


            $all_category_id = $this->Category_model->get_group_category_id($this->input->post('category_type_id'));
            $category_id = '';
            foreach($all_category_id as $item){
                if(strlen($category_id)!==0){
                    $category_id.=',';
                }
                $category_id.=$item['category_id'];
            }

            $all_blog_id = $this->Blog_model->get_group_blog_id($category_id);
            $blog_id = '';
            foreach($all_blog_id as $item){
                if(strlen($blog_id)!==0){
                    $blog_id.=',';
                }
                $blog_id.=$item['blog_id'];
            }

            $this->Blog_model->delete_group_blog_value($blog_id);
            $this->Blog_model->delete_group_blog($category_id);

            $this->Category_model->delete_category($category_id);
            $this->Category_model->delete_group_category_field($this->input->post('category_type_id'));
            $this->Category_type_model->delete_category_type($this->input->post('category_type_id'));

            $result = true;

        }

        $jsonResult['Result'] = $result;
        $jsonResult['Data'] = $result;
        echo json_encode($jsonResult);
    }

    public function validate_form()
    {

        if ((strlen($this->input->post('category_type_name')) < 3) || (strlen($this->input->post('category_type_name')) > 255)) {
            $this->error['category_type_name'] = "กรุณากรอกชื่อประเภท";
        }

        if ((strlen($this->input->post('priority_level')) < 1) || (strlen($this->input->post('priority_level')) > 255)) {
            $this->error['priority_level'] = "กรุณากรอกลำดับความสำคัญ";
        }

        if (isset($this->error)) {
            $jsonResult['error'] = $this->error;
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";

        echo json_encode($jsonResult);
    }


}