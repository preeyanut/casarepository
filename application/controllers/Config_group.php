<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_group extends CI_Controller
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
        $this->get_form();
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


    public function get_form()
    {

        if ($this->input->get('config_group_id')) {

            $data_info = $this->Config_group_model->get_data($this->input->get('config_group_id'));
            $data_user = $this->User_model->get_user_all();

//            var_dump($data_info, $data_user);
            if (!empty($data_info)) {

                $data['config_group_id'] = $this->input->get('config_group_id');

                foreach ($data_info as $info) {
                    $data['config_group_name'] = $info['config_group_name'];
                    $data['config_group_status'] = $info['config_group_status'];
                }
                for($i=0;$i<count($data_user);$i++) {
                    $data['user_id'][] = $data_user[$i]['user_id'];
                    $data['username'][] = $data_user[$i]['username'];
                }
            }

            $data["action"] = base_url() . "config_group/edit_config_group";

        } else {

            $data['config_group_id'] = "";
            $data['config_group_name'] = "";
            $data['config_group_status'] = "";

            $data['create_by'] = $this->input->get('user_id');

            $data["action"] = base_url() . "config_group/add_config_group";

            $data["groups"] = $this->Config_group_model->getall();

        }
//        var_dump($data);
        $data["layout"] = 'layout/config_group';

        $this->load->view('layout', $data);
    }


    public function get_all()

    {
        $data["list"] = $this->Config_group_model->getall();

        $jsonResult['Result'] = true;
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
}