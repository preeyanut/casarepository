<?php

class Banner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth_check');      //ฟังค์ชั่นการใช้สิทธิ์การเข้าถึง
        $this->load->model("Banner_model");

        if (!$this->auth_check->hasPermission('access', 'banner')) {
            redirect('permission');
        }

    }

    public function index()
    {

        $this->get_form();
    }

    public function get_form()
    {
        if ($this->input->get('banner_id')) {

            $data_info = $this->Banner_model->get_data($this->input->get('banner_id'));

            //var_dump($data);
            if (!empty($data_info)) {

                $data['banner_id'] = $this->input->get('banner_id');

                foreach ($data_info as $info) {
                    $data['banner_name'] = $info['banner_name'];
                    $data['priority_level'] = $info['priority_level'];
                    $data['banner_status'] = $info['banner_status'];
                    $data['banner_image'] = $info['banner_image'];
                    $data['banner_url'] = $info['banner_url'];
                    $data['banner_image'] = $info['banner_image'];
                }
                $all_priority_level = $this->Banner_model->get_all_priority($info['banner_id']);
            }

            $data["action"] = base_url() . "banner/edit_banner";

        } else {
            $data['banner_id'] = "";
            $data['banner_name'] = "";
            $data['priority_level'] = "";
            $data['banner_status'] = "";
            $data['banner_image'] = "";
            $data['banner_url'] = "";

            $data['create_by'] = $this->session->userdata("user_id");

            $data["action"] = base_url() . "banner/add_banner";

            $all_priority_level = $this->Banner_model->get_all_priority(1);

            $data["groups"] = $this->Banner_model->get_all();

        }

//---------------------  Priority Level
        //var_dump($all_priority_level);

        if ($all_priority_level) {
            if (!$this->input->get('banner_id')) {
                $data_priority = array('priority_level' => (string)(sizeof($all_priority_level) + 1));
                array_unshift($all_priority_level, $data_priority);
            }
        } else {
            $all_priority_level = array();
            $data_priority = array('priority_level' => (string)(sizeof($all_priority_level) + 1));
            array_push($all_priority_level, $data_priority);
        }

        $data["all_priority_level"] = $all_priority_level;

        //var_dump($data);
        $data["page"] = 'pages/banner_form';

        $this->load->view('template', $data);
    }

    public function add_banner()
    {

        if ($this->input->post()) {
            $data["banner_id"] = $this->Banner_model->add_banner($this->input->post('data_banner'));
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_banner()
    {


        if ($this->input->post()) {
            $data["banner_id"] = $this->Banner_model->edit_banner($this->input->post('data_banner'));
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

    public function upload_file()
    {
        $status = "";
        $msg = "";
        $file_element_name = 'image';

        if (empty($_POST['banner_id'])) {
            $status = "error";
            $msg = "Please enter banner_id";

            echo json_encode(array('status' => $status, 'msg' => $msg));
            return;
        }

        if ($status != "error") {
            $image_directory = 'assets\\img\\banner\\' . $_POST['banner_id'];
            $image_path = 'assets\\img\\banner\\' . $_POST['banner_id'] . '\\' . $_FILES['image']['name'];

            $config['upload_path'] = $image_directory;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024 * 8;
//            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!file_exists($image_path)) {
                if (!file_exists($image_directory)) {
                    mkdir($image_directory, 0777, true);
                }
            } else {
                unlink($image_path);
            }

            if (!$this->upload->do_upload($file_element_name)) {

                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {

                $data = $this->upload->data();
                $file_id = $this->Banner_model->updateImage($_POST['banner_id'], $image_path);

                if ($file_id) {
                    $status = "success";
                    $msg = "File successfully uploaded";
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function validate_form()
    {

        if ((strlen($this->input->post('banner_name')) < 3) || (strlen($this->input->post('banner_name')) > 255)) {
            $this->error['banner_name'] = "กรุณากรอกชื่อแบนเนอร์";
        }

        //if ((!($this->input->post('banner')))) {
            //$this->error['banner'] = "กรุณาเลือกรูปภาพ";
        //}

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