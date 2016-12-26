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
        $this->load->model('User_model');



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
        $all_data = $this->Customer_model->search_filter($this->input->post("txtSearch"), 0, 10, -1, -1);

        $total_user = $this->Customer_model->count();
        $paging = (int)$total_user / 10;
        $over_page = $total_user % 10;
        if ($paging == 0) {
            $paging = 1;
        }
        if ($over_page != 0) {
            $paging++;
        }

        $data["list"] = $this->Customer_model->get_all();
        $data["paging"] = $paging;

        $data["list"] = $all_data;

      //var_dump($data);
        $data["page"] = 'pages/list_customer';
        $this->load->view('template',$data);

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

    public function edit_customer()
    {

        if ($this->input->post()) {
            $this->Customer_model->edit_customer($this->input->post("customer_id"), $this->input->post());
        }

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = "";
        echo json_encode($jsonResult);
    }

    public function delete_customer() {

        if ($this->input->post()) {
            $this->Customer_model->delete_customer($this->input->post("customer_id"));
        }

        $jsonResult['Result'] = true;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = "";
        echo json_encode($jsonResult);
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

//	public function validate_form() {
//
//		if ((strlen($this->input->post('customer_name')) < 3) || (strlen($this->input->post('customer_name')) > 255)) {
//			$this->error['customer_name'] = "กรุณากรอกข้อมูลชื่อสินค้า";
//		}
//		//echo "---".$this->input->post('customer_name')."---";
//		if ($this->input->post('customer_id') =="") {
//			$customer_info = $this->Customer_model->get_customer_by_customer_name($this->input->post('customer_name'));
//			if ($customer_info) {
//				$this->error['customer_name'] = "ชื่อสินค้านี้ถูกใช้แล้ว";
//			}
//		}
//
//		if (isset($this->error)) {
//			$jsonResult['error'] = $this->error;
//		}
//
//		$jsonResult['Result'] = true;
//		$jsonResult['Data'] = "";
//
//		echo json_encode($jsonResult);
//	}

	public function get_all_customer(){

		 $result = $this->Customer_model->get_all();

		$data["list"] = $result;
		$jsonResult['Result'] = true;
		$jsonResult['Data'] = $data;

		echo json_encode($jsonResult);
	}

    public function get_paging()
    {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $status = $this->input->post("filter-status");

        if(!$this->input->post("filter-page")){
            $page=0;
        }
        if ($filter_number == -1) {
            $page = 1;
        } else {
            $start_filter = $filter_number * $page;
            $total_user = $this->Customer_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
            if (!isset($total_user["total"])) {
                $data["paging"] = 0;
                $jsonResult['Data'] = $data;
                echo json_encode($jsonResult);
                return;
            }
            $paging = (int)((int)$total_user["total"] / (int)$filter_number);
            $over_page = (int)((int)$total_user["total"] % (int)$filter_number);
            $page = 0;

            if ($paging == 0) {
                $page = 1;
            } else {
                $page = $paging;
            }

            if ($over_page != 0 && $paging != 0) {
                $page++;
            }
        }
//var_dump($this->input->post("filter-number"),$this->input->post("filter-page"),$this->input->post("filter-status"));

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
            $result = $this->Customer_model->get_all();
        } else {
            $start_filter = $filter_number * $page;
            $result = $this->Customer_model->search_filter($this->input->post("txtSearch"), $start_filter, $filter_number, $status);
        }

        $data["list"] = $result;

        $jsonResult['Result'] = true;
        $jsonResult['Data'] = $data;

        echo json_encode($jsonResult);
    }

}