<?php

class Config_model extends CI_Model
{
    public function getall()
    {
        $query = $this->db->query("SELECT * FROM config_webpage");
        return $query->result_array();
    }

    public function get_data($id){
        $query = $this->db->query("SELECT * FROM config_webpage WHERE config_id = " . $id);
        return $query->result_array();
    }

    public function add_config($data){
        $this->load->library('encrypt');

        $data_array = array(
            'config_id' => (int)$data['config_id'],
            'config_group_id' => (int)$data['config_group_id'],
            'config_title' => $data['config_title'],
            'priority_level' => (int)$data['priority_level'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
            'login_link' => $data['login_link'],

            //for contact and fronted setting
            'config_content' => $data['config_content'],
            'config_image' => $data['config_image'],
            'e-mail' => $data['e-mail'],
            'line_id' => $data['line_id'],
            'telephone' => $data['telephone'],
            'facebook' => $data['facebook'],
            'googleplus' => $data['googleplus'],
            'instagram' => $data['instagram'],
            'youtube' => $data['youtube'],
            'twitter' => $data['twitter'],

            //for statistic setting
            'head_tags' => $data['head_tags'],
            'body_tags' => $data['body_tags'],


            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('config_group', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }


}