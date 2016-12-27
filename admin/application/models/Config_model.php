<?php

class Config_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('config_webpage');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_data($id)
    {
        $this->db->select('*');
        $this->db->from('config_webpage');
        $this->db->where('config_id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_data_contact($id)
    {

        $this->db->select('*');
        $this->db->from('config_webpage');
        $this->db->where('config_id', $id);
        $query = $this->db->get();

        return $query->row_array();

    }

    public function add_frontend_setting($data)
    {
        $this->load->library('encrypt');

        $data_array = array(
            'config_group_id' => (int)$data['config_group_id'],
            'config_webname' => $data['config_webname'],
            'config_title' => $data['config_title'],
//            'frontend_image' => $data['frontend_image'],
//            'logo_image' => $data['logo_image'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
            'login_link' => $data['login_link'],

            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id"),

        );

        $this->db->where('config_id', 1);
        $result = $this->db->update('config_webpage', $data_array);

        $sql_data = json_encode($data_array);
        $this->add_log('edit', 'config_webpage', 1, $sql_data);

        return $result;
    }

    public function add_contact_setting($data)
    {
        $this->load->library('encrypt');

        $data_array = array(
            'config_group_id' => (int)$data['config_group_id'],
            'config_content' => $data['config_content'],
//            'contact_image' => $data['contact_image'],

            'telephone' => $data['telephone'],
            'email' => $data['email'],
            'line_id' => $data['line_id'],
            'facebook' => $data['facebook'],
            'googleplus' => $data['googleplus'],
            'instagram' => $data['instagram'],
            'youtube' => $data['youtube'],

            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id"),

        );

        $this->db->where('config_id', 1);
        $result = $this->db->update('config_webpage', $data_array);

        $sql_data = json_encode($data_array);
        $this->add_log('edit', 'config_webpage', 1, $sql_data);

        return $result;
    }

    public function update_contact_Image($config_id, $path)
    {
        $data = array(
            'contact_image' => $path
        );
        $this->db->where(array('config_id' => $config_id));
        $this->db->update('config_webpage', $data);

        return true;
    }

    public function update_favicon($config_id, $path)
    {
        $data = array(
            'frontend_image' => $path
        );
        $this->db->where(array('config_id' => $config_id));
        $this->db->update('config_webpage', $data);

        return true;
    }

    public function update_logo($config_id, $path)
    {
        $data = array(
            'logo_image' => $path
        );
        $this->db->where(array('config_id' => $config_id));
        $this->db->update('config_webpage', $data);

        return true;
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