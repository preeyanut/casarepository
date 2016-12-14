<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model');
        $this->load->model('Config_group_model');
        $this->load->model('User_model');

        $this->load->library('ckeditor');
        $this->load->library('ckfinder');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'user')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_form();

    }

    public function get_form()
    {

        $data_user = $this->User_model->get_user_all();
        $data_config_group = $this->Config_group_model->getall();

        if ($this->input->get('config_group_id')) {

            $data_info = $this->Config_model->get_data($this->input->get('config_id'));


//            var_dump($data_info, $data_user);
            if (!empty($data_info)) {

                $data['config_id'] = $this->input->get('config_id');

                foreach ($data_info as $info) {
                    $data['config_title'] = $info['config_title'];
                    $data['config_group_id'] = $info['config_group_id'];
                    $data['priority_level'] = $info['priority_level'];
                    $data['meta_keyword'] = $info['meta_keyword'];
                    $data['meta_description'] = $info['meta_description'];
                    $data['login_link'] = $info['login_link'];
                    $data['config_content'] = $info['config_content'];
                    $data['config_image'] = $info['config_image'];
                    $data['e-mail'] = $info['e-mail'];
                    $data['line_id'] = $info['line_id'];
                    $data['telephone'] = $info['telephone'];
                    $data['facebook'] = $info['facebook'];
                    $data['googleplus'] = $info['googleplus'];
                    $data['instagram'] = $info['instagram'];
                    $data['youtube'] = $info['youtube'];
                    $data['twitter'] = $info['twitter'];
                    $data['head_tags'] = $info['head_tags'];
                    $data['body_tags'] = $info['body_tags'];


                    $data['create_date'] = $info['create_date'];
                    $data['create_by'] = $info['create_by'];

                }
                for($i=0;$i<count($data_user);$i++) {
                    $data['user_id'][] = $data_user[$i]['user_id'];
                    $data['username'][] = $data_user[$i]['username'];
                }

                for($i=0;$i<count($data_config_group);$i++) {
                    $data['config_group_id'][] = $data_config_group[$i]['config_group_id'];
                    $data['config_group_name'][] = $data_config_group[$i]['config_group_name'];
                }
            }

            $data["action"] = base_url() . "config_group/edit_config_group";

        } else {

            $data['config_id'] = "";
            $data['config_group_id'] = "";
            $data['priority_level'] = "";
            $data['meta_keyword'] = "";
            $data['meta_description'] = "";
            $data['login_link'] = "";
            $data['config_content'] = "";
            $data['config_image'] = "";
            $data['e-mail'] = "";
            $data['line_id'] = "";
            $data['telephone'] = "";
            $data['facebook'] = "";
            $data['googleplus'] = "";
            $data['instagram'] = "";
            $data['youtube'] = "";
            $data['twitter'] = "";
            $data['head_tags'] = "";
            $data['body_tags'] = "";
            $data['create_by'] = $this->input->get('user_id');

             for($i=0;$i<count($data_user);$i++) {
                 $data['user_id'][] = $data_user[$i]['user_id'];
                 $data['username'][] = $data_user[$i]['username'];
             }

            for($i=0;$i<count($data_config_group);$i++) {
                $data['config_group_id'][] = $data_config_group[$i]['config_group_id'];
                $data['config_group_name'][] = $data_config_group[$i]['config_group_name'];
            }

            $data["action"] = base_url() . "config_group/add_config_group";

            //$data["list"] = $this->Config_group_model->getall();

        }
        //$data["list"] = $this->Config_group_model->getall();
        $data["layout"] = 'layout/config_form';

        $this->load->view('layout', $data);
    }


    public function add_config_group()
    {
        if ($this->input->post()) {
            $data["config_id"] = $this->Config_model->add_config_group($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_config_group()
    {
        if ($this->input->post()) {
            $data["config_id"] = $this->Config_model->edit_config_group($this->input->post());
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
}