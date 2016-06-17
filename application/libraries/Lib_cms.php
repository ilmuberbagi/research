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
		$data = array(
			'about'		=> $this->ci->security->xss_clean($this->ci->input->post('about')),
			'vision'		=> $this->ci->security->xss_clean($this->ci->input->post('vision')),
			'structure'		=> $this->ci->security->xss_clean($this->ci->input->post('structure')),
			'contact'		=> $this->ci->security->xss_clean($this->ci->input->post('contact')),
			'last_updated'	=> date('Y-m-d H:i:s')
		);
		$act = $this->ci->cms->update('information', array('id', $id), $data);
		if($act) $this->ci->session->set_flashdata('success','Information has been updated.');
		else $this->ci->session->set_flashdata('error','Trouble updating information.');
		redirect('dashboard/information#about');
	}
	
	public function insert_news(){
		$data = array(
			'user_id' => $this->ci->session->userdata('user_id'),
			'news_title' => $this->ci->security->xss_clean($this->ci->input->post('news_title')),
			'news_content' => $this->ci->input->post('news_content'),
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
			'video_description'		=> $this->ci->input->post('video_description'),
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
			$config['max_size'] = '1024'; # Max size 1 MB
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

	
}