<?php

class Buy_lotto_model extends CI_Model
{


    public function get_last_period()
    {
        $query = $this->db->query("select DISTINCT lotto_result_date  FROM lotto_result "
            . "    order by lotto_result_id DESC limit 1  "
        );

        return $query->row_array();
    }

    public function get_period_before()
    {
        $query = $this->db->query("select DISTINCT lotto_result_date FROM lotto_result  "
            . "    order by lotto_result_id DESC limit 1,2  "
        );

        return $query->row_array();
    }


    public function get_lotto_type()
    {
        $query = $this->db->query("SELECT * FROM lotto_type");
        return $query->result_array();
    }

    public function load_setting_lotto($user_id)
    {
        $query = $this->db->query("SELECT * FROM default_setting WHERE user_id='" . $user_id . "'");
        return $query->result_array();
    }

    public function add_ticket($dataArr)
    {
        $this->db->insert('lotto_ticket', $dataArr);
        return $this->db->insert_id();
    }

    public function add_lotto_number($dataArr)
    {
        $this->db->insert('lotto_number', $dataArr);
        return $this->db->insert_id();
    }

    public function update_ticket($ticket_id, $data)
    {
        $this->db->where('lotto_ticket_id', $ticket_id);
        $this->db->update('lotto_ticket', $data);
    }

    public function load_user_info($user_id)
    {
        $query = $this->db->query("SELECT * FROM user WHERE user_id='" . $user_id . "'");
        return $query->row_array();
    }

    public function update_user_info($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data);
    }

    public function delete_ticket($ticket_id)
    {
        $this->db->where('lotto_ticket_id', $ticket_id);
        $this->db->delete('lotto_ticket');
    }

    public function delete_lotto_number($values)
    {
        $this->db->where('lotto_number_id', $values);
        $this->db->delete('lotto_number');
    }

    public function delete_carry_number($lotto_number, $from_user)
    {
        $this->db->where('number_carry', $lotto_number);
        $this->db->where('from_user_id', $from_user);
        $this->db->delete('number_carry');
    }

    public function get_all_lotto_number()
    {
        $query = $this->db->query("SELECT lotto_number.*,lotto_type.lotto_type_name "
            . " FROM `" . "" . "lotto_number`  "
            . " inner join  lotto_type on lotto_type.lotto_type_id =  lotto_number.lotto_type_id "
            . "  ORDER BY lotto_number.lotto_number_id ");
        return $query->result_array();
    }

    public function get_lotto_number_data($id_lotto)
    {
        $lotto = $this->db->get_where('lotto_number', array('lotto_number_id' => $id_lotto));
        return $lotto->row_array();
    }

    public function get_ticket_data($ticket_id)
    {
        $lotto = $this->db->get_where('lotto_ticket', array('lotto_ticket_id' => $ticket_id));
        return $lotto->row_array();
    }

    public function load_limit_lotto($lotto_number, $user_id)
    {
        $lotto = $this->db->get_where('limit_lotto', array('limit_lotto' => $lotto_number, 'user_id' => $user_id));
        return $lotto->row_array();
    }

    public function add_number_carry($dataArr)
    {
        $this->db->insert('number_carry', $dataArr);
        return $this->db->insert_id();
    }

    public function get_main_user($user_id)
    {
        $user = $this->db->get_where('user', array('user_id' => $user_id));
        return $user->row_array();
    }

    public function get_all_my_buy($user_id)
    {
        $this->db->select('lotto_price,lotto_number,lotto_group_type_name,lotto_date_added')
            ->from('lotto_number')
            ->join('lotto_group_type', 'lotto_number.lotto_type_id = lotto_group_type.lotto_group_type_id')
            ->where('lotto_number.user_id', $user_id);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_my_lotto_buy($user_id)
    {
        $this->db->select('lotto_number.*,lotto_type.lotto_type_name')
            ->from('lotto_number')
            ->join('lotto_type', 'lotto_type.lotto_type_id =  lotto_number.lotto_type_id')
            ->where('lotto_number.user_id', $user_id);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_my_lotto_ticket()
    {
        $data_ticket = array();

        //  echo var_dump($this->get_period_before());
        $get_period_before = (explode(" ", $this->get_period_before()["lotto_result_date"]));
        $get_last_period = (explode(" ", $this->get_last_period()["lotto_result_date"]));

        $period_before = date("Y-m-d", strtotime($get_period_before[0]));
        $last_period = date("Y-m-d", strtotime($get_last_period[0]));

        $query = $this->db->query("SELECT lotto_ticket.* from lotto_ticket "
            . " where user_id =  " . $this->session->userdata("user_id")
            . " AND lotto_date > '" . $last_period . " 15:20:00') "
        );
        
        $tickets = $query->result_array();
        // echo var_dump($tickets);
        foreach ($tickets as $item) {

            $query = $this->db->query("SELECT  lotto_ticket.*,lotto_type.lotto_type_id,lotto_type.lotto_type_name  ,lotto_number.* from lotto_ticket "
                . " inner join  lotto_number on lotto_ticket.lotto_ticket_id = lotto_number.lotto_ticket_id "
                . " inner join  lotto_type on lotto_type.lotto_type_id = lotto_number.lotto_type_id "
                . " where lotto_ticket.user_id =  " . $this->session->userdata("user_id")
                . " and lotto_ticket.lotto_ticket_id =  " . $item["lotto_ticket_id"]
            );

            $lotto_numbers = $query->result_array();

            $data_ticket[] = array(
                "lotto_ticket_id" => $item["lotto_ticket_id"],
                "user_id" => $item["user_id"],
                "lotto_total" => $item["lotto_total"],
                "lotto_result" => $item["lotto_result"],
                "lotto_discount" => $item["lotto_discount"],
                "lotto_commission" => $item["lotto_commission"],
                "lotto_remark" => $item["lotto_remark"],

                "lotto_date" => $item["lotto_date"],
                "lotto_number_array" => $lotto_numbers,

            );
        }
        return $data_ticket;
    }

    public function get_lotto_number_by_ticket_id($ticket_id)
    {
        $query = $this->db->query("SELECT user.user_code,user.firstname,user.lastname, lotto_ticket.*,lotto_type.lotto_type_id,lotto_type.lotto_type_name  "
            . " ,lotto_number.lotto_number,lotto_number.lotto_price from lotto_ticket "
            . " inner join  lotto_number on lotto_ticket.lotto_ticket_id = lotto_number.lotto_ticket_id "
            . " inner join  lotto_type on lotto_type.lotto_type_id = lotto_number.lotto_type_id "
            . " inner join  user on user.user_id = lotto_ticket.user_id "
            . " where lotto_ticket.user_id =  " . $this->session->userdata("user_id")
            . " and lotto_ticket.lotto_ticket_id =  " . $ticket_id
        );
        return $query->result_array();
    }

    

}