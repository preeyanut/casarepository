<?php

class Config_model extends CI_Model
{
    public function get_all()
    {
        $query = $this->db->query("SELECT * FROM config_webpage");
        return $query->result_array();
    }

    public function get_data($id){
        $query = $this->db->query("SELECT * FROM config_webpage WHERE config_id = " . $id);
        return $query->row_array();
    }

    public function get_data_contact($id){
        $query = $this->db->query("SELECT * FROM config_webpage WHERE config_id = " . $id);
        return $query->row_array();
    }


    //public function add_frontend_setting($data){


        //$this->load->library('encrypt');

        //$data_array = array(

            //'config_group_id' => (int)$data['config_group_id'],
            //'config_title' => $data['config_title'],
            //'meta_keyword' => $data['meta_keyword'],
            //'meta_description' => $data['meta_description'],
            //'login_link' => $data['login_link'],
            //'line_id' => $data['line_id'],
            //'telephone' => $data['telephone'],
            //'facebook' => $data['facebook'],
            //'googleplus' => $data['googleplus'],
            //'instagram' => $data['instagram'],
            //'youtube' => $data['youtube'],
            //'twitter' => $data['twitter'],


            //'create_date' => date("Y-m-d H:i:s"),
            //'create_by' => $this->session->userdata("user_id"),
            //'update_date' => date("Y-m-d H:i:s"),
            //'update_by' => $this->session->userdata("user_id")
        //);

        //$this->db->insert('config_webpage', $data_array);
        //$insert_id = $this->db->insert_id();

        //return $insert_id;
    //}

    public function add_frontend_setting($data)
    {
        $this->load->library('encrypt');

        $result = $this->db->query("UPDATE `" . "" . "config_webpage` SET "
            . " config_group_id = '" . $data['config_group_id'] . "'"
            . ", config_title = '" . $data['config_title'] . "'"
            . ", frontend_image = '" . $data['frontend_image'] . "'"
            . ", logo_image = '" . $data['logo_image'] . "'"
            . ", meta_keyword = '" . $data['meta_keyword'] . "'"
            . ", meta_description = '" . $data['meta_description'] . "'"
            . ", login_link = '" . $data['login_link'] . "'"
            . ", line_id = '" . $data['line_id'] . "'"
            . ", telephone = '" . $data['telephone'] . "'"
            . ", facebook = '" . $data['facebook'] . "'"
            . ", googleplus = '" . $data['googleplus'] . "'"
            . ", instagram = '" . $data['instagram'] . "'"
            . ", youtube = '" . $data['youtube'] . "'"
            . ", twitter = '" . $data['twitter'] . "'"


            . ", create_date = '" . date("Y-m-d H:i:s") . "'"
            . ", create_by = '" . $this->session->userdata("user_id") . "'"
            . ", update_date = '" . date("Y-m-d H:i:s") . "'"
            . ", update_by = '" . $this->session->userdata("user_id") . "'"
            . " WHERE  config_id = 1" );

        return $result;
    }


    public function add_contact_setting($data){


        $this->load->library('encrypt');

        $data_array = array(

            'config_group_id' => (int)$data['config_group_id'],
            'config_content' => $data['config_content'],
            'email' => $data['email'],
            'line_id' => $data['line-id'],
            'facebook' => $data['face-book'],
            'googleplus' => $data['google-plus'],
            'instagram' => $data['ins-tagram'],
            'youtube' => $data['you-tube'],

            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('config_webpage', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function update_contact_Image($config_id,$path) {
        $data = array(
            'contact_image' => $path
        );
        $this->db->where(array('config_id'=>$config_id));
        $this->db->update('config_webpage', $data);

        return true;
    }

    public function update_favicon($config_id,$path) {
        $data = array(
            'frontend_image' => $path
        );
        $this->db->where(array('config_id'=>$config_id));
        $this->db->update('config_webpage', $data);

        return true;
    }

    public function update_logo($config_id,$path) {
        $data = array(
            'logo_image' => $path
        );
        $this->db->where(array('config_id'=>$config_id));
        $this->db->update('config_webpage', $data);

        return true;
    }

}