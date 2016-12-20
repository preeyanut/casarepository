<?php

class Home_model extends CI_Model
{
    public function get_pages()
    {
        $this->db->select("blog.blog_id,blog.blog_title");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->where('category.category_name','Page');
        $this->db->order_by("blog.blog_id","asc");
        $query = $this->db->get('blog');

        return $query->result_array();
    }

    public function get_news()
    {
        $this->db->select("blog.blog_id,blog.blog_title");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->where('category.category_name','News');
        $this->db->order_by("blog.blog_id","asc");
        $query = $this->db->get('blog');

        return $query->result_array();
    }

    public function get_promotions()
    {
        $this->db->select("blog.blog_id,blog.blog_title");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->where('category.category_name','Promotion');
        $this->db->order_by("blog.blog_id","asc");
        $query = $this->db->get('blog');

        return $query->result_array();
    }

    public function get_hilights()
    {
        $this->db->select("blog.blog_id,blog.blog_title");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->where('category.category_name','Hilight');
        $this->db->order_by("blog.blog_id","asc");
        $query = $this->db->get('blog');

        return $query->result_array();
    }

    public function get_blogs()
    {
        $this->db->select("blog.blog_id,blog.blog_title");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->where('category.category_name','Blog');
        $this->db->order_by("blog.blog_id","asc");
        $query = $this->db->get('blog');

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

    public function get_blog_field($blog_id,$category_type_id)
    {
        $this->db->select("blog.*,category_field.field_name,category_field.field_type,category_field.field_id,category_field.category_field_id,blog_value.blog_value");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->join('category_type', 'category_type.category_type_id = category.category_type_id');
        $this->db->join('category_field', 'category_field.category_type_id = category_type.category_type_id');
        $this->db->join('blog_value', ' (blog_value.blog_id = blog.blog_id and blog_value.category_field_id = category_field.category_field_id)');
        $this->db->where(array('blog_value.blog_id'=>$blog_id,'category_field.category_type_id'=>$category_type_id));
        $this->db->order_by("category_field.category_field_id","asc");
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

    public function add_blog_field($blog_id,$data)
    {
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
        }

        return true;
    }

    public function edit_blog($data)
    {
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
        $blog_id=0;
        if($result){
            $blog_id=$data['blog_id'];
        }
        return $blog_id;
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

    public function get_all_priority(){

        $this->db->select("blog.priority_level");
        $this->db->where('blog.blog_status',1);
        $this->db->order_by("blog.priority_level","desc");
        $query = $this->db->get('blog');

        return $query->result_array();
    }

    public function updateImage($blog_id,$category_field_id, $path) {
        $data = array(
            'blog_value' => $path
        );
        $this->db->where(array('blog_id'=>$blog_id,'category_field_id'=>$category_field_id,));
        $this->db->update('blog_value', $data);

        return true;
    }
}