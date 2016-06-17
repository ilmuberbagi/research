<?php	

class Home extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		$this->load->model('Mdl_front','front');
	}
	
	public function index(){
		$this->data['page'] = 'page/home';
		$this->data['news'] = $this->front->get_news();
		$this->data['slideshow'] = $this->front->slideshow();
		$this->data['video'] = $this->front->get_video();
		$this->load->view('template_front', $this->data);
	}
	
	public function about(){
		$this->data['page'] = 'page/about';
		$this->data['info'] = $this->front->get_information();
		$this->load->view('template_front', $this->data);
	}
	
	public function contact(){
		$this->data['page'] = 'page/contact';
		$this->data['info'] = $this->front->get_information();
		$this->load->view('template_front', $this->data);
	}
	
	public function news($param = '', $id=''){
		$this->data['page'] = 'page/news';
		if($param == 'read'){
			$this->data['news'] = $this->front->get_current_news($id);
			$this->data['other_news'] = $this->front->get_news_5();
		}else if($param == null){
			$this->data['news'] = $this->front->get_news();
		}
		
		$this->load->view('template_front', $this->data);		
	}

	

}