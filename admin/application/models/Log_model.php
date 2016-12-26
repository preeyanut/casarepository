<?php

class Log_model extends CI_Model
{
    public function get_log()
    {
        $this->db->select(" * ");
        $this->db->from("log");
        $query = $this->db->get();

        return $query->result_array();
    }

    public function search_filter($txtSearch, $start_filter, $filter_number)
    {

        $this->db->select('log.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as action_by_name ');
        $this->db->from('log');
        $this->db->join('user as u1','u1.user_id = log.action_by','inner');
        $this->db->or_like('action',$txtSearch);
        $this->db->or_like('action_table',$txtSearch);
        $this->db->or_like('sql_script',$txtSearch);
        $this->db->limit($filter_number, $start_filter);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function count()
    {
        $this->db->select('COUNT(*) as total');
        $this->db->from('log');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number)
    {

        $this->db->select('*,(select count(*) from log ) as total');
        $this->db->from('log');
        $this->db->or_like('action',$txtSearch);
        $this->db->or_like('action_table',$txtSearch);
        $this->db->or_like('sql_script',$txtSearch);
        $this->db->limit($filter_number, $start_filter);
        $query = $this->db->get();

        return $query->row_array('total');
    }

}