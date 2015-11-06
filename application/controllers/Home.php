<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$file = FCPATH."application/core/Public_Controller.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Home extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->setLayout('layouts/frontend/base');
        $this->load->model('Post_model');
	}

	public function index()
	{
		$this->layout->setTitle("Home");
		$this->layout->setKeywords("keywords");
		$this->layout->setDescripcion("Descripción");
		$this->layout->setSocialSiteName("Name");
		$this->layout->setSocialTitle("Title");
		$this->layout->setSocialResumen("Resumen");
		$this->layout->setSocialDescripcion("Description");
		$data = array();

		//Layout load view
		$this->layout->view('frontend/home/index', $data);
	}



    /**
     * Send form contact AJAX
     */
	public function send_form_contact_all_site()
	{
		if( ! $this->input->is_ajax_request() ) {
			show_404();
		}

		//Response
		$response = array(
			'respuesta' => true,
			'mensaje' => "Mensaje enviado!"
        );

		echo json_encode($response);
	}
}
