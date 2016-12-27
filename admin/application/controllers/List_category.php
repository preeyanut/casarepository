<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('Category_type_model');
        $this->load->model('User_model');
        $this->load->model('Blog_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'list_category')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_all();
    }

    public function get_all()
    {
        $all_data = $this->Category_model->search_filter($this->input->post("txtSearch"), 0, 10, -1, -1);

        $data_type = $this->Category_type_model->get_all();

        $total_user = $this->Category_model->count();
        $paging = (int)$total_user / 10;
        $over_page = $total_user % 10;
        if ($paging == 0) {
            $paging = 1;
        }
        if ($over_page != 0) {
            $paging++;
        }

        $data["groups"] = $this->Category_model->get_all();

        for ($i = 0; $i < count($data_type); $i++) {
            $data['category_type_id'][] = $data_type[$i]['category_type_id'];
            $data['category_type_name'][] = $data_type[$i]['category_type_name'];
        }

        $data_category_type = $this->Category_type_model->get_all();

        $data["list_category_type"] = $data_category_type;

        $data["paging"] = $paging;

        $data["list"] = $all_data;

        $data["page"] = 'pages/list_category';

        $this->load->view('template', $data);
    }

    public function search_user()
    {
        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $filter_status = $this->input->post("filter-status");

        $filter_category_type = $this->input->post("filter-category-type");

        if(!$this->input->post("filter-page")){
            $page=0;
        }

        if ($page > 0) {
            $page--;
        }

        if ($filter_number == -1) {
            $start_filter = 0;
            $filter_number = 0;
            $result = $this->Category_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $filter_status, $filter_category_type);
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Category_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $filter_status, $filter_category_type);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

    public function delete_category()
    {
        if ($this->input->get('category_id')) {
            $blog_id = $this->Category_model->get_blog_id($this->input->get('category_id'));
            foreach ($blog_id as $blog_data) {
                $this->Blog_model->delete_blog_value($blog_data['blog_id']);
                $this->Blog_model->delete_blog($blog_data['blog_id']);
            }
            $this->Category_model->delete_category($this->input->get('category_id'));
        }

        $this->get_all();
    }

    public function get_paging()
    {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");

        $status = $this->input->post("filter-status");

        if (!$this->input->post("filter-page")) {
            $page = 0;
        }

        if ($filter_number == -1) {
            $page = 1;
        } else {
            $start_filter = $filter_number * $page;
            $total_user = $this->Category_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
//            echo var_dump($total_user);
            if (!isset($total_user["total"])) {
                $data["paging"] = 0;
                $jsonResult['Data'] = $data;
                echo json_encode($jsonResult);
                return;
            }
            $paging = (int)((int)$total_user["total"] / (int)$filter_number);
            $over_page = (int)((int)$total_user["total"] % (int)$filter_number);


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

}