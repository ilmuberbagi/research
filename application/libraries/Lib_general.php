<?php

/**
 * @package    Research FTUI/libraries - 2016
 * @author     Sabbana
 * @copyright  Ilmu Berbagi Foundation
 * @version    1.0
 */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lib_general {

    private $ci;

    function __construct() {
        $this->ci =&get_instance();
		$this->ci->load->model('Mdl_publication');
    }

	public function get_name_from_user_id($uid){
		return $this->ci->Mdl_publication->get_name_from_user_id($uid);
	}
	
	

	
}