<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->model('Category_model');
        $this->load->model('User_model');

        $this->load->library('auth_check');

        if (!$this->auth_check->hasPermission('access', 'customer')) {
            redirect('permission');
        }
    }

    public function index()
    {
        $this->get_form();
    }

    public function get_form()
    {


        if ($this->input->get('blog_id')) {

            $data_info = $this->Blog_model->get_data($this->input->get('blog_id'));
            $blog_field = $this->Blog_model->get_blog_field($data_info[0]['blog_id'],$data_info[0]['category_type_id']);

            $data['blog_field'] = $blog_field;

            if (!empty($data_info)) {

                $data['blog_id'] = $this->input->get('blog_id');

                foreach ($data_info as $info) {
                    $data['blog_id'] = $info['blog_id'];
                    $data['blog_title'] = $info['blog_title'];
                    $data['blog_status'] = $info['blog_status'];
                    $data['priority_level'] = $info['priority_level'];

                    $data['category_id'] = $info['category_id'];
                    $data['category_name'] = $info['category_name'];
                    $data['category_type_id'] = $info['category_type_id'];

                }

                $all_priority_level = $this->Blog_model->get_all_priority($info['category_id']);
            }

            $data["action"] = base_url() . "blog/edit_blog";

        } else {

            $data['blog_id'] = "";
            $data['blog_title'] = "";
            $data['blog_status'] = "";
            $data['priority_level'] = "";

            $data['category_id'] = "";
            $data['category_name'] = "";
            $data['category_type_id'] = "";
//            $data['create_date'] = date("Y-m-d H:i:s");
//            $data['create_by'] = $this->session->userdata("user_id");

            $data["action"] = base_url() . "blog/add_blog";

            $all_priority_level = $this->Blog_model->get_all_priority(1);
        }

        //---------------------  Priority Level

        if($all_priority_level){
            if(!$this->input->get('blog_id')){
                $data_priority = array('priority_level' => (string)(sizeof($all_priority_level)+1));
                array_unshift($all_priority_level,$data_priority);
            }
        }else{
            $all_priority_level = array();
            $data_priority = array('priority_level' => (string)(sizeof($all_priority_level)+1));
            array_push($all_priority_level,$data_priority);
        }

        $data["all_priority_level"] = $all_priority_level;

        $data["category"] = $this->Category_model->get_all();

        $data["page"] = 'pages/blog_form';

        $this->load->view('template', $data);
    }

    public function get_all()
    {
        $data_user = $this->Blog_model->search_filter($this->input->post("txtSearch"), 0, 10, -1, -1);

        $total_user = $this->Blog_model->count();
        $paging = (int)$total_user / 10;
        $over_page = $total_user % 10;
        if ($paging == 0) {
            $paging = 1;
        }
        if ($over_page != 0) {
            $paging++;
        }

        $data["paging"] = $paging;

        $data["list"] = $data_user;

        $data["page"] = 'pages/blog';

        $this->load->view('template', $data);

    }

    public function get_paging()
    {

        $filter_number = $this->input->post("filter-number");
        $page = $this->input->post("filter-page");
        $status = $this->input->post("filter-status");

        if ($filter_number == -1) {
            $page = 1;
        } else {
            $start_filter = $filter_number * $page;
            $total_user = $this->Blog_model->get_total_by_search($this->input->post("txtSearch"), $start_filter, $filter_number, $status);

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

    public function add_blog()
    {
        $result = false;
        if ($this->input->post()) {
            $data["blog_id"] = $this->Blog_model->add_blog($this->input->post('data_blog'));
            if ($data["blog_id"]) {
                $result = $this->Blog_model->add_blog_field($data["blog_id"], $this->input->post('data_blog_field'));
            }
        }

        $jsonResult['Result'] = $result;
        //$jsonResult['error'] = "";
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function edit_blog()
    {
        $result = false;
        if ($this->input->post()) {
            $data["blog_id"] = $this->Blog_model->edit_blog($this->input->post('data_blog'));
            if ($data["blog_id"]) {
                $this->Blog_model->delete_blog_value($data["blog_id"]);
                $result = $this->Blog_model->add_blog_field($data["blog_id"], $this->input->post('data_blog_field'));
            }
        }

        $jsonResult['Result'] = $result;
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function delete_blog()
    {
        $result = false;
        if ($this->input->post()) {
            $this->Blog_model->delete_blog($this->input->post('blog_id'));
            $this->Blog_model->delete_blog_value($this->input->post('blog_id'));
            $result = true;
        }

        $jsonResult['Result'] = $result;
        $jsonResult['Data'] = $result;
        echo json_encode($jsonResult);
    }

    public function get_field()
    {
        $result = false;
        $category_id = $this->input->post('category_id');
        if ($category_id) {
            $data['blog_field'] = $this->Blog_model->get_blog_field_by_category_id($category_id);
            $result = true;
        }

        $jsonResult['Result'] = $result;
        $jsonResult['Data'] = $data;
        echo json_encode($jsonResult);
    }

    public function upload_file()
    {
        $status = "";
        $msg = "";
        $file_element_name = 'image';

        if (empty($_POST['blog_id'])) {
            $status = "error";
            $msg = "Please enter blog_id";

            echo json_encode(array('status' => $status, 'msg' => $msg));
            return;
        }

        if ($status != "error") {
            $image_directory = 'assets\\img\\blog\\' . $_POST['blog_id'] . '\\' . $_POST['category_field_id'];
            $image_path ='assets\\img\\blog\\' . $_POST['blog_id'] . '\\' . $_POST['category_field_id'].'\\'.$_FILES['image']['name'];

            $config['upload_path'] = $image_directory;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024 * 8;
//            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!file_exists($image_path)) {
                if(!file_exists($image_directory)){
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
                $file_id = $this->Blog_model->updateImage($_POST['blog_id'],$_POST['category_field_id'],$image_path);

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