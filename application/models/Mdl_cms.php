<?php

class Mdl_cms extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	
	# info model
	public function get_info(){
		$sql = "select * from information";
		return $this->db->query($sql)->result_array();
	}
	
	# news model
	public function get_news(){
		$sql = "select a.*, b.name from news a left join users b on a.user_id = b.user_id
				order by a.last_updated DESC";
		return $this->db->query($sql)->result_array();
	}
	
	public function count_news(){
		$sql = "select * from news";
		return $this->db->query($sql)->num_rows();
	}
	
	public function current_news($id){
		$sql = "select * from news where news_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	# slide model
	public function get_slide(){
		$sql = "select * from slideshow order by posted DESC";
		return $this->db->query($sql)->result_array();
	}
	
	public function count_slide(){
		$sql = "select * from slideshow";
		return $this->db->query($sql)->num_rows();
	}
	
	public function current_slide($id){
		$sql = "select * from slideshow where slide_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	# video model
	public function get_video(){
		$sql = "select a.*, b.name from video a left join users b on a.added_by = b.user_id
				order by a.last_updated DESC";
		return $this->db->query($sql)->result_array();
	}
	
	public function count_video(){
		$sql = "select * from video order by last_updated DESC";
		return $this->db->query($sql)->num_rows();
	}
	
	public function current_video($id){
		$sql = "select * from video where video_id = '$id'";
		return $this->db->query($sql)->result_array();
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
	
	# research data
	public function get_research_data(){
		$sql = "select a.*, b.field_name from  research_proposal a 
				left join research_field b on a.field_id = b.field_id order by date_input DESC";
		return $this->db->query($sql)->result_array();
	}

	public function get_research_field(){
		$sql = "select * from research_field order by field_name ASC";
		return $this->db->query($sql)->result_array();
	}
	
	public function current_research($id){
		$sql = "select a.*, b.*, c.name from research_proposal a
				left join research_field b on a.field_id = b.field_id
				left join users c on a.user_id = c.user_id 
				where a.research_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_resources(){
		$sql = "select * from resources order by date_create DESC";
		return $this->db->query($sql)->result_array();
	}
	
	public function current_resource($id){
		$sql = "select * from resources where resource_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	

	
	# mics
	# ==================================================
	public function get_department(){
		$sql = "select * from department order by department_name ASC";
		return $this->db->query($sql)->result_array();
	}
	
	#user
	public function get_user(){
		$id = $this->session->userdata('user_id');
		$sql = "select a.*, b.role_name, c.department_name from users a 
				left join role b on a.role_id = b.role_id
				left join department c on a.department_id = c.department_id
				where a.user_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
}


