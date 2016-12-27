<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_bank extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bank_list_model');
        $this->load->model('User_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'list_bank')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_all();
    }

    public function get_all()
    {
        $all_data = $this->Bank_list_model->search_filter($this->input->post("txtSearch"), 0, 10, -1);

        $total_user = $this->Bank_list_model->count();
        $paging = (int)$total_user / 10;
        $over_page = $total_user % 10;

        if ($paging == 0) {
            $paging = 1;
        }
        if ($over_page != 0) {
            $paging++;
        }

        $data["list"] = $this->Bank_list_model->get_all();

        $data["paging"] = $paging;

        $data["list"] = $all_data;

//        var_dump($data);

        $data["page"] = 'pages/list_bank';

        $this->load->view('template', $data);

    }

    public function get_paging()
    {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $status = $this->input->post("filter-status");

        if(!$this->input->post("filter-page")){
            $page=0;
        }

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

        $data["paging"] = $page;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

    public function search_user()
    {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $status = $this->input->post("filter-status");

        if(!$this->input->post("filter-page")){
            $page=0;
        }

        if ($page > 0) {
            $page--;
        }

//        $result = array();
        if ($filter_number == -1) {
            $result = $this->Bank_list_model->get_all();
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Bank_list_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

    public function delete_bank()
    {
        if ($this->input->get('bank_list_id')) {
            $data["bank_list_id"] = $this->Bank_list_model->delete_bank($this->input->get('bank_list_id'));
        }

        $this->get_all();
    }

}