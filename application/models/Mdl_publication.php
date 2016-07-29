<?php

/**
 * Model publication - researc FTUI
 * author : sabbana
 * company : ilmuberbagi
 * date create : 17/07/2016
 */
 
class Mdl_publication extends CI_Model{

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

	# publications
	public function get_all_publication($user_id = null){
		$sql = "select a.*, b.type_name, c.department_name from publication a 
				left join publication_type b on a.pub_type_id = b.type_id 
				left join department c on a.department_id = c.department_id 
				order by a.date_input DESC";
		if($user_id != null)
			$sql = "select a.*, b.type_name, c.department_name from publication a 
				left join publication_type b on a.pub_type_id = b.type_id 
				left join department c on a.department_id = c.department_id where a.author = '$user_id'
				order by a.date_input DESC";
		return $this->db->query($sql)->result_array();
	}

	public function current_publication($id){
		$sql = "select a.*,x.*,y.*, b.type_name, c.department_name from publication a 
				left join publication_detail x on a.pub_id = x.pub_id 
				left join publication_impact_factor y on a.pub_id = y.pub_id 
				left join publication_type b on a.pub_type_id = b.type_id 
				left join department c on a.department_id = c.department_id where a.pub_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_publication_type(){
		$sql = "select * from publication_type order by type_name ASC";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_publication_author(){
		$sql = "select a.*, b.name from news a left join users b on a.user_id = b.user_id 
				where a.status = 1 order by date_posted DESC limit 0,8";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_name_from_user_id($uid){
		$sql = "select name from users where user_id = '$uid'";
		$data = $this->db->query($sql)->result_array();
		return $data[0]['name'];
	}
	
	public function get_authors($pub_id){
		$sql = "select a.*, b.department_name from users a left join department b on a.department_id = b.department_id 
				where user_id in (select author_id from publication_author where pub_id = '$pub_id')";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_users(){
		$sql = "select * from users where role_id in (3,4) order by name ASC";
		return $this->db->query($sql)->result_array();
	}
	
	
}


