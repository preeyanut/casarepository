<?php

class Category_model extends CI_Model
{

    public function get_all()
    {
        $this->db->select('category.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname) as update_by_name,category_type.category_type_name as type_name');
        $this->db->from('category');
        $this->db->join('user as u1', 'u1.user_id = category.create_by', 'inner');
        $this->db->join('user as u2', 'u2.user_id = category.update_by', 'inner');
        $this->db->join('category_type', 'category_type.category_type_id = category.category_type_id', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_data($id)
    {
        $this->db->select('category.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname) as update_by_name,category_type.category_type_name as type_name');
        $this->db->from('category');
        $this->db->join('user as u1', 'u1.user_id = category.create_by', 'inner');
        $this->db->join('user as u2', 'u2.user_id = category.update_by', 'inner');
        $this->db->join('category_type', 'category_type.category_type_id = category.category_type_id', 'inner');
        $this->db->where('category_id',$id);
        $query = $this->db->get();

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

        $sql_data = json_encode($data_array);
        $this->add_log('add', 'category', (int)$insert_id, $sql_data);

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

        $sql_data = json_encode($data);
        $this->add_log('edit', 'category', (int)$data['category_id'], $sql_data);

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
        $sql_data = 'delete data';
        $this->add_log('delete', 'category', $category_id, $sql_data);

        $this->load->library('encrypt');

        $this->db->where('category_id', $category_id);
        $this->db->delete('category');
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $filter_status, $filter_category_type)
    {

        $this->db->select('category.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname)  as update_by_name,category_type.category_type_name as category_type_name');
        $this->db->from('category');
        $this->db->join('user as u1', 'u1.user_id = category.create_by', 'inner');
        $this->db->join('user as u2', 'u2.user_id = category.update_by', 'inner');
        $this->db->join('category_type', 'category_type.category_type_id = category.category_type_id', 'inner');

        if ($filter_status != '-1' && $filter_status != '') {
            $this->db->where('category_status', $filter_status);
        }

        if ($filter_category_type != '-1' && $filter_category_type != '') {
            $this->db->where('category_type.category_type_id', $filter_category_type);
        }

        $this->db->like('category_name', $txtSearch);

        if ($start_filter != 0 && $filter_number != 0) {
            $this->db->limit($filter_number, $start_filter);
        }

        $query = $this->db->get();

        return $query->result_array();

    }

    public function count()
    {
        $this->db->select('count(*) as total ');
        $this->db->from('category');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $this->db->select('*,(select count(*) from category ) as total');
        $this->db->from('category');
        if ($filter_status != 'undefined' && $filter_status != '') {
            $this->db->where('category_status', $filter_status);
        }
        $this->db->like('category_name', $txtSearch);
        $this->db->limit($filter_number, $start_filter);
        $query = $this->db->get();

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