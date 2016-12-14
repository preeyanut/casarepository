<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link_stream extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_group_model');

//        $this->load->library('auth_check');
//
//        if (!$this->auth_check->hasPermission('access', 'user')) {
//            redirect('permission');
//        }
    }

    public function index()
    {
        $this->get_list();

    }

    public function get_list()
    {
        $all_data = $this->Config_group_model->search_filter($this->input->post("txtSearch"), 0, 10, -1, -1);

        $total_user = $this->Config_group_model->count();
        $paging = (int)$total_user / 10;
        $over_page = $total_user % 10;
        if ($paging == 0) {
            $paging = 1;
        }
        if ($over_page != 0) {
            $paging++;
        }

        $data["list"] = $this->Config_group_model->getall();
        $data_user = $this->User_model->get_user_all();

        for($i=0;$i<count($data_user);$i++) {
            $data['user_id'][] = $data_user[$i]['user_id'];
            $data['username'][] = $data_user[$i]['username'];
        }

        $data["paging"] = $paging;

        $data["list"] = $all_data;

//        var_dump($data);

        $data["layout"] = 'layout/config_group';

        $this->load->view('layout', $data);

    }


    public function get_all()

    {
        $data["list"] = $this->Config_group_model->getall();

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);

    }

    public function get_form()
    {

        if ($this->input->get('link_id')) {

            $data_info = $this->Link_stream_model->get_data($this->input->get('link_id'));
            //$data_user = $this->User_model->get_user_all();

//            var_dump($data_info, $data_user);
            if (!empty($data_info)) {

                $data['link_id'] = $this->input->get('link_id');

                foreach ($data_info as $info) {
                    $data['link_channel'] = $info['link_channel'];
                    $data['priority_level'] = $info['priority_level'];
                    $data['link_status'] = $info['link_status'];
                    $data['youtube_link'] = $info['youtube_link'];

                }
                //for($i=0;$i<count($data_user);$i++) {
                //$data['user_id'][] = $data_user[$i]['user_id'];
                //$data['username'][] = $data_user[$i]['username'];
                //}
            }

            $data["action"] = base_url() . "link_stream/edit_link_stream";

        } else {

            $data['link_id'] = "";
            $data['link_channel'] = "";
            $data['priority_level'] = "";
            $data['link_status'] = "";
            $data['youtube_link']= "";
            $data['create_by'] = $this->input->get('user_id');

            $data["action"] = base_url() . "link_stream/add_link_stream";

            //$data["list"] = $this->Link_stream_model->getall();

        }
        //$data["list"] = $this->Link_stream_model->getall();
        $data["layout"] = 'layout/link_stream_form';

        $this->load->view('layout', $data);
    }


    public function add_link_stream()
    {
        if ($this->input->post()) {
            $data["link_id"] = $this->Link_stream_model->add_link_stream($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_link_stream()
    {
        if ($this->input->post()) {
            $data["link_id"] = $this->Link_stream_model->edit_link_stream($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }


    public function validate_form()
    {

        if ((strlen($this->input->post('config_group_name')) < 3) || (strlen($this->input->post('config_group_name')) > 255)) {
            $this->error['config_group_name'] = "กรุณากรอกชื่อwebpage";
        }

        if (isset($this->error)) {
            $jsonResult['error'] = $this->error;
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";

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
            $total_user = $this->Config_group_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
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
            $result = $this->Config_group_model->getall();
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Config_group_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }
}