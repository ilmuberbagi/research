<?php

/**
 * Model grant - researc FTUI
 * author : sabbana
 * company : ilmuberbagi
 * date create : 17/07/2016
 */
 
class Mdl_grant extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	# general crud
	public function insert($table, $data){
		return $this->db->insert($table, $data);
	}
	
	public function update($table, $param=array(), $data){
		$this->db->where($param[0], $param[1]);
		return $this->db->update($table, $data);
	}
	
	public function delete($table, $param=array()){
		$this->db->where($param[0], $param[1]);
		return $this->db->delete($table);
	}

	# grants
	public function get_all_grant($role, $uid, $dept_id = '', $year =''){
		$filter = "";
		if($dept_id !== "" && $year !== "")
			$filter = "where a.department_id = '$dept_id' and a.grant_year = '$year'";
		else if($dept_id == "" && $year !== "")
			$filter = "where a.grant_year = '$year'";
		else if($dept_id !== "" && $year == "")
			$filter = "where a.department_id = '$dept_id'";
				
		if($role == 3 || $role == 4){
			$sql = "select * from grants a left join department b on a.department_id = b.department_id where user_id = '$uid' 
					order by a.date_input DESC";
		}else{
			$sql = "select * from grants a left join department b on a.department_id = b.department_id ".$filter." order by a.date_input DESC";
		}
		return $this->db->query($sql)->result_array();
	}

	public function get_all_grant_report($role, $uid, $dept_id = '', $year =''){
		$filter = "";
		if($dept_id !== "" && $year !== "")
			$filter = "where a.department_id = '$dept_id' and a.grant_year = '$year'";
		else if($dept_id == "" && $year !== "")
			$filter = "where a.grant_year = '$year'";
		else if($dept_id !== "" && $year == "")
			$filter = "where a.department_id = '$dept_id'";
				
		if($role == 3 || $role == 4){
			$sql = "select * from grants a left join department b on a.department_id = b.department_id 
					left join grants_detail c on a.grant_id = c.grant_id
					order by a.date_input DESC";
		}else{
			$sql = "select * from grants a left join department b on a.department_id = b.department_id 
					left join grants_detail c on a.grant_id = c.grant_id ".$filter." order by a.date_input DESC";
		}
		return $this->db->query($sql)->result_array();
	}

	public function current_grant($id){
		$sql = "select * from grants a left join grants_detail b on a.grant_id = b.grant_id where a.grant_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
		
	public function get_name_from_user_id($uid){
		$sql = "select name from users where user_id = '$uid'";
		$data = $this->db->query($sql)->result_array();
		return $data[0]['name'];
	}
	
}


