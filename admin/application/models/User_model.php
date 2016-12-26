<?php

class User_model extends CI_Model
{
    public function add_user($data)
    {
        $this->load->library('encrypt');

        $data_array = array(
            'username' => $data['username'],
            'user_group_id' => (int)$data['user_group_id'],
            'password' => $this->encrypt->encode($data['password']),
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'user_email' => $data['user_email'],
            'user_telephone' => $data['user_telephone'],
            'user_status' => (int)$data['user_status'],

            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata("user_id"),
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->insert('user', $data_array);
        $insert_id = $this->db->insert_id();

        $sql_data = json_encode($data_array);
        $this->add_log('add', 'user', (int)$insert_id, $sql_data);

        $user_code = $this->get_user_code($insert_id);

        $this->db->query("UPDATE `" . "" . "user` SET "
            . " user_code = '" . $user_code . "'"
            . " WHERE user_id = '" . (int)$insert_id . "'");

//        $this->decrease_agent_credit(str_replace(",", "", $data['user_credit']));

        return $insert_id;
    }

    public function get_user_code($user_id)
    {
        $user_code = "";
        if (strlen($user_id) < 4) {
            $user_code .= "0" . $user_id;
            if (strlen($user_id) < 3) {
                $user_code = "0" . $user_code;
                if (strlen($user_id) < 2) {
                    $user_code = "0" . $user_code;
                }
            }
        } else {
            $user_code = $user_id;
        }
        $user_code = "ADMIN" . $user_code;
        return $user_code;
    }

    public function edit_user($user_id, $data)
    {
        $this->load->library('encrypt');

        $data_array = array(
            'username' => $data['username'],
            'user_group_id' => (int)$data['user_group_id'],
            'password' => $this->encrypt->encode($data['password']),
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'user_email' => $data['user_email'],
            'user_telephone' => $data['user_telephone'],
            'user_status' => (int)$data['user_status'],

            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata("user_id")
        );

        $this->db->where('user_id', $user_id);
        $result = $this->db->update('user', $data_array);

        $sql_data = json_encode($data_array);
        $this->add_log('edit', 'user', (int)$user_id, $sql_data);

        return $result;
    }

    public function edit_password($user_id, $password)
    {
//        $this->db->query("UPDATE `" . "" . "user` SET salt = '" . $this->db->escape($salt = token(9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($password)))) . "', code = '' WHERE user_id = '" . (int)$user_id . "'");

        $password_data = array(
            'salt' => $this->db->escape($salt = token(9)),
            'password' => $this->db->escape(sha1($salt . sha1($salt . sha1($password)))),
            'code' => ''
        );

        $this->db->where('user_id', (int)$user_id);
        $this->db->update('user', $password_data);

    }

    public function edit_code($email, $code)
    {
//        $this->db->query("UPDATE `" . "" . "user` SET code = '" . $this->db->escape($code) . "' WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

        $code_data = array(
            'code' => $this->db->escape($code)
        );

        $this->db->where('LCASE(email)', $this->db->escape(utf8_strtolower($email)));
        $this->db->update('user', $code_data);
    }

    public function delete_user($user_id)
    {
//        $this->db->query("DELETE FROM `" . "" . "user` WHERE user_id = '" . (int)$user_id . "'");

        $sql_data = 'delete data';
        $this->add_log('delete', 'user', $user_id, $sql_data);

        $this->db->where('user_id', $user_id);
        $this->db->delete('user');
    }

    public function get_user($user_id)
    {
//        $query = $this->db->query("SELECT u.*, user_group.user_group_id , user_group.name as user_group_name  "
//            . " FROM `" . "" . "user` u " . " inner join user_group on u.user_group_id = user_group.user_group_id"
//            . " WHERE u.user_id = '" . (int)$user_id . "'");
//
//        return $query->row_array();

        $this->db->select('u.*, user_group.user_group_id, user_group.name as user_group_name');
        $this->db->from('user u');
        $this->db->join('user_group', 'u.user_group_id = user_group.user_group_id', 'inner');
        $this->db->where('u.user_id', (int)$user_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_all_user()
    {
////        $all_my_sub_user = $this->get_all_my_sub_user();
//
//        $query = $this->db->query("SELECT *, (SELECT ug.name FROM `" . ""
//            . "user_group` ug WHERE ug.user_group_id = u.user_group_id) AS user_group_name FROM `" . "" . "user` u  "
////            . " WHERE u.user_id in (" . $all_my_sub_user . ")"
//        );
//
//        return $query->result_array();

        $this->db->select('*,(SELECT ug.name FROM user_group ug WHERE ug.user_group_id = u.user_group_id) AS user_group_name ');
        $this->db->from('user u');
        $query = $this->db->get();

        return $query->result_array();

    }

    public function get_all_user_same_as()
    {
        $all_my_sub_user = $this->get_all_my_sub_user_same_as();

//        $query = $this->db->query("SELECT *, (SELECT ug.name FROM `" . ""
//            . "user_group` ug WHERE ug.user_group_id = u.user_group_id) AS user_group_name FROM `" . "" . "user` u  "
//            . " WHERE u.user_id in (" . $all_my_sub_user . ")"
//        );
//
//        return $query->result_array();

        $this->db->select('*,(SELECT ug.name FROM user_group ug WHERE ug.user_group_id = u.user_group_id) AS user_group_name ');
        $this->db->from('user u');
        $this->db->where_in('u.user_id', (int)$all_my_sub_user);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_all_user_agent()
    {
//        $query = $this->db->query("SELECT * FROM `" . "" . "user` WHERE `user`.user_status < 3 ");
//        return $query->result_array();

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user <', 3);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_user_by_username($username)
    {
//        $query = $this->db->query("SELECT * FROM `" . "" . "user` WHERE username = " . $this->db->escape($username) . "");
//        return $query->result_array();

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $this->db->escape($username));
        $query = $this->db->get();

        return $query->result_array();

    }

    public function search_user($txtSearch)
    {
//        $query = $this->db->query("SELECT DISTINCT * FROM `" . "" . "user` WHERE user_id Like '%" . $txtSearch . "%' OR "
//            . " firstname Like '%" . $txtSearch . "%' OR "
//            . " lastname Like '%" . $txtSearch . "%' ");
//        return $query->result_array();

        $this->db->select('*');
        $this->db->from('user');
        $this->db->like('user_id', $txtSearch);
        $this->db->like('firstname', $txtSearch);
        $this->db->like('lastname', $txtSearch);
        $query = $this->db->get();

        return $query->result_array();

    }

    public function get_user_by_code($code)
    {
//        $query = $this->db->query("SELECT * FROM `" . "" . "user` WHERE code = '" . $this->db->escape($code) . "' AND code != ''");
//
//        return $query->result_array;

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('code', $this->db->escape($code));
        $this->db->where('code !=', '');
        $query = $this->db->get();

        return $query->result_array();

    }

    public function get_users($data = array())
    {
        $sql = "SELECT * FROM `" . "" . "user`";

        $sort_data = array(
            'username',
            'status',
            'date_added'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY username";
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

    public function get_total_users()
    {
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user`");
//
//        //echo var_dump($query->result_array());
//
//        $result = $query->result_array();
//
////        return $query->result_array['total'];
//
//        return $result;

        $this->db->select('count(*) as total ');
        $this->db->from('user');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_users_same_as()
    {
        $all_my_sub_user = $this->get_all_my_sub_user_same_as();
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user` " . " where user_id in (" . $all_my_sub_user . ")");
//        $result = $query->result_array();
//        return $result;

        $this->db->select('count(*) as total');
        $this->db->from('user');
        $this->db->where_in('user_id', $all_my_sub_user);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_under_user($main_user_id)
    {
        $this->db->select('*')
            ->from('user')
            ->join('user_group', 'user.user_group_id = user_group.user_group_id')
            ->where('main_user_id', $main_user_id);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_total_users_by_group_id($user_group_id)
    {
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user` WHERE user_group_id = '" . (int)$user_group_id . "'");
//
//        return $query->result_array['total'];

        $this->db->select('count(*) as total');
        $this->db->from('user');
        $this->db->where_in('user_group_id', (int)$user_group_id);
        $query = $this->db->get();

        return $query->result_array['total'];
    }

    public function get_total_users_by_email($email)
    {
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user` WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");
//
//        return $query->result_array['total'];

        $this->db->select('count(*) as total');
        $this->db->from('user');
        $this->db->where_in('LCASE(email)', $this->db->escape(utf8_strtolower($email)));
        $query = $this->db->get();

        return $query->result_array['total'];
    }

    public function search_user_filter($txtSearch, $start_filter, $filter_number, $user_status, $user_group)
    {
////        $all_my_sub_user = $this->get_all_my_sub_user();
//
//        $str_sql = "";
//        if ($user_status != -1) {
//            $str_sql .= " AND  user.user_status = " . $user_status;
//        }
//        if ($user_group != -1) {
//            $str_sql .= " AND  user_group.user_group_id = " . $user_group;
//        }
////        if ($all_my_sub_user === '') {
////            return array();
////        }
//        $query = $this->db->query("SELECT DISTINCT user.* ,user_group.name AS user_group_name  "
//            . " from user "
//            . " inner join user_group on user_group.user_group_id = user.user_group_id "
//            . " WHERE ( user.user_code  Like '%" . $txtSearch . "%' OR "
//            . " user.firstname Like '%" . $txtSearch . "%' OR "
//            . " user.lastname Like '%" . $txtSearch . "%' OR "
//            . " user.user_telephone Like '%" . $txtSearch . "%' ) "
//            . $str_sql
////            . " AND user.user_id in (" . $all_my_sub_user . ")"
//            . " Limit " . $start_filter . ", " . $filter_number . " "
//        );
//
//        return $query->result_array();

        $this->db->select('user.*,user_group.name AS user_group_name');
        $this->db->from('user');
        $this->db->join('user_group', 'user_group.user_group_id = user.user_group_id', 'inner');
        if ($user_status != '-1') {
            $this->db->where('user.user_status', $user_status);
        }
        if ($user_group != '-1') {
            $this->db->where('user_group.user_group_id', $user_group);
        }
        $this->db->like('user.user_code', $txtSearch);
        $this->db->like('user.firstname', $txtSearch);
        $this->db->like('user.lastname', $txtSearch);
        $this->db->like('user.user_telephone', $txtSearch);
        $this->db->limit($filter_number, $start_filter);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function search_user_filter_same_as($txtSearch, $start_filter, $filter_number, $user_status, $user_group)
    {
        $all_my_sub_user = $this->get_all_my_sub_user_same_as();
//
//        $str_sql = "";
//        if ($user_status != -1) {
//            $str_sql .= " AND  user.user_status = " . $user_status;
//        }
//        if ($user_group != -1) {
//            $str_sql .= " AND  user_group.user_group_id = " . $user_group;
//        }
//        if ($all_my_sub_user === '') {
//            return array();
//        }
//        $query = $this->db->query("SELECT DISTINCT user.* ,user_group.name AS user_group_name  "
//            . " from user "
//            . " inner join user_group on user_group.user_group_id = user.user_group_id "
//            . " WHERE ( user.user_code  Like '%" . $txtSearch . "%' OR "
//            . " user.firstname Like '%" . $txtSearch . "%' OR "
//            . " user.lastname Like '%" . $txtSearch . "%' OR "
//            . " user.user_telephone Like '%" . $txtSearch . "%' ) "
//            . $str_sql
//            . " AND user.user_id in (" . $all_my_sub_user . ")"
//            . " Limit " . $start_filter . ", " . $filter_number . " "
//        );
//
//        return $query->result_array();

        $this->db->select('user.*,user_group.name AS user_group_name');
        $this->db->from('user');
        $this->db->join('user_group', 'user_group.user_group_id = user.user_group_id', 'inner');
        if ($user_status != '-1') {
            $this->db->where('user.user_status', $user_status);
        }
        if ($user_group != '-1') {
            $this->db->where('user_group.user_group_id', $user_group);
        }
        if ($all_my_sub_user === '') {
            return array();
        }
        $this->db->where_in('user.user_id', $all_my_sub_user);
        $this->db->like('user.user_code', $txtSearch);
        $this->db->like('user.firstname', $txtSearch);
        $this->db->like('user.lastname', $txtSearch);
        $this->db->like('user.user_telephone', $txtSearch);
        $this->db->limit($filter_number, $start_filter);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_users_by_search($txtSearch, $start_filter, $filter_number, $user_status, $user_group)
    {
        $all_my_sub_user = $this->get_all_my_sub_user();

        $str_sql = "";
        if ($user_status != -1) {
            $str_sql .= " AND  user.user_status = " . $user_status;
        }
        if ($user_group != -1) {
            $str_sql .= " AND  user_group.user_group_id = " . $user_group;
        }
        if ($all_my_sub_user === '') {
            return array();
        }
        $query = $this->db->query("SELECT DISTINCT *, COUNT(*) AS total FROM `" . "" . "user` "
            . " inner join user_group on user_group.user_group_id = user.user_group_id "
            . " WHERE ( user.user_code  Like '%" . $txtSearch . "%' OR "
            . " user.firstname Like '%" . $txtSearch . "%' OR "
            . " user.lastname Like '%" . $txtSearch . "%' OR "
            . " user.user_telephone Like '%" . $txtSearch . "%' ) "
            . $str_sql
            . " AND user.user_id in (" . $all_my_sub_user . ") "
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

//        $result=  $query->row_array();
//        echo "-----".$txtSearch."------".$result["total"];
        return $query->row_array('total');
    }

    public function check_password($password)
    {
        $this->load->library('encrypt');

        $query = $this->db->query("SELECT * FROM `" . "" . "user` "
            . " WHERE  user_id =  " . $this->session->userdata('user_id') . " "

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

        $this->db->query("UPDATE `" . "" . "user` SET "
            . " password = '" . $this->encrypt->encode($password) . "'"
            . " WHERE  user_id =  " . $this->session->userdata('user_id') . " ");

        return true;
    }

    public function do_change_credit($user_id, $user_credit)
    {
        $this->load->library('encrypt');

        $result_get_credit = $this->get_user_credit($user_id);
        $old_credit_user = $result_get_credit["user_credit"];

        if ($old_credit_user > $user_credit) {
            $gab_credit = $old_credit_user - $user_credit;
            $this->increase_agent_credit($gab_credit);
        } else {
            $gab_credit = $user_credit - $old_credit_user;
            $this->decrease_agent_credit($gab_credit);
        }

        $this->db->query("UPDATE `" . "" . "user` SET "
            . " user_credit = '" . $user_credit . "'"
            . " WHERE  user_id =  " . $user_id . " ");

        return true;
    }

    public function get_all_user_commission($txtSearch, $start_filter, $filter_number, $user_status, $user_group)
    {
        $all_my_sub_user = $this->get_all_my_sub_user();

        $str_sql = "";
        if ($user_status != -1) {
            $str_sql .= " AND  user.user_status = " . $user_status;
        }
        if ($user_group != -1) {
            $str_sql .= " AND  user_group.user_group_id = " . $user_group;
        }

        $query = $this->db->query("select DISTINCT user.user_id,user.user_code,user.firstname,user.lastname "
            . "    ,user_group.name as user_group_name,default_setting.lotto_type_id,default_setting.commission,lotto_type.lotto_type_name FROM user "
            . "    inner join user_group on user.user_group_id = user_group.user_group_id "
            . "    inner join default_setting on user.user_id = default_setting.user_id "
            . "    inner join lotto_type on lotto_type.lotto_type_id = default_setting.lotto_type_id  "
            . "    order by user_id asc, lotto_type_id asc "
            . " WHERE ( user.user_code  Like '%" . $txtSearch . "%' OR "
            . " user.firstname Like '%" . $txtSearch . "%' OR "
            . " user.lastname Like '%" . $txtSearch . "%' ) "
            . $str_sql
            . " AND user.user_id in (" . $all_my_sub_user . ")"
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();
    }

    public function do_change_commission($user_id, $lotto_type_id, $commission)
    {
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "default_setting` SET "
            . " commission = '" . $commission . "'"
            . " WHERE  user_id =  " . $user_id . " AND lotto_type_id =" . $lotto_type_id . "");

        return true;
    }

    public function get_all_user_reward()
    {
        $all_my_sub_user = $this->get_all_my_sub_user();

        $query = $this->db->query("select DISTINCT user.user_id,user.user_code,user.firstname,user.lastname "
            . " ,user_group.name as user_group_name,default_setting.lotto_type_id,default_setting.reward,lotto_type.lotto_type_name FROM user "
            . " inner join user_group on user.user_group_id = user_group.user_group_id "
            . " inner join default_setting on user.user_id = default_setting.user_id "
            . " inner join lotto_type on lotto_type.lotto_type_id = default_setting.lotto_type_id    "
            . " AND user.user_id in (" . $all_my_sub_user . ")"
            . " order by user_id asc, lotto_type_id asc"
        );

        return $query->result_array();
    }

    public function do_change_reward($user_id, $lotto_type_id, $reward)
    {
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "default_setting` SET "
            . " reward = '" . $reward . "'"
            . " WHERE  user_id =  " . $user_id . " AND lotto_type_id =" . $lotto_type_id . "");

        return true;
    }

    public function do_clear_credit($user_id)
    {
        $this->load->library('encrypt');

        $this->db->query("UPDATE `" . "" . "user` SET "
            . " user_balance = '0'"
            . " WHERE  user_id in ( " . $user_id . " ) ");
        return true;
    }

    public function get_my_percent()
    {
//        $query = $this->db->query("select * from percent_setting where user_id= " . $this->session->userdata("user_id")
//        );
//
//        return $query->row_array();

        $this->db->select('*');
        $this->db->from('percent_setting');
        $this->db->where('user_id', $this->session->userdata("user_id"));
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_my_credit()
    {
//        $query = $this->db->query("select user_credit from `user` where user_id= " . $this->session->userdata("user_id")
//        );
//
//        return $query->row_array();

        $this->db->select('user_credit');
        $this->db->from('user');
        $this->db->where('user_id', $this->session->userdata("user_id"));
        $query = $this->db->get();

        return $query->row_array();
    }

    public function update_user_data($user_id, $array)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $array);
    }

    public function get_user_agent_percent_setting($user_id, $lotto_type_id)
    {
//        $query = $this->db->query("select * from percent_setting where user_id= " . $user_id . " AND lotto_type_id = " . $lotto_type_id . " "
//        );
//
//        return $query->row_array();

        $this->db->select('*');
        $this->db->from('percent_setting');
        $this->db->where('user_id', $user_id);
        $this->db->where('lotto_type_id', $lotto_type_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function decrease_agent_credit($user_credit)
    {
        $this->db->query("UPDATE `" . "" . "user` SET "
            . " user_credit = user_credit -" . $user_credit . ""
            . " WHERE user_id = '" . (int)$this->session->userdata("user_id") . "'");
    }

    public function increase_agent_credit($user_credit)
    {
        $this->db->query("UPDATE `" . "" . "user` SET "
            . " user_credit = user_credit +" . $user_credit . ""
            . " WHERE user_id = '" . (int)$this->session->userdata("user_id") . "'");
    }

    public function get_user_agent_default_setting($user_id, $lotto_type_id)
    {
//        $query = $this->db->query("select * from default_setting where user_id= " . $user_id . " AND lotto_type_id = " . $lotto_type_id . " "
//        );
//        return $query->row_array();

        $this->db->select('*');
        $this->db->from('default_setting');
        $this->db->where('user_id', $user_id);
        $this->db->where('lotto_type_id', $lotto_type_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_main_agent_for_carry($user_id)
    {

        $this->db->select('user.main_user_id')
            ->from('user')
            ->where('user.user_id', $user_id);
        $data = $this->db->get();
        $main_agent = $data->row_array()['main_user_id'];
        //return $main_agent;

        $this->db->select('user.user_id,user.main_user_id,default_setting.limit_price,default_setting.lotto_type_id')
            ->from('user')
            ->join('default_setting', 'user.user_id = default_setting.user_id')
            ->where('user.user_id', $main_agent);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function search_filter($txtSearch, $start_filter, $filter_number, $user_status, $user_group)
    {
//        $str_sql = "";
//        $limit = '';
//        if ($user_status != '-1' && $user_status != '') {
//            $str_sql .= " AND  user.user_status = " . $user_status;
//        }
//        if ($user_group != '-1' && $user_group != '') {
//            $str_sql .= " AND  ug.user_group_id = " . $user_group;
//        }
//        if ($start_filter !== 0 && $filter_number !== 0) {
//            $limit = " Limit " . $start_filter . ", " . $filter_number . " ";
//        }
//
//        $query = $this->db->query("SELECT user.*,CONCAT(u1.firstname, ' ', u1.lastname) as create_by_name "
//            . " ,CONCAT(u2.firstname, ' ', u2.lastname)  as update_by_name ,ug.name as user_group_name "
//            . " from user "
//            . " inner join  user as u1 on u1.user_id = user.create_by "
//            . " inner join  user as u2 on u2.user_id = user.update_by "
//            . " inner join  user_group as ug on ug.user_group_id = user.user_group_id "
//            . " WHERE  "
//            . " ( user.username  Like '%" . $txtSearch . "%' "
//            . " OR  user.firstname  Like '%" . $txtSearch . "%' "
//            . " OR  user.lastname  Like '%" . $txtSearch . "%' "
//            . " OR  user.user_email  Like '%" . $txtSearch . "%' "
//            . " OR  user.user_telephone  Like '%" . $txtSearch . "%' ) "
//
//            . $str_sql
//            . $limit
//        );
//
//        return $query->result_array();

        $this->db->select('user.*,CONCAT(u1.firstname ,\' \' , u1.lastname) as create_by_name,CONCAT(u2.firstname ,\' \' , u2.lastname)  as update_by_name,ug.name as user_group_name');
        $this->db->from('user');
        $this->db->join('user as u1', 'u1.user_id = user.create_by', 'inner');
        $this->db->join('user as u2', 'u2.user_id = user.update_by', 'inner');
        $this->db->join('user_group as ug', 'ug.user_group_id = user.user_group_id', 'inner');
        if ($user_status != '-1' && $user_status != '') {
            $this->db->where('user.user_status', $user_status);
        }
        if ($user_group != '-1' && $user_group != '') {
            $this->db->where('ug.user_group_id', $user_group);
        }
        $this->db->like('user.username', $txtSearch);
        $this->db->like('user.firstname', $txtSearch);
        $this->db->like('user.lastname', $txtSearch);
        $this->db->like('user.user_email', $txtSearch);
        $this->db->like('user.user_telephone', $txtSearch);
        if ($start_filter != 0 && $filter_number != 0) {
            $this->db->limit($filter_number, $start_filter);
        }
        $query = $this->db->get();

        return $query->result_array();

    }

    public function count()
    {
//        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user`");
//
//        $result = $query->result_array();
//
//        return $result;

        $this->db->select('count(*) as total ');
        $this->db->from('user');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_by_search($txtSearch, $start_filter, $filter_number, $filter_status)
    {

        $str_sql = "";
        if ($filter_status != "" || $filter_status != 'undefined') {
            $str_sql .= " AND  user_status = 1";
        }

        $query = $this->db->query("SELECT DISTINCT *, (select count(*) from user "
            . " WHERE  user.username  Like '%" . $txtSearch . "%' "
            . " OR  user.firstname  Like '%" . $txtSearch . "%' "
            . " OR  user.lastname  Like '%" . $txtSearch . "%' "
            . " OR  user.user_email  Like '%" . $txtSearch . "%' "
            . " OR  user.user_telephone  Like '%" . $txtSearch . "%' "
            . " ) as total FROM `" . "" . "user` as main_user "
            . " WHERE  main_user.username  Like '%" . $txtSearch . "%' "
            . " OR  main_user.firstname  Like '%" . $txtSearch . "%' "
            . " OR  main_user.lastname  Like '%" . $txtSearch . "%' "
            . " OR  main_user.user_email  Like '%" . $txtSearch . "%' "
            . " OR  main_user.user_telephone  Like '%" . $txtSearch . "%' "

            . $str_sql
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->row_array('total');
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