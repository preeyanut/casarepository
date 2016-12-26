<?php

class Customer_model extends CI_Model
{
    //------------------  get customer or agent down
//    public function get_all_my_sub_customer()
//    {
//        $query = $this->db->query("SELECT  customer_id "
//            . " from    (SELECT * from customer "
//            . " order by main_customer_id) customers_sorted, "
//            . " (select @previous := '" . $this->session->customerdata("customer_id") . "') initialisation "
//            . " where   find_in_set(main_customer_id, @previous) > 0 "
//            . " and     @previous := concat(@previous, ',', customer_id) "
//        );
//        $all_sub = $query->result_array();
//
//        $query = $this->db->query("SELECT  customer_id "
//            . " from    (SELECT * from customer "
//            . " order by main_customer_id) customers_sorted, "
//            . " (select @previous := '" . $this->session->customerdata("customer_id") . "') initialisation "
//            . " where   find_in_set(main_customer_id, @previous) > 0 "
//            . " and     @previous := concat(@previous, ',', customer_id) "
//        );
//        $all_sub = $query->result_array();
//        $group_id = "";
//        foreach ($all_sub as $customer) {
//            if (strlen($group_id) > 0) {
//                $group_id .= ",";
//            }
//            $group_id .= $customer["customer_id"];
//        }
//
//        //return $group_id;
//
//        if($group_id!=""){
//            $query = $this->db->query(" SELECT customer_id from customer where customer_id in ( " . $group_id . ") "
//                . " AND main_customer_id=" . $this->session->customerdata("customer_id")
//            );
//        }else{
//            $query = $this->db->query(" SELECT customer_id from customer where  "
//                . "  main_customer_id=" . $this->session->customerdata("customer_id")
//            );
//        }
//
//
//        $all_sub_customer = $query->result_array();
//        $group_customer_id = "";
//        foreach ($all_sub_customer as $customer) {
//            if (strlen($group_customer_id) > 0) {
//                $group_customer_id .= ",";
//            }
//            $group_customer_id .= $customer["customer_id"];
//        }
//
//        return $group_customer_id;
//    }
//
//    public function get_all_my_sub_customer_same_as()
//    {
//        $query = $this->db->query("SELECT  customer_id "
//            . " from    (SELECT * from customer "
//            . " order by main_customer_id) customers_sorted, "
//            . " (select @previous := '" . $this->session->customerdata("customer_id") . "') initialisation "
//            . " where   find_in_set(main_customer_id, @previous) > 0 "
//            . " and     @previous := concat(@previous, ',', customer_id) "
//        );
//        $all_sub = $query->result_array();
//        $group_id = "";
//        foreach ($all_sub as $customer) {
//            if (strlen($group_id) > 0) {
//                $group_id .= ",";
//            }
//            $group_id .= $customer["customer_id"];
//        }
//
//        //return $group_id;
//
//        if($group_id!=""){
//            $query = $this->db->query(" SELECT customer_id from customer where customer_id in ( " . $group_id . ") "
//                . " AND main_customer_id=" . $this->session->customerdata("customer_id") ." AND customer_group_id=3 "
//            );
//        }else{
//            $query = $this->db->query(" SELECT customer_id from customer where  "
//                . "  main_customer_id=" . $this->session->customerdata("customer_id") ." AND customer_group_id=3 "
//            );
//        }
//
//
//        $all_sub_customer = $query->result_array();
//        $group_customer_id = "";
//        foreach ($all_sub_customer as $customer) {
//            if (strlen($group_customer_id) > 0) {
//                $group_customer_id .= ",";
//            }
//            $group_customer_id .= $customer["customer_id"];
//        }
//
//        return $group_customer_id;
//    }
//
//    public function get_my_sub_customer()
//    {
//        $query = $this->db->query(" SELECT  customer_id "
//            . " from    (SELECT * from customer "
//            . " order by main_customer_id) customers_sorted, "
//            . " (select @previous := '" . $this->session->customerdata("customer_id") . "') initialisation "
//            . " where   find_in_set(main_customer_id, @previous) > 0 "
//            . " and     @previous := concat(@previous, ',', customer_id) "
//        );
//        $all_sub = $query->result_array();
//        $group_id = "";
//        foreach ($all_sub as $customer) {
//            if (strlen($group_id) > 0) {
//                $group_id .= ",";
//            }
//            $group_id .= $customer["customer_id"];
//        }
//
//        $query = $this->db->query(" SELECT customer_id from customer where customer_id in ( " . $group_id . ") "
//            . " AND customer_group_id=3 "
//        );
//
//        $all_sub_customer = $query->result_array();
//        $group_customer_id = "";
//        foreach ($all_sub_customer as $customer) {
//            if (strlen($group_id) > 0) {
//                $group_customer_id .= ",";
//            }
//            $group_customer_id .= $customer["customer_id"];
//        }
//
//        return $group_customer_id;
//    }
//
//    public function get_my_sub_agent()
//    {
//        $query = $this->db->query(" SELECT  customer_id "
//            . " from    (SELECT * from customer "
//            . " order by main_customer_id) customers_sorted, "
//            . " (select @previous := '" . $this->session->customerdata("customer_id") . "') initialisation "
//            . " where   find_in_set(main_customer_id, @previous) > 0 "
//            . " and     @previous := concat(@previous, ',', customer_id) "
//        );
//        $all_sub = $query->result_array();
//        $group_id = "";
//        foreach ($all_sub as $customer) {
//            if (strlen($group_id) > 0) {
//                $group_id .= ",";
//            }
//            $group_id .= $customer["customer_id"];
//        }
//
//        $query = $this->db->query(" SELECT customer_id from customer where customer_id in ( " . $group_id . ") "
//            . " AND customer_group_id=2 "
//        );
//
//        $all_sub_customer = $query->result_array();
//        $group_customer_id = "";
//        foreach ($all_sub_customer as $customer) {
//            if (strlen($group_id) > 0) {
//                $group_customer_id .= ",";
//            }
//            $group_customer_id .= $customer["customer_id"];
//        }
//
//        return $group_customer_id;
//    }

