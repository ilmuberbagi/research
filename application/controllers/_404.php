<?php

/**
 * @package    studio_hub / 2015
 * @author     Alikuro, Alnol, Sabbana
 * @copyright  PT. Kompas Cyber Media
 * @version    1.0
 */

if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class _404 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		$this->data['page'] = '_404';
        $this->load->view('template', $this->data);
    }
}
