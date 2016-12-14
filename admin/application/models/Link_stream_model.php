<?php

class Link_stream_model extends CI_Model
{
    public function getall()
    {
        $query = $this->db->query("SELECT link_live_stream.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " from link_live_stream "
            . " inner join  user as u1 on u1.user_id = link_live_stream.create_by "
            . " inner join  user as u2 on u2.user_id = link_live_stream.update_by ");
        return $query->result_array();
    }

    public function get_data($id){
        $query = $this->db->query("SELECT * FROM link_live_stream WHERE link_id = " . $id);
        return $query->result_array();
    }

    public function add_link_stream($data){
        $this->load->library('encrypt');

        $data_array = array(
            'link_id' => (int)$data['link_id'],
            'link_channel' => $data['link_channel'],
            'priority_level' => (int)$data['priority_level'],
            'link_status' => (int)$data['link_status'],
            'youtube_link' => $data['youtube_link'],


            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('link_live_stream', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function edit_link_stream($data){
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "link_live_stream` SET "
            . " link_channel = '" . $data['link_channel'] . "'"
            . ", priority_level = '" . (int)$data['priority_level'] . "'"
            . ", link_status = '" . (int)$data['link_status'] . "'"
            . ", youtube_link = '" . $data['youtube_link'] . "'"
            . ", update_date = '" .  date("Y-m-d H:i:s") . "'"
            . ", update_by = '" . $this->session->userdata("user_id") . "'"
            . " WHERE  link_id = '" . (int)$data['link_id'] . "'");

    }

    public function delete_config_group($link_id) {
        $this->db->query("DELETE FROM `" . "" . "link_live_stream` WHERE link_id = '" . (int)$link_id . "'");
    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "config_webpage_group`");

        $result = $query->result_array();

        return $result;
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {

        $str_sql = "";
        if ($status != '-1' && $status != '') {
            $str_sql .= " AND  link_status = " . $status;
        }

        $query = $this->db->query("SELECT link_live_stream.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " from link_live_stream "
            . " inner join  user as u1 on u1.user_id = link_live_stream.create_by "
            . " inner join  user as u2 on u2.user_id = link_live_stream.update_by "
            . " WHERE  link_channel  Like '%" . $txtSearch . "%' "

            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $str_sql = "";
        if ($filter_status != '-1') {
            $str_sql .= " AND  link_status = " . $filter_status;
        }

        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from link_live_stream ) as total FROM `" . "" . "link_live_stream` "
            . " WHERE  link_channel  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->row_array('total');
    }
}