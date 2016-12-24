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
        $this->db->where('blog.blog_id', $id);

        $query = $this->db->get('blog');
        return $query->result_array();
    }

    public function get_blog_field($blog_id, $category_type_id)
    {
        $this->db->select("blog.*,category_field.field_name,category_field.field_type,category_field.field_id,category_field.category_field_id,blog_value.blog_value");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->join('category_type', 'category_type.category_type_id = category.category_type_id');
        $this->db->join('category_field', 'category_field.category_type_id = category_type.category_type_id');
        $this->db->join('blog_value', ' (blog_value.blog_id = blog.blog_id and blog_value.category_field_id = category_field.category_field_id)');
        $this->db->where(array('blog_value.blog_id' => $blog_id, 'category_field.category_type_id' => $category_type_id));
        $this->db->order_by("category_field.category_field_id", "asc");
        $query = $this->db->get('blog');

        return $query->result_array();

//        $this->db->select("category_field.*");
//        $this->db->where('category_field.category_type_id',$id);
//        $query = $this->db->get('category_field');
//
//        return $query->result_array();
    }

    public function get_blog_field_by_category_id($id)
    {
        $this->db->select("category_field.*");
        $this->db->join('category', 'category.category_type_id = category_field.category_type_id');
        $this->db->where('category.category_id', $id);
        $query = $this->db->get('category_field');

        return $query->result_array();
    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "blog`");

        $result = $query->result_array();

        return $result;
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $filter_status,$filter_category)
    {
        $str_sql = "";
        if ($filter_status != '-1' && $filter_status != '') {
            $str_sql .= " AND  blog.blog_status = " . $filter_status;
        }
        if ($filter_category != -1) {
            $str_sql .= " AND  blog.category_id = ".$filter_category;
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

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status,$filter_category)
    {

        $str_sql = "";
        if ($filter_status != "" || $filter_status != 'undefined') {
            $str_sql .= " AND  blog.blog_status = 1";
        }

        if ($filter_category != -1) {
            $str_sql .= " AND  blog.category_id = ".$filter_category;
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
            'category_id' => (int)$data['category_id'],
            'blog_status' => (int)$data['blog_status'],
            'priority_level' => (int)$data['priority_level'],
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('blog', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function add_blog_field($blog_id, $data)
    {
        foreach ($data as $item) {
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
        }

        return true;
    }

    public function edit_blog($data)
    {
        //---------  set priority
        $this->db->select('blog.priority_level,blog.category_id');
        $this->db->where('blog_id', $data['blog_id']);
        $blog_info = $this->db->get('blog')->row_array();

        if ((int)$blog_info['priority_level'] < (int)$data['priority_level']) {
            $this->change_priority_level_down((int)$blog_info['category_id'],(int)$blog_info['priority_level'], (int)$data['priority_level']);
        } else if ((int)$blog_info['priority_level'] > (int)$data['priority_level']) {
            $this->change_priority_level_up((int)$blog_info['category_id'],(int)$blog_info['priority_level'], (int)$data['priority_level']);
        }

        $data_array = array(
            'blog_title' => $data['blog_title'],
            'category_id' => (int)$data['category_id'],
            'blog_status' => (int)$data['blog_status'],
            'priority_level' => (int)$data['priority_level'],
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->where('blog_id', $data['blog_id']);
        $result = $this->db->update('blog', $data_array);
        $blog_id = 0;
        if ($result) {
            $blog_id = $data['blog_id'];
        }
        return $blog_id;
    }

    public function change_priority_level_down($category_id,$old_priority_level, $new_priority_level)
    {
        $query = $this->db->query("update blog set priority_level = (priority_level-1) "
          ."where priority_level >".$old_priority_level." and priority_level <=".$new_priority_level
            ." and  category_id =".$category_id);

        return $query;
    }

    public function  change_priority_level_up($category_id,$old_priority_level, $new_priority_level)
    {
        $query = $this->db->query("update blog set priority_level = (priority_level+1) "
            ."where priority_level >=".$new_priority_level." and priority_level <".$old_priority_level
            ." and  category_id =".$category_id);

        return $query;
    }

    public function delete_blog($blog_id)
    {
        $this->db->where('blog_id', $blog_id);
        $result = $this->db->delete('blog');
        return $result;
    }

    public function delete_blog_value($blog_id)
    {
        $this->db->where('blog_id', $blog_id);
        $result = $this->db->delete('blog_value');

        return $result;
    }

    public function get_category_field($blog_id)
    {

        $this->db->select('*');
        $this->db->where('blog_id', $blog_id);
        $query = $this->db->get('category_field');

        return $query->result_array();
    }

    public function get_all_priority($category_id)
    {

        $this->db->select("blog.priority_level");
        $this->db->where(array('blog.blog_status'=> 1,'category_id'=>$category_id));
        $this->db->order_by("blog.priority_level", "desc");
        $query = $this->db->get('blog');

        return $query->result_array();
    }

    public function updateImage($blog_id, $category_field_id, $path)
    {
        $data = array(
            'blog_value' => $path
        );
        $this->db->where(array('blog_id' => $blog_id, 'category_field_id' => $category_field_id,));
        $this->db->update('blog_value', $data);

        return true;
    }


    public function get_group_blog_id($category_id)
    {

        $this->db->select("blog.blog_id");
        $this->db->where_in('blog.category_id', $category_id);
        $query = $this->db->get('blog');

        return $query->result_array();
    }

    public function delete_group_blog($category_id)
    {

        $this->db->where_in('category_id', $category_id);
        $query = $this->db->delete('blog');

        return $query;
    }

    public function delete_group_blog_value($blog_id)
    {


        $this->db->where_in('blog_id', $blog_id);
        $query = $this->db->delete("blog_value");

        return $query;
    }


}