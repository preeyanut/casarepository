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

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'user')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_list();
    }

    public function get_list()
    {
        $all_data = $this->Category_model->search_filter($this->input->post("txtSearch"), 0, 10, -1, -1);

        $data_type = $this->Category_type_model->getall();

        $total_user = $this->Category_model->count();
        $paging = (int)$total_user / 10;
        $over_page = $total_user % 10;
        if ($paging == 0) {
            $paging = 1;
        }
        if ($over_page != 0) {
            $paging++;
        }

        $data["groups"] = $this->Category_model->getall();
        $data_user = $this->User_model->get_user_all();

        for ($i = 0; $i < count($data_user); $i++) {
            $data['user_id'][] = $data_user[$i]['user_id'];
            $data['username'][] = $data_user[$i]['username'];
        }

        for ($i = 0; $i < count($data_type); $i++) {
            $data['type_id'][] = $data_type[$i]['type_id'];
            $data['type_name'][] = $data_type[$i]['type_name'];
        }

        $data["paging"] = $paging;

        $data["list"] = $all_data;

//        var_dump($data);

        $data["page"] = 'pages/category';

        $this->load->view('template', $data);
    }

    public function search_user()
    {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $status = $this->input->post("filter-status");

        if ($page > 0) {
            $page--;
        }

//        $result = array();
        if ($filter_number == -1) {
            $result = $this->Category_model->getall();
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Category_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

    public function get_form()
    {
        $data_user = $this->User_model->get_user_all();
        $data_type = $this->Category_type_model->getall();

        if ($this->input->get('category_id') != "") {

            $data_info = $this->Category_model->get_data($this->input->get('category_id'));

//            var_dump($data_info, $data_user);
            if (!empty($data_info)) {

                $data['category_id'] = $this->input->get('category_id');

                foreach ($data_info as $info) {
                    $data['category_name'] = $info['category_name'];
                    $data['category_type_id'] = $info['type_id'];
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
                    $data['type_id'][] = $data_type[$i]['type_id'];
                    $data['type_name'][] = $data_type[$i]['type_name'];
                }
            }

            $data["action"] = base_url() . "category/edit_category";

        } else {

            $data['category_id'] = "";
            $data['category_name'] = "";
            $data['category_type_id'] = "";
            $data['type_id'] = "";
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
                $data['type_id'][] = $data_type[$i]['type_id'];
                $data['type_name'][] = $data_type[$i]['type_name'];
            }

            $data["action"] = base_url() . "category/add_category";

            $data["groups"] = $this->Category_model->getall();

        }


        $data["page"] = 'pages/category_form';

        $this->load->view('template', $data);
    }

    public function add_category()
    {
        if ($this->input->post()) {
            $data["category_id"] = $this->Category_model->add_category($this->input->post());
        }
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

    public function get_paging()
    {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");

        $status = $this->input->post("filter-status");

        if ($filter_number == -1) {
            $page = 1;
        } else {
            $start_filter = $filter_number * $page;
            $total_user = $this->Category_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
            if (!isset($total_user["total"])) {
                $data["paging"] = 0;
                $jsonResult['Data'] = $data;
                echo json_encode($jsonResult);
                return;
            }
            $paging = (int)((int)$total_user["total"] / (int)$filter_number);
            $over_page = (int)((int)$total_user["total"] % (int)$filter_number);
            $page = 0;

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

    public function validate_form()
    {

        if ((strlen($this->input->post('category_name')) < 3) || (strlen($this->input->post('category_name')) > 255)) {
            $this->error['category_name'] = "กรุณากรอกชื่อหมวดหมู่";
        }

        if ((strlen($this->input->post('category_icon')) < 3) || (strlen($this->input->post('category_icon')) > 255)) {
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