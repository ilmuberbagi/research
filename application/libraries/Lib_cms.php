<?php

/**
 * @package    Research FTUI/libraries - 2016
 * @author     Sabbana
 * @copyright  Ilmu Berbagi Foundation
 * @version    1.0
 */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lib_cms {

    private $ci;

    function __construct() {
        $this->ci =&get_instance();
    }
	
	# update information
	public function update_info(){
		$id = $this->ci->input->post('id');
		$page = $this->ci->input->post('page');
		$tab = $this->ci->input->post('tab');
		$data = array(
			'about'		=> $this->ci->security->xss_clean($this->ci->input->post('about')),
			'vision'		=> $this->ci->security->xss_clean($this->ci->input->post('vision')),
			'structure'		=> $this->ci->security->xss_clean($this->ci->input->post('structure')),
			'contact'		=> $this->ci->security->xss_clean($this->ci->input->post('contact')),
			'service'		=> $this->ci->security->xss_clean($this->ci->input->post('service')),
			'research_centers'	=> $this->ci->security->xss_clean($this->ci->input->post('research_centers')),
			'research_groups'	=> $this->ci->security->xss_clean($this->ci->input->post('research_groups')),
			'researchers'	=> $this->ci->security->xss_clean($this->ci->input->post('researchers')),
			'statistics'	=> $this->ci->security->xss_clean($this->ci->input->post('statistics')),
			'last_updated'	=> date('Y-m-d H:i:s')
		);
		$act = $this->ci->cms->update('information', array('id', $id), $data);
		if($act) $this->ci->session->set_flashdata('success','Information has been updated.');
		else $this->ci->session->set_flashdata('error','Trouble updating information.');
		if(!isset($tab) || $tab == "")
			redirect($page.'?tab=about');
		else
			redirect($page.'?tab='.$tab);
	}
	
	public function update_profile(){
		$id = $this->ci->input->post('user_id');
		$data = array(
			'name'		=> $this->ci->security->xss_clean($this->ci->input->post('name')),
			'user_code'		=> $this->ci->security->xss_clean($this->ci->input->post('user_code')),
			'email'		=> $this->ci->security->xss_clean($this->ci->input->post('email')),
			'phone'		=> $this->ci->security->xss_clean($this->ci->input->post('phone')),
			'department_id'		=> $this->ci->security->xss_clean($this->ci->input->post('department_id')),
			'functional'	=> $this->ci->security->xss_clean($this->ci->input->post('functional')),
			'research_interest'	=> $this->ci->security->xss_clean($this->ci->input->post('research_interest')),
			'link_research_gate'	=> $this->ci->security->xss_clean($this->ci->input->post('link_research_gate')),
			'link_google_scholar'	=> $this->ci->security->xss_clean($this->ci->input->post('link_google_scholar')),
			'link_scopus'	=> $this->ci->security->xss_clean($this->ci->input->post('link_scopus')),
			'index_scholar'	=> $this->ci->security->xss_clean($this->ci->input->post('index_scholar')),
			'index_scopus'	=> $this->ci->security->xss_clean($this->ci->input->post('index_scopus')),
			'expertise'	=> $this->ci->security->xss_clean($this->ci->input->post('expertise')),
			'profile'	=> $this->ci->input->post('profile'),
			'date_update'	=> date('Y-m-d H:i:s')
		);
		$act = $this->ci->cms->update('users', array('user_id', $id), $data);
		if($act) $this->ci->session->set_flashdata('success','User Profile has been updated.');
		else $this->ci->session->set_flashdata('error','Trouble updating User Profile.');
		redirect('dashboard/profile/'.$id);
	}
	
	public function export_user(){
		$data['users'] = $this->ci->cms->get_all_users();
		$this->ci->load->view('template/page/user_excel', $data);
	}

	public function insert_news(){
		$data = array(
			'user_id' => $this->ci->session->userdata('user_id'),
			'news_title' => $this->ci->security->xss_clean($this->ci->input->post('news_title')),
			'news_content' => $this->ci->input->post('news_content'),
			'type' => $this->ci->input->post('type'),
			'status' => $this->ci->security->xss_clean($this->ci->input->post('status')),
			'date_posted' => date('Y-m-d H:i:s'),
		);
		if($_FILES){
			$config['upload_path'] = './uploads/images/news/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '2048'; # Max size 2 MB
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = date('Ymd-His').mt_rand(0,10000).'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/images/news/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$act = $this->ci->cms->insert('news', $data);
				if($act) $this->ci->session->set_flashdata('warning','News has been saved.');
				else $this->ci->session->set_flashdata('error','Trouble saving news.');
			}else{
				$data['thumbnail_url'] = $path.$fileName;
				$act = $this->ci->cms->insert('news', $data);
				if($act) $this->ci->session->set_flashdata('success','News has been saved.');
				else $this->ci->session->set_flashdata('error','Trouble saving news.');
			}
		}else{
			$act = $this->ci->cms->insert('news', $data);
			if($act) $this->ci->session->set_flashdata('success','News has been saved.');
			else $this->ci->session->set_flashdata('error','Trouble saving news.');
		}
		redirect('dashboard/news');
	}
		
	public function update_news(){
		$id = $this->ci->input->post('news_id');
		$data = array(
			'news_title' => $this->ci->security->xss_clean($this->ci->input->post('news_title')),
			'news_content' => $this->ci->input->post('news_content'),
			'type' => $this->ci->input->post('type'),
			'status' => $this->ci->security->xss_clean($this->ci->input->post('status')),
			'last_updated' => date('Y-m-d H:i:s'),
		);
		if($_FILES){
			$config['upload_path'] = './uploads/images/news/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '2048'; # Max size 2 MB
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = date('Ymd-His').mt_rand(0,10000).'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/images/news/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$act = $this->ci->cms->update('news', array('news_id', $id), $data);
				if($act) $this->ci->session->set_flashdata('info','News has been updated.');
				else $this->ci->session->set_flashdata('error','Trouble updating news.');
			}else{
				$data['thumbnail_url'] = $path.$fileName;
				$act = $this->ci->cms->update('news', array('news_id', $id), $data);
				if($act) $this->ci->session->set_flashdata('success','News has been updated.');
				else $this->ci->session->set_flashdata('error','Trouble updating news.');
			}
		}else{
			$act = $this->ci->cms->update('news', array('news_id', $id), $data);
			if($act) $this->ci->session->set_flashdata('success','News has been updated.');
			else $this->ci->session->set_flashdata('error','Trouble updating news.');
		}
		redirect('dashboard/news');
	}
	

	public function delete_news(){
		$id = $this->ci->input->post('news_id');
		$act = $this->ci->cms->delete('news', array('news_id', $id));
		if($act) $this->ci->session->set_flashdata('success','News has been deleted.');
		else $this->ci->session->set_flashdata('error','Trouble deleting news.');
		redirect('dashboard/news');
	}
		
	# resource/file modules
	# =========================================================
	public function insert_resources(){
		$data = array(
			'user_id' => $this->ci->session->userdata('user_id'),
			'resource_title' => $this->ci->security->xss_clean($this->ci->input->post('resource_title')),
			'enable_download' => $this->ci->input->post('enable_download'),
			'date_create' => date('Y-m-d H:i:s'),
			'date_update' => date('Y-m-d H:i:s'),
		);
		if($_FILES){
			$config['upload_path'] = './uploads/files/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '102400'; # Max size 100 MB
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = date('Ymd-His').mt_rand(0,10000).'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/files/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$act = $this->ci->cms->insert('resources', $data);
				if($act) $this->ci->session->set_flashdata('warning','File has been saved.');
				else $this->ci->session->set_flashdata('error','Trouble saving file.');
			}else{
				$data['file_url'] = $path.$fileName;
				$act = $this->ci->cms->insert('resources', $data);
				if($act) $this->ci->session->set_flashdata('success','File has been saved.');
				else $this->ci->session->set_flashdata('error','Trouble saving file.');
			}
		}else{
			$act = $this->ci->cms->insert('resources', $data);
			if($act) $this->ci->session->set_flashdata('success','File has been saved.');
			else $this->ci->session->set_flashdata('error','Trouble saving file.');
		}
		redirect('dashboard/resources');
	}

	public function update_resources(){
		$id = $this->ci->input->post('resource_id');
		$data = array(
			'resource_title' => $this->ci->security->xss_clean($this->ci->input->post('resource_title')),
			'enable_download' => $this->ci->input->post('enable_download'),
			'date_update' => date('Y-m-d H:i:s'),
		);
		if($_FILES){
			$config['upload_path'] = './uploads/files/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '102400'; # Max size 100 MB
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = date('Ymd-His').mt_rand(0,10000).'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/files/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$act = $this->ci->cms->update('resources', array('resource_id', $id), $data);
				if($act) $this->ci->session->set_flashdata('info','Resource has been updated.');
				else $this->ci->session->set_flashdata('error','Trouble updating file.');
			}else{
				$data['file_url'] = $path.$fileName;
				$act = $this->ci->cms->update('resources', array('resource_id', $id), $data);
				if($act) $this->ci->session->set_flashdata('success','Resource has been updated.');
				else $this->ci->session->set_flashdata('error','Trouble updating file.');
			}
		}else{
			$act = $this->ci->cms->update('resources', array('resource_id', $id), $data);
			if($act) $this->ci->session->set_flashdata('success','Resource has been updated.');
			else $this->ci->session->set_flashdata('error','Trouble updating file.');
		}
		redirect('dashboard/resources');
	}
	
	public function delete_resource(){
		$id = $this->ci->input->post('resource_id');
		$cr = $this->ci->cms->current_resource($id);
		$file_path = str_replace(site_url(),'./', $cr[0]['file_url']);
		$rm = false;
		if(file_exists($file_path))
			$rm = unlink($file_path);
		else
			$this->ci->cms->delete('resources', array('resource_id', $id));
		if($rm){
			$this->ci->cms->delete('resources', array('resource_id', $id));
			$this->ci->session->set_flashdata('success','File has been deleted.');
		}else $this->ci->session->set_flashdata('error','Trouble deleting file.');
		
		redirect('dashboard/resources');
	}
	

	# slideshow module 1qaz2wsx
	# ===================================
	public function insert_slide(){
		$data = array(
			'caption_title' => $this->ci->security->xss_clean($this->ci->input->post('caption_title')),
			'caption_text' => $this->ci->security->xss_clean($this->ci->input->post('caption_text')),
			'status' => $this->ci->security->xss_clean($this->ci->input->post('status')),
			'posted' => date('Y-m-d H:i:s'),
		);
		if($_FILES){
			$config['upload_path'] = './uploads/images/slideshow/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '2048'; # Max size 2 MB
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = date('Ymd-His').mt_rand(0,10000).'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/images/slideshow/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$act = $this->ci->cms->insert('slideshow', $data);
				if($act) $this->ci->session->set_flashdata('info','New Slide has been saved.');
				else $this->ci->session->set_flashdata('error','Trouble saving new slide.');
			}else{
				$data['img_url'] = $path.$fileName;
				$act = $this->ci->cms->insert('slideshow', $data);
				if($act) $this->ci->session->set_flashdata('success','New Slide has been saved.');
				else $this->ci->session->set_flashdata('error','Trouble saving new slide.');
			}
		}else{
			$act = $this->ci->cms->insert('slideshow', $data);
			if($act) $this->ci->session->set_flashdata('success','New Slide has been saved.');
			else $this->ci->session->set_flashdata('error','Trouble saving new slide.');
		}
		redirect('dashboard/slideshow');
	}

	public function update_slide(){
		$id = $this->ci->input->post('slide_id');
		$data = array(
			'caption_title' => $this->ci->security->xss_clean($this->ci->input->post('caption_title')),
			'caption_text' => $this->ci->security->xss_clean($this->ci->input->post('caption_text')),
			'status' => $this->ci->security->xss_clean($this->ci->input->post('status')),
		);
		if($_FILES){
			$config['upload_path'] = './uploads/images/slideshow/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '2048'; # Max size 2 MB
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = date('Ymd-His').mt_rand(0,10000).'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/images/slideshow/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$act = $this->ci->cms->update('slideshow', array('slide_id', $id), $data);
				if($act) $this->ci->session->set_flashdata('info','Slide has been updated.');
				else $this->ci->session->set_flashdata('error','Trouble updating slide.');
			}else{
				$data['img_url'] = $path.$fileName;
				$act = $this->ci->cms->update('slideshow', array('slide_id', $id), $data);
				if($act) $this->ci->session->set_flashdata('success','Slide has been updated.');
				else $this->ci->session->set_flashdata('error','Trouble updating slide.');
			}
		}else{
			$act = $this->ci->cms->update('slideshow', array('slide_id', $id), $data);
			if($act) $this->ci->session->set_flashdata('success','Slide has been updated.');
			else $this->ci->session->set_flashdata('error','Trouble updating slide.');
		}
		redirect('dashboard/slideshow');
	}

	public function delete_slide(){
		$id = $this->ci->input->post('slide_id');
		$act = $this->ci->cms->delete('slideshow', array('slide_id', $id));
		if($act) $this->ci->session->set_flashdata('success','Slide has been deleted.');
		else $this->ci->session->set_flashdata('error','Trouble deleting slide.');
		redirect('dashboard/slideshow');
	}
	
	# module video
	public function insert_video(){
		$data = array(
			'video_title'		=> $this->ci->security->xss_clean($this->ci->input->post('video_title')),
			'video_description'	=> $this->ci->input->post('video_description'),
			'video_url'		=> $this->ci->security->xss_clean($this->ci->input->post('video_url')),
			'status'		=> $this->ci->security->xss_clean($this->ci->input->post('status')),
			'added_by'		=> $this->ci->session->userdata('user_id'),
			'last_updated'	=> date('Y-m-d H:i:s')
		);
		$act = $this->ci->cms->insert('video',  $data);
		if($act) $this->ci->session->set_flashdata('success','Video has been saved.');
		else $this->ci->session->set_flashdata('error','Trouble saving video.');
		redirect('dashboard/research/video');
	}
	
	public function update_video(){
		$id = $this->ci->input->post('video_id');
		$data = array(
			'video_title'		=> $this->ci->security->xss_clean($this->ci->input->post('video_title')),
			'video_description'		=> $this->ci->input->post('video_description'),
			'video_url'		=> $this->ci->security->xss_clean($this->ci->input->post('video_url')),
			'status'		=> $this->ci->security->xss_clean($this->ci->input->post('status')),
			'added_by'		=> $this->ci->session->userdata('user_id'),
			'last_updated'	=> date('Y-m-d H:i:s')
		);
		$act = $this->ci->cms->update('video', array('video_id', $id), $data);
		if($act) $this->ci->session->set_flashdata('success','Video has been updated.');
		else $this->ci->session->set_flashdata('error','Trouble updating video.');
		redirect('dashboard/research/video');
	}

	public function delete_video(){
		$id = $this->ci->input->post('video_id');
		$act = $this->ci->cms->delete('video', array('video_id', $id));
		if($act) $this->ci->session->set_flashdata('success','Video has been deleted.');
		else $this->ci->session->set_flashdata('error','Trouble deleting video.');
		redirect('dashboard/research/video');
	}
	
	# research proposal
	# ===================================
	public function insert_research_proposal(){
		$data = array(
			'research_id' => date('YmdHis').'-'.mt_rand(0,100),
			'research_title' => $this->ci->security->xss_clean($this->ci->input->post('research_title')),
			'research_level' => $this->ci->security->xss_clean($this->ci->input->post('research_level')),
			'description' => $this->ci->security->xss_clean($this->ci->input->post('description')),
			'field_id' => $this->ci->security->xss_clean($this->ci->input->post('field_id')),
			'funding' => $this->ci->security->xss_clean($this->ci->input->post('funding')),
			'user_id' => $this->ci->session->userdata('user_id'),
			'date_input' => date('Y-m-d H:i:s'),
		);
		if($_FILES){
			$config['upload_path'] = './uploads/attachments/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '10240'; # Max size 10 MB
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = date('Ymd-His').mt_rand(0,10000).'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/attachments/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$act = $this->ci->cms->insert('research_proposal', $data);
				if($act) $this->ci->session->set_flashdata('info','Research Proposal has been saved.');
				else $this->ci->session->set_flashdata('error','Trouble saving research proposal.');
			}else{
				$data['attachment'] = $path.$fileName;
				$act = $this->ci->cms->insert('research_proposal', $data);
				if($act) $this->ci->session->set_flashdata('success','Research Proposal has been saved.');
				else $this->ci->session->set_flashdata('error','Trouble saving research proposal.');
			}
		}else{
			$act = $this->ci->cms->insert('research_proposal', $data);
			if($act) $this->ci->session->set_flashdata('success','Research Proposal has been saved.');
			else $this->ci->session->set_flashdata('error','Trouble saving research proposal.');
		}
		redirect('dashboard/research/data');
	}

	public function update_research_proposal(){
		$id = $this->ci->input->post('research_id');
		$data = array(
			'research_title' => $this->ci->security->xss_clean($this->ci->input->post('research_title')),
			'research_level' => $this->ci->security->xss_clean($this->ci->input->post('research_level')),
			'description' => $this->ci->security->xss_clean($this->ci->input->post('description')),
			'field_id' => $this->ci->security->xss_clean($this->ci->input->post('field_id')),
			'funding' => $this->ci->security->xss_clean($this->ci->input->post('funding')),
			'date_update' => date('Y-m-d H:i:s'),
		);
		if($_FILES){
			$config['upload_path'] = './uploads/attachments/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '10240'; # Max size 10 MB
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = date('Ymd-His').mt_rand(0,10000).'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/attachments/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$act = $this->ci->cms->update('research_proposal', array('research_id', $id), $data);
				if($act) $this->ci->session->set_flashdata('info','Research Proposal has been updated.');
				else $this->ci->session->set_flashdata('error','Trouble updating research proposal.');
			}else{
				$data['attachment'] = $path.$fileName;
				$act = $this->ci->cms->update('research_proposal', array('research_id', $id), $data);
				if($act) $this->ci->session->set_flashdata('success','Research Proposal has been updated.');
				else $this->ci->session->set_flashdata('error','Trouble updating research proposal.');
			}
		}else{
			$act = $this->ci->cms->update('research_proposal', array('research_id', $id), $data);
			if($act) $this->ci->session->set_flashdata('success','Research Proposal has been updated.');
			else $this->ci->session->set_flashdata('error','Trouble updating research proposal.');
		}
		redirect('dashboard/edit/research/'.$id);
	}
	
	# change avatar
	# ====================================
	public function change_avatar(){
		$id = $this->ci->session->userdata('user_id');
		if($_FILES){
			$config['upload_path'] = './uploads/avatar/';
			$config['allowed_types'] = 'jpg|jpef|png';
			$config['max_size'] = '10240'; # Max size 10 MB
			$config['overwrite'] = true;
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = $id.'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/avatar/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$this->ci->session->set_flashdata('error','Trouble updating user avatar.');
			}else{
				$data['avatar'] = $path.$fileName;
				$act = $this->ci->cms->update('users', array('user_id', $id), array('avatar'=>$path.$fileName));
				if($act){
					$this->ci->session->set_userdata('avatar', $path.$fileName);
					$this->ci->session->set_flashdata('success','User avatar has been updated.');
				}else $this->ci->session->set_flashdata('error','Trouble updating user avatar.');
			}
		}
		redirect('dashboard/profile');
	}

	# change password 
	# ============================
	public function change_password(){
		$this->ci->load->library('form_validation');
		$id = $this->ci->security->xss_clean($this->ci->input->post('user_id'));
		$pass = $this->ci->security->xss_clean($this->ci->input->post('member_password'));
		$repass = $this->ci->security->xss_clean($this->ci->input->post('member_repassword'));
		$this->ci->form_validation->set_rules('member_password','Password','required|trim');
		$this->ci->form_validation->set_rules('member_repassword','Ulangi Password','required|trim|match[member_password]');
		if($this->ci->form_validation->run() == 'FALSE'){
			$msg = validation_errors();
			$this->ci->session->set_flashdata('alert', $msg);
		}else{
			$data = array('password' => md5($pass));
			$change = $this->ci->cms->update('users', array('user_id', $id), $data);
			if($change)
				$this->ci->session->set_flashdata('success','Your password has been updated.');
			else
				$this->ci->session->set_flashdata('alert','Trouble while updating your password!');
		}
		redirect('dashboard/edit/password');
	}
	
	# change status
	# ============================
	public function change_user_status(){
		$id = $this->ci->security->xss_clean($this->ci->input->post('user_id'));
		$sts = $this->ci->security->xss_clean($this->ci->input->post('status'));
		if($sts == 0) {
			$status = 1;
			$subject = "Aktivasi Akun Sistem Information FTUI"; 
		}else{
			$status = 0;
			$subject = "Suspending User Research FTUI"; 
		}

		$data = array('status' => $status);
		$change = $this->ci->cms->update('users', array('user_id', $id), $data);
		if($change){
			if ($status == 1){
				$userdata = $this->ci->cms->get_user($id);
				$result = array(
					'status' => $status,
					'title' => $subject,
					'user_id' => $id,
					'password'	=> $userdata[0]['user_code'],
					'name'	=> $userdata[0]['name']
				);
				$message = $this->ci->load->view('template/mailer/activation', $result, TRUE);
				$this->ci->load->library('email'); // load email library
				$this->ci->email->from('risetft@eng.ui.ac.id', 'Riset FTUI');
				$this->ci->email->to($userdata[0]['email']);
				$this->ci->email->bcc('sabbana.log@gmail.com'); 
				$this->ci->email->subject($subject);
				$this->ci->email->message($message);
				if($this->ci->email->send())
					$this->ci->session->set_flashdata('success','User status has been updated. An email notification has been sent to user');
				else
					$this->ci->session->set_flashdata('warning','User status has been updated. Sending email notofication failed.');
			}else
				$this->ci->session->set_flashdata('success','User status has been updated. Suspending user account.');
		}
		else
			$this->ci->session->set_flashdata('alert','Trouble while updating user status!');
		redirect('dashboard/account');
	}
	
	public function reset_password(){
		$id = $this->ci->security->xss_clean($this->ci->input->post('user_id'));
		$pass = $this->ci->security->xss_clean($this->ci->input->post('password'));
		$change = $this->ci->cms->update('users', array('user_id', $id), array('password'=>md5($pass)));
		if($change){
			$userdata = $this->ci->cms->get_user($id);
			$result = array(
				'status'	=> 99,
				'name'	=> $userdata[0]['name'],
				'user_id' => $id,
				'password'	=> $userdata[0]['user_code'],
			);
			$message = $this->ci->load->view('template/mailer/activation', $result, TRUE);
			$this->ci->load->library('email'); // load email library
			$this->ci->email->from('risetft@eng.ui.ac.id', 'Riset FTUI');
			$this->ci->email->to($userdata[0]['email']);
			$this->ci->email->bcc('sabbana.log@gmail.com'); 
			$this->ci->email->subject('Reset Password');
			$this->ci->email->message($message);
			if($this->ci->email->send())
				$this->ci->session->set_flashdata('success','User status has been updated. An email notification has been sent to user');
			else				
				$this->ci->session->set_flashdata('warning','User status has been updated. Sending email notofication failed.');
		}
		else
			$this->ci->session->set_flashdata('alert','Trouble while updating user password!');
		redirect('dashboard/account');
	}
	
	# delete users
	public function delete_user(){
		$id = $this->ci->input->post('user_id');
		$act = $this->ci->cms->delete('users', array('user_id', $id));
		if($act) $this->ci->session->set_flashdata('success','User been deleted.');
		else $this->ci->session->set_flashdata('error','Trouble deleting user.');
		redirect('dashboard/account');
	}

	
}