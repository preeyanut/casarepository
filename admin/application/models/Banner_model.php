<?php

class Banner_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('home_banner.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname) as update_by_name');
        $this->db->from('home_banner');
        $this->db->join('user as u1','u1.user_id = home_banner.create_by','inner');
        $this->db->join('user as u2','u2.user_id = home_banner.update_by','inner');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_data($id){

        $this->db->select('*');
        $this->db->from('home_banner');
        $this->db->where('banner_id',$id);
        $query = $this->db->get();

        return $query->result_array();

    }

    public function add_banner($data){
        $this->load->library('encrypt');

        $data_array = array(
            'banner_name' => $data['banner_name'],
            'priority_level' => $data['priority_level'],
            'banner_status' => (int)$data['banner_status'],
            'banner_image' => $data['banner_image'],


            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id"),

            'banner_url' => $data['banner_url']

        );

        $this->db->insert('home_banner', $data_array);
        $insert_id = $this->db->insert_id();

        $sql_data = json_encode ($data_array);
        $this->add_log('add','banner',(int)$insert_id,$sql_data);

        return $insert_id;
    }

    public function edit_banner($data){
        $this->load->library('encrypt');


        //---------  set priority
        $this->db->select('home_banner.priority_level');
        $this->db->where('banner_id', $data['banner_id']);
        $banner_info = $this->db->get('home_banner')->row_array();

        if ((int)$banner_info['priority_level'] < (int)$data['priority_level']) {
            $this->change_priority_level_down((int)$banner_info['priority_level'], (int)$data['priority_level']);
        } else if ((int)$banner_info['priority_level'] > (int)$data['priority_level']) {
            $this->change_priority_level_up((int)$banner_info['priority_level'], (int)$data['priority_level']);
        }

        $banner_data = array(
            'banner_name' => $data['banner_name'],
            'priority_level' => $data['priority_level'],
            'banner_status'=> (int)$data['banner_status'],
            'update_date'=> date("Y-m-d H:i:s"),
            'update_by'=> $this->session->userdata("user_id"),
            'banner_url'=> $data['banner_url'],
        );

        $this->db->where('banner_id',(int)$data['banner_id']);
        $result = $this->db->update('home_banner', $banner_data);
        //$banner_id = 0;

        $sql_data = json_encode ($data);
        $this->add_log('edit','banner',(int)$data['banner_id'],$sql_data);

        if ($result) {
            $banner_id = $data['banner_id'];
        }
        return $banner_id;

    }

    public function get_all_priority()
    {

        $this->db->select("home_banner.priority_level");
        //$this->db->where(array('bank_list.bank_list_id' => $bank_list_id));
        $this->db->order_by("home_banner.priority_level", "desc");
        $query = $this->db->get('home_banner');

        return $query->result_array();
    }

    public function delete_banner($banner_id){
        $sql_data = 'delete data';
        $this->add_log('delete','banner',$banner_id ,$sql_data);

        $this->load->library('encrypt');

        $this->db->where('banner_id',$banner_id);
        $this->db->delete('home_banner');
    }

    public function count()
    {
        $this->db->select('count(*) as total ');
        $this->db->from('home_banner');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {
        $this->db->select('home_banner.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname)  as update_by_name');
        $this->db->from('home_banner');
        $this->db->join('user as u1','u1.user_id = home_banner.create_by','inner');
        $this->db->join('user as u2','u2.user_id = home_banner.update_by','inner');
        if($status != '-1' && $status != '') {
            $this->db->where('banner_status',$status);
        }
        $this->db->like('banner_name',$txtSearch);
        $this->db->limit($filter_number,$start_filter);
        $query = $this->db->get();

        return $query->result_array();

    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $this->db->select('*,(select count(*) from home_banner ) as total');
        $this->db->from('home_banner');
        if($filter_status != '-1' && $filter_status != '') {
            $this->db->where('banner_status',$filter_status);
        }
        $this->db->like('banner_name',$txtSearch);
        $this->db->limit($filter_number,$start_filter);
        $query = $this->db->get();

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

    public function add_log($action,$action_table,$action_to,$sql_script){

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