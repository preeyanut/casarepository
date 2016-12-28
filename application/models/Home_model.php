<?php

class Home_model extends CI_Model
{
    public function get_pages()
    {
        $this->db->select("blog.blog_id,blog.blog_title");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->where(array('category.category_name'=>'Page','blog.blog_status'=>1));
        $this->db->order_by("blog.priority_level","asc");
        $query = $this->db->get('blog');

        return $query->result_array();
    }

    public function get_blog_field($blog_id)
    {
        $this->db->select("blog.*,category_field.field_name,category_field.field_type,category_field.field_id,category_field.category_field_id,blog_value.blog_value");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->join('category_type', 'category_type.category_type_id = category.category_type_id');
        $this->db->join('category_field', 'category_field.category_type_id = category_type.category_type_id');
        $this->db->join('blog_value', ' (blog_value.blog_id = blog.blog_id and blog_value.category_field_id = category_field.category_field_id)');
        $this->db->where(array('blog.blog_id'=>$blog_id,'blog.blog_status'=>1));
        $this->db->order_by("blog.blog_id","desc");
        $query = $this->db->get('blog');

        return $query->result_array();
    }

    public function get_news($limit)
    {
        $this->db->select("blog.*,blog.blog_title");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->where(array('category.category_name'=>'News','blog.blog_status'=>1));
        $this->db->order_by("blog.blog_id","asc");
        $query = $this->db->get('blog',$limit);

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

    public function get_hilights($limit)
    {
        $this->db->select("blog.blog_id,blog.blog_title");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->where('category.category_name','Hilight');
        $this->db->order_by("blog.blog_id","asc");
        $query = $this->db->get('blog',$limit);

        return $query->result_array();
    }

    public function get_casa_guide($limit)
    {
        $this->db->select("blog.blog_id,blog.blog_title");
        $this->db->join('category', 'category.category_id = blog.category_id');
        $this->db->where('category.category_name','CASA GUIDE');
        $this->db->order_by("blog.blog_id","asc");
        $query = $this->db->get('blog',$limit);

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

    public function get_banners(){
        $this->db->select("home_banner.*");
        $this->db->where(array('home_banner.banner_status'=>'1'));
        $this->db->order_by("home_banner.priority_level","asc");
        $query = $this->db->get('home_banner');
        return $query->result_array();
    }


}