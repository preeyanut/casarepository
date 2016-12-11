<?php

class User_model extends CI_Model
{
    //------------------  get User or agent down
    public function get_user_all()
    {
        $query = $this->db->query("SELECT * FROM user ");
        return $query->result_array();
    }

    public function get_all_my_sub_user()
    {
        $query = $this->db->query("SELECT  user_id "
            . " from    (SELECT * from user "
            . " order by main_user_id) users_sorted, "
            . " (select @previous := '" . $this->session->userdata("user_id") . "') initialisation "
            . " where   find_in_set(main_user_id, @previous) > 0 "
            . " and     @previous := concat(@previous, ',', user_id) "
        );
        $all_sub = $query->result_array();
        $group_id = "";
        foreach ($all_sub as $user) {
            if (strlen($group_id) > 0) {
                $group_id .= ",";
            }
            $group_id .= $user["user_id"];
        }

        //return $group_id;

        if ($group_id != "") {
            $query = $this->db->query(" SELECT user_id from user where user_id in ( " . $group_id . ") "
                . " AND main_user_id=" . $this->session->userdata("user_id")
            );
        } else {
            $query = $this->db->query(" SELECT user_id from user where  "
                . "  main_user_id=" . $this->session->userdata("user_id")
            );
        }


        $all_sub_user = $query->result_array();
        $group_user_id = "";
        foreach ($all_sub_user as $user) {
            if (strlen($group_user_id) > 0) {
                $group_user_id .= ",";
            }
            $group_user_id .= $user["user_id"];
        }

        return $group_user_id;
    }

    public function get_all_my_sub_user_same_as()
    {
        $query = $this->db->query("SELECT  user_id "
            . " from    (SELECT * from user "
            . " order by main_user_id) users_sorted, "
            . " (select @previous := '" . $this->session->userdata("user_id") . "') initialisation "
            . " where   find_in_set(main_user_id, @previous) > 0 "
            . " and     @previous := concat(@previous, ',', user_id) "
        );
        $all_sub = $query->result_array();
        $group_id = "";
        foreach ($all_sub as $user) {
            if (strlen($group_id) > 0) {
                $group_id .= ",";
            }
            $group_id .= $user["user_id"];
        }

        //return $group_id;

        if ($group_id != "") {
            $query = $this->db->query(" SELECT user_id from user where user_id in ( " . $group_id . ") "
                . " AND main_user_id=" . $this->session->userdata("user_id") . " AND user_group_id=3 "
            );
        } else {
            $query = $this->db->query(" SELECT user_id from user where  "
                . "  main_user_id=" . $this->session->userdata("user_id") . " AND user_group_id=3 "
            );
        }


        $all_sub_user = $query->result_array();
        $group_user_id = "";
        foreach ($all_sub_user as $user) {
            if (strlen($group_user_id) > 0) {
                $group_user_id .= ",";
            }
            $group_user_id .= $user["user_id"];
        }

        return $group_user_id;
    }

    public function get_my_sub_user()
    {
        $query = $this->db->query(" SELECT  user_id "
            . " from    (SELECT * from user "
            . " order by main_user_id) users_sorted, "
            . " (select @previous := '" . $this->session->userdata("user_id") . "') initialisation "
            . " where   find_in_set(main_user_id, @previous) > 0 "
            . " and     @previous := concat(@previous, ',', user_id) "
        );
        $all_sub = $query->result_array();
        $group_id = "";
        foreach ($all_sub as $user) {
            if (strlen($group_id) > 0) {
                $group_id .= ",";
            }
            $group_id .= $user["user_id"];
        }

        $query = $this->db->query(" SELECT user_id from user where user_id in ( " . $group_id . ") "
            . " AND user_group_id=3 "
        );

        $all_sub_user = $query->result_array();
        $group_user_id = "";
        foreach ($all_sub_user as $user) {
            if (strlen($group_id) > 0) {
                $group_user_id .= ",";
            }
            $group_user_id .= $user["user_id"];
        }

        return $group_user_id;
    }

    public function get_my_sub_agent()
    {
        $query = $this->db->query(" SELECT  user_id "
            . " from    (SELECT * from user "
            . " order by main_user_id) users_sorted, "
            . " (select @previous := '" . $this->session->userdata("user_id") . "') initialisation "
            . " where   find_in_set(main_user_id, @previous) > 0 "
            . " and     @previous := concat(@previous, ',', user_id) "
        );
        $all_sub = $query->result_array();
        $group_id = "";
        foreach ($all_sub as $user) {
            if (strlen($group_id) > 0) {
                $group_id .= ",";
            }
            $group_id .= $user["user_id"];
        }

        $query = $this->db->query(" SELECT user_id from user where user_id in ( " . $group_id . ") "
            . " AND user_group_id=2 "
        );

        $all_sub_user = $query->result_array();
        $group_user_id = "";
        foreach ($all_sub_user as $user) {
            if (strlen($group_id) > 0) {
                $group_user_id .= ",";
            }
            $group_user_id .= $user["user_id"];
        }

        return $group_user_id;
    }

