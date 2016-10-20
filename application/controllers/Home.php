<?php	

/**
 * research FTUI 
 * author : sabbana
 * company : Ilmuberbagi
 * date create : 13/07/2016
 */

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
		$this->data['grant'] = $this->front->get_latest();
		$this->data['publication'] = $this->front->get_latest('publication');
		$this->data['video'] = $this->front->get_video_5();
		$this->load->view('template_front', $this->data);
	}
	
	public function about($param = null){
		$this->data['title'] = 'About - Riset & Pengabdian Masyarakat FTUI';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['info'] = $this->front->get_information();
		$this->data['page'] = 'page/about';
		$this->load->view('template_front', $this->data);
	}
	
	public function service(){
		$this->data['title'] = 'Services - Riset & Pengabdian Masyarakat FTUI';
		$this->data['page'] = 'page/about';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['info'] = $this->front->get_information();
		$this->load->view('template_front', $this->data);
	}
	
	public function resources(){
		$this->data['title'] = 'Resources - Riset & Pengabdian Masyarakat FTUI';
		$this->data['page'] = 'page/resource';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['resources'] = $this->front->get_resources();
		$this->load->view('template_front', $this->data);
	}
	
	public function statistics(){
		$this->data['title'] = 'Statistics - Riset & Pengabdian Masyarakat FTUI';
		$this->data['page'] = 'page/about';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['info'] = $this->front->get_information();
		$this->load->view('template_front', $this->data);
	}
	
	public function contact(){
		$this->data['title'] = 'Contact - Riset & Pengabdian Masyarakat FTUI';
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
			$this->data['title'] = $this->data['news'][0]['news_title'].' - Riset & Pengabdian Masyarakat FTUI';
			$this->data['other_news'] = $this->front->get_news_5();
		}else if($param == null || $param == "page"){
			# list news pagination
			$this->data['title'] = 'News - Riset & Pengabdian Masyarakat FTUI';
			$tot = $this->front->count_news(1);
			$this->load->library('pagination');
			$config = array(
				'base_url'		 => base_url().'news/page/',
				'total_rows'	 => $tot,
				'per_page'		 => 12,
				'full_tag_open'	 => '<ul class="pagination pagination-sm text-center">',
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
		$this->data['title'] = 'Conferences - Riset & Pengabdian Masyarakat FTUI';
		$this->data['page'] = 'page/news';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['popular'] = $this->front->popular_news();
		if($param == 'read'){
			$this->front->counter_news($id);
			$this->data['news'] = $this->front->get_current_news($id);
			$this->data['title'] = $this->data['news'][0]['news_title'].' - Riset & Pengabdian Masyarakat FTUI';
			$this->data['other_news'] = $this->front->get_news_5();
		}else if($param == null || $param == "page"){
			# list news pagination
			$tot = $this->front->count_news(2);
			$this->load->library('pagination');
			$config = array(
				'base_url'		 => base_url().'conferences/page/',
				'total_rows'	 => $tot,
				'per_page'		 => 8,
				'full_tag_open'	 => '<ul class="pagination pagination-sm text-center">',
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
		$this->data['title'] = 'Grant - Riset & Pengabdian Masyarakat FTUI';
		$this->data['page'] = 'page/news';
		$this->data['video'] = $this->front->get_video_5();
		$this->data['popular'] = $this->front->popular_news();
		if($param == 'read'){
			$this->front->counter_news($id);
			$this->data['news'] = $this->front->get_current_news($id);
			$this->data['title'] = $this->data['news'][0]['news_title'].' - Riset & Pengabdian Masyarakat FTUI';
			$this->data['other_news'] = $this->front->get_news_5();
		}else if($param == null || $param == "page"){
			# list news pagination
			$tot = $this->front->count_news(3);
			$this->load->library('pagination');
			$config = array(
				'base_url'		 => base_url().'grant/page/',
				'total_rows'	 => $tot,
				'per_page'		 => 8,
				'full_tag_open'	 => '<ul class="pagination pagination-sm text-center">',
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
		$this->data['title'] = 'Videos - Riset & Pengabdian Masyarakat FTUI';
		$this->data['page'] = 'page/videos';
		$this->data['popular'] = $this->front->popular_news();
		if($param == 'read'){
			$this->data['videos'] = $this->front->get_current_video($id);
			$this->data['title'] = $this->data['videos'][0]['video_title'].' - Riset & Pengabdian Masyarakat FTUI';
			$this->data['other_videos'] = $this->front->get_video_5();
		}else if($param == null || $param == "page"){
			# list news pagination
			$tot = $this->front->count_video();
			$this->load->library('pagination');
			$config = array(
				'base_url'		 => base_url().'videos/page/',
				'total_rows'	 => $tot,
				'per_page'		 => 4,
				'full_tag_open'	 => '<ul class="pagination pagination-sm text-center">',
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

	public function get_user($id){
		header('Content-Type: application/json');
		echo json_encode($this->front->current_user($id));
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
	
	# grant and publication
	public function research($param){
		$this->data['title'] = 'Publications - Riset & Pengabdian Masyarakat FTUI';
		$this->data['page'] = "page/research";
		$year = isset($_GET['year']) ? $_GET['year']:'';
		$key = isset($_GET['key']) ? $_GET['key']:'';
		$param = isset($_GET['param']) ? $_GET['param']:$param;
		$this->data['year'] = $year;
		$this->data['key'] = $key;
		$this->data['param'] = $param;
		
		$tot = $this->front->count_publication($year, $key);
		if($param == 'grant'){
			$this->data['title'] = 'Grants - Riset & Pengabdian Masyarakat FTUI';
			$tot = $this->front->count_grant($year, $key);
		}
		
		$this->load->library('pagination');
		$config = array(
			'base_url'		 => base_url().'research/'.$param.'/page/',
			'total_rows'	 => $tot,
			'per_page'		 => 10,
			'full_tag_open'	 => '<ul class="pagination pagination-sm text-center">',
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
		$offset = $this->uri->segment(4)? (($this->uri->segment(4)-1) * $config['per_page']) : 0;
		$this->pagination->initialize($config);
		$this->data['offset'] = $offset;
		$this->data['paging'] = $this->pagination->create_links();
		$this->data['result'] = $this->front->publication($year, $key, $config['per_page'], $offset);
		
		if($param == 'grant')
			$this->data['result'] = $this->front->grant($year, $key, $config['per_page'], $offset);
		
		$this->load->view('template_front', $this->data);
		
	}

	# searching feature
	public function search(){
		$this->data['title'] = "Search Result - Riset & Pengabdian Masyarakat FTUI";
		$this->data['page'] = "page/search";
		$key = isset($_GET['key']) ? str_replace(array('"',"'"),'', $_GET['key']):'';
		$this->data['key'] = $key;		
		$this->data['result'] = $this->front->searching($key);
		$this->load->view('template_front', $this->data);
	}
	
	public function researchers($department = ""){
		$this->data['title'] = "Researchers - Riset & Pengabdian Masyarakat FTUI";
		$this->data['department'] = $this->front->get_all_department();
		$dep = isset($_GET['department'])?$_GET['department']: $department;
		$sort = isset($_GET['sort'])?$_GET['sort']:'';
		$page = isset($_GET['page'])?$_GET['page']:'';
		$this->data['page'] = "page/researcher";
		$this->data['sort'] = $sort;
		$this->data['dep'] = $dep;
			# paging here
			$tot = $this->front->count_researcher($dep);
			$this->data['total'] = $tot;
			$this->load->library('pagination');
			$config = array(
				'base_url'		 => base_url().'researchers/page',
				'total_rows'	 => $tot,
				'per_page'		 => 12,
				'full_tag_open'	 => '<ul class="pagination pagination-sm">',
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
			if ($dep !== "" && $dep !== 'page'){
				$config['base_url'] = base_url().'researchers/'.$dep.'/page/';
				$offset = $this->uri->segment(4)? (($this->uri->segment(4)-1) * $config['per_page']) : 0;
			}

			$this->pagination->initialize($config);
			$this->data['paging'] = $this->pagination->create_links();

		$this->data['result'] = $this->front->researchers($dep, $sort, $config['per_page'], $offset);
		$this->load->view('template_front', $this->data);
	}
	
	public function current_publication($id){
		$this->load->model('Mdl_publication','pub');
		$data = $this->pub->current_publication($id);
		echo json_encode($data);
	}

}