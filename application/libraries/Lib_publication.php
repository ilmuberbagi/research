<?php

/**
 * @package    Research FTUI/libraries - 2016
 * @author     Sabbana
 * @copyright  Ilmu Berbagi Foundation
 * @version    1.0
 */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lib_publication {

    private $ci;

    function __construct() {
        $this->ci =&get_instance();
    }
	
	public function insert_publication(){
		$publication_data = array(
			'pub_id' => date('YmdHis').mt_rand(0,100),
			'pub_type_id' => $this->ci->input->post('type_id'),
			'publication_name' => $this->ci->security->xss_clean($this->ci->input->post('publication_name')),
			'title' => $this->ci->security->xss_clean($this->ci->input->post('title')),
			'abstract' => $this->ci->input->post('abstract'),
			'author' => $this->ci->security->xss_clean($this->ci->input->post('author')),
			'date_input' => date('Y-m-d H:i:s'),
			'date_update' => date('Y-m-d H:i:s'),
		);
		$publication_data['user_id'] = $this->ci->session->userdata('user_id');
		$publication_data['department_id'] = $this->ci->session->userdata('department_id');
		if($this->ci->session->userdata('role') == 1 || $this->ci->session->userdata('role') == 2){
			$user = explode('#', $this->ci->input->post('user_id'));
			$publication_data['user_id'] = $user[0];
			$publication_data['department_id'] = $user[1];
		}
		$publication_detail = array(
			'pub_id' => $publication_data['pub_id'],
			'publisher' => $this->ci->security->xss_clean($this->ci->input->post('publisher')),
			'pub_country' => $this->ci->security->xss_clean($this->ci->input->post('pub_country')),
			'pub_year' => $this->ci->security->xss_clean($this->ci->input->post('pub_year')),
			'pub_website' => $this->ci->security->xss_clean($this->ci->input->post('pub_website')),
			'page' => $this->ci->security->xss_clean($this->ci->input->post('page')),
			'volume' => $this->ci->security->xss_clean($this->ci->input->post('volume')),
			'issn_isbn' => $this->ci->security->xss_clean($this->ci->input->post('issn_isbn')),
			'q_year' => $this->ci->security->xss_clean($this->ci->input->post('q_year')),
			'freq_year' => $this->ci->security->xss_clean($this->ci->input->post('freq_year')),
			'db_index' => $this->ci->security->xss_clean($this->ci->input->post('db_index')),
			'detail' => $this->ci->security->xss_clean($this->ci->input->post('detail')),
			'jcr' => $this->ci->security->xss_clean($this->ci->input->post('jcr')),
			'scr' => $this->ci->security->xss_clean($this->ci->input->post('scr')),
		);
		if($_FILES){
			$config['upload_path'] = './uploads/publication/sidr/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '10240'; # Max size 10 MB
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = date('Ymd-His').mt_rand(0,10000).'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/publication/sidr/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$publication_data['sidr_url'] = '';
				$publication_data['sidr_upload'] = 0;
				
				$act = $this->ci->pub->insert('publication', $publication_data);
				if($act){
					$this->ci->pub->insert('publication_detail', $publication_detail);
					$this->ci->session->set_flashdata('warning','New Publication data has been saved without SIDR file.');
				}else 
					$this->ci->session->set_flashdata('error','Trouble saving publication.');
			}else{
				$publication_data['sidr_url'] = $path.$fileName;
				$publication_data['sidr_upload'] = 1;
				$act = $this->ci->pub->insert('publication', $publication_data);
				if($act){
					$this->ci->pub->insert('publication_detail', $publication_detail);
					$this->ci->session->set_flashdata('success','New Publication data has been saved.');
				}else 
					$this->ci->session->set_flashdata('error','Trouble saving publication.');
			}
		}else{
			$act = $this->ci->pub->insert('publication', $publication_data);
			if($act){
				$this->ci->pub->insert('publication_detail', $publication_detail);
				$this->ci->session->set_flashdata('warning','New Publication data has been saved without SIDR file.');
			}else 
				$this->ci->session->set_flashdata('error','Trouble saving publication.');
		}
		redirect('publication');
	}
		
	public function update_publication(){
		$id = $this->ci->input->post('curr_pub_id');
		$publication_data = array(
			'pub_type_id' => $this->ci->input->post('type_id'),
			'title' => $this->ci->security->xss_clean($this->ci->input->post('title')),
			'publication_name' => $this->ci->security->xss_clean($this->ci->input->post('publication_name')),
			'abstract' => $this->ci->input->post('abstract'),
			'author' => $this->ci->security->xss_clean($this->ci->input->post('author')),
			'date_update' => date('Y-m-d H:i:s'),
		);
		$publication_detail = array(
			'publisher' => $this->ci->security->xss_clean($this->ci->input->post('publisher')),
			'pub_country' => $this->ci->security->xss_clean($this->ci->input->post('pub_country')),
			'pub_year' => $this->ci->security->xss_clean($this->ci->input->post('pub_year')),
			'pub_website' => $this->ci->security->xss_clean($this->ci->input->post('pub_website')),
			'page' => $this->ci->security->xss_clean($this->ci->input->post('page')),
			'volume' => $this->ci->security->xss_clean($this->ci->input->post('volume')),
			'issn_isbn' => $this->ci->security->xss_clean($this->ci->input->post('issn_isbn')),
			'q_year' => $this->ci->security->xss_clean($this->ci->input->post('q_year')),
			'freq_year' => $this->ci->security->xss_clean($this->ci->input->post('freq_year')),
			'db_index' => $this->ci->security->xss_clean($this->ci->input->post('db_index')),
			'detail' => $this->ci->security->xss_clean($this->ci->input->post('detail')),
			'jcr' => $this->ci->security->xss_clean($this->ci->input->post('jcr')),
			'scr' => $this->ci->security->xss_clean($this->ci->input->post('scr')),
		);
		if($_FILES){
			$config['upload_path'] = './uploads/publication/sidr/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '10240'; # Max size 10 MB
			
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$fileName = date('Ymd-His').mt_rand(0,10000).'.'.$ext;
			$config['file_name'] = $fileName;

			$path = base_url().'uploads/publication/sidr/';
			$this->ci->load->library('upload', $config);
			if(!$this->ci->upload->do_upload()){
				$act = $this->ci->pub->update('publication', array('pub_id', $id), $publication_data);
				if($act){
					$this->ci->pub->update('publication_detail', array('pub_id', $id), $publication_detail);
					$this->ci->session->set_flashdata('success','Publication data has been updated.');
				}else 
					$this->ci->session->set_flashdata('error','Trouble updating publication.');
			}else{
				$publication_data['sidr_url'] = $path.$fileName;
				$publication_data['sidr_upload'] = 1;
				$act = $this->ci->pub->update('publication', array('pub_id', $id), $publication_data);
				if($act){
					$this->ci->pub->update('publication_detail', array('pub_id', $id), $publication_detail);
					$this->ci->session->set_flashdata('success','Publication data has been updated.');
				}else 
					$this->ci->session->set_flashdata('error','Trouble updating publication.');
			}
		}else{
			$act = $this->ci->pub->update('publication', array('pub_id', $id), $publication_data);
			if($act){
				$this->ci->pub->update('publication_detail', array('pub_id', $id), $publication_detail);
				$this->ci->session->set_flashdata('success','New Publication data has been updated.');
			}else 
				$this->ci->session->set_flashdata('error','Trouble updating publication.');
		}
		redirect('publication');
	}
	

	public function delete_publication(){
		$id = $this->ci->input->post('pub_id');
		$act = $this->ci->pub->delete('publication', array('pub_id', $id));
		if($act) $this->ci->session->set_flashdata('success','Publication data has been deleted.');
		else $this->ci->session->set_flashdata('error','Trouble deleting publication.');
		redirect('publication');
	}

	public function sidr_verify($pub_id){
		$act = $this->ci->pub->update('publication', array('pub_id', $pub_id), array('sidr_verify'=>1));
		if($act) $this->ci->session->set_flashdata('success','SIDR has been verified.');
		else $this->ci->session->set_flashdata('error','Trouble verifying SIDR.');
		redirect('publication/action/detail/'.$pub_id);
	}
	
	public function publish_publication(){
		$pub_id = $this->ci->input->post('pub_id');
		$act = $this->ci->pub->update('publication', array('pub_id', $pub_id), array('publish'=>1));
		if($act) $this->ci->session->set_flashdata('success','Publication data has been published.');
		else $this->ci->session->set_flashdata('error','Trouble publishing publication.');
		redirect('publication');
	}
	
	private function get_department_name($dept_id){
		$this->ci->load->model('Mdl_cms');
		$data = $this->ci->Mdl_cms->current_department($dept_id);
		return $data[0]['department_name'];
	}
	
	public function export($param){
		$this->data['types'] = $this->ci->pub->get_publication_type();
		
		$dept_id = isset($_GET['department_id']) ? $_GET['department_id']:'';
		$year = isset($_GET['year']) ? $_GET['year']:'';
		
		$this->data['dept_id'] = $dept_id;
		$this->data['year'] = $year;
		
		$this->data['title'] = 'DATA PUBLIKASI FAKULTAS TEKNIK<br/>';
		$this->data['title'] .= 'UNIVERSITAS INDONESIA<br/>';
		$this->data['title'] .= $year ? 'TAHUN '.$year:'';
		if($dept_id !== ""){
			$this->data['title'] = 'DATA PUBLIKASI DEPARTEMEN ';
			$this->data['title'] .= strtoupper($this->get_department_name($dept_id)).'<br/>FAKULTAS TEKNIK ';
			$this->data['title'] .= 'UNIVERSITAS INDONESIA<br/>';
			$this->data['title'] .= $year ? 'TAHUN '.$year:'';
		}
		
		$uid = $this->ci->session->userdata('user_id');
		$role = $this->ci->session->userdata('role');
		$this->data['publication'] = $this->ci->pub->get_all_publication_report($role, $uid, $dept_id, $year);
		if($param == 'excel'){
			$this->ci->load->view('template/page/export_excel', $this->data);
		}else{
			# pdf export
			require_once('includes/pdf_report/SIApdf.php');
			$pdf = new SIApdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);		
			$data = array('pdf_title' => 'Data publikasi FTUI', 'pdf_margin' => array(20,20,10)); //margin = array(kiri, atas, kanan)
			$pdf->sia_set_properties($data);
			$pdf->SetFont('helvetica', '', 9);
				
			#ukuran kertas milimiter
			$pdf->AddPage('L', array(841,594), false, false);
			$pdf->setPageOrientation('L',true,5);
			
			#tulis konten html ke PDF
			$html = $this->ci->load->view('template/page/export_pdf', $this->data, true);
			$pdf->writeHTML($html, true, false, true, false, '');
						
			#finish pdf
			$pdf->lastPage();
			$pdf->Output('publication-'.date('YmdHis').'.pdf', 'I');
		}
	}
	
}