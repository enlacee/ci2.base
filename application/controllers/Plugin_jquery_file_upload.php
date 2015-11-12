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
		//$this->addLibraryFormValidation();
		// css
		$this->layout->css(array(base_url() . 'assets/lib/blueimp-file-upload/css/jquery.fileupload.css'));
		// js
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/vendor/jquery.ui.widget.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-load-image/js/load-image.all.min.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.iframe-transport.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-process.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-image.js'));
		$this->layout->js(array(base_url() . 'assets/js/plugin_jquery_file_upload.index.js'));

		// set view
		$this->layout->view('frontend/plugin_jquery_file_upload/index', $data);

	}

	//Update
	public function update()
	{
		$data = array();
		$this->layout->view('frontend/plugin_jquery_file_upload/base', $data);
	}

	public function base()
	{
		// css
		$this->layout->css(array(base_url() . 'assets/lib/blueimp-file-upload/css/jquery.fileupload.css'));
		// js
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/vendor/jquery.ui.widget.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-load-image/js/load-image.all.min.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.iframe-transport.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-process.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-image.js'));

		//layout
		$this->layout->js(array(base_url() . 'assets/js/plugin_jquery_file_upload.base.js'));
		$this->layout->view('frontend/plugin_jquery_file_upload/base');
	}

	public function upload_base()
	{
		$result = array();
		$pathBase = $this->load->get_var('varGlobal')['tmpPath'];
        $config['upload_path']          = $pathBase;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')) {
            $data = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        
		echo json_encode($data);
		exit;
    }

	public function base_plus()
	{
		// css
		$this->layout->css(array(base_url() . 'assets/lib/blueimp-file-upload/css/jquery.fileupload.css'));
		// js
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/vendor/jquery.ui.widget.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-load-image/js/load-image.all.min.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.iframe-transport.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-process.js'));
		$this->layout->js(array(base_url() . 'assets/lib/blueimp-file-upload/js/jquery.fileupload-image.js'));

		//layout
		$this->layout->js(array(base_url() . 'assets/js/plugin_jquery_file_upload.base_plus.js'));
		$this->layout->view('frontend/plugin_jquery_file_upload/base_plus');
	}

	public function upload_base_plus()
	{
		$result = array();
		$pathBase = $this->load->get_var('varGlobal')['tmpPath'];
        $config['upload_path']          = $pathBase;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('files')) {
            $data = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        
		echo json_encode($data);
		exit;
    }
	/**
	* Upload image perfil
	* Max sise is 100 kb
	*/
	public function upload_image_perfil()
	{	
		$this->upload_image_perfil_delete();

		$result = array();
		$pathBase = $this->load->get_var('varGlobal')['tmpPath'];
		$urlBase = $this->load->get_var('varGlobal')['tmpUrl'];
		$config['upload_path']          = $pathBase;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100; //kilobytes
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('avatarfile')) {
			$result['files'][0]['error'] = strip_tags($this->upload->display_errors());
		} else {
			// get data session
			$sessionUser = $this->session->userdata('user');
			if (!is_null($sessionUser) && is_array($sessionUser)) {
				$result['files'][0] = $this->upload->data();
				$result['files'][0]['url'] =  $urlBase . $this->upload->data('file_name');
				$result['files'][0]['url_delete'] =  base_url() . 'plugin_jquery_file_upload/upload_image_perfil?delete=' . $this->upload->data('file_name');

				// save in session
				$sessionUser['uploads']['perfil'] = $result;
				$this->session->set_userdata('user', $sessionUser);
			} else {
				$result = $data['files'][0]['error'] = 'Error session expired!.';
			}
		}

		echo json_encode($result);
		exit;
	}

	protected function upload_image_perfil_delete()
	{	
		$varDelete = $this->input->get('delete');
		if (!empty($varDelete)) {
			$result = false;
			$pathBase = $this->load->get_var('varGlobal')['tmpPath'];
			$fileToDelete = $pathBase . $varDelete;
			if (file_exists($fileToDelete)) {
				$result = unlink($pathBase . $varDelete);
			}			

			echo json_encode($result);
			exit;
		}
	}
	/**
	* Upload DNI
	*/
	public function upload_image_dni()
	{
		$result = array();
		$pathBase = $this->load->get_var('varGlobal')['tmpPath'];
		$urlBase = $this->load->get_var('varGlobal')['tmpUrl'];
		$config['upload_path']          = $pathBase;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048; //kilobytes => 2MB
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		var_dump($config);
var_dump($this->upload->do_upload());
var_dump($_FILES);EXIT;
		if ( ! $this->upload->do_upload()) {
			$result['files']['error'] = $this->upload->display_errors();
		} else {
			// get data session
			$sessionUser = $this->session->userdata('user');
			if (!is_null($sessionUser) && is_array($sessionUser)) {
				$result['files'] = $this->upload->data();
				$result['files']['url'] =  $urlBase . $this->upload->data('file_name');
				// save in session
				$sessionUser['uploads']['perfilDni'] = $result;
				$this->session->set_userdata('user', $sessionUser);
			} else {
				$result = $data['files']['error'] = 'Error session expired!.';
			}
		}

		echo json_encode($result);
		exit;
	}

}