    //------------------  End get User or agent down

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
            // 'image' => $data['image'],
            'user_status' => (int)$data['user_status'],
            'date_added' => date("Y-m-d H:i:s"),

            'bank' => $data['bank'],
            'bank_code' => $data['bank_code'],
            'bank_name' => $data['bank_name'],

            'user_credit' => str_replace(",", "", $data['user_credit']),
            'main_user_id' => $this->session->userdata("user_id"),

        );

        $this->db->insert('user', $data_array);
        $insert_id = $this->db->insert_id();

        $user_code = $this->get_user_code($insert_id);

        $this->db->query("UPDATE `" . "" . "user` SET "
            . " user_code = '" . $user_code . "'"
            . " WHERE user_id = '" . (int)$insert_id . "'");

        $this->decrease_agent_credit(str_replace(",", "", $data['user_credit']));

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
        $user_code = "CASABET" . $user_code;
        return $user_code;
    }

    public function add_default_setting($data, $user_id)
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
                'user_id' => $user_id,
            );

            $this->db->insert('default_setting', $data_array);
        }

        return true;
    }

    public function add_percent_setting($data, $user_id)
    {
        $this->load->library('encrypt');

        foreach ($data as $item) {

            $data_array = array(
                'lotto_type_id' => $item->lotto_type_id,
                'my_percent' => $item->my_percent,
                'sub_percent' => $item->sub_percent,
                'user_id' => $user_id,
            );

            $this->db->insert('percent_setting', $data_array);
        }

        return true;
    }

    public function get_user_credit($user_id)
    {
        $query = $this->db->query("SELECT user_credit  "
            . " FROM `user`  "
            . " WHERE user_id = '" . (int)$user_id . "'");

        return $query->row_array();
    }

    public function edit_user($user_id, $data)
    {
        $this->load->library('encryption');

        //------------------  Increase Decrease Credit
        $result_get_credit = $this->get_user_credit($user_id);
        $old_credit_user = $result_get_credit["user_credit"];

        if ($old_credit_user > floatval(str_replace(",", "", $data['user_credit']))) {
            $gab_credit = $old_credit_user - floatval(str_replace(",", "", $data['user_credit']));
            $this->increase_agent_credit($gab_credit);
        } else {
            $gab_credit = floatval(str_replace(",", "", $data['user_credit'])) - $old_credit_user;
            $this->decrease_agent_credit($gab_credit);
        }

        $this->db->query("UPDATE `" . "" . "user` SET "
            . " username = '" . $data['username'] . "'"
            . ", user_group_id = '" . (int)$data['user_group_id'] . "'"
            . ", firstname = '" . $data['firstname'] . "'"
            . ", lastname = '" . $data['lastname'] . "'"
            . ", user_email = '" . $data['user_email'] . "'"
            . ", user_telephone = '" . $data['user_telephone'] . "'"

            . ", user_status = '" . (int)$data['user_status'] . "'"

            . ", bank = '" . $data['bank'] . "'"
            . ", bank_code = '" . $data['bank_code'] . "'"
            . ", bank_name = '" . $data['bank_name'] . "'"
            . ", user_credit = '" . str_replace(",", "", $data['user_credit']) . "'"
            . " WHERE user_id = '" . (int)$user_id . "'");

    }

    public function edit_default_setting($data, $user_id)
    {
        $this->load->library('encrypt');

        foreach ($data as $item) {

            $this->db->query("UPDATE `" . "" . "default_setting` SET "
                . " minimum = '" . $item->minimum . "'"
                . ", maximum = '" . $item->maximum . "'"
                . ", limit_price = '" . $item->maximum . "'"
                . ", reward = '" . $item->reward . "'"
                . ", commission = '" . $item->commission . "'"
                . " WHERE user_id = '" . (int)$user_id . "' AND lotto_type_id=" . $item->lotto_type_id);
        }

        return true;
    }

    public function edit_percent_setting($data, $user_id)
    {
        $this->load->library('encrypt');

        //echo var_dump($data);

        foreach ($data as $item) {

            $this->db->query("UPDATE `" . "" . "percent_setting` SET "
                . " my_percent = '" . $item->my_percent . "'"
                . ", sub_percent = '" . $item->sub_percent . "'"
                . " WHERE user_id = '" . (int)$user_id . "' AND lotto_type_id=" . $item->lotto_type_id);

        }

        return true;
    }

    public function update_image($user_id, $urlImage)
    {

        $this->db->query("UPDATE `" . "" . "user` SET "
            . " image = '" . $urlImage . "' WHERE user_id = '" . (int)$user_id . "'");

        return true;
    }

    public function edit_password($user_id, $password)
    {
        $this->db->query("UPDATE `" . "" . "user` SET salt = '" . $this->db->escape($salt = token(9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($password)))) . "', code = '' WHERE user_id = '" . (int)$user_id . "'");
    }

    public function edit_code($email, $code)
    {
        $this->db->query("UPDATE `" . "" . "user` SET code = '" . $this->db->escape($code) . "' WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");
    }

    public function delete_user($user_id)
    {
        $this->db->query("DELETE FROM `" . "" . "user` WHERE user_id = '" . (int)$user_id . "'");
    }

    public function get_user($user_id)
    {
        $query = $this->db->query("SELECT u.*, user_group.user_group_id , user_group.name as user_group_name  "
            . " FROM `" . "" . "user` u " . " inner join user_group on u.user_group_id = user_group.user_group_id"
            . " WHERE u.user_id = '" . (int)$user_id . "'");

        return $query->row_array();
    }

    public function get_all_user()
    {
        $all_my_sub_user = $this->get_all_my_sub_user();

        $query = $this->db->query("SELECT *, (SELECT ug.name FROM `" . ""
            . "user_group` ug WHERE ug.user_group_id = u.user_group_id) AS user_group_name FROM `" . "" . "user` u  "
            . " WHERE u.user_id in (" . $all_my_sub_user . ")"
        );

        return $query->result_array();
    }

    public function get_all_user_same_as()
    {
        $all_my_sub_user = $this->get_all_my_sub_user_same_as();

        $query = $this->db->query("SELECT *, (SELECT ug.name FROM `" . ""
            . "user_group` ug WHERE ug.user_group_id = u.user_group_id) AS user_group_name FROM `" . "" . "user` u  "
            . " WHERE u.user_id in (" . $all_my_sub_user . ")"
        );

        return $query->result_array();
    }

    public function get_all_user_agent()
    {
        $query = $this->db->query("SELECT * FROM `" . "" . "user` WHERE `user`.user_status < 3 ");
        return $query->result_array();
    }

    public function get_user_by_username($username)
    {
        $query = $this->db->query("SELECT * FROM `" . "" . "user` WHERE username = " . $this->db->escape($username) . "");
        return $query->result_array();
    }

    public function search_user($txtSearch)
    {
        $query = $this->db->query("SELECT DISTINCT * FROM `" . "" . "user` WHERE user_id Like '%" . $txtSearch . "%' OR "
            . " firstname Like '%" . $txtSearch . "%' OR "
            . " lastname Like '%" . $txtSearch . "%' ");
        return $query->result_array();
    }

    public function get_user_by_code($code)
    {
        $query = $this->db->query("SELECT * FROM `" . "" . "user` WHERE code = '" . $this->db->escape($code) . "' AND code != ''");

        return $query->result_array;
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
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user`");

        //echo var_dump($query->result_array());

        $result = $query->result_array();

//        return $query->result_array['total'];

        return $result;
    }

    public function get_total_users_same_as()
    {
        $all_my_sub_user = $this->get_all_my_sub_user_same_as();
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user` " . " where user_id in (" . $all_my_sub_user . ")");
        $result = $query->result_array();
        return $result;
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
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user` WHERE user_group_id = '" . (int)$user_group_id . "'");

        return $query->result_array['total'];
    }

    public function get_total_users_by_email($email)
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user` WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

        return $query->result_array['total'];
    }

    public function search_user_filter($txtSearch, $start_filter, $filter_number, $user_status, $user_group)
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
        $query = $this->db->query("SELECT DISTINCT user.* ,user_group.name AS user_group_name  "
            . " from user "
            . " inner join user_group on user_group.user_group_id = user.user_group_id "
            . " WHERE ( user.user_code  Like '%" . $txtSearch . "%' OR "
            . " user.firstname Like '%" . $txtSearch . "%' OR "
            . " user.lastname Like '%" . $txtSearch . "%' OR "
            . " user.user_telephone Like '%" . $txtSearch . "%' ) "
            . $str_sql
            . " AND user.user_id in (" . $all_my_sub_user . ")"
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

        return $query->result_array();
    }

    public function search_user_filter_same_as($txtSearch, $start_filter, $filter_number, $user_status, $user_group)
    {
        $all_my_sub_user = $this->get_all_my_sub_user_same_as();

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
        $query = $this->db->query("SELECT DISTINCT user.* ,user_group.name AS user_group_name  "
            . " from user "
            . " inner join user_group on user_group.user_group_id = user.user_group_id "
            . " WHERE ( user.user_code  Like '%" . $txtSearch . "%' OR "
            . " user.firstname Like '%" . $txtSearch . "%' OR "
            . " user.lastname Like '%" . $txtSearch . "%' OR "
            . " user.user_telephone Like '%" . $txtSearch . "%' ) "
            . $str_sql
            . " AND user.user_id in (" . $all_my_sub_user . ")"
            . " Limit " . $start_filter . ", " . $filter_number . " "
        );

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
        $query = $this->db->query("select * from percent_setting where user_id= " . $this->session->userdata("user_id")
        );

        return $query->row_array();
    }

    public function get_my_credit()
    {
        $query = $this->db->query("select user_credit from `user` where user_id= " . $this->session->userdata("user_id")
        );

        return $query->row_array();
    }

    public function update_user_data($user_id, $array)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $array);
    }

    public function get_user_agent_percent_setting($user_id, $lotto_type_id)
    {
        $query = $this->db->query("select * from percent_setting where user_id= " . $user_id . " AND lotto_type_id = " . $lotto_type_id . " "
        );

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
        $query = $this->db->query("select * from default_setting where user_id= " . $user_id . " AND lotto_type_id = " . $lotto_type_id . " "
        );
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

}