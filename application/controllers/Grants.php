<?php	

/**
 * research FTUI 
 * author : sabbana
 * date create : 17/07/2016
 * company : Ilmuberbagi
 */

class Grants extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('user_id') == '') redirect('login');
		$this->load->library('Lib_grant');
		$this->load->model('Mdl_grant','grant');
	}
	
	public function index(){
		$this->load->model('Mdl_cms');
		$this->data['title'] = 'Grant Data';
		$this->data['page'] = 'page/grant';
		$this->data['departments'] = $this->Mdl_cms->get_department();
		$this->data['years'] = $this->Mdl_cms->get_years();
		$dept_id = isset($_GET['department_id']) ? $_GET['department_id']:'';
		$year = isset($_GET['year']) ? $_GET['year']:'';
		
		$this->data['dept_id'] = $dept_id;
		$this->data['year'] = $year;
		$role = $this->session->userdata('role');
		$uid = $this->session->userdata('user_id');
		$this->data['grants'] = $this->grant->get_all_grant($role, $uid, $dept_id, $year);		
		$this->load->view('template', $this->data);
	}

	public function action($param = "", $id="", $another_id=""){
		switch($param){
			case "input": $this->input(); break;
			case "edit": $this->edit($id); break;
			case "delete": $this->lib_grant->delete_grant(); break;
			case "insert": $this->lib_grant->insert_grant(); break;
			case "update": $this->lib_grant->update_grant(); break;
			case "publish": $this->lib_grant->publish_grant(); break;
			case "detail": $this->detail_grant($id); break;
			case "import": $this->import_excel(); break;
			case "granted": $this->lib_grant->granted($id); break;
			case "save_author": $this->lib_grant->save_author(); break;
			case "export": $this->lib_grant->export($id); break;
			case "delete_author": $this->lib_grant->delete_author($id, $another_id); break;
		}
	}
	
	public function input(){	
		$this->data['title'] = "Grant Input Data";
		if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){
			$this->load->model('Mdl_cms','cms');
			$this->data['researchers'] = $this->cms->get_all_user_active();
		}
		$this->data['page'] = "page/form_grant";
		$this->load->view('template', $this->data);
	}
	
	public function edit($id){	
		$this->data['title'] = "Grant Edit Data";
		$this->data['cg'] = $this->grant->current_grant($id);
		$this->data['page'] = "page/form_grant";
		$this->load->view('template', $this->data);
	}
	
	public function detail_grant($id){
		$this->data['title'] = "Grant Detail";
		$this->data['cg'] = $this->grant->current_grant($id);
		$this->data['page'] = "page/grant_detail";
		$this->load->view('template', $this->data);
	}
	
	public function import_excel(){
		$this->data['title'] = "Import Grant";
		$this->data['page'] = "page/import";
		$this->load->view('template', $this->data);
	}
	
	public function upload_form_grant(){
		$config['upload_path'] = './uploads/grant/form/';
		$config['allowed_types'] = 'xls';
		$config['max_size']    = '10000';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()){
			$err = $this->upload->display_errors();
			$this->session->set_flashdata('error','&nbsp; Terjadi kesalahan saat upload file. Pastikan file yang Anda upload berextensi xls dan ukuran tidak melebihi 10 MB'. $err);
			redirect('grant/action/import');
		}
		else{
			$upload_data = array('upload_data' => $this->upload->data());
			$filename = $upload_data['upload_data']['file_name'];
			
			redirect('grants/import_grant/'.$filename);
		}
	}

	function import_grant($filename = ''){
		require_once('includes/xls_report/PHPExcel.php');
		$xls_file = 'uploads/grant/form/'.$filename;

		$objReader = new PHPExcel_Reader_Excel5();
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($xls_file); #return $filename;
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
		$totalrow = count($sheetData); #return $sheetData;
		
		# get active record
		$start_record = 6;
		$data = array();
		$detail = array();
		$index = 0;
		$status = 0;
		// echo $sheetData[5][3]; die();
		while ($start_record < $totalrow){
			$data[$index]['grant_id'] = date('YmdHis').mt_rand(0,100);
			$data[$index]['department_id'] = $this->session->userdata('department_id');
			$data[$index]['user_id'] = $this->session->userdata('user_id');
			$data[$index]['main_researcher'] = $this->security->xss_clean($sheetData[$start_record][1]);
			$data[$index]['member_researcher'] = $this->security->xss_clean($sheetData[$start_record][2]);
			$data[$index]['research_title'] = $this->security->xss_clean($sheetData[$start_record][3]);
			$data[$index]['contract_number'] = $this->security->xss_clean($sheetData[$start_record][19]);
			$data[$index]['grant_year'] = $this->security->xss_clean($sheetData[$start_record][20]);
			$data[$index]['st_year'] = strtolower($this->security->xss_clean($sheetData[$start_record][9])) == 'single' ? 0:1;
			$data[$index]['st_submision']= strtolower($this->security->xss_clean($sheetData[$start_record][10])) == 'baru' ? 0:1;
			$data[$index]['selection'] = $this->security->xss_clean($sheetData[$start_record][11]);
			$data[$index]['site'] = $this->security->xss_clean($sheetData[$start_record][12]);
			$data[$index]['st_granted'] = $this->security->xss_clean($sheetData[$start_record][13]) ? 1:0;
			$data[$index]['date_input'] = date('Y-m-d H:i:s');
			$data[$index]['date_update'] = date('Y-m-d H:i:s');
			// print_r($data); die();
			$detail[$index]['grant_id'] = $data[$index]['grant_id'];
			$detail[$index]['sd_riset'] = strtolower($this->security->xss_clean($sheetData[$start_record][5])) == 'riset' ? 0:1;
			$detail[$index]['sd_hibah'] = $this->security->xss_clean($sheetData[$start_record][6]);
			$detail[$index]['sd_skema_hibah'] = $this->security->xss_clean($sheetData[$start_record][7]);
			$detail[$index]['sd_source'] = $this->security->xss_clean($sheetData[$start_record][8]);
			$detail[$index]['total_proposed'] = $this->security->xss_clean($sheetData[$start_record][14]);
			$detail[$index]['total_approved'] = $this->security->xss_clean($sheetData[$start_record][15]);
			$detail[$index]['year_1'] = $this->security->xss_clean($sheetData[$start_record][16]);
			$detail[$index]['year_2'] = $this->security->xss_clean($sheetData[$start_record][17]);
			$detail[$index]['year_3'] = $this->security->xss_clean($sheetData[$start_record][18]);
			$detail[$index]['report_progress'] = $this->security->xss_clean($sheetData[$start_record][21]);
			$detail[$index]['last_report'] = $this->security->xss_clean($sheetData[$start_record][22]);
			$detail[$index]['sp'] = $this->security->xss_clean($sheetData[$start_record][23]);
			$detail[$index]['description'] = $this->security->xss_clean($sheetData[$start_record][26]);
			$detail[$index]['mitra_name'] = $this->security->xss_clean($sheetData[$start_record][24]);
			$detail[$index]['mitra_institusion'] = $this->security->xss_clean($sheetData[$start_record][25]);
			# save each record
			// print_r($data);
			// print_r($detail);
			// die();
			$act = $this->grant->insert('grants', $data[$index]);
			if($act){
				$status++;
				$this->grant->insert('grants_detail', $detail[$index]);
			}

			$start_record++;
			$index++;
		}
		$clear = unlink($xls_file);
		if($status > 0) $this->session->set_flashdata('success','<b>'.$status.'</b> Record successfull imported.');
		else $this->session->set_flashdata('warning','Trouble importing data');
		redirect('grants/action/import');
	}
	

}