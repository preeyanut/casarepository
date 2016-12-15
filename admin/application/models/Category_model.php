<?php

class Category_model extends CI_Model
{

    public function getall()
    {
        $query = $this->db->query("SELECT category.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " ,category_type.type_name as type_name "
            . " from category "
            . " inner join  user as u1 on u1.user_id = category.create_by "
            . " inner join  user as u2 on u2.user_id = category.update_by "
            . " inner join  category_type on category_type.type_id = category.type_id");
        return $query->result_array();
    }

    public function get_data($id)
    {
        $query = $this->db->query("SELECT category.* ,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name ,CONCAT(u2.firstname, ' ', u2.lastname) as update_by_name FROM category INNER JOIN user as u1 ON u1.user_id = category.create_by INNER JOIN user as u2 ON u2.user_id = category.update_by WHERE category_id = " . $id);
        return $query->result_array();
    }

    public function add_category($data)
    {
        $this->load->library('encrypt');

        $data_array = array(
            'category_name' => $data['category_name'],
            'type_id' => $data['type_id'],
            'category_icon' => $data['category_icon'],
            'priority_level' => $data['priority_level'],
            'category_status' => $data['category_status'],

            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id"),

            'meta_keyword_thai' => $data['meta_keyword_thai'],
            'meta_keyword_eng' => $data['meta_keyword_eng'],
            'meta_description_thai' => $data['meta_description_thai'],
            'meta_description_eng' => $data['meta_description_eng']
        );

        $this->db->insert('category', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function edit_category($data)
    {
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "category` SET "
            . " category_name = '" . $data['category_name'] . "'"
            . ", type_id = '" . $data['type_id'] . "'"
            . ", category_icon = '" . $data['category_icon']. "'"
            . ", priority_level = '" . $data['priority_level'] . "'"
            . ", category_status = '" . (int)$data['category_status'] . "'"

            . ", update_date = '" . date("Y-m-d H:i:s") . "'"
            . ", update_by = '" . $this->session->userdata("user_id") . "'"

            . ", meta_keyword_thai = '" . $data['meta_keyword_thai'] . "'"
            . ", meta_keyword_eng = '" . $data['meta_keyword_eng'] . "'"
            . ", meta_description_thai = '" . $data['meta_description_thai'] . "'"
            . ", meta_description_eng = '" . $data['meta_description_eng'] . "'"

            . " WHERE  category_id = '" . (int)$data['category_id'] . "'");

    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {

        $str_sql = "";
        if ($status != "" && $status != -1) {
            $str_sql .= " AND  category_status = " . $status;
        }

        $query = $this->db->query("SELECT category.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " ,category_type.type_name as type_name "
            . " from category "
            . " inner join  user as u1 on u1.user_id = category.create_by "
            . " inner join  user as u2 on u2.user_id = category.update_by "
            . " inner join  category_type on category_type.type_id = category.type_id"
            . " WHERE  category_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();

    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "category`");

        $result = $query->result_array();

        return $result;
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $str_sql = "";
//        if ($filter_status != "" || $filter_status != 'undefined') {
//            $str_sql .= " AND  category_status = 1"  ;
//        }

        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from category ) as total FROM `" . "" . "category` "
            . " WHERE  category_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->row_array('total');
    }


}