<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('Category_type_model');
        $this->load->model('User_model');
        $this->load->model('Blog_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'user')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_list();
    }

    public function get_form()
    {
        $data_type = $this->Category_type_model->get_all();

        if ($this->input->get('category_id') != "") {

            $data_info = $this->Category_model->get_data($this->input->get('category_id'));

            if (!empty($data_info)) {

                $data['category_id'] = $this->input->get('category_id');

                foreach ($data_info as $info) {
                    $data['category_name'] = $info['category_name'];
                    $data['category_type_id'] = $info['category_type_id'];
                    $data['category_icon'] = $info['category_icon'];
                    $data['priority_level'] = $info['priority_level'];
                    $data['category_status'] = $info['category_status'];

                    $data['create_date'] = $info['create_date'];
                    $data['create_by_name'] = $info['create_by_name'];
                    $data['update_date'] = $info['update_date'];
                    $data['update_by_name'] = $info['update_by_name'];

                    $data['meta_keyword_thai'] = $info['meta_keyword_thai'];
                    $data['meta_keyword_eng'] = $info['meta_keyword_eng'];
                    $data['meta_description_thai'] = $info['meta_description_thai'];
                    $data['meta_description_eng'] = $info['meta_description_eng'];

                }

                for ($i = 0; $i < count($data_type); $i++) {
                    $data['type_id'][] = $data_type[$i]['category_type_id'];
                    $data['category_type_name'][] = $data_type[$i]['category_type_name'];
                }

                $all_priority_level = $this->Category_model->get_all_priority($info['category_type_id']);
            }

            $data["action"] = base_url() . "category/edit_category";

        } else {

            $data['category_id'] = "";
            $data['category_name'] = "";
            $data['category_type_id'] = "";
            $data['category_icon'] = "";
            $data['priority_level'] = "";
            $data['category_status'] = "";

            $data['create_date'] = "";
            $data['create_by_name'] = "";
            $data['update_date'] = "";
            $data['update_by_name'] = "";

            $data['meta_keyword_thai'] = "";
            $data['meta_keyword_eng'] = "";
            $data['meta_description_thai'] = "";
            $data['meta_description_eng'] = "";

            for ($i = 0; $i < count($data_type); $i++) {
                $data['type_id'][] = $data_type[$i]['category_type_id'];
                $data['category_type_name'][] = $data_type[$i]['category_type_name'];
            }

            $all_priority_level = $this->Category_model->get_all_priority(1);

            $data["action"] = base_url() . "category/add_category";

            $data["groups"] = $this->Category_model->get_all();

        }

        //---------------------  Priority Level
//        $all_priority_level = $this->Category_model->get_all_priority();
//        if($all_priority_level){
//            $data_priority = array('priority_level' => (string)(sizeof($all_priority_level)+1));
//            array_unshift($all_priority_level,$data_priority);
//        }else{
//            $all_priority_level = array();
//            $data_priority = array('priority_level' => (string)(sizeof($all_priority_level)+1));
//            array_push($all_priority_level,$data_priority);
//        }

        $data["all_priority_level"] = $all_priority_level;

        $data["page"] = 'pages/category_form';

        $this->load->view('template', $data);
    }

    public function add_category()
    {
        if ($this->input->post()) {
            $data["category_id"] = $this->Category_model->add_category($this->input->post());
        }

//        var_dump($_POST["category_icon"]);
        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_category()
    {
//        var_dump($this->input->post());

        if ($this->input->post()) {
            $data["category_id"] = $this->Category_model->edit_category($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function delete_category()
    {

        if ($this->input->get('category_id')) {
            $blog_id = $this->Category_model->get_blog_id($this->input->get('category_id'));
//            var_dump($this->input->get('category_id'));
//            var_dump($blog_id);
            foreach ($blog_id as $blog_data) {
//                var_dump($blog_data['blog_id']);
            $this->Blog_model->delete_blog_value($blog_data['blog_id']);
            $this->Blog_model->delete_blog($blog_data['blog_id']);
            $this->Category_model->delete_category($this->input->get('category_id'));
            }
        }

        $this->get_list();
    }

    public function validate_form()
    {

        if ((strlen($this->input->post('category_name')) < 3) || (strlen($this->input->post('category_name')) > 255)) {
            $this->error['category_name'] = "กรุณากรอกชื่อหมวดหมู่";
        }

//        if ((strlen($this->input->post('category_icon')) < 3) || (strlen($this->input->post('category_icon')) > 255)) {
//            $this->error['category_icon'] = "กรุณาเลือกไอคอน";
//        }

        if (empty($this->input->post('category_icon'))) {
            $this->error['category_icon'] = "กรุณาเลือกไอคอน";
        }

        if ((strlen($this->input->post('priority_level')) < 1) || (strlen($this->input->post('priority_level')) > 255)) {
            $this->error['priority_level'] = "กรุณากรอกระดับความสำคัญ";
        }

        if ((strlen($this->input->post('meta_keyword_thai')) < 3) || (strlen($this->input->post('meta_keyword_thai')) > 500)) {
            $this->error['meta_keyword_thai'] = "กรุณากรอกข้อมูล";
        }

        if ((strlen($this->input->post('meta_keyword_eng')) < 3) || (strlen($this->input->post('meta_keyword_eng')) > 500)) {
            $this->error['meta_keyword_eng'] = "กรุณากรอกข้อมูล";
        }

        if ((strlen($this->input->post('meta_description_thai')) < 3) || (strlen($this->input->post('meta_description_thai')) > 500)) {
            $this->error['meta_description_thai'] = "กรุณากรอกข้อมูล";
        }

        if ((strlen($this->input->post('meta_description_eng')) < 3) || (strlen($this->input->post('meta_description_eng')) > 500)) {
            $this->error['meta_description_eng'] = "กรุณากรอกข้อมูล";
        }

        if (isset($this->error)) {
            $jsonResult['error'] = $this->error;
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";

        echo json_encode($jsonResult);
    }
}