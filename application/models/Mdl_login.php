<?php

class Mdl_login extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function get_user($user, $pass){
		$pass = md5($pass);
		$sql = "select a.*, b.role_name from users a left join role b on a.role_id = b.role_id 
				where (a.user_id = '$user' or a.email = '$user') and a.password = '$pass' and a.status = 1";
		return $this->db->query($sql)->result_array();
	}
	
	public function create_user($data){
		return $this->db->insert('users', $data);
	}
	
	public function check_user($key, $value){
		$sql = "select * from users where $key = '$value'";
		return $this->db->query($sql)->num_rows();
	}
	
	public function check_user_data($key, $value){
		$sql = "select * from users where $key = '$value'";
		return $this->db->query($sql)->result_array();
	}
	
	public function account_activation($token){
		$sql = "update users set status = 1 where password = '$token'";
		return $this->db->query($sql);
	}
	
	public function update($id, $data){
		$this->db->where('user_id', $id);
		return $this->db->update('users', $data);
	}
	
}