    //------------------  End get customer or agent down

    public function get_data($id)
    {
//        $query = $this->db->query("SELECT * FROM customer WHERE customer_id = " . $id);
//        return $query->row_array();

        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_all()
    {
//        $query = $this->db->query("SELECT customer.*,CONCAT(u1.firstname, ' ', u1.lastname) as accept_by_name "
//            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
//            . " from customer "
//            . " inner join  user as u1 on u1.user_id = customer.accept_by "
//            . " inner join  user as u2 on u2.user_id = customer.update_by ");
//        return $query->result_array();

        $this->db->select('customer.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname) as update_by_name');
        $this->db->from('customer');
        $this->db->join('user as u1', 'u1.user_id = customer.accept_by', 'inner');
        $this->db->join('user as u2', 'u2.user_id = customer.update_by', 'inner');
        $query = $this->db->get();

        return $query->result_array();

    }

    public function add_customer($data)
    {
        $this->load->library('encrypt');

        $data_array = array(

            //'member_id' => $data['member_id'],

            'customer_firstname' => $data['customer_firstname'],
            'customer_lastname' => $data['customer_lastname'],

            'customer_telephone' => $data['customer_telephone'],
            'customer_line_id' => $data['customer_line_id'],
            'customer_email' => $data['customer_email'],

            'how_to_know_web' => $data['how_to_know_web'],
            'bank_name' => $data['bank_name'],
            'bank_account_name' => $data['bank_account_name'],
            'bank_account_number' => $data['bank_account_number'],
            'money_open_account' => $data['money_open_account'],

            'old_id_promotion' => $data['old_id_promotion'],

            'submission_date' => date("Y-m-d H:i:s"),
            'customer_status' => (int)$data['customer_status'],
            'accept_date' => date("Y-m-d H:i:s"),
            'accept_by' => $this->session->userdata("user_id"),

            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")

        );

        $this->db->insert('customer', $data_array);
        $insert_id = $this->db->insert_id();

        $member_id = $this->get_customer_code($insert_id);

        $this->db->query("UPDATE `" . "" . "customer` SET "
            . " member_id = '" . $member_id . "'"
            . " WHERE customer_id = '" . (int)$insert_id . "'");


        $sql_data = json_encode($data_array);
        $this->add_log('add', 'customer', (int)$insert_id, $sql_data);

        //$this->decrease_agent_credit(str_replace(",", "", $data['customer_credit']));

        return $insert_id;
    }

    public function get_customer_code($customer_id)
    {
        $member_id = "";
        if (strlen($customer_id) < 4) {
            $member_id .= "0" . $customer_id;
            if (strlen($customer_id) < 3) {
                $member_id = "0" . $member_id;
                if (strlen($customer_id) < 2) {
                    $member_id = "0" . $member_id;
                }
            }
        } else {
            $member_id = $customer_id;
        }
        $member_id = "CASA_TH_" . $member_id;
        return $member_id;
    }

    public function edit_customer($customer_id, $data)
    {
        $this->load->library('encrypt');

        $data_array = array(
            'customer_firstname' => $data['customer_firstname'],
            'customer_lastname' => $data['customer_lastname'],
            'customer_telephone' => $data['customer_telephone'],
            'customer_line_id' => $data['customer_line_id'],
            'customer_email' => $data['customer_email'],
            'how_to_know_web' => $data['how_to_know_web'],
            'bank_name' => $data['bank_name'],
            'bank_name' => $data['bank_name'],
            'bank_account_name' => $data['bank_account_name'],
            'bank_account_number' => $data['bank_account_number'],
            'money_open_account' => (int)$data['money_open_account'],
            'old_id_promotion' => $data['old_id_promotion'],
            'old_id_promotion' => $data['old_id_promotion'],
            'customer_status' => (int)$data['customer_status'],

            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->where('customer_id', $customer_id);
        $result = $this->db->update('customer', $data_array);

        $sql_data = json_encode($data);
        $this->add_log('edit', 'customer', (int)$customer_id, $sql_data);

        return $result;
    }

    public function delete_customer($customer_id)
    {
//        $this->db->query("DELETE FROM `" . "" . "customer` WHERE customer_id = '" . (int)$customer_id . "'");

        $sql_data = 'delete data';
        $this->add_log('delete', 'customer', $customer_id, $sql_data);

        $this->db->where('customer_id', $customer_id);
        $this->db->delete('customer');
    }

    public function count()
    {
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "customer`");
//
//        $result = $query->result_array();
//
//        return $result;

        $this->db->select('count(*) as total ');
        $this->db->from('customer');
        $query = $this->db->get();

        return $query->result_array();

    }

//    public function search_customer_filter($txtSearch, $start_filter, $filter_number, $status)
//    {
//
//        $str_sql = "";
//        if ($status != '-1' && $status != '') {
//            $str_sql .= " AND  customer_status = " . $status;
//        }
//
//
//        $query = $this->db->query("SELECT customer.*,CONCAT(u1.firstname, ' ', u1.lastname) as accept_by_name "
//            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
//            . " from customer "
//            . " inner join  user as u1 on u1.user_id = customer.accept_by "
//            . " inner join  user as u2 on u2.user_id = customer.update_by "
//            . " WHERE  member_id  Like '%" . $txtSearch . "%' "
////            . " OR  customer.customer_firstname  Like '%" . $txtSearch . "%' "
////            . " OR  customer.customer_lastname  Like '%" . $txtSearch . "%' "
////            . " OR  customer.customer_email  Like '%" . $txtSearch . "%' "
////            . " OR  customer.customer_telephone  Like '%" . $txtSearch . "%' "
////            . " OR  customer.customer_line_id  Like '%" . $txtSearch . "%' "
//
//            . $str_sql
//            . " Limit " . $start_filter . ", " . $filter_number . " "
//        );
//
//        return $query->result_array();
//    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $status)
    {

//        $str_sql = "";
//        if ($status != '-1' && $status != '') {
//            $str_sql .= " AND  customer_status = " . $status;
//        }
//
//        $query = $this->db->query("SELECT customer.*,CONCAT(u1.firstname, ' ', u1.lastname) as accept_by_name "
//            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name "
//            . " from customer "
//            . " inner join  user as u1 on u1.user_id = customer.accept_by "
//            . " inner join  user as u2 on u2.user_id = customer.update_by "
//            . " WHERE  "
//            . " ( customer.member_id  Like '%" . $txtSearch . "%' "
//            . " OR  customer.customer_firstname  Like '%" . $txtSearch . "%' "
//            . " OR  customer.customer_lastname  Like '%" . $txtSearch . "%' "
//            . " OR  customer.customer_telephone  Like '%" . $txtSearch . "%' "
//            . " OR  customer.customer_line_id  Like '%" . $txtSearch . "%' ) "
//
//            . $str_sql
//            . " Limit " . $start_filter . ", " . $filter_number . " "
//        );
//
//        return $query->result_array();

        $this->db->select('customer.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as accept_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname)  as update_by_name');
        $this->db->from('customer');
        $this->db->join('user as u1', 'u1.user_id = customer.accept_by', 'inner');
        $this->db->join('user as u2', 'u2.user_id = customer.update_by', 'inner');
        if ($status != '-1' && $status != '') {
            $this->db->where('customer_status', $status);
        }
        $this->db->like('customer.member_id', $txtSearch);
//        $this->db->like('customer.customer_firstname', $txtSearch);
//        $this->db->like('customer.customer_lastname', $txtSearch);
//        $this->db->like('customer.customer_telephone', $txtSearch);
//        $this->db->like('customer.customer_line_id', $txtSearch);
        $this->db->limit($filter_number, $start_filter);
        $query = $this->db->get();

        return $query->result_array();
    }


//    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
//    {
//
//        $str_sql = "";
//        if ($filter_status != "" || $filter_status != 'undefined') {
//            $str_sql .= " AND  customer_status";
//        }
//
//        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from customer "
//            . " WHERE  customer.member_id  Like '%" . $txtSearch . "%' "
//            . " OR  customer.customer_firstname  Like '%" . $txtSearch . "%' "
//            . " OR  customer.customer_lastname  Like '%" . $txtSearch . "%' "
//            . " OR  customer.customer_email  Like '%" . $txtSearch . "%' "
//            . " OR  customer.customer_telephone  Like '%" . $txtSearch . "%' "
//            . " OR  customer.customer_line_id  Like '%" . $txtSearch . "%' "
//            . " ) as total FROM `" . "" . "customer` as main_customer "
//            . " WHERE  main_customer.member_id  Like '%" . $txtSearch . "%' "
//            . " OR  main_customer.customer_firstname  Like '%" . $txtSearch . "%' "
//            . " OR  main_customer.customer_lastname  Like '%" . $txtSearch . "%' "
//            . " OR  main_customer.customer_email  Like '%" . $txtSearch . "%' "
//            . " OR  main_customer.customer_telephone  Like '%" . $txtSearch . "%' "
//            . " OR  main_customer.customer_line_id  Like '%" . $txtSearch . "%' "
//
//            . $str_sql
//            . " Limit " . $start_filter . ", " . $filter_number . " "
//        );
//
//        return $query->row_array('total');
//    }


    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

//        $str_sql = "";
//        if ($filter_status != "" || $filter_status != 'undefined') {
//            $str_sql .= " AND  customer_status";
//        }
//
//        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from customer ) as total FROM `" . "" . "customer` "
//            . " WHERE  member_id  Like '%" . $txtSearch . "%' "
//            . " OR customer_firstname  Like '%" . $txtSearch . "%' "
//            . " OR customer_lastname  Like '%" . $txtSearch . "%' "
//            . " OR customer_email  Like '%" . $txtSearch . "%' "
//            . " OR customer_telephone  Like '%" . $txtSearch . "%' "
//            . " OR customer_line_id  Like '%" . $txtSearch . "%' "
//            //. " OR customer_status  Like '%" . $txtSearch . "%' "
//
//            . $str_sql
//            . " Limit " . $start_filter . ", " . $filter_number . " "
//        );
//
//        return $query->row_array('total');

        $this->db->select('*,(select count(*) from customer ) as total');
        $this->db->from('customer');
        if ($filter_status != '-1' && $filter_status != '') {
            $this->db->where('customer_status', $filter_status);
        }
        $this->db->like('member_id', $txtSearch);
        $this->db->like('customer_firstname', $txtSearch);
        $this->db->like('customer_lastname', $txtSearch);
        $this->db->like('customer_email', $txtSearch);
        $this->db->like('customer_telephone', $txtSearch);
        $this->db->like('customer_line_id', $txtSearch);
        $this->db->like('customer_status', $txtSearch);
        $this->db->limit($filter_number, $start_filter);
        $query = $this->db->get();

        return $query->row_array('total');
    }

//    public function get_total_customers_by_search($txtSearch, $start_filter, $filter_number, $customer_status)
//    {
//        //$all_my_sub_customer = $this->get_all_my_sub_customer();
//
//        $str_sql = "";
//        if ($customer_status != -1) {
//            $str_sql .= " AND  customer.customer_status = " . $customer_status;
//        }
////        if ($customer_group != -1) {
////            $str_sql .= " AND  customer_group.customer_group_id = " . $customer_group;
////        }
//        //if ($all_my_sub_customer === '') {
//        //return array();
//        //}
//        $query = $this->db->query("SELECT DISTINCT *, COUNT(*) AS total FROM `" . "" . "customer` "
//            . " inner join customer_group on customer_group.customer_group_id = customer.customer_group_id "
//            . " WHERE ( customer.customer_code  Like '%" . $txtSearch . "%' OR "
//            . " customer.firstname Like '%" . $txtSearch . "%' OR "
//            . " customer.lastname Like '%" . $txtSearch . "%' OR "
//            . " customer.customer_telephone Like '%" . $txtSearch . "%' ) "
//            . $str_sql
//            //. " AND customer.customer_id in (" . $all_my_sub_customer . ") "
//            . " Limit " . $start_filter . ", " . $filter_number . " "
//        );
//
////        $result=  $query->row_array();
////        echo "-----".$txtSearch."------".$result["total"];
//        return $query->row_array('total');
//    }


//    public function edit_customer($customer_id, $data)
//    {
//        $this->load->library('encryption');
//
//        //------------------  Increase Decrease Credit
//        $result_get_credit = $this->get_customer_credit($customer_id);
//        $old_credit_customer = $result_get_credit["customer_credit"];
//
//        if ($old_credit_customer > floatval(str_replace(",", "", $data['customer_credit']))) {
//            $gab_credit = $old_credit_customer - floatval(str_replace(",", "", $data['customer_credit']));
//            $this->increase_agent_credit($gab_credit);
//        } else {
//            $gab_credit = floatval(str_replace(",", "", $data['customer_credit'])) - $old_credit_customer;
//            $this->decrease_agent_credit($gab_credit);
//        }
//
//        $this->db->query("UPDATE `" . "" . "customer` SET "
//            . " customername = '" . $data['customername'] . "'"
//            . ", customer_group_id = '" . (int)$data['customer_group_id'] . "'"
//            . ", firstname = '" . $data['firstname'] . "'"
//            . ", lastname = '" . $data['lastname'] . "'"
//            . ", customer_email = '" . $data['customer_email'] . "'"
//            . ", customer_telephone = '" . $data['customer_telephone'] . "'"
//
//            . ", customer_status = '" . (int)$data['customer_status'] . "'"
//
//            . ", bank = '" . $data['bank'] . "'"
//            . ", bank_code = '" . $data['bank_code'] . "'"
//            . ", bank_name = '" . $data['bank_name'] . "'"
//            . ", customer_credit = '" . str_replace(",", "", $data['customer_credit']) . "'"
//            . " WHERE customer_id = '" . (int)$customer_id . "'");
//
//    }


