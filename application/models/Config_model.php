<?php

class Config_model extends CI_Model
{
    public function get_config_title()
    {
        $this->db->select("config_webpage.config_id,config_webpage.config_title");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_meta_keyword()
    {
        $this->db->select("config_webpage.config_id,config_webpage.meta_keyword");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_meta_description()
    {
        $this->db->select("config_webpage.config_id,config_webpage.meta_description");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_favicon_image()
    {
        $this->db->select("config_webpage.config_id,config_webpage.frontend_image");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_logo_image()
    {
        $this->db->select("config_webpage.config_id,config_webpage.logo_image");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_login_link()
    {
        $this->db->select("config_webpage.config_id,config_webpage.login_link");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_line_id()
    {
        $this->db->select("config_webpage.config_id,config_webpage.line_id");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_telephone()
    {
        $this->db->select("config_webpage.config_id,config_webpage.telephone");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_facebook()
    {
        $this->db->select("config_webpage.config_id,config_webpage.facebook");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_googleplus()
    {
        $this->db->select("config_webpage.config_id,config_webpage.googleplus");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_instagram()
    {
        $this->db->select("config_webpage.config_id,config_webpage.instagram");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_youtube()
    {
        $this->db->select("config_webpage.config_id,config_webpage.youtube");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }

    public function get_config_twitter()
    {
        $this->db->select("config_webpage.config_id,config_webpage.twitter");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 5');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 1');

        return $query->result_array();

    }


/////////////////////////////////////////////// Contact /////////////////////////////////////////////


    public function get_contact_image()
    {
        $this->db->select("config_webpage.config_id,config_webpage.contact_image");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 6');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 2');

        return $query->result_array();

    }

    public function get_contact_content()
    {
        $this->db->select("config_webpage.config_id,config_webpage.config_content");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 6');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 2');

        return $query->result_array();

    }

    public function get_contact_email()
    {
        $this->db->select("config_webpage.config_id,config_webpage.email");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 6');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 2');

        return $query->result_array();

    }

    public function get_contact_line_id()
    {
        $this->db->select("config_webpage.config_id,config_webpage.line_id");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 6');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 2');

        return $query->result_array();

    }

    public function get_contact_facebook()
    {
        $this->db->select("config_webpage.config_id,config_webpage.facebook");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 6');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 2');

        return $query->result_array();

    }

    public function get_contact_instagram()
    {
        $this->db->select("config_webpage.config_id,config_webpage.instagram");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 6');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 2');

        return $query->result_array();

    }

    public function get_contact_googleplus()
    {
        $this->db->select("config_webpage.config_id,config_webpage.googleplus");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 6');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 2');

        return $query->result_array();

    }

    public function get_contact_youtube()
    {
        $this->db->select("config_webpage.config_id,config_webpage.youtube");
        $this->db->join('config_webpage_group', 'config_webpage_group.config_group_id = 6');
        $this->db->order_by("config_webpage.config_id", "asc");
        $query = $this->db->get('config_webpage.config_id = 2');

        return $query->result_array();

    }
}