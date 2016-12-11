<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_group extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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
		//$this->load->model('User_model');
		$this->load->model('User_group_model');
		$this->load->library('auth_check');

		if (!$this->auth_check->hasPermission('access', 'user_group')) {
			redirect('permission');
		}
	}

	public function index()
	{
		$this->get_form();
	}

	public function get_form(){
		//$this->input->post();
		if($this->input->get('user_group_id')) {

			$user_group_info = $this->User_group_model->get_user_group($this->input->get('user_group_id'));
			if (!empty($user_group_info)) {
				$user_group_info['permission'] = json_decode($user_group_info['permission'], true);
			}

//			echo var_dump($user_group_info);
//			exit(0);
		if (!empty($user_group_info)) {
				$data['user_group_id'] = $user_group_info['user_group_id'];
				$data['name'] = $user_group_info['name'];
			}
			$data["action"] = base_url()."user_group/edit";
		}else{
			$data['user_group_id'] ="";
			$data['name'] ="";
			$data["action"] = base_url()."user_group/add";

		}

		$data["user_groups"] = $this->User_group_model->get_all_user_group();

		//$data["list"] = $this->User_model->getAllUser();

		$data["list"]  = $this->User_group_model->get_all_user_group();

		$ignore = array(
			'login',
			'index',
		);

		$data['permissions'] = array();

		$files = array();

		// Make path into an array
		$path = array(APPPATH . 'controllers/*');

		// While the path array is still populated keep looping through
		while (count($path) != 0) {
			$next = array_shift($path);

			foreach (glob($next) as $file) {
				// If directory add to path array
				if (is_dir($file)) {
					$path[] = $file . '/*';
				}

				// Add the file to the files to be deleted array
				if (is_file($file)) {
					$files[] = $file;
				}
			}
		}

		// Sort the file array
		sort($files);

		foreach ($files as $file) {
			$controller = substr($file, strlen(APPPATH . 'controllers/'));

			$permission = strtolower(substr($controller, 0, strrpos($controller, '.')));

			if (!in_array($permission, $ignore)) {
				$data['permissions'][] = $permission;
			}
		}

		if (isset($this->input->post['permission']['access'])) {
			$data['access'] = $this->input->post['permission']['access'];
		} elseif (isset($user_group_info['permission']['access'])) {
			$data['access'] = $user_group_info['permission']['access'];
		} else {
			$data['access'] = array();
		}

		if (isset($this->input->post['permission']['modify'])) {
			$data['modify'] = $this->input->post['permission']['modify'];
		} elseif (isset($user_group_info['permission']['modify'])) {
			$data['modify'] = $user_group_info['permission']['modify'];
		} else {
			$data['modify'] = array();
		}

		$data["layout"]='layout/user_group';
		$this->load->view('layout',$data);
	}

	public function validate_form() {

		//echo var_dump($this->input->files('image'));
		//echo var_dump($_FILES)."--------";

		if ((strlen($this->input->post('name')) < 3) || (strlen($this->input->post('name')) > 50)) {
			$this->error['name'] = "กรุณากรอกข้อมูลชื่อกลุ่มพนักงาน";
		}

		if ($this->input->post('user_group_id') =="") {
			$user_group_info = $this->User_group_model->get_user_group_by_name($this->input->post('name'));
			if ($user_group_info) {
				$this->error['name'] = "มีชื่อกลุ่มพนักงานนี้แล้ว";
			}
		}

		if (isset($this->error)) {
			$jsonResult['error'] = $this->error;
		}

		$jsonResult['Result'] = true;
		$jsonResult['Data'] = "";

		echo json_encode($jsonResult);
	}

	public function add() {

		$permission = $this->input->post('permission');
		$data = array(
			"name" => $this->input->post('name'),
			"permission" => json_encode($permission),
		);

		$data = array_filter($data);

		if ($this->input->post()) {
			$data["user_group_id"] = $this->User_group_model->add_user_group($data);
		}

		$jsonResult['Result'] = true;
		//$jsonResult['error'] = "";
		$jsonResult['Data'] = $data;
		echo json_encode($jsonResult);
	}

	public function edit() {

		$permission = $this->input->post('permission');
		$data = array(
			"name" => $this->input->post('name'),
			"permission" => json_encode($permission),
		);

		$data = array_filter($data);

		if ($this->input->post()) {
			$this->User_group_model->edit_user_group($this->input->post("user_group_id"), $data);
		}

		$jsonResult['Result'] = true;
		//$jsonResult['error'] = "";
		$jsonResult['Data'] = "";
		echo json_encode($jsonResult);
	}

	public function delete() {

		if ($this->input->post()) {
			$this->User_group_model->delete_user_group($this->input->post("user_group_id"));
		}

		$jsonResult['Result'] = true;
		//$jsonResult['error'] = "";
		$jsonResult['Data'] = "";
		echo json_encode($jsonResult);
	}

	public function get_all_user_group() {

		$data["list"] = $this->User_group_model->get_all_user_group();

		$jsonResult['Result'] = true;
		//$jsonResult['error'] = "";
		$jsonResult['Data'] = $data;

		echo json_encode($jsonResult);
	}

	public function search_user_group() {

		$data["list"] = $this->User_group_model->search_user_group($this->input->post("txtSearch"));

		$jsonResult['Result'] = true;
		//$jsonResult['error'] = "";
		$jsonResult['Data'] = $data;

		echo json_encode($jsonResult);
	}

}
