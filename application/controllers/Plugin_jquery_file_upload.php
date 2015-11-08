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

	/**
	* JQUERY-FILE-UPLOAD plugin Upload files to /files
	* change the path directory in : application/libraries/Uploadhandler.php
	*/
	public function upload_image_perfil()
	{
		$path = $this->load->get_var('varGlobal')['tmpPath'];
		$url = $this->load->get_var('varGlobal')['tmpUrl'];
		/*$options = array(
			'print_response' => false,
			'script_url' 		=> 'xxx',
			'upload_dir'		=> $path,
			'upload_url'		=> $url
		);*/
		$this->load->library('uploadhandler');

		$dataUpload = $this->uploadhandler->post();
		$nameFile = isset($dataUpload['files'][0]->name) ? $dataUpload['files'][0]->name : false;

		$userData = $this->session->userdata('user');

		if (!is_null($userData) && is_array($userData)
			&& !empty($path) && !empty($url) && !empty($nameFile)
		) {
			$userData['uploads']['perfil'] = array(
				'path'	=> $path .  $nameFile,
				'url'	=> $url . $nameFile
			);
			$this->session->set_userdata('user', $userData);
			json_encode($userData['uploads']['perfil']['url']);
		} else {
			echo 0;
		}

		var_dump($this->session->userdata('user'));exit;
	}

}