    public function add_default_setting($data, $customer_id)
    {
        $this->load->library('encrypt');

        foreach ($data as $item) {

            $data_array = array(
                'lotto_type_id' => $item->lotto_type_id,
                'minimum' => $item->minimum,
                'maximum' => $item->maximum,
                'limit_price' => $item->maximum,
                'reward' => $item->reward,
                'commission' => $item->commission,
                'customer_id' => $customer_id,
            );

            $this->db->insert('default_setting', $data_array);
        }

        return true;
    }

    public function add_percent_setting($data, $customer_id)
    {
        $this->load->library('encrypt');

        foreach ($data as $item) {

            $data_array = array(
                'lotto_type_id' => $item->lotto_type_id,
                'my_percent' => $item->my_percent,
                'sub_percent' => $item->sub_percent,
                'customer_id' => $customer_id,
            );

            $this->db->insert('percent_setting', $data_array);
        }

        return true;
    }

    public function get_customer_credit($customer_id)
    {
//        $query = $this->db->query("SELECT customer_credit  "
//            . " FROM `customer`  "
//            . " WHERE customer_id = '" . (int)$customer_id . "'");
//
//        return $query->row_array();

        $this->db->select('customer_credit');
        $this->db->from('customer');
        $this->db->where('customer_id', (int)$customer_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function edit_default_setting($data, $customer_id)
    {
        $this->load->library('encrypt');

        foreach ($data as $item) {

            $this->db->query("UPDATE `" . "" . "default_setting` SET "
                . " minimum = '" . $item->minimum . "'"
                . ", maximum = '" . $item->maximum . "'"
                . ", limit_price = '" . $item->maximum . "'"
                . ", reward = '" . $item->reward . "'"
                . ", commission = '" . $item->commission . "'"
                . " WHERE customer_id = '" . (int)$customer_id . "' AND lotto_type_id=" . $item->lotto_type_id);
        }

        return true;
    }

    public function edit_percent_setting($data, $customer_id)
    {
        $this->load->library('encrypt');

        foreach ($data as $item) {

            $this->db->query("UPDATE `" . "" . "percent_setting` SET "
                . " my_percent = '" . $item->my_percent . "'"
                . ", sub_percent = '" . $item->sub_percent . "'"
                . " WHERE customer_id = '" . (int)$customer_id . "' AND lotto_type_id=" . $item->lotto_type_id);

        }

        return true;
    }

    public function update_image($customer_id, $urlImage)
    {

        $this->db->query("UPDATE `" . "" . "customer` SET "
            . " image = '" . $urlImage . "' WHERE customer_id = '" . (int)$customer_id . "'");

        return true;
    }

    public function edit_password($customer_id, $password)
    {
        $this->db->query("UPDATE `" . "" . "customer` SET salt = '" . $this->db->escape($salt = token(9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($password)))) . "', code = '' WHERE customer_id = '" . (int)$customer_id . "'");
    }

    public function edit_code($email, $code)
    {
        $this->db->query("UPDATE `" . "" . "customer` SET code = '" . $this->db->escape($code) . "' WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");
    }

    public function get_customer($customer_id)
    {
//        $query = $this->db->query("SELECT u.*  "
//            . " FROM `" . "" . "customer` u " . " "
//            . " WHERE u.customer_id = '" . (int)$customer_id . "'");
//
//        return $query->row_array();

        $this->db->select('u.*');
        $this->db->from('customer u');
        $this->db->where('u.customer_id', (int)$customer_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_all_customer()
    {
        $all_my_sub_customer = $this->get_all_my_sub_customer();

//        $query = $this->db->query("SELECT * FROM `" . "" . "customer` u  "
//            . " WHERE u.customer_id in (" . $all_my_sub_customer . ")"
//        );
//
//        return $query->result_array();

        $this->db->select('*');
        $this->db->from('customer u');
        $this->db->where_in(' u.customer_id', $all_my_sub_customer);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_all_customer_same_as()
    {
        $all_my_sub_customer = $this->get_all_my_sub_customer_same_as();

//        $query = $this->db->query("SELECT *, (SELECT ug.name FROM `" . ""
//            . "customer_group` ug WHERE ug.customer_group_id = u.customer_group_id) AS customer_group_name FROM `" . "" . "customer` u  "
//            . " WHERE u.customer_id in (" . $all_my_sub_customer . ")"
//        );
//
//        return $query->result_array();

        $this->db->select('*,(SELECT ug.name FROM customer_group ug WHERE ug.customer_group_id = u.customer_group_id) AS customer_group_name');
        $this->db->from('customer u');
        $this->db->where_in('u.customer_id', $all_my_sub_customer);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_all_customer_agent()
    {
//        $query = $this->db->query("SELECT * FROM `" . "" . "customer` WHERE `customer`.customer_status < 3 ");
//        return $query->result_array();

        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_status <',3);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_customer_by_customername($customername)
    {
//        $query = $this->db->query("SELECT * FROM `" . "" . "customer` WHERE customername = " . $this->db->escape($customername) . "");
//        return $query->result_array();

        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customername',$this->db->escape($customername));
        $query = $this->db->get();

        return $query->result_array();
    }

//    public function search_customer($txtSearch)
//    {
//        $query = $this->db->query("SELECT DISTINCT * FROM `" . "" . "customer` WHERE customer_id Like '%" . $txtSearch . "%' OR "
//            . " firstname Like '%" . $txtSearch . "%' OR "
//            . " lastname Like '%" . $txtSearch . "%' ");
//        return $query->result_array();
//    }

    public function get_customer_by_code($code)
    {
//        $query = $this->db->query("SELECT * FROM `" . "" . "customer` WHERE code = '" . $this->db->escape($code) . "' AND code != ''");
//
//        return $query->result_array;

        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('code',$this->db->escape($code));
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_customers($data = array())
    {
        $sql = "SELECT * FROM `" . "" . "customer`";

        $sort_data = array(
            'customername',
            'status',
            'date_added'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY customername";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->result_arrays;
    }

    public function get_total_customers()
    {
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "customer`");
//
//        $result = $query->result_array();
//
//        return $result;

        $this->db->select('COUNT(*) AS total');
        $this->db->from('customer');
        $query = $this->db->get();

        return $query->result_array();

    }

    public function get_total_customers_same_as()
    {
        $all_my_sub_customer = $this->get_all_my_sub_customer_same_as();
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "customer` " . " where customer_id in (" . $all_my_sub_customer . ")");
//        $result = $query->result_array();
//        return $result;

        $this->db->select('COUNT(*) AS total');
        $this->db->from('customer');
        $this->db->where_in('customer_id',$all_my_sub_customer);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_under_customer($main_customer_id)
    {
        $this->db->select('*')
            ->from('customer')
            ->join('customer_group', 'customer.customer_group_id = customer_group.customer_group_id')
            ->where('main_customer_id', $main_customer_id);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_total_customers_by_group_id($customer_group_id)
    {
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "customer` WHERE customer_group_id = '" . (int)$customer_group_id . "'");
//
//        return $query->result_array['total'];

        $this->db->select('COUNT(*) AS total');
        $this->db->from('customer');
        $this->db->where('customer_group_id',(int)$customer_group_id);
        $query = $this->db->get();

        return $query->result_array('total');
    }

    public function get_total_customers_by_email($email)
    {
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "customer` WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");
//
//        return $query->result_array['total'];

        $this->db->select('COUNT(*) AS total');
        $this->db->from('customer');
        $this->db->where('LCASE(email)',$this->db->escape(utf8_strtolower($email)));
        $query = $this->db->get();

        return $query->result_array('total');

    }

//    public function search_customer_filter_same_as($txtSearch, $start_filter, $filter_number, $customer_status, $customer_group)
//    {
//        $all_my_sub_customer = $this->get_all_my_sub_customer_same_as();
//
//        $str_sql = "";
//        if ($customer_status != -1) {
//            $str_sql .= " AND  customer.customer_status = " . $customer_status;
//        }
//        if ($customer_group != -1) {
//            $str_sql .= " AND  customer_group.customer_group_id = " . $customer_group;
//        }
//        if ($all_my_sub_customer === '') {
//            return array();
//        }
//        $query = $this->db->query("SELECT DISTINCT customer.* ,customer_group.name AS customer_group_name  "
//            . " from customer "
//            . " inner join customer_group on customer_group.customer_group_id = customer.customer_group_id "
//            . " WHERE ( customer.customer_code  Like '%" . $txtSearch . "%' OR "
//            . " customer.firstname Like '%" . $txtSearch . "%' OR "
//            . " customer.lastname Like '%" . $txtSearch . "%' OR "
//            . " customer.customer_telephone Like '%" . $txtSearch . "%' ) "
//            . $str_sql
//            . " AND customer.customer_id in (" . $all_my_sub_customer . ")"
//            . " Limit " . $start_filter . ", " . $filter_number . " "
//        );
//
//        return $query->result_array();
//    }


    public function check_password($password)
    {
        $this->load->library('encrypt');

        $query = $this->db->query("SELECT * FROM `" . "" . "customer` "
            . " WHERE  customer_id =  " . $this->session->customerdata('customer_id') . " "

        );

        $data = $query->row_array();

        $password_result = $this->encrypt->encode($data['password']);
        $password_result = $this->encrypt->decode($password_result);

        if ($password === $password_result) {
            return true;
        }

        return false;
    }

    public function do_change_password($password)
    {
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "customer` SET "
            . " password = '" . $this->encrypt->encode($password) . "'"
            . " WHERE  customer_id =  " . $this->session->customerdata('customer_id') . " ");

        return true;
    }

    public function do_change_credit($customer_id, $customer_credit)
    {
        $this->load->library('encrypt');

        $result_get_credit = $this->get_customer_credit($customer_id);
        $old_credit_customer = $result_get_credit["customer_credit"];

        if ($old_credit_customer > $customer_credit) {
            $gab_credit = $old_credit_customer - $customer_credit;
            $this->increase_agent_credit($gab_credit);
        } else {
            $gab_credit = $customer_credit - $old_credit_customer;
            $this->decrease_agent_credit($gab_credit);
        }

        $this->db->query("UPDATE `" . "" . "customer` SET "
            . " customer_credit = '" . $customer_credit . "'"
            . " WHERE  customer_id =  " . $customer_id . " ");

        return true;
    }

    public function get_all_customer_commission($txtSearch, $start_filter, $filter_number, $customer_status, $customer_group)
    {
        $all_my_sub_customer = $this->get_all_my_sub_customer();

        $str_sql = "";
        if ($customer_status != -1) {
            $str_sql .= " AND  customer.customer_status = " . $customer_status;
        }
        if ($customer_group != -1) {
            $str_sql .= " AND  customer_group.customer_group_id = " . $customer_group;
        }

        $query = $this->db->query("select DISTINCT customer.customer_id,customer.customer_code,customer.firstname,customer.lastname "
            . "    ,customer_group.name as customer_group_name,default_setting.lotto_type_id,default_setting.commission,lotto_type.lotto_type_name FROM customer "
            . "    inner join customer_group on customer.customer_group_id = customer_group.customer_group_id "
            . "    inner join default_setting on customer.customer_id = default_setting.customer_id "
            . "    inner join lotto_type on lotto_type.lotto_type_id = default_setting.lotto_type_id  "
            . "    order by customer_id asc, lotto_type_id asc "
            . " WHERE ( customer.customer_code  Like '%" . $txtSearch . "%' OR "
            . " customer.firstname Like '%" . $txtSearch . "%' OR "
            . " customer.lastname Like '%" . $txtSearch . "%' ) "
            . $str_sql
            . " AND customer.customer_id in (" . $all_my_sub_customer . ")"
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();
    }

    public function do_change_commission($customer_id, $lotto_type_id, $commission)
    {
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "default_setting` SET "
            . " commission = '" . $commission . "'"
            . " WHERE  customer_id =  " . $customer_id . " AND lotto_type_id =" . $lotto_type_id . "");

        return true;
    }

    public function get_all_customer_reward()
    {
        $all_my_sub_customer = $this->get_all_my_sub_customer();

        $query = $this->db->query("select DISTINCT customer.customer_id,customer.customer_code,customer.firstname,customer.lastname "
            . " ,customer_group.name as customer_group_name,default_setting.lotto_type_id,default_setting.reward,lotto_type.lotto_type_name FROM customer "
            . " inner join customer_group on customer.customer_group_id = customer_group.customer_group_id "
            . " inner join default_setting on customer.customer_id = default_setting.customer_id "
            . " inner join lotto_type on lotto_type.lotto_type_id = default_setting.lotto_type_id    "
            . " AND customer.customer_id in (" . $all_my_sub_customer . ")"
            . " order by customer_id asc, lotto_type_id asc"
        );

        return $query->result_array();
    }

    public function do_change_reward($customer_id, $lotto_type_id, $reward)
    {
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "default_setting` SET "
            . " reward = '" . $reward . "'"
            . " WHERE  customer_id =  " . $customer_id . " AND lotto_type_id =" . $lotto_type_id . "");

        return true;
    }

    public function do_clear_credit($customer_id)
    {
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "customer` SET "
            . " customer_balance = '0'"
            . " WHERE  customer_id in ( " . $customer_id . " ) ");
        return true;
    }

    public function get_my_percent()
    {
//        $query = $this->db->query("select * from percent_setting where customer_id= " . $this->session->customerdata("customer_id")
//        );
//
//        return $query->row_array();

        $this->db->select('*');
        $this->db->from('percent_setting');
        $this->db->where('customer_id', $this->session->customerdata("customer_id"));
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_my_credit()
    {
//        $query = $this->db->query("select customer_credit from `customer` where customer_id= " . $this->session->customerdata("customer_id")
//        );
//
//        return $query->row_array();

        $this->db->select('customer_credit');
        $this->db->from('customer');
        $this->db->where('customer_id', $this->session->customerdata("customer_id"));
        $query = $this->db->get();

        return $query->row_array();
    }

    public function update_customer_data($customer_id, $array)
    {
        $this->db->where('customer_id', $customer_id);
        $this->db->update('customer', $array);
    }

    public function get_customer_agent_percent_setting($customer_id, $lotto_type_id)
    {
//        $query = $this->db->query("select * from percent_setting where customer_id= " . $customer_id . " AND lotto_type_id = " . $lotto_type_id . " "
//        );
//
//        return $query->row_array();

        $this->db->select('*');
        $this->db->from('percent_setting');
        $this->db->where('customer_id', $customer_id);
        $this->db->where('lotto_type_id', $lotto_type_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function decrease_agent_credit($customer_credit)
    {
        $this->db->query("UPDATE `" . "" . "customer` SET "
            . " customer_credit = customer_credit -" . $customer_credit . ""
            . " WHERE customer_id = '" . (int)$this->session->customerdata("customer_id") . "'");
    }

    public function increase_agent_credit($customer_credit)
    {
        $this->db->query("UPDATE `" . "" . "customer` SET "
            . " customer_credit = customer_credit +" . $customer_credit . ""
            . " WHERE customer_id = '" . (int)$this->session->customerdata("customer_id") . "'");
    }

    public function get_customer_agent_default_setting($customer_id, $lotto_type_id)
    {
//        $query = $this->db->query("select * from default_setting where customer_id= " . $customer_id . " AND lotto_type_id = " . $lotto_type_id . " "
//        );
//        return $query->row_array();

        $this->db->select('*');
        $this->db->from('default_setting');
        $this->db->where('customer_id', $customer_id);
        $this->db->where('lotto_type_id', $lotto_type_id);
        $query = $this->db->get();

        return $query->row_array();

    }

    public function get_main_agent_for_carry($customer_id)
    {

        $this->db->select('customer.main_customer_id')
            ->from('customer')
            ->where('customer.customer_id', $customer_id);
        $data = $this->db->get();
        $main_agent = $data->row_array()['main_customer_id'];
        //return $main_agent;

        $this->db->select('customer.customer_id,customer.main_customer_id,default_setting.limit_price,default_setting.lotto_type_id')
            ->from('customer')
            ->join('default_setting', 'customer.customer_id = default_setting.customer_id')
            ->where('customer.customer_id', $main_agent);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function check_exist_customer_by_data($data)
    {
        $this->db->select('customer_id')
            ->from('customer')
            ->where(' (`customer`.`customer_firstname` ="' . $data['customer_firstname'] . '" AND `customer`.`customer_lastname` = "' . $data['customer_lastname'] . '")', NULL, FALSE)
            ->or_where('customer.customer_telephone', $data['customer_telephone'])
            ->or_where('customer.customer_line_id', $data['customer_line_id'])
            ->or_where('customer.customer_email', $data['customer_email']);
//            ->where(' OR (customer.bank_name = ' + $data['bank_name'] + ' and customer.bank_account_name = ' + $data['bank_account_name'] + ' and customer.bank_account_number = ' + $data['bank_account_number'] + ' ) ', NULL, FALSE);

        $data = $this->db->get();
        return $data->result_array();
    }

    public function check_exist_customer_name($customer_firstname, $customer_lastname)
    {
        $this->db->select('customer_id')
            ->from('customer')
            ->where(' `customer`.`customer_firstname` ="' . $customer_firstname . '" AND `customer`.`customer_lastname` = "' . $customer_lastname . '" ', NULL, FALSE);

        $data = $this->db->get();
        return $data->result_array();
    }

    public function check_exist_customer_telephone($customer_telephone)
    {
        $this->db->select('customer_id')
            ->from('customer')
            ->where('customer.customer_telephone', $customer_telephone);

        $data = $this->db->get();
        return $data->result_array();
    }

    public function check_exist_customer_line_id($customer_line_id)
    {
        $this->db->select('customer_id')
            ->from('customer')
            ->where('customer.customer_line_id', $customer_line_id);

        $data = $this->db->get();
        return $data->result_array();
    }

    public function check_exist_customer_email($customer_email)
    {
        $this->db->select('customer_id')
            ->from('customer')
            ->where('customer.customer_email', $customer_email);

        $data = $this->db->get();
        return $data->result_array();
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