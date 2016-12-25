<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_user extends CI_Controller {

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
		$this->load->model('User_model');
		$this->load->model('User_group_model');
		$this->load->library('auth_check');

		if (!$this->auth_check->hasPermission('access', 'list_user')) {
			redirect('permission');
		}
	}

	public function index()
	{
		$this->get_form();
	}

	public function get_form(){

		$data_user = $this->User_model->search_filter($this->input->post("txtSearch"), 0, 10, -1, -1);

		$total_user = $this->User_model->count();
		$paging = (int)$total_user / 10;
		$over_page = $total_user % 10;
		if ($paging == 0) {
			$paging = 1;
		}
		if ($over_page != 0) {
			$paging++;
		}

		$data["user_groups"] = $this->User_group_model->get_all_user_group();

		$data["paging"] = $paging;

		$data["list"] = $data_user;

		$data["page"] = 'pages/list_user';

		$this->load->view('template', $data);
	}

	private function get_under_user($arr_main_user_id){
		$ret = array();
		foreach($arr_main_user_id as $main_user_id){
			$data = $this->User_model->get_under_user($main_user_id);
			$for_next_loop = array();
			foreach($data as $data_user){
				array_push($ret,$data_user);
				array_push($for_next_loop,$data_user['user_id']);
			}
			if(count($for_next_loop)!==0){
				foreach($for_next_loop as $sub_main_id){
					array_push($ret,$this->get_under_user($sub_main_id));
				}
			}
		}
		return $ret;
	}

	public function validate_form() {

		if ((strlen($this->input->post('user_name')) < 3) || (strlen($this->input->post('user_name')) > 255)) {
			$this->error['user_name'] = "กรุณากรอกข้อมูลชื่อสินค้า";
		}
		//echo "---".$this->input->post('user_name')."---";
		if ($this->input->post('user_id') =="") {
			$user_info = $this->User_model->get_user_by_user_name($this->input->post('user_name'));
			if ($user_info) {
				$this->error['user_name'] = "ชื่อสินค้านี้ถูกใช้แล้ว";
			}
		}

		if (isset($this->error)) {
			$jsonResult['error'] = $this->error;
		}

		$jsonResult['Result'] = true;
		$jsonResult['Data'] = "";

		echo json_encode($jsonResult);
	}

	public function get_all_user(){

		 $result = $this->User_model->get_all_user();

		$data["list"] = $result;
		$jsonResult['Result'] = true;
		$jsonResult['Data'] = $data;

		echo json_encode($jsonResult);
	}

	public function search_user() {

		$filter_number = $this->input->post("filter-number");
		$page = $this->input->post("filter-page");

		$user_status = $this->input->post("filter-status");
		$user_group = $this->input->post("filter-user-group");

		if($page>0){
			$page--;
		}

		if($filter_number==-1){
//			$result = $this->User_model->get_all_user();
			$start_filter =0;
			$filter_number=0;
			$result = $this->User_model->search_filter($this->input->post("txtSearch"),$start_filter,$filter_number,$user_status,$user_group);
		}else{
			$start_filter = $filter_number*$page;
			$result = $this->User_model->search_filter($this->input->post("txtSearch"),$start_filter,$filter_number,$user_status,$user_group);
		}

		$data["list"] = $result;

		$jsonResult['Result'] = true;
		$jsonResult['Data'] = $data;

		echo json_encode($jsonResult);
	}

	public function get_paging() {

		$filter_number = $this->input->post("filter-number");
		$page = $this->input->post("filter-page");
		$status = $this->input->post("filter-status");

		if(!$this->input->post("filter-page")){
			$page=1;
		}

		if ($filter_number == -1) {
			$page = 1;
		} else {
			$start_filter = $filter_number * $page;
			$total_user = $this->User_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status);

			if (!isset($total_user["total"])) {
				$data["paging"] = 1;
				$jsonResult['Data'] = $data;
				echo json_encode($jsonResult);
				return;
			}
			$paging = (int)((int)$total_user["total"] / (int)$filter_number);
			$over_page = (int)((int)$total_user["total"] % (int)$filter_number);

//            echo var_dump($total_user);
//            exit(0);
			if ($paging == 0) {
				$page = 1;
			} else {
				$page = $paging;
			}

			if ($over_page != 0 && $paging != 0) {
				$page++;
			}
		}

		$data["paging"] = $page;
		$jsonResult['Data'] = $data;

		echo json_encode($jsonResult);
	}


}