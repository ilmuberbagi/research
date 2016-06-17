<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function assets_url($path = NULL){
	return $path == "" ? base_url().'assets/' : base_url().'assets/'.preg_replace("/^\//","",$path);
}

function js_url($path = '') {
    return assets_url("js/" . (empty($path) ? '' : "/" . preg_replace("/^\//", "", $path)));
}

function css_url($path = '') {
    return assets_url("css/" . (empty($path) ? '' : "/" . preg_replace("/^\//", "", $path)));
}
