<?php

/**
 * Model frontpage - researc FTUI
 * author : sabbana
 * company : ilmuberbagi
 * date create : 17/07/2016
 */

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
				where a.status = 1 order by date_posted DESC limit 0,12";
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

	public function current_user($id){
		$sql = "select * from users where user_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function counter_news($id){
		$sql = "update news set hit = (hit)+1 where news_id = '$id'";
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
		$sql = "select * from resources where enable_download = 1 order by date_create DESC";
		return $this->db->query($sql)->result_array();
	}
	
	public function current_resource($id){
		$sql = "select * from resources where resource_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
		
	public function counter_resource($id){
		$sql = "update resources set viewed = (viewed)+1 where resource_id = '$id'";
		return $this->db->query($sql);
	}
	
	# grant and publication models
	public function get_latest($param = 'grants'){
		$sql = "select * from grants a left join grants_detail b on a.grant_id = b.grant_id 
				where a.publish = 1
				order by a.date_input DESC limit 0,5";
		if($param == 'publication')
			$sql = "select * from publication a left join publication_detail b on a.pub_id = b.pub_id 
					where a.publish = 1 
					order by a.date_input DESC limit 0,5";
		return $this->db->query($sql)->result_array();
	}
	
	public function count_publication($year="", $key=""){
		$this->db->select('*');
		$this->db->join('publication_detail b', 'a.pub_id = b.pub_id', 'left');
		$this->db->where('a.publish', 1);
		if($year !== "")
			$this->db->where('b.pub_year', $year);
		
		if($key !== "")
			$this->db->where('a.title', $key);
			
		$query = $this->db->get('publication a')->num_rows();
		return $query;
		//print_r($query); die();
	}
	
	public function count_grant($year="", $key=""){
		$this->db->select('a.*, b.*');
		$this->db->join('grants_detail b', 'a.grant_id = b.grant_id', 'left');
		$this->db->where('a.publish', 1);
		if($year !== "")
			$this->db->where('a.grant_year', $year);
		
		if($key !== "")
			$this->db->where('a.research_title', $key);
			
		$this->db->order_by("a.date_input", "DESC"); 
		$query = $this->db->get('grants a')->num_rows();
		return $query;
	}
	
	public function publication($year="", $key="", $num = 10, $offset = 0){		
		$this->db->select('a.*, b.*');
		$this->db->join('publication_detail b','a.pub_id = b.pub_id','left');
		$this->db->where('a.publish', 1);
		if($year !== "")
			$this->db->where('b.pub_year', $year);
		
		if($key !== "")
			$this->db->like('a.title', $key);
			
		$this->db->order_by("a.date_input", "DESC"); 
		$query = $this->db->get('publication a', $num, $offset)->result_array();
		return $query;
	}

	public function grant($year="", $key="", $num = 10, $offset = 0){
		$this->db->select('a.*, b.*');
		$this->db->join('grants_detail b', 'a.grant_id = b.grant_id', 'left');
		$this->db->where('a.publish', 1);
		if($year !== "")
			$this->db->where('a.grant_year', $year);
		
		if($key !== "")
			$this->db->where('a.research_title', $key);
			
		$this->db->order_by("a.date_input", "DESC"); 
		$query = $this->db->get('grants a', $num, $offset)->result_array();
		return $query;
	}
	
	public function searching($key){
		$base = site_url();
		$sql = "select news_id as id, news_title as title, news_content as content, 
				concat('".$base."news/read/', news_id) as url from news where news_title like '%$key%' order by last_updated DESC limit 0, 10";
		return $this->db->query($sql)->result_array();
	}

	public function count_search($key){
		$sql = "select * from news where news_title like '%$key%'";
		return $this->db->query($sql)->num_rows();
	}

	public function count_researcher($dep = ""){		
		$sql = "select * from users where role_id = '3' and status = 1";
		if ($dep !== "" && $dep !== 'page')
			$sql = "select * from users where role_id = '3' and status = 1 and department_id = '$dep'";
		return $this->db->query($sql)->num_rows();
	}

	public function researchers($dep="", $sort="", $num = 10, $offset = 0){		
		$this->db->select('a.*, b.*');
		$this->db->join('department b','a.department_id = b.department_id','left');
		$this->db->where('a.role_id', 3);
		$this->db->where('a.status', 1);
		if($dep !== "" && $dep !== 'page')
			$this->db->where("a.department_id", $dep);
		
		if($sort == "")
			$this->db->order_by("a.name", "ASC");
		if($sort == 'department')
			$this->db->order_by("b.department_name", "ASC");
		if($sort == 'date')
			$this->db->order_by("a.date_create", "ASC");
			
		$query = $this->db->get('users a', $num, $offset)->result_array();
		return $query;
	}
	
	public function get_all_department(){
		$sql = "select * from department order by sort ASC";
		return $this->db->query($sql)->result_array();
	}
	
}


