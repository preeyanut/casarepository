<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action_log extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Log_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'action_log')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $all_data = $this->Log_model->search_filter($this->input->post("txtSearch"), 0, 50);

        $total_user = $this->Log_model->count();
        $paging = (int)$total_user / 50;
        $over_page = $total_user % 50;

        if ($paging == 0) {
            $paging = 1;
        }
        if ($over_page != 0) {
            $paging++;
        }

        $data["paging"] = $paging;

        $data["list"] = $all_data;

        $data["page"] = 'pages/action_log';

        $this->load->view('template', $data);

//        var_dump($data);

    }

    public function get_paging()
    {
        $filter_number = 50;
        $page = $this->input->post("filter-page");

        if (!$this->input->post("filter-page")) {
            $page = 0;
        }

        if ($filter_number == -1) {
            $page = 1;
        } else {
            $start_filter = $filter_number * $page;
            $total_user = $this->Log_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number);
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
//        $result = $this->Log_model->search_filter($this->input->post("txtSearch"));
//
//        $data["list"] = $result;
//
//        $jsonResult['Result'] = true;
//        $jsonResult['Data'] = $data;
//
//        echo json_encode($jsonResult);

        $filter_number = 50;
        $page = $this->input->post("filter-page");

        if ($page > 0) {
            $page--;
        }

        $start_filter = $filter_number * $page;
        $result = $this->Log_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number);

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }
}