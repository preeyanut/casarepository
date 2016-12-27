<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_banner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Banner_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'list_banner')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_list();

    }

    public function get_list()
    {
        $data_user = $this->Banner_model->search_filter($this->input->post("txtSearch"), 0, 10, -1, -1);

        $total_user = $this->Banner_model->count();
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

        $data["page"] = 'pages/list_banner';

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
            $total_user = $this->Banner_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status);

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
            $result = $this->Banner_model->get_all();
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Banner_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

    public function delete_banner()
    {
        if ($this->input->get('banner_id')) {
            $data["banner_id"] = $this->Banner_model->delete_banner($this->input->get('banner_id'));
        }

        $this->get_list();
    }
}