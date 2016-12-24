<?php

class Category_model extends CI_Model
{

    public function get_all()
    {
        $query = $this->db->query("SELECT category.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " ,category_type.category_type_name as type_name "
            . " from category "
            . " inner join  user as u1 on u1.user_id = category.create_by "
            . " inner join  user as u2 on u2.user_id = category.update_by "
            . " inner join  category_type on category_type.category_type_id = category.category_type_id");
        return $query->result_array();
    }

    public function get_data($id)
    {
        $query = $this->db->query("SELECT category.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " ,category_type.category_type_name as type_name "
            . " from category "
            . " inner join  user as u1 on u1.user_id = category.create_by "
            . " inner join  user as u2 on u2.user_id = category.update_by "
            . " inner join  category_type on category_type.category_type_id = category.category_type_id"
            . " WHERE category_id = " . $id);
        return $query->result_array();
    }

    public function get_blog_id($id)
    {
        $this->db->select(" blog.*,category.category_name,category_type.category_type_id ");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->join('category_type', 'category_type.category_type_id = category.category_type_id');
        $this->db->where('blog.category_id', $id);

        $query = $this->db->get('blog');
        return $query->result_array();
    }

    public function add_category($data)
    {
        $this->load->library('encrypt');

        $data_array = array(
            'category_name' => $data['category_name'],
            'category_type_id' => $data['category_type_id'],
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

        //---------  set priority
        $this->db->select('category.priority_level,category.category_type_id');
        $this->db->where('category_id', $data['category_id']);
        $category_info = $this->db->get('category')->row_array();

        if ((int)$category_info['priority_level'] < (int)$data['priority_level']) {
            $this->change_priority_level_down((int)$category_info['category_type_id'], (int)$category_info['priority_level'], (int)$data['priority_level']);
        } else if ((int)$category_info['priority_level'] > (int)$data['priority_level']) {
            $this->change_priority_level_up((int)$category_info['category_type_id'], (int)$category_info['priority_level'], (int)$data['priority_level']);
        }

        $data_array = array(
            'category_name' => $data['category_name'],
            'category_type_id' => $data['category_type_id'],
            'category_icon' => $data['category_icon'],
            'priority_level' => $data['priority_level'],
            'category_status' => (int)$data['category_status'],

            'meta_keyword_thai' => $data['meta_keyword_thai'],
            'meta_keyword_eng' => $data['meta_keyword_eng'],
            'meta_description_thai' => $data['meta_description_thai'],
            'meta_description_eng' => $data['meta_description_eng'],

            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id"),
        );

        $this->db->where('category_id', $data['category_id']);
        $result = $this->db->update('category', $data_array);
        $category_id = 0;
        if ($result) {
            $category_id = $data['category_id'];
        }
        return $category_id;
    }

    public function change_priority_level_down($category_type_id,$old_priority_level, $new_priority_level)
    {
        $query = $this->db->query("update category set priority_level = (priority_level-1) "
            ."where priority_level >".$old_priority_level." and priority_level <=".$new_priority_level
            ." and  category_type_id =".$category_type_id);

        return $query;
    }

    public function  change_priority_level_up($category_type_id,$old_priority_level, $new_priority_level)
    {
        $query = $this->db->query("update category set priority_level = (priority_level+1) "
            ."where priority_level >=".$new_priority_level." and priority_level <".$old_priority_level
            ." and  category_type_id =".$category_type_id);

        return $query;
    }


    public function delete_category($category_id)
    {
        $this->load->library('encrypt');

        $this->db->query("DELETE FROM category WHERE category_id = " . $category_id);
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $filter_status, $filter_category_type)
    {

        $str_sql = "";
        $limit = "";
        if ($filter_status != "" && $filter_status != -1) {
            $str_sql .= " AND  category_status = " . $filter_status;
        }

        if ($filter_category_type != '-1' && $filter_category_type != '') {
            $str_sql .= " AND  category_type.category_type_id = " . $filter_category_type;
        }
        if ($start_filter !== 0 && $filter_number !== 0) {
            $limit = " Limit " . $start_filter . ", " . $filter_number . " ";
        }

        $query = $this->db->query("SELECT category.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " ,category_type.category_type_name as category_type_name "
            . " from category "
            . " inner join  user as u1 on u1.user_id = category.create_by "
            . " inner join  user as u2 on u2.user_id = category.update_by "
            . " inner join  category_type on category_type.category_type_id = category.category_type_id"
            . " WHERE  category_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . $limit
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

    public function get_group_category_id($category_type_id)
    {
        $this->db->select('category.category_id');
        $this->db->where('category_type_id', $category_type_id);
        $query = $this->db->get('category');

        return $query->result_array();
    }

    public function delete_group_category($category_id)
    {

        $this->db->where_in('category_id', $category_id);
        $query = $this->db->delete('category');

        return $query;
    }

    public function delete_group_category_field($category_type_id)
    {

        $this->db->where_in('category_type_id', $category_type_id);
        $query = $this->db->delete('category_field');

        return $query;
    }

    public function get_all_priority($category_type_id)
    {

        $this->db->select("category.priority_level");
        $this->db->where(array('category.category_type_id' => $category_type_id));
        $this->db->order_by("category.priority_level", "desc");
        $query = $this->db->get('category');

        return $query->result_array();
    }


}