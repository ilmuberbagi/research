<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config["image_upload_path"] = $_SERVER['DOCUMENT_ROOT'] . 'assets/img/uploads/';
$config["image_upload_url"] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://".$_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']) . 'assets/img/uploads/';
$config["image_upload_url_thumb"] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://".$_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']) . 'assets/img/uploads/thumbs/';


