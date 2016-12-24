<?php

class Category_type_model extends CI_Model
{
    public function get_all()
    {
        $query = $this->db->query("SELECT category_type.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " from category_type "
            . " inner join  user as u1 on u1.user_id = category_type.create_by "
            . " inner join  user as u2 on u2.user_id = category_type.update_by ");
        return $query->result_array();
    }

    public function get_data($id)
    {
        $query = $this->db->query("SELECT * FROM category_type WHERE category_type_id = " . $id);
        return $query->result_array();
    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "category_type`");

        $result = $query->result_array();

        return $result;
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {
        $str_sql = "";
        if ($status != '-1' && $status != '') {
            $str_sql .= " AND  category_type_status = " . $status;
        }

        $query = $this->db->query("SELECT category_type.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " from category_type "
            . " inner join  user as u1 on u1.user_id = category_type.create_by "
            . " inner join  user as u2 on u2.user_id = category_type.update_by "
            . " WHERE  category_type_name  Like '%" . $txtSearch . "%' "

            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $str_sql = "";
        if ($filter_status != "" || $filter_status != 'undefined') {
            $str_sql .= " AND  category_type_status = 1";
        }

        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from category_type where  category_type_name  Like '%" . $txtSearch . "%' ) as total FROM `" . "" . "category_type` "
            . " WHERE  category_type_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->row_array('total');
    }

    public function add_category_type($data)
    {

        $data_array = array(
            'category_type_name' => $data['category_type_name'],
            'category_type_status' => (int)$data['category_type_status'],
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('category_type', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function add_category_field($data)
    {
        $data_array = array(
            'category_type_id' => $data['category_type_id'],
            'field_name' => $data['field_name'],
            'field_type' => $data['field_type'],
            'field_id' => $data['field_id'],
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );
        $this->db->insert('category_field', $data_array);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function edit_category_type($data)
    {
        $data_array = array(
            'category_type_name' => $data['category_type_name'],
            'category_type_status' => $data['category_type_status'],
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );
        $this->db->where('category_type_id', $data['category_type_id']);
        $result = $this->db->update('category_type', $data_array);
        return $result;
    }

    public function delete_category_field($category_type_id)
    {

        $this->db->where('category_type_id', $category_type_id);
        $result = $this->db->delete('category_field');

        return $result;
    }

    public function get_category_field($category_type_id)
    {

        $this->db->select('*');
        $this->db->where('category_type_id', $category_type_id);
        $query = $this->db->get('category_field');

        return $query->result_array();
    }

    public function delete_category_type($category_type_id)
    {
        $this->db->where('category_type_id', $category_type_id);
        $result = $this->db->delete('category_type');

        return $result;
    }


}