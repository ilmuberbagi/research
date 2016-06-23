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
				// $this->data['page'] = 'page/uploader';
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
		}
	}
	
	public function delete($param){
		switch($param){
			case "news": $this->lib_cms->delete_news(); break;
			case "video": $this->lib_cms->delete_video(); break;
			case "slide": $this->lib_cms->delete_slide(); break;
		}
	}
	
	# profile
	public function profile(){
		$this->data['page'] = 'page/profile';
		$this->data['user'] = $this->cms->get_user();
		$this->load->view('template', $this->data);
	}
	
	# file uploader
	public function do_upload() {
        $upload_path_url = base_url().'uploads/files/';
        $config['upload_path'] = FCPATH.'uplaods/files/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '10240'; # Max size 10 MB

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $existingFiles = get_dir_file_info($config['upload_path']);
            $f=0;
            foreach($existingFiles as $fileName => $info){
				// set the data for the json array   
				$foundFiles[$f]['name'] = $fileName;
				$foundFiles[$f]['size'] = $info['size'];
				$foundFiles[$f]['url'] = $upload_path_url.$fileName;
				$foundFiles[$f]['deleteUrl'] = base_url().'dashboard/deletefile/'.$fileName;
				$foundFiles[$f]['deleteType'] = 'DELETE';
				$foundFiles[$f]['error'] = null;
				$f++;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('files' => $foundFiles)));
        } else {
            $data = $this->upload->data();
            //set the data for the json array
            $info = new StdClass;
            $info->name = $data['file_name'];
            $info->size = $data['file_size'] * 1024;
            $info->type = $data['file_type'];
            $info->url = $upload_path_url.$data['file_name'];
            // I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
            $info->deleteUrl = base_url().'dashboard/deletefile/'.$data['file_name'];
            $info->deleteType = 'DELETE';
            $info->error = null;

            $files[] = $info;
			# set data and save to database
			# ======================================
			$datafile = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'resource_title'	=> $info->name,
				'file_url'		=> $this->config->item('image_upload_url').$info->name,
				'date_create'	=> date('Y-m-d H:i:s'),
				'date_update'	=> date('Y-m-d H:i:s'),
			);
			$this->cms->insert('resources', $datafile);
            //this is why we put this in the constants to pass only json data
            if (IS_AJAX) {
				$data = array(
					"files" => $files,
				);
                echo json_encode($data);
            } else {
				redirect('dashboard/resources');
            }
        }
    }
	
	//gets the job done but you might want to add error checking and security
	public function deletefile($file) {
        $success = unlink(FCPATH . 'uploads/files/' . $file);
        //info to see if it is doing what it is supposed to
   		$info = new StdClass;
        $info->sucess = $success;
        $info->path = base_url() . 'uploads/files/' . $file;
        $info->file = is_file(FCPATH . 'uploads/files/' . $file);

        if (IS_AJAX) {
            //I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {
            //here you will need to decide what you want to show for a successful delete        
            $file_data['delete_data'] = $file;
            $this->load->view('admin/delete_success', $file_data);
        }
    }
	
	# upload file
	
	



}