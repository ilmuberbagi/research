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
		$this->ci->load->model('Mdl_publication','pub');
    }

	public function get_name_from_user_id($uid){
		return $this->ci->pub->get_name_from_user_id($uid);
	}
	
	public function print_author($pub_id){
		$data = $this->ci->pub->get_authors($pub_id);
		$author = '';
		if(count($data)>0){
			$no =0; foreach($data as $a){ $no++;
				if($no == count($data)) $author .= $a['name'];
				else $author .= $a['name'].', ';
			}
		}
		return $author;
	}
	

	
}