<?php

/**
 * @package    Research FTUI/libraries - 2016
 * @author     Sabbana
 * @copyright  Ilmu Berbagi Foundation
 * @version    1.0
 */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lib_grant {

    private $ci;

    function __construct() {
        $this->ci =&get_instance();
    }
	
	public function insert_grant(){
		$user_id = $this->ci->session->userdata('user_id');
		$grant_data = array(
			'grant_id' => date('YmdHis').mt_rand(0,100),
			'user_id' => $user_id,
			'department_id' => $this->ci->session->userdata('department_id'),
			'main_researcher' => $this->ci->security->xss_clean($this->ci->input->post('main_researcher')),
			'member_researcher' => $this->ci->security->xss_clean($this->ci->input->post('member_researcher')),
			'research_title' => $this->ci->security->xss_clean($this->ci->input->post('research_title')),
			'contract_number' => $this->ci->input->post('contract_number'),
			'grant_year' => $this->ci->input->post('grant_year'),
			'st_year' => $this->ci->input->post('st_year'),
			'st_submision' => $this->ci->input->post('st_submision'),
			'selection' => $this->ci->input->post('selection'),
			'site' => $this->ci->input->post('site'),
			'date_input' => date('Y-m-d H:i:s'),
			'date_update' => date('Y-m-d H:i:s'),
		);
		$grant_detail = array(
			'grant_id' => $grant_data['grant_id'],
			'sd_riset' => $this->ci->input->post('sd_riset'),
			'sd_hibah' => $this->ci->security->xss_clean($this->ci->input->post('sd_hibah')),
			'sd_skema_hibah' => $this->ci->security->xss_clean($this->ci->input->post('sd_skema_hibah')),
			'sd_source' => $this->ci->security->xss_clean($this->ci->input->post('sd_source')),
			'total_proposed' => $this->ci->security->xss_clean($this->ci->input->post('total_proposed')),
			'total_approved' => $this->ci->security->xss_clean($this->ci->input->post('total_approved')),
			'year_1' => $this->ci->security->xss_clean($this->ci->input->post('year_1')),
			'year_2' => $this->ci->security->xss_clean($this->ci->input->post('year_2')),
			'year_3' => $this->ci->security->xss_clean($this->ci->input->post('year_3')),
			'report_progress' => $this->ci->security->xss_clean($this->ci->input->post('report_progress')),
			'last_report' => $this->ci->security->xss_clean($this->ci->input->post('last_report')),
			'sp' => $this->ci->security->xss_clean($this->ci->input->post('sp')),
			'description' => $this->ci->security->xss_clean($this->ci->input->post('description')),
		);
		$act = $this->ci->grant->insert('grants', $grant_data);
		if($act){
			$this->ci->grant->insert('grants_detail', $grant_detail);
			$this->ci->session->set_flashdata('success','New Grant data has been saved.');
		}else 
			$this->ci->session->set_flashdata('error','Trouble saving grant.');
		
		redirect('grants');
	}
		
	public function update_grant(){
		$id = $this->ci->input->post('grant_id');
		$grant_data = array(
			'main_researcher' => $this->ci->security->xss_clean($this->ci->input->post('main_researcher')),
			'member_researcher' => $this->ci->security->xss_clean($this->ci->input->post('member_researcher')),
			'research_title' => $this->ci->security->xss_clean($this->ci->input->post('research_title')),
			'contract_number' => $this->ci->input->post('contract_number'),
			'grant_year' => $this->ci->input->post('grant_year'),
			'st_year' => $this->ci->input->post('st_year'),
			'st_submision' => $this->ci->input->post('st_submision'),
			'selection' => $this->ci->input->post('selection'),
			'site' => $this->ci->input->post('site'),
			'date_update' => date('Y-m-d H:i:s'),
		);
		$grant_detail = array(
			'sd_riset' => $this->ci->input->post('sd_riset'),
			'sd_hibah' => $this->ci->security->xss_clean($this->ci->input->post('sd_hibah')),
			'sd_skema_hibah' => $this->ci->security->xss_clean($this->ci->input->post('sd_skema_hibah')),
			'sd_source' => $this->ci->security->xss_clean($this->ci->input->post('sd_source')),
			'total_proposed' => $this->ci->security->xss_clean($this->ci->input->post('total_proposed')),
			'total_approved' => $this->ci->security->xss_clean($this->ci->input->post('total_approved')),
			'year_1' => $this->ci->security->xss_clean($this->ci->input->post('year_1')),
			'year_2' => $this->ci->security->xss_clean($this->ci->input->post('year_2')),
			'year_3' => $this->ci->security->xss_clean($this->ci->input->post('year_3')),
			'report_progress' => $this->ci->security->xss_clean($this->ci->input->post('report_progress')),
			'last_report' => $this->ci->security->xss_clean($this->ci->input->post('last_report')),
			'sp' => $this->ci->security->xss_clean($this->ci->input->post('sp')),
			'description' => $this->ci->security->xss_clean($this->ci->input->post('description')),
		);
		$act = $this->ci->grant->update('grants', array('grant_id', $id), $grant_data);
		if($act){
			$this->ci->grant->update('grants_detail', array('grant_id', $id), $grant_detail);
			$this->ci->session->set_flashdata('success','Grant data has been updated.');
		}else 
			$this->ci->session->set_flashdata('error','Trouble updating grant.');
		
		redirect('grants');
	}
	

	public function delete_grant(){
		$id = $this->ci->input->post('grant_id');
		$act = $this->ci->grant->delete('grants', array('grant_id', $id));
		if($act) $this->ci->session->set_flashdata('success','grant data has been deleted.');
		else $this->ci->session->set_flashdata('error','Trouble deleting grant.');
		redirect('grants');
	}

	public function granted($grant_id){
		$act = $this->ci->grant->update('grants', array('grant_id', $grant_id), array('st_granted'=>1));
		if($act) $this->ci->session->set_flashdata('success','Grant has been verified.');
		else $this->ci->session->set_flashdata('error','Trouble verifying grant.');
		redirect('grants/action/detail/'.$grant_id);
	}
	
	public function publish_grant(){
		$grant_id = $this->ci->input->post('grant_id');
		$act = $this->ci->grant->update('grants', array('grant_id', $grant_id), array('publish'=>1));
		if($act) $this->ci->session->set_flashdata('success','grant data has been published.');
		else $this->ci->session->set_flashdata('error','Trouble publishing grant.');
		redirect('grants');
	}
	
	private function get_department_name($dept_id){
		$this->ci->load->model('Mdl_cms');
		$data = $this->ci->Mdl_cms->current_department($dept_id);
		return $data[0]['department_name'];
	}
	
	public function export($param){		
		$dept_id = isset($_GET['department_id']) ? $_GET['department_id']:'';
		$year = isset($_GET['year']) ? $_GET['year']:'';
		
		$this->data['dept_id'] = $dept_id;
		$this->data['year'] = $year;
		
		$this->data['title'] = 'DATA GRANT FAKULTAS TEKNIK<br/>';
		$this->data['title'] .= 'UNIVERSITAS INDONESIA<br/>';
		$this->data['title'] .= $year ? 'TAHUN '.$year:'';
		if($dept_id !== ""){
			$this->data['title'] = 'DATA GRANT DEPARTEMEN ';
			$this->data['title'] .= strtoupper($this->get_department_name($dept_id)).'<br/>FAKULTAS TEKNIK ';
			$this->data['title'] .= 'UNIVERSITAS INDONESIA<br/>';
			$this->data['title'] .= $year ? 'TAHUN '.$year:'';
		}
		
		$uid = $this->ci->session->userdata('user_id');
		$role = $this->ci->session->userdata('role');
		$this->data['grants'] = $this->ci->grant->get_all_grant_report($role, $uid, $dept_id, $year);
		if($param == 'excel'){
			$this->ci->load->view('template/page/export_excel_grant', $this->data);
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
			$html = $this->ci->load->view('template/page/export_pdf_grant', $this->data, true);
			$pdf->writeHTML($html, true, false, true, false, '');
						
			#finish pdf
			$pdf->lastPage();
			$pdf->Output('grant-'.date('YmdHis').'.pdf', 'I');
		}
	}
	
}