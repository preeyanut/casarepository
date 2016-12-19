<?php

class Banner_model extends CI_Model
{
    public function get_all()
    {
        $query = $this->db->query("SELECT home_banner.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " from home_banner "
            . " inner join  user as u1 on u1.user_id = home_banner.create_by "
            . " inner join  user as u2 on u2.user_id = home_banner.update_by ");
        return $query->result_array();
    }

    public function get_data($id){
        $query = $this->db->query("SELECT * FROM home_banner WHERE banner_id = " . $id);
        return $query->result_array();
    }

    public function add_banner($data){
        $this->load->library('encrypt');

        $data_array = array(
            'banner_name' => $data['banner_name'],
            'priority_level' => $data['priority_level'],
            'banner_status' => (int)$data['banner_status'],

            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id"),

            'banner_url' => $data['banner_url']

        );

        $this->db->insert('home_banner', $data_array);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function edit_banner($data){
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "home_banner` SET "
            . " banner_name = '" . $data['banner_name'] . "'"
            . ", priority_level = '" . $data['priority_level'] . "'"
            . ", banner_status = '" . (int)$data['banner_status'] . "'"

            . ", update_date = '" .  date("Y-m-d H:i:s") . "'"
            . ", update_by = '" . $this->session->userdata("user_id") . "'"

            . ", banner_url = '" . (int)$data['banner_url'] . "'"

            . " WHERE  banner_id = '" . (int)$data['banner_id'] . "'");

    }

    public function delete_banner($banner_id){
        $this->load->library('encrypt');
        $this->db->query("DELETE FROM home_banner WHERE banner_id = ". $banner_id) ;

    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "home_banner`");

        $result = $query->result_array();

        return $result;
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {

        $str_sql = "";
        if ($status != '-1' && $status != '') {
            $str_sql .= " AND  banner_status = " . $status;
        }

        $query = $this->db->query("SELECT home_banner.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
            . " from home_banner "
            . " inner join  user as u1 on u1.user_id = home_banner.create_by "
            . " inner join  user as u2 on u2.user_id = home_banner.update_by "
            . " WHERE  banner_name  Like '%" . $txtSearch . "%' "

            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $str_sql = "";
        if ($filter_status != '-1') {
            $str_sql .= " AND  banner_status = " . $filter_status;
        }

        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from home_banner ) as total FROM `" . "" . "home_banner` "
            . " WHERE  banner_name  Like '%" . $txtSearch . "%' "
            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->row_array('total');
    }

    public function updateImage($banner_id, $path) {
        $data = array(
            'banner_image' => $path
        );
        $this->db->where(array('banner_id'=>$banner_id));
        $this->db->update('home_banner', $data);

        return true;
    }

}