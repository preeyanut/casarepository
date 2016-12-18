<?php

class Blog_model extends CI_Model
{
    public function get_all()
    {
//        $query = $this->db->query("SELECT * FROM blog");
//        return $query->result_array();

        $query = $this->db->query("SELECT blog.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " from blog "
            . " inner join  user as u1 on u1.user_id = blog.create_by "
            . " inner join  user as u2 on u2.user_id = blog.update_by ");
        return $query->result_array();
    }

    public function get_data($id)
    {
        $this->db->select(" blog.*,category.category_name,category_type.category_type_id ");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->join('category_type', 'category_type.category_type_id = category.category_type_id');
        $this->db->where('blog.blog_id',$id);

        $query = $this->db->get('blog');
        return $query->result_array();
    }

    public function get_blog_field($id)
    {
        $this->db->select("category_field.*");
        $this->db->where('category_field.category_type_id',$id);
        $query = $this->db->get('category_field');

        return $query->result_array();
    }

    public function get_blog_field_by_category_id($id)
    {
        $this->db->select("category_field.*");
        $this->db->join('category', 'category.category_type_id = category_field.category_type_id');
        $this->db->where('category.category_id',$id);
        $query = $this->db->get('category_field');

        return $query->result_array();
    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "blog`");

        $result = $query->result_array();

        return $result;
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {
        $str_sql = "";
        if ($status != '-1' && $status != '') {
            $str_sql .= " AND  blog_status = " . $status;
        }

        $query = $this->db->query("SELECT blog.*,cate.category_name,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " from blog "
            . " inner join  category as cate on cate.category_id = blog.category_id "
            . " inner join  user as u1 on u1.user_id = blog.create_by "
            . " inner join  user as u2 on u2.user_id = blog.update_by "
            . " WHERE  blog_title  Like '%" . $txtSearch . "%' "

            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $str_sql = "";
        if ($filter_status != "" || $filter_status != 'undefined') {
            $str_sql .= " AND  blog_status = 1";
        }

        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from blog "
       . " WHERE  blog_title  Like '%" . $txtSearch . "%' ) as total FROM `" . "" . "blog` "
            . " WHERE  blog_title  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->row_array('total');
    }

    public function add_blog($data)
    {

        $data_array = array(
            'blog_title' => $data['blog_title'],
            'blog_status' => (int)$data['blog_status'],
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('blog', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function add_blog_field($blog_id,$data)
    {
//        echo var_dump($data);
        foreach($data as $item){
            $data_array = array(
                'blog_id' => $blog_id,
                'category_field_id' => $item['category_field_id'],
                'blog_value' => $item['blog_value'],
                'create_date' => date("Y-m-d H:i:s"),
                'create_by' => $this->session->userdata("user_id"),
                'update_date' => date("Y-m-d H:i:s"),
                'update_by' => $this->session->userdata("user_id")
            );
            $this->db->insert('blog_value', $data_array);
//            $insert_id = $this->db->insert_id();
        }

        return true;
    }


    public function add_category_field($data)
    {
        $data_array = array(
            'blog_id' => $data['blog_id'],
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

    public function edit_blog($data)
    {
        $data_array = array(
            'blog_title' => $data['blog_title'],
            'blog_status' => $data['blog_status'],
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );
        $this->db->where('blog_id', $data['blog_id']);
        $result = $this->db->update('blog', $data_array);
        return $result;
    }

    public function delete_category_field($blog_id)
    {

        $this->db->where('blog_id', $blog_id);
        $result = $this->db->delete('category_field');

        return $result;
    }

    public function get_category_field($blog_id)
    {

        $this->db->select('*');
        $this->db->where('blog_id', $blog_id);
        $query = $this->db->get('category_field');

        return $query->result_array();
    }




    public function get_all_priority(){

        $this->db->select("blog.*");
        $this->db->where('blog.blog_status',1);
        $this->db->order_by("blog.priority_level","asc");
        $query = $this->db->get('blog');

        return $query->result_array();
    }
}