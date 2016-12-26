<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_group extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_group_model');


        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'config_group')) {
            redirect('permission');
        }
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

        $data["list"] = $this->Config_group_model->get_all();
        //$data_user = $this->User_model->get_user_all();

        //for ($i = 0; $i < count($data_user); $i++) {
        //$data['user_id'][] = $data_user[$i]['user_id'];
        //$data['username'][] = $data_user[$i]['username'];
        //}

        $data["paging"] = $paging;

        $data["list"] = $all_data;

//        var_dump($data);

        $data["page"] = 'pages/config_group';

        $this->load->view('template', $data);

    }


    public function get_all()

    {
        $data["list"] = $this->Config_group_model->get_all();

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);

    }

    public function get_form()
    {

        if ($this->input->get('config_group_id')) {

            $data_info = $this->Config_group_model->get_data($this->input->get('config_group_id'));
            //$data_user = $this->User_model->get_user_all();

//            var_dump($data_info, $data_user);
            if (!empty($data_info)) {

                $data['config_group_id'] = $this->input->get('config_group_id');

                foreach ($data_info as $info) {
                    $data['config_group_name'] = $info['config_group_name'];
                    $data['config_group_status'] = $info['config_group_status'];

                }
                //for($i=0;$i<count($data_user);$i++) {
                //$data['user_id'][] = $data_user[$i]['user_id'];
                //$data['username'][] = $data_user[$i]['username'];
                //}
            }

            $data["action"] = base_url() . "config_group/edit_config_group";

        } else {

            $data['config_group_id'] = "";
            $data['config_group_name'] = "";
            $data['config_group_status'] = "";
            $data['create_date'] = date("Y-m-d H:i:s");
            $data['create_by'] = $this->session->userdata("user_id");

            $data["action"] = base_url() . "config_group/add_config_group";

            //$data["list"] = $this->Config_group_model->get_all();

        }

        //var_dump($data);
        $data["list"] = $this->Config_group_model->get_all();
        $data["page"] = 'pages/config_group';

        $this->load->view('template', $data);
    }


    public function add_config_group()
    {
        if ($this->input->post()) {
            $data["config_group_id"] = $this->Config_group_model->add_config_group($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_config_group()
    {
        if ($this->input->post()) {
            $data["config_group_id"] = $this->Config_group_model->edit_config_group($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }


    public function delete_config_group()
    {

        if ($this->input->post()) {
            $this->Config_group_model->delete_config_group($this->input->post("config_group_id"));
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = "";
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

        if(!$this->input->post("filter-page")){
            $page=0;
        }

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
            $result = $this->Config_group_model->get_all();
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