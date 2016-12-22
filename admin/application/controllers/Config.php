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
//        if ($this->input->get('config_id')) {

//        $data_info = $this->Config_model->get_data($this->input->get('config_id'));
        $data_info = $this->Config_model->get_data(1);

        $data_info_contact = $this->Config_model->get_data_contact(2);

        $data_config_group = $this->Config_group_model->get_all();

        if (!empty($data_info)) {

//            ------------ Front End
            $data['config_id'] = $data_info['config_id'];
            $data['config_title'] = $data_info['config_title'];
            $data['config_group_id'] = $data_info['config_group_id'];
            $data['meta_keyword'] = $data_info['meta_keyword'];
            $data['meta_description'] = $data_info['meta_description'];
            $data['login_link'] = $data_info['login_link'];
            $data['frontend_image'] = $data_info['frontend_image'];
            $data['logo_image'] = $data_info['logo_image'];
            $data['line_id'] = $data_info['line_id'];
            $data['telephone'] = $data_info['telephone'];
            $data['facebook'] = $data_info['facebook'];
            $data['googleplus'] = $data_info['googleplus'];
            $data['instagram'] = $data_info['instagram'];
            $data['youtube'] = $data_info['youtube'];
            $data['twitter'] = $data_info['twitter'];





            $data['create_date'] = $data_info['create_date'];
            $data['create_by'] = $data_info['create_by'];

            $data['config_group'] = $data_config_group;
            $data["action"] = base_url() . "config/add_frontend_setting";
        }
        $data['config_group_id'] = $data_info['config_group_id'];
        $data['config_content'] = $data_info_contact['config_content'];
        $data['contact_image'] = $data_info_contact['contact_image'];
        $data['email'] = $data_info_contact['email'];

        $data["action"] = base_url() . "config/add_contact_setting";
//        }

        $data["page"] = 'pages/config_form';

        $this->load->view('template', $data);
    }


    public function add_frontend_setting()
    {
//        echo var_dump($this->input->post());
        $result=false;

        if ($this->input->post()) {
            $result = $this->Config_model->add_frontend_setting($this->input->post());
            $data['config_id'] = $this->input->post('config_id');
        }

        $jsonResult['Result'] = $result;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function add_contact_setting()
    {
        $result=false;

        if ($this->input->post()) {
            $result = $this->Config_model->add_contact_setting($this->input->post());
            $data['config_id'] = $this->input->post('config_id');
        }

        $jsonResult['Result'] = $result;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function validate_frontend_form()
    {

        if ((strlen($this->input->post('config_title')) < 3) || (strlen($this->input->post('config_title')) > 255)) {
            $this->error['config_title'] = "กรุณากรอกข้อมูล title";
        }

        if ((strlen($this->input->post('meta_keyword')) < 3) || (strlen($this->input->post('meta_keyword')) > 255)) {
            $this->error['meta_keyword'] = "กรุณากรอกข้อมูล meta_keyword";
        }

        if ((strlen($this->input->post('meta_description')) < 3) || (strlen($this->input->post('meta_description')) > 1000)) {
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

    public function validate_contact_form()
    {

        if ((strlen($this->input->post('email')) < 3) || (strlen($this->input->post('email')) > 255)) {
            $this->error['email'] = "กรุณากรอกข้อมูล E-mail";
        }


        if ((strlen($this->input->post('line-id')) < 3) || (strlen($this->input->post('line-id')) > 255)) {
            $this->error['line-id'] = "กรุณากรอกข้อมูล line id";
        }

        if ((strlen($this->input->post('face-book')) < 3) || (strlen($this->input->post('face-book')) > 255)) {
            $this->error['face-book'] = "กรุณากรอกข้อมูล facebook";
        }

        if ((strlen($this->input->post('google-plus')) < 3) || (strlen($this->input->post('google-plus')) > 255)) {
            $this->error['google-plus'] = "กรุณากรอกข้อมูล googleplus";
        }

        if ((strlen($this->input->post('ins-tagram')) < 3) || (strlen($this->input->post('ins-tagram')) > 255)) {
            $this->error['ins-tagram'] = "กรุณากรอกข้อมูล instagram";
        }

        if ((strlen($this->input->post('you-tube')) < 3) || (strlen($this->input->post('you-tube')) > 255)) {
            $this->error['you-tube'] = "กรุณากรอกข้อมูล youtube";
        }

        if (isset($this->error)) {
            $jsonResult['error'] = $this->error;
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";

        echo json_encode($jsonResult);
    }

    public function upload_Contact_Image()
    {
        $status = "";
        $msg = "";
        $file_element_name = 'image';

        if (empty($_POST['config_id'])) {
            $status = "error";
            $msg = "Please enter config_id";

            echo json_encode(array('status' => $status, 'msg' => $msg));
            return;
        }

        if ($status != "error") {
            $image_directory = 'assets\\img\\config\\' . $_POST['config_id'];
            $image_path = 'assets\\img\\config\\' . $_POST['config_id'] . '\\' . $_FILES['image']['name'];

            $config['upload_path'] = $image_directory;
            $config['allowed_types'] = 'gif|jpg|png';
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
                $file_id = $this->Config_model->update_contact_Image($_POST['config_id'], $image_path);

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

    public function upload_favicon()
    {


//        echo var_dump($_FILES['image']);
        $status = "";
        $msg = "";
        $file_element_name = 'image';

        if (empty($_POST['config_id'])) {
            $status = "error";
            $msg = "Please enter config_id";

            echo json_encode(array('status' => $status, 'msg' => $msg));
            return;
        }

        if ($status != "error") {

            echo "-----";
            $image_directory = 'assets\\img\\config\\' . $_POST['config_id'];
            $image_path = 'assets\\img\\config\\' . $_POST['config_id'] . '\\' . $_FILES['image']['name'];

            $config['upload_path'] = $image_directory;
            $config['allowed_types'] = 'gif|jpg|png';
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
                $file_id = $this->Config_model->update_favicon($_POST['config_id'], $image_path);

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

    public function upload_logo()
    {
//        echo var_dump($_FILES['image']);
        $status = "";
        $msg = "";
        $file_element_name = 'image';

        if (empty($_POST['config_id'])) {
            $status = "error";
            $msg = "Please enter config_id";

            echo json_encode(array('status' => $status, 'msg' => $msg));
            return;
        }

        if ($status != "error") {
            $image_directory = 'assets\\img\\config\\' . $_POST['config_id'];
            $image_path = 'assets\\img\\config\\' . $_POST['config_id'] . '\\' . $_FILES['image']['name'];

            $config['upload_path'] = $image_directory;
            $config['allowed_types'] = 'gif|jpg|png';
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
//                $image_path= '00';
                $file_id = $this->Config_model->update_logo($_POST['config_id'], $image_path);

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
}