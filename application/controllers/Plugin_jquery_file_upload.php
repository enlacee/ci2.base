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

		// css
		$this->layout->css(array(base_url() . 'assets/lib/blueimp-file-upload/css/jquery.fileupload.css'));
		// js
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/vendor/jquery.ui.widget.js'));
		//(x) $this->layout->js(array(base_url() . 'assets/lib/blueimp-tmpl/js/tmpl.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-load-image/js/load-image.all.min.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-canvas-to-blob/js/canvas-to-blob.min.js'));
		//(no found) blueimp Gallery script : jquery.blueimp-gallery.min.js
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.iframe-transport.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload.js'));
		
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-process.js'));
		/*
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-image.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-audio.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-video.js'));
		*/
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-validate.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-ui.js'));

		$this->layout->js(array(base_url() . 'assets/js/plugin_jquery_file_upload.index.js'));

		// set view
		$this->layout->view('frontend/plugin_jquery_file_upload/index', $data);
	}

	//Update
	public function update()
	{
		$data = array();

		$this->layout->view('frontend/plugin_jquery_file_upload/update', $data);
	}

	/**
	* Upload image perfil
	* Max sise is 100 kb
	*/
	public function upload_image_perfil()
	{
		$result = array();
		$pathBase = $this->load->get_var('varGlobal')['tmpPath'];
		$urlBase = $this->load->get_var('varGlobal')['tmpUrl'];
		$config['upload_path']          = $pathBase;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100; //kilobytes
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$result['files']['error'] = $this->upload->display_errors();
		} else {
			// get data session
			$sessionUser = $this->session->userdata('user');
			if (!is_null($sessionUser) && is_array($sessionUser)) {
				$result['files'] = $this->upload->data();
				$result['files']['url'] =  $urlBase . $this->upload->data('file_name');
				// save in session
				$sessionUser['uploads']['perfil'] = $result;
				$this->session->set_userdata('user', $sessionUser);
			} else {
				$result = $data['files']['error'] = 'Error session expired!.';
			}
		}

		echo json_encode($result);
		exit;
	}

}
