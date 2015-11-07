<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$file = FCPATH."application/core/Public_Controller.php"; (is_file($file)) ? include($file) : die("error: {$file}");


class Plugin_jquery_file_upload extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->setLayout('layouts/frontend/plugin_jquery_file_upload');
	}

	public function index()
	{
		$data = array();

		$this->addLibraryFormValidation();
		
		$this->layout->css(array(base_url() . 'assets/lib/blueimp-file-upload/css/jquery.fileupload.css') );
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/vendor/jquery.ui.widget.js') );
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.iframe-transport.js') );
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload.js') );

		$this->layout->js(array(base_url() . 'assets/js/plugin_jquery_file_upload.index.js'));
		$this->layout->view('frontend/plugin_jquery_file_upload/index', $data);
	}

	//Update
	public function update()
	{
		$data = array();

		$this->layout->view('frontend/plugin_jquery_file_upload/update', $data);
	}
}
