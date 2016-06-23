<?php

class Mdl_front extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	# general information
	public function get_information(){
		$sql = "select * from information";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_news(){
		$sql = "select a.*, b.name from news a left join users b on a.user_id = b.user_id 
				where a.status = 1 order by date_posted DESC";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_news_home(){
		$sql = "select a.*, b.name from news a left join users b on a.user_id = b.user_id 
				where a.status = 1 order by date_posted DESC limit 0,10";
		return $this->db->query($sql)->result_array();
	}
	
	public function count_news($type=1){
		$sql = "select * from news where status = 1 and type='$type'";
		return $this->db->query($sql)->num_rows();
	}
	
	public function get_news_limit($type = 1, $num = 10, $offset = 0){
		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->where('type', $type);
		$this->db->order_by("date_posted", "DESC"); 
		return $this->db->get('news', $num, $offset)->result_array();
	}
	
	public function get_news_5(){
		$sql = "select a.*, b.name from news a left join users b on a.user_id = b.user_id 
				where a.status = 1 order by date_posted DESC limit 0,5";
		return $this->db->query($sql)->result_array();
	}
	
	public function popular_news(){
		$sql = "select a.*, b.name from news a left join users b on a.user_id = b.user_id 
				where a.status = 1 order by a.hit DESC limit 0,5";
		return $this->db->query($sql)->result_array();
	}
	
	public function counter_news($id){
		$sql = "update news set hit = (hit)+1 where news_id = '$id'";
		return $this->db->query($sql);
	}
	
	public function counter_resource($id){
		$sql = "update resources set viewed = (viewed)+1 where resource_id = '$id'";
		return $this->db->query($sql);
	}
	
	public function get_current_news($id){
		$sql = "select * from news where news_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function slideshow(){
		$sql = "select * from slideshow where status = 1 order by posted DESC";
		return $this->db->query($sql)->result_array();
	}
	
	# videos models
	# ===========================
	public function get_video_limit($num = 10, $offset = 0){
		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->order_by("video_id", "DESC"); 
		return $this->db->get('video', $num, $offset)->result_array();
	}

	public function get_video_5(){
		$sql = "select * from video where status = 1 order by last_updated DESC limit 0,5";
		return $this->db->query($sql)->result_array();
	}
	
	public function count_video(){
		$sql = "select * from video where status = 1";
		return $this->db->query($sql)->num_rows();
	}
	
	public function get_current_video($id){
		$sql = "select * from video where video_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	# resources
	public function get_resources(){
		$sql = "select * from resources order by date_create DESC";
		return $this->db->query($sql)->result_array();
	}
	
	public function current_resource($id){
		$sql = "select * from resources where resource_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	

	
}


