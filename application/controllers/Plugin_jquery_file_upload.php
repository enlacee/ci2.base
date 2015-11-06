<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugin_jquery_file_upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->setLayout('layouts/frontend/plugin_jquery_file_upload');
	}

	public function index()
	{
		$data = array();

		$this->layout->view('frontend/plugin_jquery_file_upload/index', $data);
	}

	//Update
	public function update()
	{
		$data = array();

		$this->layout->view('frontend/plugin_jquery_file_upload/update', $data);
	}
}
