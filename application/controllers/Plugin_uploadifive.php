<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugin_uploadifive extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//Call layout
		$this->layout->setLayout('layouts/frontend/plugin_uploadifive');
	}

	public function index()
	{
		//Layout options
		$this->layout->setTitle("Uploadifive");
		$this->layout->setKeywords("keywords");
		$this->layout->setDescripcion("Descripción");
		$this->layout->setSocialSiteName("Name");
		$this->layout->setSocialTitle("Title");
		$this->layout->setSocialResumen("Resumen");
		$this->layout->setSocialDescripcion("Description");
		//$this->layout->css( array('/assets/css/additional.css') );
		//$this->layout->js( array('/assets/js/additional.js') );

		//Layout load view
		$data = array();

		$this->layout->view('frontend/plugin_uploadifive/index', $data);
	}


	/**
	 * [save Save Image, DNI & Documents in DB]
	 * @return [AJAX] [Result upload]
	 */
	public function do_upload()
	{

		$uploadDir = './assets/files/';

		// Set the allowed file extensions
		$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions

		$verifyToken = md5('unique_salt' . $_POST['timestamp']);

		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$tempFile   = $_FILES['Filedata']['tmp_name'];
			$uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
			$targetFile = $uploadDir . $_FILES['Filedata']['name'];

			// Validate the filetype
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			if (in_array(strtolower($fileParts['extension']), $fileTypes)) {

				// Save the file
				move_uploaded_file($tempFile, $targetFile);
				echo 1;

			} else {

				// The file type wasn't allowed
				echo 'Invalid file type.';

			}
		}

		/*
		//Config file upload
		$config['upload_path']          = './assets/files/';
    $config['allowed_types']        = 'jpg|jpeg|png|gif|pdf|xls|doc|docx|xlsx|csv';
    $config['overwrite']            = TRUE;
    $config['encrypt_name']					= TRUE;
    $config['max_size']             = 2048;
    $config['remove_spaces']				= TRUE;

    //Load library upload files
    $this->load->library('upload', $config);

    //Fail file upload
    if ( ! $this->upload->do_upload('image')) {

    	$error = $this->upload->display_errors();
    	echo json_encode( $error );
    }
    //File success upload
    else {

      $data = $this->upload->data();
      echo json_encode( $data );
    }*/

	}

	//Update
	public function update()
	{
		$this->layout->view('update');
	}
}
/* End of file Portada.php */
/* Location: ./application/controllers/Uploadifive.php */
