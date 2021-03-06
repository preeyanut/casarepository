<?php

class Config_group_model extends CI_Model
{
    public function get_all()
    {
//        $query = $this->db->query("SELECT config_webpage_group.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
//            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
//            . " from config_webpage_group "
//            . " inner join  user as u1 on u1.user_id = config_webpage_group.create_by "
//            . " inner join  user as u2 on u2.user_id = config_webpage_group.update_by ");
//        return $query->result_array();

        $this->db->select('config_webpage_group.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname) as update_by_name');
        $this->db->from('config_webpage_group');
        $this->db->join('user as u1', 'u1.user_id = config_webpage_group.create_by', 'inner');
        $this->db->join('user as u2', 'u2.user_id = config_webpage_group.update_by', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_data($id)
    {
//        $query = $this->db->query("SELECT * FROM config_webpage_group WHERE config_group_id = " . $id);
//        return $query->result_array();

        $this->db->select('*');
        $this->db->from('config_webpage_group');
        $this->db->where('config_group_id', $id);
        $query = $this->db->get();

        return $query->result_array();

    }

    public function add_config_group($data)
    {
        $this->load->library('encrypt');

        $data_array = array(
            'config_group_id' => (int)$data['config_group_id'],
            'config_group_name' => $data['config_group_name'],
            //'priority_level' => (int)$data['priority_level'],
            'config_group_status' => (int)$data['config_group_status'],
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('config_webpage_group', $data_array);
        $insert_id = $this->db->insert_id();

        $sql_data = json_encode($data_array);
        $this->add_log('add', 'config_group', (int)$insert_id, $sql_data);

        return $insert_id;
    }

    public function edit_config_group($data)
    {
        $this->load->library('encrypt');

//
//        $this->db->query("UPDATE `" . "" . "config_webpage_group` SET "
//            . " config_group_name = '" . $data['config_group_name'] . "'"
//            //. ", priority_level = '" . (int)$data['priority_level'] . "'"
//            . ", config_group_status = '" . (int)$data['config_group_status'] . "'"
//            . ", update_date = '" . date("Y-m-d H:i:s") . "'"
//            . ", update_by = '" . $this->session->userdata("user_id") . "'"
//            . " WHERE  config_group_id = '" . (int)$data['config_group_id'] . "'");
//
        $config_group_data = array(
            'config_group_name' => $data['config_group_name'],
//            'priority_level' => $data['priority_level'],
            'config_group_status' => (int)$data['config_group_status'],
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id"),
        );

        $this->db->where('config_group_id', (int)$data['config_group_id']);
        $result = $this->db->update('config_webpage_group', $config_group_data);

        if ($result) {
            $config_group_id = $data['config_group_id'];
        }

        $sql_data = json_encode($data);
        $this->add_log('edit', 'config_group', (int)$data['config_group_id'], $sql_data);

        return $config_group_id;
    }

    public function delete_config_group($config_group_id) {
//        $this->db->query("DELETE FROM `" . "" . "config_webpage_group` WHERE config_group_id = '" . (int)$config_group_id . "'");

        $sql_data = 'delete data';
        $this->add_log('delete', 'config_group', $config_group_id, $sql_data);

        $this->load->library('encrypt');

        $this->db->where('config_group_id', $config_group_id);
        $this->db->delete('config_webpage_group');
    }

    public function count()
    {
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "config_webpage_group`");
//
//        $result = $query->result_array();
//
//        return $result;

        $this->db->select('count(*) as total ');
        $this->db->from('config_webpage_group');
        $query = $this->db->get();

        return $query->result_array();

    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {
//
//        $str_sql = "";
//        if ($status != '-1' && $status != '') {
//            $str_sql .= " AND  config_group_status = " . $status;
//        }
//
//        $query = $this->db->query("SELECT config_webpage_group.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
//            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
//            . " from config_webpage_group "
//            . " inner join  user as u1 on u1.user_id = config_webpage_group.create_by "
//            . " inner join  user as u2 on u2.user_id = config_webpage_group.update_by "
//            . " WHERE  config_group_name  Like '%" . $txtSearch . "%' "
//
//            . $str_sql
//            . " Limit " . $start_filter . ", " . $filter_number . " "
//        );
//
//        return $query->result_array();


        $this->db->select('config_webpage_group.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname)  as update_by_name');
        $this->db->from('config_webpage_group');
        $this->db->join('user as u1', 'u1.user_id = config_webpage_group.create_by', 'inner');
        $this->db->join('user as u2', 'u2.user_id = config_webpage_group.update_by', 'inner');
        if ($status != '-1' && $status != '') {
            $this->db->where('config_group_status', $status);
        }
        $this->db->like('config_group_name', $txtSearch);
        $this->db->limit($filter_number, $start_filter);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {
//
//        $str_sql = "";
//        if ($filter_status != '-1') {
//            $str_sql .= " AND  config_group_status = " . $filter_status;
//        }
//
//        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from config_webpage_group ) as total FROM `" . "" . "config_webpage_group` "
//            . " WHERE  config_group_name  Like '%" . $txtSearch . "%' "
//            . $str_sql
//            . " Limit " . $start_filter . ", " . $filter_number . " "
//        );
//
//        return $query->row_array('total');


        $this->db->select('*,(select count(*) from bank_list ) as total');
        $this->db->from('config_webpage_group');
        if ($filter_status != '-1' && $filter_status != '') {
            $this->db->where('config_group_status', $filter_status);
        }
        $this->db->like('config_group_name', $txtSearch);
        $this->db->limit($filter_number, $start_filter);
        $query = $this->db->get();

        return $query->row_array('total');
    }

    public function add_log($action, $action_table, $action_to, $sql_script)
    {

        $this->db->insert('log',
            array('action' => $action,
                'action_table' => $action_table,
                'action_date' => date("Y-m-d H:i:s"),
                'action_by' => $this->session->userdata("user_id"),
                'action_to' => $action_to,
                'sql_script' => $sql_script)
        );
    }
}