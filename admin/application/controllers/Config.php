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

        //$data_user = $this->User_model->get_user_all();
        $data_config_group = $this->Config_group_model->get_all();

        if ($this->input->get('config_id')) {

            $data_info = $this->Config_model->get_data($this->input->get('config_id'));


            //var_dump($data_info, $data_user);
            if (!empty($data_info)) {

                $data['config_id'] = $this->input->get('config_id');

                foreach ($data_info as $info) {
                    $data['config_title'] = $info['config_title'];
                    $data['config_group_id'] = $info['config_group_id'];
                    $data['meta_keyword'] = $info['meta_keyword'];
                    $data['meta_description'] = $info['meta_description'];
                    $data['login_link'] = $info['login_link'];
                    $data['config_content'] = $info['config_content'];
                    $data['config_image'] = $info['config_image'];
                    $data['line_id'] = $info['line_id'];
                    $data['telephone'] = $info['telephone'];
                    $data['facebook'] = $info['facebook'];
                    $data['googleplus'] = $info['googleplus'];
                    $data['instagram'] = $info['instagram'];
                    $data['youtube'] = $info['youtube'];
                    $data['twitter'] = $info['twitter'];


                    $data['create_date'] = $info['create_date'];
                    $data['create_by'] = $info['create_by'];

                }
                //for ($i = 0; $i < count($data_user); $i++) {
                    //$data['user_id'][] = $data_user[$i]['user_id'];
                    //$data['username'][] = $data_user[$i]['username'];
                //}

                for ($i = 0; $i < count($data_config_group); $i++) {
                    $data['config_group_id'][] = $data_config_group[$i]['config_group_id'];
                    $data['config_group_name'][] = $data_config_group[$i]['config_group_name'];
                }
            }

            $data["action"] = base_url() . "config/edit_config";

        } else {

            $data['config_id'] = "";
            $data['config_group_id'] = "";
            $data['config_title'] = "";
            $data['meta_keyword'] = "";
            $data['meta_description'] = "";
            $data['login_link'] = "";
            $data['config_content'] = "";
            $data['config_image'] = "";
            $data['line_id'] = "";
            $data['telephone'] = "";
            $data['facebook'] = "";
            $data['googleplus'] = "";
            $data['instagram'] = "";
            $data['youtube'] = "";
            $data['twitter'] = "";
            $data['create_by'] = $this->input->get('user_id');

            //for ($i = 0; $i < count($data_user); $i++) {
                //$data['user_id'][] = $data_user[$i]['user_id'];
                //$data['username'][] = $data_user[$i]['username'];
            //}

            for ($i = 0; $i < count($data_config_group); $i++) {
                $data['config_group_id'][] = $data_config_group[$i]['config_group_id'];
                $data['config_group_name'][] = $data_config_group[$i]['config_group_name'];
            }

            $data["action"] = base_url() . "config/add_config";

            //$data["list"] = $this->Config_group_model->get_all();

        }
        //$data["list"] = $this->Config_group_model->get_all();
        $data["page"] = 'pages/config_form';

        $this->load->view('template', $data);
    }


    public function add_config()
    {
        if ($this->input->post()) {
            $data["config_id"] = $this->Config_model->add_config($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_config()
    {
        if ($this->input->post()) {
            $data["config_id"] = $this->Config_model->edit_config($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }


    public function validate_form()
    {

        if ((strlen($this->input->post('config_title')) < 3) || (strlen($this->input->post('config_title')) > 255)) {
            $this->error['config_title'] = "กรุณากรอกข้อมูล title";
        }

        if ((strlen($this->input->post('meta_keyword')) < 3) || (strlen($this->input->post('meta_keyword')) > 255)) {
            $this->error['meta_keyword'] = "กรุณากรอกข้อมูล meta_keyword";
        }

        if ((strlen($this->input->post('meta_description')) < 3) || (strlen($this->input->post('meta_description')) > 255)) {
            $this->error['meta_description'] = "กรุณากรอกข้อมูล meta_description";
        }

        if ((strlen($this->input->post('login_link')) < 3) || (strlen($this->input->post('login_link')) > 255)) {
            $this->error['login_link'] = "กรุณากรอกข้อมูล login link";
        }

        if ((strlen($this->input->post('line_id')) < 3) || (strlen($this->input->post('line_id')) > 255)) {
            $this->error['line_id'] = "กรุณากรอกข้อมูล line id";
        }

        if ((strlen($this->input->post('telephone')) < 3) || (strlen($this->input->post('telephone')) > 255)) {
            $this->error['telephone'] = "กรุณากรอกข้อมูลเบอร์โทรศัพท์";
        }

        if ((strlen($this->input->post('facebook')) < 3) || (strlen($this->input->post('facebook')) > 255)) {
            $this->error['facebook'] = "กรุณากรอกข้อมูล facebook";
        }

        if ((strlen($this->input->post('googleplus')) < 3) || (strlen($this->input->post('googleplus')) > 255)) {
            $this->error['googleplus'] = "กรุณากรอกข้อมูล googleplus";
        }

        if ((strlen($this->input->post('instagram')) < 3) || (strlen($this->input->post('instagram')) > 255)) {
            $this->error['instagram'] = "กรุณากรอกข้อมูล instagram";
        }

        if ((strlen($this->input->post('youtube')) < 3) || (strlen($this->input->post('youtube')) > 255)) {
            $this->error['youtube'] = "กรุณากรอกข้อมูล youtube";
        }

        if ((strlen($this->input->post('twitter')) < 3) || (strlen($this->input->post('twitter')) > 255)) {
            $this->error['twitter'] = "กรุณากรอกข้อมูล twitter";
        }

        if (isset($this->error)) {
            $jsonResult['error'] = $this->error;
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";

        echo json_encode($jsonResult);
    }
}