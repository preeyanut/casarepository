<?php

class Bank_list_model extends CI_Model
{

    public function get_all()
    {
        $this->db->select('bank_list.*,CONCAT(u1.firstname + u1.lastname) as create_by_name');
        $this->db->from('bank_list');
        $this->db->join('user as u1','u1.user_id = bank_list.create_by','inner');
        $this->db->join('user as u2','u2.user_id = bank_list.update_by','inner');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_data($id)
    {
        $this->db->select('*');
        $this->db->from('bank_list');
        $this->db->where('bank_list_id',$id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function add_bank($data)
    {
        $this->load->library('encrypt');

        $data_array = array(
            'bank_list_name' => $data['bank_name'],
            'bank_list_id' => (int)$data['bank_list_id'],
            'priority_level' => $data['priority_level'],
            'bank_list_status' => (int)$data['bank_list_status'],
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('bank_list', $data_array);
        $insert_id = $this->db->insert_id();

        $sql_data = json_encode ($data_array);
        $this->add_log('add','bank',(int)$insert_id,$sql_data);

        return $insert_id;
    }

    public function edit_bank($data)
    {
        $this->load->library('encrypt');

        $bank_data = array(
            'bank_list_name' => $data['bank_name'],
            'priority_level' => $data['priority_level'],
            'bank_list_status'=> (int)$data['bank_list_status'],
            'update_date'=> date("Y-m-d H:i:s"),
            'update_by'=> $this->session->userdata("user_id"),
        );

        $this->db->where('bank_list_id',(int)$data['bank_list_id']);
        $this->db->update('bank_list',$bank_data);

        $sql_data = json_encode ($data);
        $this->add_log('edit','bank',(int)$data['bank_list_id'],$sql_data);
    }

    public function delete_bank($bank_id)
    {
        $sql_data = 'delete data';
        $this->add_log('delete','bank',$bank_id ,$sql_data);

        $this->load->library('encrypt');

        $this->db->where('bank_list_id',$bank_id);
        $this->db->delete('bank_list');

    }

    public function count()
    {
        $this->db->select('count(*) as total ');
        $this->db->from('bank_list');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {

        $this->db->select('bank_list.*,CONCAT(u1.firstname + u1.lastname) as create_by_name,CONCAT(u2.firstname + u2.lastname)  as update_by_name');
        $this->db->from('bank_list');
        $this->db->join('user as u1','u1.user_id = bank_list.create_by','inner');
        $this->db->join('user as u2','u2.user_id = bank_list.update_by','inner');
        if($status != '-1' && $status != '') {
            $this->db->where('bank_list_status',$status);
        }
        $this->db->like('bank_list_name',$txtSearch);
        $this->db->limit($filter_number,$start_filter);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $this->db->select('*,(select count(*) from bank_list ) as total');
        $this->db->from('bank_list');
        if($filter_status != '-1' && $filter_status != '') {
        $this->db->where('bank_list_status',$filter_status);
    }
        $this->db->like('bank_list_name',$txtSearch);
        $this->db->limit($filter_number,$start_filter);
        $query = $this->db->get();

        return $query->row_array('total');
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