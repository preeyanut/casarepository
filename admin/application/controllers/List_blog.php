<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->model('User_model');
        $this->load->model('Category_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'customer')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_all();
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

        $data_category = $this->Category_model->get_all();

        $data["list_category"] = $data_category;

        $data["paging"] = $paging;

        $data["list"] = $data_user;

        $data["page"] = 'pages/list_blog';

        $this->load->view('template', $data);

    }

    public function get_paging()
    {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $status = $this->input->post("filter-status");
        $category = $this->input->post("filter-category");

        if ($filter_number == -1) {
            $page = 1;
        } else {
            $start_filter = $filter_number * $page;
            $total_user = $this->Blog_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status,$category);

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

    public function search()
    {
        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $status = $this->input->post("filter-status");
        $category = $this->input->post("filter-category");

        if ($page > 0) {
            $page--;
        }

        if ($filter_number == -1) {
            $result = $this->Blog_model->get_all();
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Blog_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $status,$category);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

}