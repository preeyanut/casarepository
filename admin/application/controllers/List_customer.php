<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_customer extends CI_Controller {

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
	 * @see http://codeigniter.com/customer_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_model');

		$this->load->library('auth_check');

		if (!$this->auth_check->hasPermission('access', 'list_customer')) {
			redirect('permission');
		}
	}

	public function index()
	{
		$this->get_list();
	}

    public function get_list()
    {
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

        $data["page"] = 'pages/list_customer';
        $this->load->view('template',$data);

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
        $data["list"] = $this->Customer_model->get_total_customers();

		$data["page"] = 'pages/list_customer';
		$this->load->view('template',$data);
	}

	private function get_under_customer($arr_main_customer_id){
		$ret = array();
		foreach($arr_main_customer_id as $main_customer_id){
			$data = $this->Customer_model->get_under_customer($main_customer_id);
			$for_next_loop = array();
			foreach($data as $data_customer){
				array_push($ret,$data_customer);
				array_push($for_next_loop,$data_customer['customer_id']);
			}
			if(count($for_next_loop)!==0){
				foreach($for_next_loop as $sub_main_id){
					array_push($ret,$this->get_under_customer($sub_main_id));
				}
			}
		}
		return $ret;
	}

	public function validate_form() {

		if ((strlen($this->input->post('customer_name')) < 3) || (strlen($this->input->post('customer_name')) > 255)) {
			$this->error['customer_name'] = "กรุณากรอกข้อมูลชื่อสินค้า";
		}
		//echo "---".$this->input->post('customer_name')."---";
		if ($this->input->post('customer_id') =="") {
			$customer_info = $this->Customer_model->get_customer_by_customer_name($this->input->post('customer_name'));
			if ($customer_info) {
				$this->error['customer_name'] = "ชื่อสินค้านี้ถูกใช้แล้ว";
			}
		}

		if (isset($this->error)) {
			$jsonResult['error'] = $this->error;
		}

		$jsonResult['Result'] = true;
		$jsonResult['Data'] = "";

		echo json_encode($jsonResult);
	}

	public function get_all_customer(){

		 $result = $this->Customer_model->get_all_customer();

		$data["list"] = $result;
		$jsonResult['Result'] = true;
		$jsonResult['Data'] = $data;

		echo json_encode($jsonResult);
	}

    public function get_paging() {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");

        $customer_status = $this->input->post("filter-customer-status");
        $customer_group = $this->input->post("filter-customer-group");


        if($filter_number==-1){
            $page=1;
        }else {
            $start_filter = $filter_number*$page;
            $total_customer = $this->Customer_model->get_total_by_search($this->input->post("txtSearch"),$start_filter,$filter_number,$customer_status,$customer_group);
            if(!isset($total_customer["total"])){
                $data["paging"] = 0;
                $jsonResult['Data'] = $data;
                echo json_encode($jsonResult);
                return;
            }
            $paging = (int)((int)$total_customer["total"] / (int)$filter_number);
            $over_page = (int)((int)$total_customer["total"] % (int)$filter_number);
            $page = 0;

            //echo "--".$total_customer["total"] ."--".$paging."---".$over_page;
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

    public function search_customer()
    {
        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $status = $this->input->post("filter-status");

        if ($page > 0) {
            $page--;
        }

//        $result = array();
        if ($filter_number == -1) {
            $result = $this->Customer_model->get_all_customer();
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Customer_model->search_customer_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

}