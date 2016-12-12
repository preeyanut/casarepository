<?php

class Category_model extends CI_Model
{

    public function getall()
    {
        $query = $this->db->query("SELECT * FROM category");
        return $query->result_array();
    }

    public function get_data($id){
        $query = $this->db->query("SELECT * FROM category WHERE category_id = " . $id);
        return $query->result_array();
    }

    public function add_category($data){
        $this->load->library('encrypt');

        $data_array = array(
            'category_name' => $data['category_name'],
            'type_id' => $data['type_id'],
            'category_icon' => $data['category_icon'],
            'priority_level' => $data['priority_level'],
            'category_status' => $data['category_status'],
            
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id"),

            'meta_keyword_thai' => $data['meta_keyword_thai'],
            'meta_keyword_eng' => $data['meta_keyword_eng'],
            'meta_description_thai' => $data['meta_description_thai'],
            'meta_description_eng' => $data['meta_description_eng']
        );

        $this->db->insert('category', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function edit_category($data){
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "category` SET "
            . " category_name = '" . $data['category_name'] . "'"
            . ", type_id = '" . $data['type_id'] . "'"
            . ", priority_level = '" . $data['priority_level'] . "'"
            . ", category_status = '" . (int)$data['category_status'] . "'"

            . ", update_date = '" .  date("Y-m-d H:i:s") . "'"
            . ", update_by = '" . $this->session->userdata("user_id") . "'"

            . ", meta_keyword_thai = '". $data['meta_keyword_thai']. "'"
            . ", meta_keyword_eng = '" . $data['meta_keyword_eng']. "'"
            . ", meta_description_thai = '" . $data['meta_description_thai']. "'"
            . ", meta_description_eng = '" . $data['meta_description_eng'] . "'"

            . " WHERE  category_id = '" . (int)$data['category_id'] . "'");

    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $user_status)
    {

        $str_sql = "";
//        if ($user_status != "") {
//            $str_sql .= " AND  category_status = " . $user_status;
//        }
        $query = $this->db->query("SELECT DISTINCT * "
            . " from category "
            . " WHERE  category_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();
    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "category`");

        $result = $query->result_array();

        return $result;
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $str_sql = "";
//        if ($filter_status != "" || $filter_status != 'undefined') {
//            $str_sql .= " AND  category_status = 1"  ;
//        }

        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from category ) as total FROM `" . "" . "category` "
            . " WHERE  category_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->row_array('total');
    }

}