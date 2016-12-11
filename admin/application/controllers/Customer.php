<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *    http://example.com/index.php/welcome
     *  - or -
     *    http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'customer')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_form();
    }

    public function get_form(){

        $this->load->library('encrypt');

        if ($this->input->get('customer_id')) {

            $customer_info = $this->Customer_model->get_customer($this->input->get('customer_id'));

            if (!empty($customer_info)) {

                //--  Don't Delete
//				$password_result = $this->encrypt->encode($customer_info['password']);
//				$password_decode = $this->encrypt->decode($this->encrypt->decode($password_result));

                $data['customer_id'] = $customer_info['customer_id'];
                $data['member_id'] = $customer_info['member_id'];

                $data['customer_firstname'] = $customer_info['customer_firstname'];
                $data['customer_lastname'] = $customer_info['customer_lastname'];
                $data['customer_telephone'] = $customer_info['customer_telephone'];
                $data['customer_line_id'] = $customer_info['customer_line_id'];
                $data['customer_email'] = $customer_info['customer_email'];

                $data['how_to_know_web'] = $customer_info['how_to_know_web'];
                $data['bank_name'] = $customer_info['bank_name'];
                $data['bank_account_name'] = $customer_info['bank_account_name'];
                $data['bank_account_number'] = $customer_info['bank_account_number'];

                $data['old_id_promotion'] = $customer_info['old_id_promotion'];

                $data['submission_date'] = $customer_info['submission_date'];
                $data['accept_date'] = $customer_info['accept_date'];
                $data['accept_by'] = $customer_info['accept_by'];

                $data['customer_status'] = $customer_info['customer_status'];
            }

            $data["action"] = base_url() . "customer/edit";

        } else {

            $data['customer_id'] = ""; "";
            $data['member_id'] = "";

            $data['customer_firstname'] = "";
            $data['customer_lastname'] = "";
            $data['customer_telephone'] = "";
            $data['customer_line_id'] = "";
            $data['customer_email'] = "";

            $data['how_to_know_web'] = "";
            $data['bank_name'] = "";
            $data['bank_account_name'] = "";
            $data['bank_account_number'] = "";

            $data['old_id_promotion'] = "";

            $data['submission_date'] = "";
            $data['accept_date'] = "";
            $data['accept_by'] = "";

            $data['customer_status'] = "";

            $data["action"] = base_url() . "customer/add";

        }

        $all_customer = $this->Customer_model->search_customer_filter($this->input->post("txtSearch"),0,10,-1,-1);

        $total_customer = $this->Customer_model->get_total_customers();
        $paging = (int)$total_customer/10;
        $over_page = $total_customer%10;
        if($paging==0){
            $paging=1;
        }
        if($over_page!=0){
            $paging++;
        }

        $data["paging"] = $paging;

        $data["list"] = $all_customer;

        $data["layout"]='layout/customer';
        $this->load->view('layout',$data);
    }

    public function validate_form()
    {

        if ((strlen($this->input->post('customer_firstname')) < 3) || (strlen($this->input->post('customer_firstname')) > 255)) {
            $this->error['customer_firstname'] = "กรุณากรอกข้อมูลชื่อลูกค้า";
        }
        if ((strlen($this->input->post('customer_lastname')) < 3) || (strlen($this->input->post('customer_lastname')) > 255)) {
            $this->error['customer_lastname'] = "กรุณากรอกข้อมูลนามสกุลลูกค้า";
        }
        if ((strlen($this->input->post('customer_telephone')) < 3) || (strlen($this->input->post('customer_telephone')) > 255)) {
            $this->error['customer_telephone'] = "กรุณากรอกข้อมูลเบอร์โทรศัพท์ลูกค้า";
        }
        if ((strlen($this->input->post('customer_line_id')) < 3) || (strlen($this->input->post('customer_line_id')) > 255)) {
            $this->error['customer_line_id'] = "กรุณากรอกข้อมูลไลน์ลูกค้า";
        }

        $result_check_is_exist = $this->Customer_model->check_exist_customer_by_data($this->input->post());
        if( sizeof($result_check_is_exist)>0){

            $check_exist_customer_name = $this->Customer_model->check_exist_customer_name($this->input->post('customer_firstname'),$this->input->post('customer_lastname'));
            if( sizeof($check_exist_customer_name)>0){
                $this->error['customer_firstname'] = "ชื่อและนามสกุลนี้มีในระบบแล้ว";
                $this->error['customer_lastname'] = "ชื่อและนามสกุลนี้มีในระบบแล้ว";
            }

            $check_exist_customer_telephone = $this->Customer_model->check_exist_customer_telephone($this->input->post('customer_telephone'));
            if( sizeof($check_exist_customer_telephone)>0){
                $this->error['customer_telephone'] = "เบอร์โทรศัพท์นี้มีในระบบแล้ว";
            }

            $check_exist_customer_line_id = $this->Customer_model->check_exist_customer_line_id($this->input->post('customer_line_id'));
            if( sizeof($check_exist_customer_line_id)>0){
                $this->error['customer_line_id'] = "Lind IDนี้มีในระบบแล้ว";
            }

//            $check_exist_customer_email = $this->Customer_model->check_exist_customer_email($this->input->post('customer_email'));
//            if( sizeof($check_exist_customer_email)>0){
//                $this->error['customer_email'] = "Email นี้มีในระบบแล้ว";
//            }
        }
//        if ((strlen($this->input->post('customer_email')) < 3) || (strlen($this->input->post('customer_email')) > 255)) {
//            $this->error['customer_email'] = "กรุณากรอกข้อมูลอีเมล์ลูกค้า";
//        }

//        if ((strlen($this->input->post('how_to_know_web')) < 3) || (strlen($this->input->post('how_to_know_web')) > 255)) {
//            $this->error['how_to_know_web'] = "กรุณากรอกข้อมูลชื่อลูกค้า";
//        }
//        if ((strlen($this->input->post('bank_name')) < 3) || (strlen($this->input->post('bank_name')) > 255)) {
//            $this->error['bank_name'] = "กรุณากรอกข้อมูลชื่อลูกค้า";
//        }
//        if ((strlen($this->input->post('bank_account_name')) < 3) || (strlen($this->input->post('bank_account_name')) > 255)) {
//            $this->error['bank_account_name'] = "กรุณากรอกข้อมูลชื่อลูกค้า";
//        }
//        if ((strlen($this->input->post('bank_account_number')) < 3) || (strlen($this->input->post('bank_account_number')) > 255)) {
//            $this->error['bank_account_number'] = "กรุณากรอกข้อมูลชื่อลูกค้า";
//        }

        if (isset($this->error)) {
            $jsonResult['error'] = $this->error;
        }



//        echo var_dump($result_check_is_exist);
        $data["is_exist"] = sizeof($result_check_is_exist);

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";

        echo json_encode($jsonResult);
    }

    public function add_customer()
    {

        if ($this->input->post()) {
            $data["customer_id"] = $this->Customer_model->add_customer($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function add_user()
    {

        if ($this->input->post()) {
            $data["user_id"] = $this->User_model->add_user($this->input->post());
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
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

    public function delete()
    {

        if ($this->input->post()) {
            $this->User_model->delete_user($this->input->post("user_id"));
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
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
            $config['upload_path'] = 'assets\\\\img\\\\user';
            $image_url = 'assets\\\\img\\\\user';
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
                $image_url = $image_url . '\\\\' . $data['file_name'];
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

    public function get_customer(){

        $customer_info = $this->Customer_model->get_customer($this->input->post('customer_id'));

        $data["customer_info"] =$customer_info;

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

}
