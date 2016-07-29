<?php	

class Dashboard extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role') == "") redirect('login');
		$this->load->model('Mdl_cms','cms');
		$this->load->library('lib_cms');
	}
	
	public function index(){
		$this->data['page'] = 'page/home';
		$this->data['count_slide'] = $this->cms->count_slide();
		$this->data['count_news'] = $this->cms->count_news();
		$this->data['count_video'] = $this->cms->count_video();
		$this->load->view('template', $this->data);
	}
	
	public function information(){
		$this->data['page'] = 'page/information';
		$this->data['info'] = $this->cms->get_info();
		$this->load->view('template', $this->data);
	}

	public function news(){
		$this->data['page'] = 'page/news';
		$this->data['news'] = $this->cms->get_news();
		$this->load->view('template', $this->data);		
	}
	
	public function resources(){
		$this->data['page'] = 'page/resources';
		$this->data['resources'] = $this->cms->get_resources();
		$this->load->view('template', $this->data);		
	}
	
	public function slideshow(){
		$this->data['page'] = 'page/slideshow';
		$this->data['slide'] = $this->cms->get_slide();
		$this->load->view('template', $this->data);		
	}
	
	public function research($param){
		switch ($param){
			case "video": {
				$this->data['page'] = 'page/video';
				$this->data['video'] = $this->cms->get_video();
			} break;
			case "data": {
				$this->data['page'] = 'page/research_data';
				$this->data['research'] = $this->cms->get_research_data();
			} break;
		}
		$this->load->view('template', $this->data);		
	}
	
	# crud 
	public function create($param){
		switch($param){
			case "news":{
				$this->data['title'] = 'Create News';
				$this->data['page'] = 'page/form_news';
			} break;
			case "video":{
				$this->data['title'] = 'Upload Video';
				$this->data['page'] = 'page/form_video';			
			} break;
			case "resources":{
				$this->data['title'] = 'Upload Resources';
				$this->data['page'] = 'page/fileupload';
			} break;
			case "slide":{
				$this->data['title'] = 'Create New Slide';
				$this->data['page'] = 'page/form_slide';				
			} break;
			case "researchproposal":{
				$this->data['title'] = 'Research Proposal';
				$this->data['field'] = $this->cms->get_research_field();
				$this->data['page'] = 'page/form_research';				
			} break;
		}
		$this->load->view('template', $this->data);
	}
	
	public function edit($param, $id=''){
		switch($param){
			case "news":{
				$this->data['title'] = 'Edit News';
				$this->data['news'] = $this->cms->current_news($id);
				$this->data['page'] = 'page/form_news';
			} break;
			case "video":{
				$this->data['title'] = 'Edit Video';
				$this->data['video'] = $this->cms->current_video($id);
				$this->data['page'] = 'page/form_video';				
			} break;
			case "slide":{
				$this->data['title'] = 'Edit Slide';
				$this->data['slide'] = $this->cms->current_slide($id);
				$this->data['page'] = 'page/form_slide';				
			} break;
			case "resources":{
				$this->data['title'] = 'Edit File';
				$this->data['sources'] = $this->cms->current_resource($id);
				$this->data['page'] = 'page/fileupload';				
			} break;
			case "research":{
				$this->data['title'] = 'Edit Research Proposal';
				$this->data['field'] = $this->cms->get_research_field();
				$this->data['research'] = $this->cms->current_research($id);
				$this->data['page'] = 'page/form_research';				
			} break;
			case "password":{
				$this->data['title'] = 'Change Password';
				$this->data['page'] = 'page/change_password';				
			} break;
		}
		$this->load->view('template', $this->data);
	}
	
	public function insert($param){
		switch($param){
			case "news": $this->lib_cms->insert_news(); break;
			case "video": $this->lib_cms->insert_video(); break;
			case "slide":$this->lib_cms->insert_slide(); break;
			case "research":$this->lib_cms->insert_research_proposal(); break;
			case "resources":$this->lib_cms->insert_resources(); break;
		}
	}
	
	public function update($param){
		switch($param){
			case "news": $this->lib_cms->update_news(); break;
			case "video":$this->lib_cms->update_video(); break;
			case "slide": $this->lib_cms->update_slide(); break;
			case "information": $this->lib_cms->update_info(); break;
			case "password": $this->lib_cms->change_password(); break;
			case "research": $this->lib_cms->update_research_proposal(); break;
			case "resources": $this->lib_cms->update_resources(); break;
			case "avatar": $this->lib_cms->change_avatar(); break;
			case "user_status": $this->lib_cms->change_user_status(); break;
		}
	}
	
	public function delete($param){
		switch($param){
			case "news": $this->lib_cms->delete_news(); break;
			case "video": $this->lib_cms->delete_video(); break;
			case "slide": $this->lib_cms->delete_slide(); break;
			case "resources": $this->lib_cms->delete_resource(); break;
			case "user": $this->lib_cms->delete_user(); break;
		}
	}
	
	# profile
	public function profile($id = ""){
		$this->data['title'] = 'Profile';
		$this->data['page'] = 'page/profile';
		$this->data['user'] = $this->cms->get_user($id);
		$this->load->view('template', $this->data);
	}
	
	# Account list
	# ==============================
	public function account(){
		$this->data['title'] = 'Account Management';
		$this->data['page'] = 'page/users';
		$this->data['users'] = $this->cms->get_all_users();
		$this->load->view('template', $this->data);		
	}
	
	



}