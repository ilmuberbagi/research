<?php  

/**
 * @package    adminportal / 2016
 * @author     Sabbana
 * @copyright  portal.ilmuberbagi.id
 * @version    1.0
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function UR_exists($url){
	if($url != ''){
		$headers=get_headers($url);
		return stripos($headers[0],"200 OK")?true:false;
	}else
		return false;
}

function image_url($url){
	if($url != "")
		$img = $url;
	else
		$img = site_url().'assets/img/foto/default.png';
	return $img;
}

function set_image($url, $param = null){
	$res = base_url().'assets/img/user.jpg';
	if($url != null)
		$res = $url;
	return $res;		
}

function generatePassword($length, $strength){
    $vowels = 'aeuy';
    $consonants = 'bdghjmnpqrstvz';
    if ($strength & 1)
        $consonants .= 'BDGHJLMNPQRSTVWXZ';
    if ($strength & 2) 
        $vowels .= "AEUY";
    if ($strength & 4) 
        $consonants .= '23456789';
    if ($strength & 8) 
        $consonants .= '@#$%';

    $password = '';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++){
        if ($alt == 1){
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        }else{
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}

?>