<?php

class Category_type_model extends CI_Model
{
    public function getall()
    {
        $query = $this->db->query("SELECT * FROM category_type");
        return $query->result_array();
    }

    public function get_data($id){
        $query = $this->db->query("SELECT * FROM category_type WHERE type_id = " . $id);
        return $query->result_array();
    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "category_type`");

        $result = $query->result_array();

        return $result;
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {

        $str_sql = "";
        if ($status != "") {
            $str_sql .= " AND  type_status = " . $status;
        }
        $query = $this->db->query("SELECT DISTINCT * "
            . " from category_type "
            . " WHERE  type_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $str_sql = "";
        if ($filter_status != "" || $filter_status != 'undefined') {
            $str_sql .= " AND  type_status = 1"  ;
        }

        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from category_type ) as total FROM `" . "" . "category_type` "
            . " WHERE  type_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->row_array('total');
    }

    public function add_type($data){
        $this->load->library('encrypt');

        $data_array = array(
            'type_name' => $data['type_name'],
            'priority_level' => $data['priority_level'],
            'type_status' => (int)$data['type_status'],
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('category_type', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function edit_type($data){
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "category_type` SET "
            . " type_name = '" . $data['type_name'] . "'"
            . ", priority_level = '" . $data['priority_level'] . "'"
            . ", type_status = '" . (int)$data['type_status'] . "'"
            . ", update_date = '" .  date("Y-m-d H:i:s") . "'"
            . ", update_by = '" . $this->session->userdata("user_id") . "'"
            . " WHERE  type_id = '" . (int)$data['type_id'] . "'");

    }

}