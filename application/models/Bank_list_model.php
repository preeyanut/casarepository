<?php

class Bank_list_model extends CI_Model
{

    public function getall()
    {
        $query = $this->db->query("SELECT * FROM bank_list");
        return $query->result_array();
    }

    public function get_data($id){
        $query = $this->db->query("SELECT * FROM bank_list WHERE bank_list_id = " . $id);
        return $query->result_array();
    }

    public function add_bank($data){
        $this->load->library('encrypt');

        $data_array = array(
            'bank_list_name' => $data['bank_name'],
            'bank_list_id' => (int)$data['bank_list_id'],
            'priority_level' => 1,
            'bank_list_status' => (int)$data['bank_list_status'],
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('bank_list', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function edit_bank($data){
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "bank_list` SET "
            . " bank_list_name = '" . $data['bank_name'] . "'"
            . ", priority_level = '" . 1 . "'"
            . ", bank_list_status = '" . (int)$data['bank_list_status'] . "'"
            . ", update_date = '" .  date("Y-m-d H:i:s") . "'"
            . ", update_by = '" . $this->session->userdata("user_id") . "'"
            . " WHERE  bank_list_id = '" . (int)$data['bank_list_id'] . "'");

    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "bank_list`");

        $result = $query->result_array();

        return $result;
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $user_status)
    {

        $str_sql = "";
        if ($user_status != "") {
            $str_sql .= " AND  bank_list_status = " . $user_status;
        }
        $query = $this->db->query("SELECT DISTINCT * "
            . " from bank_list "
            . " WHERE  bank_list_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $str_sql = "";
        if ($filter_status != "" || $filter_status != 'undefined') {
            $str_sql .= " AND  bank_list_status = 1"  ;
        }

        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from bank_list ) as total FROM `" . "" . "bank_list` "
            . " WHERE  bank_list_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->row_array('total');
    }
}