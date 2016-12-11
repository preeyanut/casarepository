<?php

class Dashboard_model extends CI_Model
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

    public function get_lotto_sum_price($period_before, $last_period)
    {
        $query = $this->db->query("SELECT  "
            . "   IFNULL(sum(lotto_price),0) as sum_lotto_price "
            . " FROM `lotto_number` "
            . " Where user_id = '".$this->session->userdata("user_id")."'    "
            . " AND (lotto_date_added BETWEEN '" . $period_before . " 23:59:00' AND '" . $last_period . " 15:20:00')  "
        );

        return $query->row_array();

    }

    public function get_new_lotto_sum_price( $last_period)
    {
        $query = $this->db->query("SELECT  "
            . "   IFNULL(sum(lotto_price),0) as sum_lotto_price "
            . " FROM `lotto_number` "
            . " Where user_id = '".$this->session->userdata("user_id")."'    "
            . " AND (lotto_date_added > '" . $last_period . " 15:20:00')  "
        );

        return $query->row_array();

    }

    public function get_sum_number_carry($period_before, $last_period)
    {
        $query = $this->db->query("SELECT  "
            . "   IFNULL(sum(number_carry_price),0) as sum_lotto_price "
            . " FROM `number_carry` "
            . " Where user_id = '".$this->session->userdata("user_id")."'    "
            . " AND (number_carry_date BETWEEN '" . $period_before . " 23:59:00' AND '" . $last_period . " 15:20:00')  "
        );

        return $query->row_array();

    }

    public function get_new_sum_number_carry($last_period)
    {
        $query = $this->db->query("SELECT  "
            . "   IFNULL(sum(number_carry_price),0) as sum_lotto_price "
            . " FROM `number_carry` "
            . " Where user_id = '".$this->session->userdata("user_id")."'    "
            . " AND (number_carry_date > '" . $last_period . " 15:20:00')  "
        );

        return $query->row_array();

    }



}