<?php

/**
 * @package    Research FTUI / 2016
 * @author     Sabbana
 * @copyright  Ilmu Berbagi Foundation
 * @version    1.0
 */

if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mdl_login');
    }

    public function index() {
		$this->load->view('template/login');
	}
	
	private function clean($str){
		return str_replace(array('"',"'"),'', $str);
	}
	
	public function auth(){
		$user = $this->clean($this->input->post('username'));
		$pass = $this->clean($this->input->post('password'));
		$user = $this->mdl_login->get_user($user, $pass);
		if(!empty($user)){
			#create session
			$this->mdl_login->update($user[0]['user_id'], array('last_login'=> date('Y-m-d H:i:s')));
			$sessionData = array(
				'user_id'	=> $user[0]['user_id'],
				'department_id'	=> $user[0]['department_id'],
				'email'		=> $user[0]['email'],
				'avatar'	=> $user[0]['avatar'],
				'name'		=> $user[0]['name'],
				'role'		=> $user[0]['role_id'],
				'status'	=> $user[0]['role_name'],
				'last_login'=> $user[0]['last_login']
			);
			$this->session->set_userdata($sessionData);
			redirect('dashboard');
		}else{
			$msg = '<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-warning"></i> Error!</h4>Invalid Username and/or password!</div>';
			$this->session->set_flashdata('invalid',$msg);
			redirect('login');
		}
	}
	
	public function reset(){
		$this->load->view('template/reset');
	}
	
	public function register(){
		$this->load->model('Mdl_cms','cms');
		$data['department'] = $this->cms->get_department();
		$this->load->view('template/register', $data);
	}
	
	public function check_user(){
		$key = $this->input->post('key');
		$value = $this->input->post('value');
		$res = $this->mdl_login->check_user($key, $value);
		echo $res;
	}

	public function proc_register(){
		$this->load->helper('misc');
		$userid = $this->security->xss_clean($this->input->post('user_id'));
		$code = $this->security->xss_clean($this->input->post('usercode'));
		$name = $this->security->xss_clean($this->input->post('name'));
		$email = $this->security->xss_clean($this->input->post('email'));
		$data = array(
			'user_id'	=> $userid,
			'user_code'	=> $code,
			'name'		=> $name,
			'email'		=> $email,
			'status'	=> 0,
			'role_id'	=> 3,
			'department_id'	=> $this->input->post('department_id'),
			'password'	=> md5($code),
			'phone'		=> $this->security->xss_clean($this->input->post('phone')),
			'functional' => $this->security->xss_clean($this->input->post('functional')),
			'date_create' => date('Y-m-d H:i:s'),
		);
		$act = $this->mdl_login->create_user($data);
		if($act){

			$result = array(
				'user_id'	=> $userid,
				'password'	=> $code,
				'name'		=> $name
			);
			$message = $this->load->view('template/mailer/register', $result, TRUE);
			$this->load->library('email'); // load email library
			$this->email->from('risetft@eng.ui.ac.id', 'Riset FTUI');
			$this->email->to($email);
			$this->email->bcc('sabbana.log@gmail.com'); 
			$this->email->subject('Register Researcher');
			$this->email->message($message);
			if($this->email->send()){
				$this->session->set_flashdata('success','<b>Success,</b> Registration process successfully. We just send you an email containing your account to login into application.  Please open your email inbox now if you don\'t find it, maybe it in spam');
			}else{
				$this->session->set_flashdata('warning','<b>Warning!</b> We could not send your account to your email. Please contact administrator.');
			}

			
			#$this->session->set_flashdata('success','<b>Success,</b> Proses registrasi peneliti berhasil. Mohon menunggu untuk proses verifikasi oleh admin. Silakan gunakan <b>user ID</b> dan <b>NIP/NUP </b>untuk masuk ke aplikasi pertama kali. Gunakan fitur <b>Change Password </b> untuk memperbaharui password Anda.');
		}else{
			$this->session->set_flashdata('warning','<b>Warning!</b> Terjadi kesalahan saat memproses data. Proses registrasi peneliti gagal dilakukan. Mohon untuk menghubungi administrator.');
		}				
		redirect('register');
	}
	
	/**
	 * reset password 
	 * @email
	 */
	 
	 
	public function reset_password(){
		$email = $this->input->post('email');
		# get data member
		$data = $this->mdl_login->check_user_data('email', $email);
		if(!empty($data)){
			$bcc = array(
				'email' => 'sabbana.a7@gmail.com',
				'name'	=> 'Sabbana Azmi'
			);
			$this->load->helper('misc');
			$result = array(
				'password'	=> generatePassword(8, 4),
				'user_id'	=> $data[0]['user_id'],
				'name'		=> $data[0]['name'],
				'status'	=> $data[0]['status'],
			);
			# update password
			$act = $this->mdl_login->update($data[0]['user_id'], array('password' => md5($result['password'])));
			if($act){
				$message = $this->load->view('template/mailer/password_reset', $result, TRUE);
				$this->load->library('email'); // load email library
				$this->email->from('risetft@eng.ui.ac.id', 'Riset FTUI');
				$this->email->to($email);
				$this->email->bcc('sabbana.log@gmail.com'); 
				$this->email->subject('Reset Password');
				$this->email->message($message);
				if($this->email->send()){
					$msg = '<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                    <h4><i class="icon fa fa-check-circle"></i> Success!</h4>We just send you a new password to your email address. Please open your email inbox now if you don\'t find it, maybe it in spam.</div>';
					$this->session->set_flashdata('invalid', $msg);
				}else{
					#print_r($this->email->send()); die();
					$msg = '<div class="alert alert-warning alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                    <h4><i class="icon fa fa-warning"></i> Invalid!</h4>Trouble sending new password to email address.</div>';
					$this->session->set_flashdata('invalid', $msg);
				}
			}
		}else{
			$msg = '<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Invalid!</h4>Invalid email address.</div>';
			$this->session->set_flashdata('invalid',$msg);
		}
		redirect('reset');
	}
	
	public function activation($token){
		$act = $this->mdl_login->account_activation($token);
		if($act){
			$msg = '<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>Your account has been activated. Please user your account to log in into dashboard FTUI.</div>';
			$this->session->set_flashdata('invalid',$msg);
		}else{
			$msg = '<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Warning!</h4>Problem was detected while activating your account, please contact administrator.</div>';
			$this->session->set_flashdata('invalid',$msg);
		}
		redirect('login');
	}
	
    public function signout(){
		$this->session->sess_destroy();
        redirect('login');
    }

}
