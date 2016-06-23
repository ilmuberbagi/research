<?php

/**
 * @package    research / libraries - 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 *
 *
 * Documentation :
 *  This is how to implement a simply send mail by lib_mailer: 
 *
 *  $this->load->library('lib_mailer');
 *  $this->lib_mailer->init();
 *  $this->lib_mailer->sendmail(array('email'=>$email), 'Subject', 'message');
 */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lib_mailer {

    private $ci;
	private $mail;
    private $data;

    function __construct() {
    	require 'mailer/class.phpmailer.php';
    	require 'mailer/class.smtp.php';
        $this->ci =&get_instance();
        $this->mail = new PHPMailer();
    }

    public function init($from=array()) {
    	$this->mail->setFrom((isset($from['email'])?$from['email']:'noreply.risetft@eng.ui.ac.id'), (isset($from['name'])?$from['name']:'Research FTUI'));
 		$this->isSMTP();
    }

	# smtp server
	// public function isSMTP()
	// {
    	// $this->mail->isSMTP();
		// $this->mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		// $this->mail->SMTPAuth = true; // authentication enabled
		// $this->mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		// $this->mail->Host = "smtp.eng.ui.ac.id";
		// $this->mail->Port = 465; // or 587
		// $this->mail->IsHTML(true);
		// $this->mail->Username = "research";
		// $this->mail->Password = "3yha6anyq";
    // }
	
	# google rely
	public function isSMTP()
	{
		# mail relay google 
    	$this->mail->isSMTP();
		$this->mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$this->mail->SMTPAuth = true; // authentication enabled
		$this->mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$this->mail->Host = "smtp.gmail.com";
		$this->mail->Port = 465; // or 587
		$this->mail->IsHTML(true);
		$this->mail->Username = "info@ilmuberbagi.or.id";
		$this->mail->Password = "chonnam2012";
    }
	
	# local SMPT
	// public function isSMTP($host='smtp.eng.ui.ac.id', $port=465, $auth=True, $username='research', $password='3yha6anyq') {
    	// $this->mail->isSMTP();
		// $this->mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    	// $this->mail->SMTPAuth = $auth;
    	// $this->mail->Host = $host;
    	// $this->mail->Port = $port;
		// $this->mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    	// if(!empty($username))
    		// $this->mail->Username = $username;
    	// if(!empty($password))
    		// $this->mail->Password = $password;
    // }

    public function sendmail($to, $subject, $message, $cc=array(), $bcc=array()) {
    	if(!is_array($to))
    		return FALSE;
    	if(isset($to['email']))
    		$this->mail->addAddress($to['email'], (isset($to['name'])?$to['name']:'') );
    	else if(isset($to[0]['email']))
    		foreach ($to as $key) { $this->mail->addAddress($key['email'], (isset($key['name'])?$key['name']:'') ); }
    	else
    		return FALSE;

        // Copy Carbon/ CC
        if(isset($cc['email']))
            $this->mail->addCC($cc['email'], (isset($cc['name'])?$cc['name']:'') );
        else if(isset($cc[0]['email']))
            foreach ($cc as $key) { $this->mail->addCC($key['email'], (isset($key['name'])?$key['name']:'') ); }

        // Blank Carbon/ BCC
        if(isset($bcc['email']))
            $this->mail->addBCC($bcc['email'], (isset($bcc['name'])?$bcc['name']:'') );
        else if(isset($bcc[0]['email']))
            foreach ($bcc as $key) { $this->mail->addBCC($key['email'], (isset($key['name'])?$key['name']:'') ); }

    	$this->mail->Subject = $subject;
    	$this->mail->msgHTML($message);

    	if(!$this->mail->send()) {
			return -1;
    	}
    	return TRUE;
    }

}
