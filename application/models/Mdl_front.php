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
		$sql = "select * from news where status = 1 order by date_posted DESC";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_news_5(){
		$sql = "select * from news where status = 1 order by date_posted DESC limit 0,5";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_current_news($id){
		$sql = "select * from news where news_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function slideshow(){
		$sql = "select * from slideshow where status = 1 order by posted DESC";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_video(){
		$sql = "select * from video where status = 1 order by last_updated DESC";
		return $this->db->query($sql)->result_array();
	}
	
	
	
}


