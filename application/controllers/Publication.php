<?php	

/**
 * research FTUI 
 * author : sabbana
 * date create : 17/07/2016
 * company : Ilmuberbagi
 */

class Publication extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		$this->load->library('Lib_publication');
		$this->load->model('Mdl_publication','pub');
	}
	
	public function index(){
		$this->data['title'] = 'Publication Data';
		$this->data['page'] = 'page/publication';
		$user_id = $this->session->userdata('user_id');
		$this->data['publication'] = $this->pub->get_all_publication($user_id);
		if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2)
			$this->data['publication'] = $this->pub->get_all_publication();			
		$this->load->view('template', $this->data);
	}

	public function action($param = "", $id=""){
		switch($param){
			case "input": $this->input(); break;
			case "edit": $this->edit($id); break;
			case "delete": $this->lib_publication->delete_publication(); break;
			case "insert": $this->lib_publication->insert_publication(); break;
			case "update": $this->lib_publication->update_publication(); break;
			case "author": $this->publication_author($id); break;
		}
	}
	
	public function input(){	
		$this->data['title'] = "Publication Input Data";
		$this->data['types'] = $this->pub->get_publication_type();
		$this->data['page'] = "page/form_publication";
		$this->load->view('template', $this->data);
	}
	
	public function edit($id){	
		$this->data['title'] = "Publication Edit Data";
		$this->data['types'] = $this->pub->get_publication_type();
		$this->data['curr_pub'] = $this->pub->current_publication($id);
		$this->data['page'] = "page/form_publication";
		$this->load->view('template', $this->data);
	}
	
	public function publication_author($pub_id){	
		$this->data['title'] = "Publication Author";
		$this->data['curr_pub'] = $this->pub->current_publication($pub_id);
		$this->data['authors'] = $this->pub->get_authors($pub_id);
		$this->data['allauthors'] = $this->pub->get_users();
		$this->data['page'] = "page/author_publication";
		$this->load->view('template', $this->data);
	}
	

}