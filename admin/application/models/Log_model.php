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

    public function add_log($id,$action,$user,$table)
    {
        $this->load->library('encrypt');

        $data_array = array(
            'action' => $action,
            'action_table' => $table,
            'action_date' =>  date("Y-m-d H:i:s"),
            'action_by' => $user,
            'action_to' => $id,
            'sql_script' => 'edit'
        );

        $this->db->insert('log', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function search_filter($txtSearch)
    {

        $str_sql = "";

        $query = $this->db->query("SELECT log.*,CONCAT(u1.firstname, ' ', u1.lastname) as action_by_name "
            . " from log "
            . " inner join  user as u1 on u1.user_id = log.action_by "
            . " WHERE  action  Like '%" . $txtSearch . "%' "
            . " OR  action_table  Like '%" . $txtSearch . "%' "
            . " OR  sql_script  Like '%" . $txtSearch . "%' "

            . $str_sql
        );

        return $query->result_array();
    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "log`");

        $result = $query->result_array();

        return $result;
    }

}