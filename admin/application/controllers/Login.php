<?php

/**
 * Created by PhpStorm.
 * User: adminm
 * Date: 10/11/2558
 * Time: 11:19
 */
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
//		$this->load->model('Result_model');
	}

	public function index()
	{
		if($this->session->userdata("user_id")){
			redirect("dashboard");
		}


		$data = array(
			'testdata' => ''
		);
		$this->load->view('login', $data);
	}

	public function employee_login()
	{

		$this->form_validation->set_rules('employee_username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('employee_password', 'Password', 'required');

		$data = array(
			'username' => $this->input->post('employee_username'),
			'password' => $this->input->post('employee_password')
		);
		//echo $this->input->post('employee_password');
		$result_login = $this->login_model->employee_login($data,$this->config->item('login_rank_duration'));

		switch ($result_login) {
			case -1 :
				$this->error['employee_error'] = "รหัสผ่านไม่ถูกต้อง";
				$result = false;
				break;
			case 0 :
				$result = true;
				break;
			case 1 :
				$this->error['employee_error'] = "Account นี้ถูกระงับ";
				$result = false;
				break;
			case 2 :
				$this->error['employee_error'] = "Account นี้ถูกปิดใช้งาน";
				$result = false;
				break;
		}


		if (isset($this->error)) {
			$jsonResult['error'] = $this->error;
		}

		$jsonResult['Result'] = $result;
		$jsonResult['Data'] = "";

		echo json_encode($jsonResult);

	}

	public function validateForm()
	{

		//echo var_dump($this->input->files('image'));
		//echo var_dump($_FILES)."--------";

		if ((strlen(trim($this->input->post('employee_username'))) < 1)) {
			$this->error['employee_username'] = "กรุณากรอก Username";
		}

		if ((strlen(trim($this->input->post('employee_password'))) < 1)) {
			$this->error['employee_password'] = "กรุณากรอก Password ";
		}

		if (isset($this->error)) {
			$jsonResult['error'] = $this->error;
		}

		$jsonResult['Result'] = true;
		$jsonResult['Data'] = "";

		echo json_encode($jsonResult);
	}
}