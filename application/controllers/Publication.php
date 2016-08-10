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

	public function action($param = "", $id="", $another_id=""){
		switch($param){
			case "input": $this->input(); break;
			case "edit": $this->edit($id); break;
			case "delete": $this->lib_publication->delete_publication(); break;
			case "insert": $this->lib_publication->insert_publication(); break;
			case "update": $this->lib_publication->update_publication(); break;
			case "publish": $this->lib_publication->publish_publication(); break;
			case "sidr": $this->preview_sidr($id); break;
			case "import": $this->import_excel(); break;
			case "sidr_verify": $this->lib_publication->sidr_verify($id); break;
			case "save_author": $this->lib_publication->save_author(); break;
			case "export": $this->lib_publication->export($id); break;
			case "delete_author": $this->lib_publication->delete_author($id, $another_id); break;
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
	
	public function preview_sidr($pub_id){
		$this->data['title'] = "SIDR Attachment";
		$this->data['curr_pub'] = $this->pub->current_publication($pub_id);
		$this->data['page'] = "page/sidr";
		$this->load->view('template', $this->data);
	}
	
	public function import_excel(){
		$this->data['title'] = "Import Publication";
		$this->data['page'] = "page/import";
		$this->load->view('template', $this->data);
	}
	
	public function upload_form_publication(){
		$config['upload_path'] = './uploads/publication/form/';
		$config['allowed_types'] = 'xls';
		$config['max_size']    = '10000';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()){
			$err = $this->upload->display_errors();
			$this->session->set_flashdata('error','&nbsp; Terjadi kesalahan saat upload file. Pastikan file yang Anda upload berextensi xls dan ukuran tidak melebihi 10 MB'. $err);
			redirect('publication/action/import');
		}
		else{
			$upload_data = array('upload_data' => $this->upload->data());
			$filename = $upload_data['upload_data']['file_name'];
			
			redirect('publication/import_publication/'.$filename);
		}
	}

	function import_publication($filename = ''){
		require_once('includes/xls_report/PHPExcel.php');
		$xls_file = 'uploads/publication/form/'.$filename;

		$objReader = new PHPExcel_Reader_Excel5();
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($xls_file); #return $filename;
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);
		$totalrow = count($sheetData); #return $sheetData;
		$type = $this->pub->get_publication_type();
		
		# get active record
		$start_record = 5;
		$data = array();
		$detail = array();
		$index = 0;
		$status = 0;
		// echo $sheetData[5][3]; die();
		while ($start_record < $totalrow){
			$data[$index]['pub_id'] = date('YmdHis').mt_rand(0,100);
			$data[$index]['author'] = $this->security->xss_clean($sheetData[$start_record][1]);
			$data[$index]['user_id'] = $this->session->userdata('user_id');
			$data[$index]['department_id'] = $this->session->userdata('department_id');
			$data[$index]['date_input'] = date('Y-m-d H:i:s');
			$data[$index]['date_update'] = date('Y-m-d H:i:s');
			$data[$index]['title'] = $this->security->xss_clean($sheetData[$start_record][3]);
			$data[$index]['publication_name'] = $this->security->xss_clean($sheetData[$start_record][4]);
			$data[$index]['abstract']= $this->security->xss_clean($sheetData[$start_record][5]);
			$data[$index]['sidr_upload'] = 0;
			$data[$index]['sidr_verify'] = 0;
			$x=0;
			$start_col = 8;
			foreach($type as $a){ $x++;
				$data[$index]['pub_type_id'] = $sheetData[$start_record][$start_col]; $start_col++;
				if($data[$index]['pub_type_id'] !== NULL){
					$data[$index]['pub_type_id'] = $x;
					break;
				}
			}
			$detail[$index]['pub_id'] = $data[$index]['pub_id'];
			$detail[$index]['page'] = $this->security->xss_clean($sheetData[$start_record][20]);
			$detail[$index]['issn_isbn'] = $this->security->xss_clean($sheetData[$start_record][21]);
			$detail[$index]['detail'] = $this->security->xss_clean($sheetData[$start_record][22]);
			$detail[$index]['jcr'] = $this->security->xss_clean($sheetData[$start_record][23]);
			$detail[$index]['scr'] = $this->security->xss_clean($sheetData[$start_record][24]);
			$detail[$index]['q_year'] = $this->security->xss_clean($sheetData[$start_record][25]);
			$detail[$index]['freq_year'] = $this->security->xss_clean($sheetData[$start_record][26]);
			$detail[$index]['pub_country'] = $this->security->xss_clean($sheetData[$start_record][27]);
			$detail[$index]['publisher'] = $this->security->xss_clean($sheetData[$start_record][28]);
			$detail[$index]['pub_year'] = $this->security->xss_clean($sheetData[$start_record][29]);
			$detail[$index]['pub_website'] = $this->security->xss_clean($sheetData[$start_record][30]);
			$detail[$index]['db_index'] = $this->security->xss_clean($sheetData[$start_record][31]);
			# save each record
			$act = $this->pub->insert('publication', $data[$index]);
			if($act){
				$status++;
				$this->pub->insert('publication_detail', $detail[$index]);
			}

			$start_record++;
			$index++;
		}
		$clear = unlink($xls_file);
		if($status > 0) $this->session->set_flashdata('success','<b>'.$status.'</b> Record successfull imported.');
		else $this->session->set_flashdata('warning','Trouble importing data');
		redirect('publication/action/import');
	}
	

}