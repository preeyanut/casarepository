<?php

class Config_group_model extends CI_Model
{
    public function getall()
    {
        $query = $this->db->query("SELECT config_webpage_group.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " from config_webpage_group "
            . " inner join  user as u1 on u1.user_id = config_webpage_group.create_by "
            . " inner join  user as u2 on u2.user_id = config_webpage_group.update_by ");
        return $query->result_array();
    }

    public function get_data($id){
        $query = $this->db->query("SELECT * FROM config_webpage_group WHERE config_group_id = " . $id);
        return $query->result_array();
    }

    public function add_config_group($data){
        $this->load->library('encrypt');

        $data_array = array(
            'config_group_id' => (int)$data['config_group_id'],
            'config_group_name' => $data['config_group_name'],
            'priority_level' => (int)$data['priority_level'],
            'config_group_status' => (int)$data['config_group_status'],
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('config_webpage_group', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function edit_config_group($data){
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "config_webpage_group` SET "
            . " config_group_name = '" . $data['config_group_name'] . "'"
            . ", priority_level = '" . (int)$data['priority_level'] . "'"
            . ", config_group_status = '" . (int)$data['config_group_status'] . "'"
            . ", update_date = '" .  date("Y-m-d H:i:s") . "'"
            . ", update_by = '" . $this->session->userdata("user_id") . "'"
            . " WHERE  config_group_id = '" . (int)$data['config_group_id'] . "'");

    }

    public function delete_config_group($config_group_id) {
        $this->db->query("DELETE FROM `" . "" . "config_webpage_group` WHERE config_group_id = '" . (int)$config_group_id . "'");
    }
}