<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_list extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bank_list_model');
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
        $all_data = $this->Bank_list_model->search_filter($this->input->post("txtSearch"), 0, 10, -1, -1);

        $total_user = $this->Bank_list_model->count();
        $paging = (int)$total_user / 10;
        $over_page = $total_user % 10;
        if ($paging == 0) {
            $paging = 1;
        }
        if ($over_page != 0) {
            $paging++;
        }

        $data["groups"] = $this->Bank_list_model->getall();
        $data_user = $this->User_model->get_user_all();

        for($i=0;$i<count($data_user);$i++) {
            $data['user_id'][] = $data_user[$i]['user_id'];
            $data['username'][] = $data_user[$i]['username'];
        }

        $data["paging"] = $paging;

        $data["list"] = $all_data;

//        var_dump($data);

        $data["layout"] = 'layout/bank_list';

        $this->load->view('layout', $data);

    }

    public function get_all()
    {

        $result = $this->bank_list_model->getall();

        $data["list"] = $result;
        $jsonResult['Result'] = true;
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
            $total_user = $this->Bank_list_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
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
//        var_dump($this->input->post("filter-number"),$this->input->post("filter-page"),$this->input->post("filter-status"));

        $data["paging"] = $page;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
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
            $result = $this->Bank_list_model->getall();
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Bank_list_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

    public function add_bank()
    {
        if ($this->input->post()) {
            $data["bank_list_id"] = $this->Bank_list_model->add_bank($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_bank()
    {
        if ($this->input->post()) {
            $data["bank_list_id"] = $this->Bank_list_model->edit_bank($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function getForm()
    {

        if ($this->input->get('bank_list_id')) {

            $data_info = $this->Bank_list_model->get_data($this->input->get('bank_list_id'));
            $data_user = $this->User_model->get_user_all();

//            var_dump($data_info, $data_user);
            if (!empty($data_info)) {

                $data['bank_list_id'] = $this->input->get('bank_list_id');

                foreach ($data_info as $info) {
                    $data['bank_list_name'] = $info['bank_list_name'];
                    $data['bank_list_status'] = $info['bank_list_status'];
                }
                for($i=0;$i<count($data_user);$i++) {
                    $data['user_id'][] = $data_user[$i]['user_id'];
                    $data['username'][] = $data_user[$i]['username'];
                }
            }

            $data["action"] = base_url() . "bank_list/edit_bank";

        } else {

            $data['bank_list_id'] = "";
            $data['bank_list_name'] = "";
            $data['bank_list_status'] = "";

            $data['create_by'] = $this->input->get('user_id');

            $data["action"] = base_url() . "bank_list/add_bank";

            $data["groups"] = $this->Bank_list_model->getall();

        }
//        var_dump($data);
        $data["layout"] = 'layout/bank_form';

        $this->load->view('layout', $data);
    }

    public function validate_form()
    {

        if ((strlen($this->input->post('bank_name')) < 3) || (strlen($this->input->post('bank_name')) > 255)) {
            $this->error['bank_name'] = "กรุณากรอกชื่อธนาคาร";
        }

        if (isset($this->error)) {
            $jsonResult['error'] = $this->error;
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";

        echo json_encode($jsonResult);
    }
}