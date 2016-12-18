<?php

class Banner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth_check');      //ฟังค์ชั่นการใช้สิทธิ์การเข้าถึง
        $this->load->model("Banner_model");

//        if (!$this->auth_check->hasPermission('access', 'banner')) {
//            redirect('permission');
//        }

    }

    public function index()
    {

        $this->get_form();
    }

    public function get_form()
    {
        if ($this->input->get('banner_id')) {

            $data_info = $this->Banner_model->get_data($this->input->get('banner_id'));

            if (!empty($data_info)) {

                $data['banner_id'] = $this->input->get('banner_id');

                foreach ($data_info as $info) {
                    $data['banner_name'] = $info['banner_name'];
                    $data['priority_level'] = $info['priority_level'];
                    $data['banner_status'] = $info['banner_status'];
                    $data['banner_image'] = $info['banner_image'];
                    $data['banner_url'] = $info['banner_url'];
                }
            }

            $data["action"] = base_url() . "banner/edit_banner";

        } else {
            $data['banner_id'] = "";
            $data['banner_name'] = "";
            $data['priority_level'] = "";
            $data['banner_status'] = "";
            $data['banner_image'] = "";
            $data['banner_url'] = "";

            $data['create_by'] = $this->input->get('user_id');

            $data["action"] = base_url() . "banner/add_banner";

            $data["groups"] = $this->Banner_model->get_all();

        }
        $data["page"] = 'pages/banner_form';

        $this->load->view('template', $data);
    }

    public function add_banner()
    {
//        var_dump($this->input->post());
//        if (isset($_FILES['test']['name']) && !empty($_FILES['test']['name'])) {
//
//            $config['upload_path'] = './assets/images/banner/';
//            $config['max_size'] = '2048';
//            $config['max_width'] = '1600';
//            $config['max_height'] = '1000';
//            $config['allowed_types'] = "jpg|png|gif|jpeg";
//
//            /* Load the upload library */
//            $this->load->library('upload', $config);
//            // setting file's mysterious name
//
//            if ($this->upload->do_upload("test")) {
//                $filedata = $this->upload->data();
//                $filename = date('Ymd-His') . $filedata['file_ext'];
//                rename($filedata['full_path'], $filedata['file_path'] . $filename);
//            }
//        } else {
//            $filename = '123456';
//            // echo "ไม่มีรูปประกอบ";
//        }

        if ($this->input->post()) {
            $data["banner_id"] = $this->Banner_model->add_banner($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_banner()
    {


        if ($this->input->post()) {
            $data["banner_id"] = $this->Banner_model->edit_banner($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function delete_bank()
    {
        if ($this->input->get('banner_id')) {
            $data["banner_id"] = $this->Banner_model->delete_banner($this->input->get('banner_id'));
        }

        $this->get_all();
    }

    public function validate_form()
    {

//        var_dump(($this->input->post('img')));
        if ((strlen($this->input->post('banner_name')) < 3) || (strlen($this->input->post('banner_name')) > 255)) {
            $this->error['banner_name'] = "กรุณากรอกชื่อแบนเนอร์";
        }

        if ((!($this->input->post('banner')))) {
            $this->error['banner'] = "กรุณาเลือกรูปภาพ";
        }

        if ((strlen($this->input->post('priority_level')) < 1) || (strlen($this->input->post('priority_level')) > 255)) {
            $this->error['priority_level'] = "กรุณากรอกความสำคัญ";
        }

        if ((strlen($this->input->post('banner_url')) < 3) || (strlen($this->input->post('banner_url')) > 255)) {
            $this->error['banner_url'] = "กรุณากรอก URL";
        }

        if (isset($this->error)) {
            $jsonResult['error'] = $this->error;
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";

        echo json_encode($jsonResult);
    }


}