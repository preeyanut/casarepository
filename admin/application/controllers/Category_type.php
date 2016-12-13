<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_type extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_type_model');
        $this->load->model('User_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'customer')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->getall();
    }

    public function getall()
    {
        $all_data = $this->Category_type_model->search_filter($this->input->post("txtSearch"), 0, 10, -1, -1);

        $total_user = $this->Category_type_model->count();
        $paging = (int)$total_user / 10;
        $over_page = $total_user % 10;
        if ($paging == 0) {
            $paging = 1;
        }
        if ($over_page != 0) {
            $paging++;
        }

        $data["groups"] = $this->Category_type_model->getall();
        $data_user = $this->User_model->get_user_all();

        for($i=0;$i<count($data_user);$i++) {
            $data['user_id'][] = $data_user[$i]['user_id'];
            $data['username'][] = $data_user[$i]['username'];
        }

        $data["paging"] = $paging;

        $data["list"] = $all_data;

//        var_dump($data);

        $data["layout"] = 'layout/category_type';

        $this->load->view('layout', $data);

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
            $total_user = $this->Category_type_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
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

    public function get_form()
    {

        if ($this->input->get('type_id')) {

            $data_info = $this->Category_type_model->get_data($this->input->get('type_id'));
            $data_user = $this->User_model->get_user_all();

//            var_dump($data_info, $data_user);
            if (!empty($data_info)) {

                $data['type_id'] = $this->input->get('type_id');

                foreach ($data_info as $info) {
                    $data['type_id'] = $info['type_id'];
                    $data['type_name'] = $info['type_name'];
                    $data['priority_level'] = $info['priority_level'];
                    $data['type_status'] = $info['type_status'];

                    $data['create_date'] = $info['create_date'];
                    $data['create_by'] = $info['create_by'];
                }
                for($i=0;$i<count($data_user);$i++) {
                    $data['user_id'][] = $data_user[$i]['user_id'];
                    $data['username'][] = $data_user[$i]['username'];
                }
            }

            $data["action"] = base_url() . "category_type/edit_type";

        } else {

            $data['type_id'] = "";
            $data['type_name'] = "";
            $data['priority_level'] = "";
            $data['type_status'] = "";

            $data['create_date'] = date("Y-m-d H:i:s");
            $data['create_by'] = $this->session->userdata("user_id");

            $data["action"] = base_url() . "category_type/add_type";

            $data["groups"] = $this->Category_type_model->getall();

        }
//        var_dump($data);
        $data["layout"] = 'layout/category_type_form';

        $this->load->view('layout', $data);
    }

    public function add_type()
    {
        if ($this->input->post()) {
            $data["type_id"] = $this->Category_type_model->add_type($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_type()
    {
        if ($this->input->post()) {
            $data["type_id"] = $this->Category_type_model->edit_type($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
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
            $result = $this->Category_type_model->getall();
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Category_type_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }


    public function validate_form()
    {

        if ((strlen($this->input->post('type_name')) < 3) || (strlen($this->input->post('type_name')) > 255)) {
            $this->error['type_name'] = "กรุณากรอกชื่อประเภท";
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