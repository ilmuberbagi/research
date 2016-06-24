<?php	

class Home extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		$this->load->model('Mdl_front','front');
	}
	
	public function index(){
		$this->data['page'] = 'page/home';
		$this->data['news'] = $this->front->get_news_home();
		$this->data['slideshow'] = $this->front->slideshow();
		$this->data['video'] = $this->front->get_video_5();
		$this->load->view('template_front', $this->data);
	}
	
	public function about($param = null){
		$this->data['video'] = $this->front->get_video_5();
		$this->data['info'] = $this->front->get_information();
		$this->data['page'] = 'page/about';
		$this->load->view('template_front', $this->data);
	}
	
	public function service(){
		$this->data['page'] = 'page/about';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['info'] = $this->front->get_information();
		$this->load->view('template_front', $this->data);
	}
	
	public function resources(){
		$this->data['page'] = 'page/resource';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['resources'] = $this->front->get_resources();
		$this->load->view('template_front', $this->data);
	}
	
	public function contact(){
		$this->data['page'] = 'page/contact';
		$this->data['info'] = $this->front->get_information();
		$this->load->view('template_front', $this->data);
	}
	
	public function news($param = '', $id=''){
		$this->data['page'] = 'page/news';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['popular'] = $this->front->popular_news();
		if($param == 'read'){
			$this->front->counter_news($id);
			$this->data['news'] = $this->front->get_current_news($id);
			$this->data['other_news'] = $this->front->get_news_5();
		}else if($param == null || $param == "page"){
			# list news pagination
			$tot = $this->front->count_news(1);
			$this->load->library('pagination');
			$config = array(
				'base_url'		 => base_url().'news/page/',
				'total_rows'	 => $tot,
				'per_page'		 => 5,
				'full_tag_open'	 => '<ul class="pagination pagination-sm pull-right">',
				'full_tag_close' => '</ul>',
				'cur_tag_open'	 => '<li class="active"><a href="#">',
				'cur_tag_close' => '</a></li>',
				'num_tag_open'	=> '<li>',
				'num_tag_close'	=> '</li>',
				'prev_tag_open' => '<li class="prev">',
				'prev_tag_close' => '</li>',
				'next_tag_open' => '<li class="next">',
				'next_tag_close' => '</li>',
				'prev_link'		=> '<i class="fa fa-chevron-left"></i>',
				'next_link'		=> '<i class="fa fa-chevron-right"></i>',
				'first_link'	=> '',
				'last_link'	=> '',
				'use_page_numbers' => TRUE,
			);
			$offset = $this->uri->segment(3)? (($this->uri->segment(3)-1) * $config['per_page']) : 0;
			$this->pagination->initialize($config);
			$this->data['paging'] = $this->pagination->create_links();
			$this->data['news'] = $this->front->get_news_limit(1, $config['per_page'], $offset);
		}		
		$this->load->view('template_front', $this->data);		
	}
	
	public function conferences($param = '', $id=''){
		$this->data['page'] = 'page/news';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['popular'] = $this->front->popular_news();
		if($param == 'read'){
			$this->front->counter_news($id);
			$this->data['news'] = $this->front->get_current_news($id);
			$this->data['other_news'] = $this->front->get_news_5();
		}else if($param == null || $param == "page"){
			# list news pagination
			$tot = $this->front->count_news(2);
			$this->load->library('pagination');
			$config = array(
				'base_url'		 => base_url().'conferences/page/',
				'total_rows'	 => $tot,
				'per_page'		 => 5,
				'full_tag_open'	 => '<ul class="pagination pagination-sm pull-right">',
				'full_tag_close' => '</ul>',
				'cur_tag_open'	 => '<li class="active"><a href="#">',
				'cur_tag_close' => '</a></li>',
				'num_tag_open'	=> '<li>',
				'num_tag_close'	=> '</li>',
				'prev_tag_open' => '<li class="prev">',
				'prev_tag_close' => '</li>',
				'next_tag_open' => '<li class="next">',
				'next_tag_close' => '</li>',
				'prev_link'		=> '<i class="fa fa-chevron-left"></i>',
				'next_link'		=> '<i class="fa fa-chevron-right"></i>',
				'first_link'	=> '',
				'last_link'	=> '',
				'use_page_numbers' => TRUE,
			);
			$offset = $this->uri->segment(3)? (($this->uri->segment(3)-1) * $config['per_page']) : 0;
			$this->pagination->initialize($config);
			$this->data['paging'] = $this->pagination->create_links();
			$this->data['news'] = $this->front->get_news_limit(2, $config['per_page'], $offset);
		}		
		$this->load->view('template_front', $this->data);		
	}

	public function grant($param = '', $id=''){
		$this->data['page'] = 'page/news';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['popular'] = $this->front->popular_news();
		if($param == 'read'){
			$this->front->counter_news($id);
			$this->data['news'] = $this->front->get_current_news($id);
			$this->data['other_news'] = $this->front->get_news_5();
		}else if($param == null || $param == "page"){
			# list news pagination
			$tot = $this->front->count_news(3);
			$this->load->library('pagination');
			$config = array(
				'base_url'		 => base_url().'grant/page/',
				'total_rows'	 => $tot,
				'per_page'		 => 5,
				'full_tag_open'	 => '<ul class="pagination pagination-sm pull-right">',
				'full_tag_close' => '</ul>',
				'cur_tag_open'	 => '<li class="active"><a href="#">',
				'cur_tag_close' => '</a></li>',
				'num_tag_open'	=> '<li>',
				'num_tag_close'	=> '</li>',
				'prev_tag_open' => '<li class="prev">',
				'prev_tag_close' => '</li>',
				'next_tag_open' => '<li class="next">',
				'next_tag_close' => '</li>',
				'prev_link'		=> '<i class="fa fa-chevron-left"></i>',
				'next_link'		=> '<i class="fa fa-chevron-right"></i>',
				'first_link'	=> '',
				'last_link'	=> '',
				'use_page_numbers' => TRUE,
			);
			$offset = $this->uri->segment(3)? (($this->uri->segment(3)-1) * $config['per_page']) : 0;
			$this->pagination->initialize($config);
			$this->data['paging'] = $this->pagination->create_links();
			$this->data['news'] = $this->front->get_news_limit(3, $config['per_page'], $offset);
		}		
		$this->load->view('template_front', $this->data);		
	}

	public function videos($param = '', $id=''){
		$this->data['page'] = 'page/videos';
		$this->data['popular'] = $this->front->popular_news();
		if($param == 'read'){
			$this->data['videos'] = $this->front->get_current_video($id);
			$this->data['other_videos'] = $this->front->get_video_5();
		}else if($param == null || $param == "page"){
			# list news pagination
			$tot = $this->front->count_video();
			$this->load->library('pagination');
			$config = array(
				'base_url'		 => base_url().'videos/page/',
				'total_rows'	 => $tot,
				'per_page'		 => 5,
				'full_tag_open'	 => '<ul class="pagination pagination-sm pull-right">',
				'full_tag_close' => '</ul>',
				'cur_tag_open'	 => '<li class="active"><a href="#">',
				'cur_tag_close' => '</a></li>',
				'num_tag_open'	=> '<li>',
				'num_tag_close'	=> '</li>',
				'prev_tag_open' => '<li class="prev">',
				'prev_tag_close' => '</li>',
				'next_tag_open' => '<li class="next">',
				'next_tag_close' => '</li>',
				'prev_link'		=> '<i class="fa fa-chevron-left"></i>',
				'next_link'		=> '<i class="fa fa-chevron-right"></i>',
				'first_link'	=> '',
				'last_link'	=> '',
				'use_page_numbers' => TRUE,
			);
			$offset = $this->uri->segment(3)? (($this->uri->segment(3)-1) * $config['per_page']) : 0;
			$this->pagination->initialize($config);
			$this->data['paging'] = $this->pagination->create_links();
			$this->data['videos'] = $this->front->get_video_limit($config['per_page'], $offset);
		}		
		$this->load->view('template_front', $this->data);		
	}

	# downloader
	#==================
	public function download($id){
		$data = $this->front->current_resource($id);
		if(!empty($data)){
			$count = $this->front->counter_resource($id);
			if($count)
				redirect($data[0]['file_url']);
		}else
			redirect('resources');
		
	}

}