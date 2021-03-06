<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('User_group_model');
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
        $this->load->library('encrypt');

        if ($this->input->get('user_id')) {

            $user_info = $this->User_model->get_user($this->input->get('user_id'));

            if (!empty($user_info)) {

                $password_result = $this->encrypt->encode($user_info['password']);
                $password_decode = $this->encrypt->decode($this->encrypt->decode($password_result));

                $data['user_id'] = $user_info['user_id'];
                $data['username'] = $user_info['username'];
                $data['password'] = $password_decode;
                $data['confirm'] = $password_decode;
                $data['user_group_id'] = $user_info['user_group_id'];
                $data['user_group_name'] = $user_info['user_group_name'];

                $data['firstname'] = $user_info['firstname'];
                $data['lastname'] = $user_info['lastname'];
                $data['user_email'] = $user_info['user_email'];
                $data['user_telephone'] = $user_info['user_telephone'];
                $data['user_status'] = $user_info['user_status'];

                $data['create_date'] = $user_info['create_date'];
                $data['create_by'] = $user_info['create_by'];
                $data['update_date'] = $user_info['update_date'];
                $data['update_by'] = $user_info['update_by'];
            }

            $data["action"] = base_url() . "user/edit";

        } else {

            $data['user_id'] = "";
            $data['username'] = "";
            $data['password'] = "";
            $data['confirm'] = "";
            $data['user_group_id'] = "";
            $data['user_group_name'] = "";

            $data['firstname'] = "";
            $data['lastname'] = "";
            $data['user_email'] = "";
            $data['user_telephone'] = "";
            $data['user_status'] = "";

            $data['create_date'] = "";
            $data['create_by'] = "";
            $data['update_date'] = "";
            $data['update_by'] = "";

            $data["action"] = base_url() . "user/add";
        }

        $data["user_groups"] = $this->User_group_model->get_all_user_group();

        $data["page"] = 'pages/user';

        $this->load->view('template', $data);

    }

    public function validate_form()
    {

        if ((strlen($this->input->post('username')) < 3) || (strlen($this->input->post('username')) > 255)) {
            $this->error['username'] = "กรุณากรอกข้อมูลชื่อเข้าใช้งาน";
        }

        if ($this->input->post('user_id') == "") {
            $user_info = $this->User_model->get_user_by_username($this->input->post('username'));
            if ($user_info) {
                $this->error['username'] = "ชื่อเข้าใช้งานนี้ มีผู้อื่นใช้แล้ว";
            }
        }

        if ((strlen(trim($this->input->post('firstname'))) < 1) || (strlen(trim($this->input->post('firstname'))) > 255)) {
            $this->error['firstname'] = "กรุณากรอกข้อมูลชื่อแอดมิน";
        }

        if ($this->input->post('user_id') == "" || ($this->input->post('user_id') == "" && $this->input->post('password') != "")) {
            if ($this->input->post('password') || (!isset($this->input->get['user_id']))) {
                if ((strlen($this->input->post('password')) < 4) || (strlen($this->input->post('password')) > 20)) {
                    $this->error['password'] = "กรุณากรอกข้อมูลรหัสผ่าน";
                }

                if ($this->input->post('password') != $this->input->post('confirm')) {
                    $this->error['confirm'] = "ยืนยันรหัสผ่านไม่ตรงกัน";
                }
            }
            if (isset($this->error)) {
                $jsonResult['error'] = $this->error;
            }
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";

        echo json_encode($jsonResult);
    }

    public function add_user()
    {

        if ($this->input->post()) {
            $data["user_id"] = $this->User_model->add_user($this->input->post());
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function add_default_setting()
    {

        if ($this->input->post()) {
            $data["result"] = $this->User_model->add_default_setting(json_decode($this->input->post('default_setting')), $this->input->post("user_id"));
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function add_percent_setting()
    {

        if ($this->input->post()) {

            // echo var_dump(json_decode($this->input->post("percent_setting")));
            $data["result"] = $this->User_model->add_percent_setting(json_decode($this->input->post("percent_setting")), $this->input->post("user_id"));
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_user()
    {

        if ($this->input->post()) {
            $this->User_model->edit_user($this->input->post("user_id"), $this->input->post());
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";
        echo json_encode($jsonResult);
    }

    public function edit_default_setting()
    {

        if ($this->input->post()) {
            $data["result"] = $this->User_model->edit_default_setting(json_decode($this->input->post('default_setting')), $this->input->post("user_id"));
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_percent_setting()
    {

       // echo var_dump($this->input->post());

        if ($this->input->post()) {

            // echo var_dump(json_decode($this->input->post("percent_setting")));
            $data["result"] = $this->User_model->edit_percent_setting(json_decode($this->input->post("percent_setting")), $this->input->post("user_id"));
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function delete_user()
    {

        if ($this->input->post()) {
            $this->User_model->delete_user($this->input->post("user_id"));
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";
        echo json_encode($jsonResult);
    }

    public function get_all_user()
    {

        $data["list"] = $this->User_model->get_all_user();

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

    public function search_user()
    {

        $data["list"] = $this->User_model->search_user($this->input->post("txtSearch"));

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

    public function upload_file()
    {
//		echo "1".var_dump($_FILES['image']);
//		echo "2".var_dump($_POST['user_id']);
//		echo "3".var_dump($this->input->post());
//		exit(0);
        $status = "";
        $msg = "";
        $file_element_name = 'image';
        $image_name = "";
        $image_url = "";

        if (empty($_POST['user_id'])) {
            $status = "error";
            $msg = "Please enter a title";
        } else {
            $image_name = $_POST['user_id'];
        }

        if ($status != "error") {
            //$config['upload_path'] = 'assets\img\\'.$image_name.'\\';
            $config['upload_path'] = 'assets/img/user';
            $image_url = 'assets/img/user';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            //echo $image_url;
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {
                $data = $this->upload->data();
                //$image_url
                //$file_id = $this->files_model->insert_file($data['file_name'], $_POST['title']);
                $image_url = $image_url . '/' . $data['file_name'];
                $file_id = $this->User_model->update_image($image_name, $image_url);

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

    public function check_credit_enough(){

    }

}
