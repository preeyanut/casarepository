<?php
class user_group_model extends CI_Model{

	public function add_user_group($data) {

		if ( !is_array($data ) || empty( $data ) ) {
			return false;
		}

		$q = $this->db->insert("user_group",$data);

		return $q;
	}

	public function edit_user_group($user_group_id, $data) {
		$this->db->where("user_group_id", $user_group_id);
		$q = $this->db->update("user_group", $data);

		return $q;

	}

	public function delete_user_group($user_group_id) {
		$this->db->query("DELETE FROM `" . "" . "user_group` WHERE user_group_id = '" . (int)$user_group_id . "'");
	}

	public function get_user_group($user_group_id) {
		$query = $this->db->query("SELECT * FROM `" . "user_group` u WHERE u.user_group_id = '" . (int)$user_group_id . "'");

		return $query->row_array();
	}

	public function get_all_user_group() {
		$query = $this->db->query("SELECT * FROM `" . "" . "user_group` u ORDER BY name ");

		return $query->result_array();
	}

	public function get_user_group_by_name($name) {
		$query = $this->db->query("SELECT * FROM `" . "" . "user_group` WHERE name = " . $this->db->escape($name) . "");
		return $query->result_array();
	}

	public function get_user_by_username($username) {
		$query = $this->db->query("SELECT * FROM `" . "" . "user` WHERE username = '" . $this->db->escape($username) . "'");

		return $query->row;
	}

	public function get_user_uy_code($code) {
		$query = $this->db->query("SELECT * FROM `" . "" . "user` WHERE code = '" . $this->db->escape($code) . "' AND code != ''");

		return $query->row;
	}

	public function get_users($data = array()) {
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

		return $query->rows;
	}

	public function get_total_users() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user`");

		return $query->row['total'];
	}

	public function get_total_users_by_group_id($user_group_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user` WHERE user_group_id = '" . (int)$user_group_id . "'");

		return $query->row['total'];
	}

	public function get_total_users_by_email($email) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . "" . "user` WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row['total'];
	}

	public function search_user_group($txtSearch) {
		$query = $this->db->query("SELECT DISTINCT * FROM `" . "" . "user_group` WHERE user_group_id Like '%" . $txtSearch . "%' OR "
			." name Like '%" . $txtSearch . "%'  ORDER BY name " );
		return $query->result_array();
	}

}