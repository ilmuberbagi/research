<?php

/**
 * @package    portal IBF/libraries - 2016
 * @author     Sabbana
 * @copyright  Ilmu Berbagi Foundation
 * @version    1.0
 */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lib_auth {

    private $ci;

    function __construct() {
        $this->ci =&get_instance();
        $this->init();
    }

    /**
     * This function initialize every time the page is load
     * 
     */
    function init() {
        // check whether user login or not
        $this->is_signin();
    }
	
	private function is_signin() {
		$sess = $this->ci->session->userdata('token_string');
		if(empty($sess))
			redirect('login');
    }



}