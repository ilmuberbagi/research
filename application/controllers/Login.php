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
	
	public function proc_register_email(){
		// $this->load->library('recaptcha');
		// $recaptcha = $this->input->post('g-recaptcha-response');
        // if (!empty($recaptcha)) {
            // $response = $this->recaptcha->verifyResponse($recaptcha);
            // if (isset($response['success']) and $response['success'] === true) {
				$this->load->helper('misc');
				// $pass = generatePassword(8,4);
				$userid = $this->security->xss_clean($this->input->post('user_id'));
				$code = $this->security->xss_clean($this->input->post('usercode'));
				$status = $this->input->post('role_id');
				$name = $this->security->xss_clean($this->input->post('name'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$data = array(
					'user_id'	=> $userid,
					'user_code'	=> $code,
					'name'		=> $name,
					'email'		=> $email,
					'role_id'	=> $status,
					'department_id'	=> $this->input->post('department_id'),
					'password'	=> md5($code),
					'phone'		=> $this->security->xss_clean($this->input->post('phone')),
					'functional' => $this->security->xss_clean($this->input->post('functional')),
					'date_create' => date('Y-m-d H:i:s'),
				);
				$act = $this->mdl_login->create_user($data);
				if($act){
					# sending emil
					$this->load->library('Lib_mailer');
					$this->lib_mailer->init();
					$bcc = array(
						'email' => 'sabbana.a7@gmail.com',
						'name'	=> 'Sabbana Azmi'
					);
					$result = array(
						'user_id'	=> $userid,
						'password'	=> $pass,
						'status'	=> $status,
						'name'		=> $name,
					);
					$message = $this->load->view('template/mailer/createUser', $result, TRUE);
					$send = $this->lib_mailer->sendmail(array('email'=>$email), 'Research FTUI', $message, '', $bcc);
										
					if($send){
						$this->session->set_flashdata('success','<b>Success,</b> Registration process successfully. We just send you an email containing your account to login into application.');
					}else{
						$this->session->set_flashdata('warning','<b>Warning!</b> We could not send your account to your email. Please contact administrator.');
					}				
				}else
					$this->session->set_flashdata('warning','<b>Error</b> Trouble while register new user!');
			// }else
				// $this->session->set_flashdata('Warning','<b>Warning,</b> Please pass the capcha request!');
        // }else
			// $this->session->set_flashdata('Warning','<b>Warning,</b> Please pass the capcha request!');
		
		redirect('register');
	}

	public function proc_register(){
		$this->load->helper('misc');
		// $pass = generatePassword(8,4);
		$userid = $this->security->xss_clean($this->input->post('user_id'));
		$code = $this->security->xss_clean($this->input->post('usercode'));
		// $status = $this->input->post('role_id');
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
			$this->session->set_flashdata('success','<b>Success,</b> Proses registrasi peneliti berhasil. Mohon menunggu untuk proses verifikasi oleh admin. Silakan gunakan <b>user ID</b> dan <b>NIP/NUP </b>untuk masuk ke aplikasi pertama kali. Gunakan fitur <b>Change Password </b> untuk memperbaharui password Anda.');
		}else{
			$this->session->set_flashdata('warning','<b>Warning!</b> Terjadi kesalahan saat memproses data. Proses registrasi peneliti gagal dilakukan. Mohon untuk menghubungi administrator.');
		}				
		redirect('register');
	}
	
	/**
	 * reset password 
	 * @email
	 */
	 
	public function test(){
		$to      = 'sabbana.a7@gmail.com';
		$subject = 'the subject';
		$message = 'hello';
		$headers = 'From: webmaster@example.com' . "\r\n" .
			'Reply-To: webmaster@example.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		$send = mail($to, $subject, $message, $headers);
		var_dump($send);

	}
	 
	public function reset_password(){
		$email = $this->input->post('email');
		$this->load->library('Lib_mailer');
		$this->lib_mailer->init();
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
				$send = $this->lib_mailer->sendmail(array('email'=>$email), 'Research FTUI', $message, '', $bcc);
				var_dump($send); die();
				if($send != -1){
					$msg = '<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Success!</h4>Your new password has been sent to your email.</div>';
					$this->session->set_flashdata('invalid',$msg);
				}else{
					$msg = '<div class="alert alert-warning alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Warning!</h4>Trouble while sending email.</div>';
					$this->session->set_flashdata('invalid',$msg);
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
