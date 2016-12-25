<?php

class Category_type_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('category_type.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname) as update_by_name');
        $this->db->from('category_type');
        $this->db->join('user as u1', 'u1.user_id = category_type.create_by', 'inner');
        $this->db->join('user as u2', 'u2.user_id = category_type.update_by', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_data($id)
    {
        $this->db->select('*');
        $this->db->from('category_type');
        $this->db->where('category_type_id', $id);
        $query = $this->db->get();

        return $query->result_array();

    }

    public function count()
    {

        $this->db->select('count(*) as total ');
        $this->db->from('category_type');
        $query = $this->db->get();

        return $query->result_array();

    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {

        $this->db->select('category_type.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname)  as update_by_name');
        $this->db->from('category_type');
        $this->db->join('user as u1', 'u1.user_id = category_type.create_by', 'inner');
        $this->db->join('user as u2', 'u2.user_id = category_type.update_by', 'inner');
        if ($status != '-1' && $status != '') {
            $this->db->where('category_type_status', $status);
        }
        $this->db->like('category_type_name', $txtSearch);
        $this->db->limit($filter_number, $start_filter);
        $query = $this->db->get();

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

        $sql_data = json_encode($data_array);
        $this->add_log('add', 'category_type', (int)$insert_id, $sql_data);

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

        $sql_data = json_encode($data);
        $this->add_log('edit', 'category_type', (int)$data['category_type_id'], $sql_data);

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
        $sql_data = 'delete data';
        $this->add_log('delete', 'category_type', $category_type_id, $sql_data);

        $this->db->where('category_type_id', $category_type_id);
        $result = $this->db->delete('category_type');

        return $result;
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