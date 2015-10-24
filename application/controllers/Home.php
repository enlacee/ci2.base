<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->setLayout('layouts/frontend/base');
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

		$data["info"] = "Información";

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
