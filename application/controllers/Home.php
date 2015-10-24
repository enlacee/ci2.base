<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	public function __construct() {
		parent::__construct();
		//Call layout
		$this->layout->setLayout('frontend/base');
	}

	//Page Home
	public function index()
	{
		//Layout options
		$this->layout->setTitle("Home");
		$this->layout->setKeywords("keywords");
		$this->layout->setDescripcion("Descripción");
		$this->layout->setSocialSiteName("Name");
		$this->layout->setSocialTitle("Title");
		$this->layout->setSocialResumen("Resumen");
		$this->layout->setSocialDescripcion("Description");
		//$this->layout->css( array('/assets/css/additional.css') );
		//$this->layout->js( array('/assets/js/additional.js') );

		$data["info"] = "Información";

		//Layout load view
		$this->layout->view('home', $data);
	}

	//Send form contact AJAX
	public function send_form_contact_all_site()
	{
		//Check if isset request AJAX
		if( ! $this->input->is_ajax_request() ) {
			show_404();
		}

		//Response
		$response = array(
			'respuesta' => true,
			'mensaje'		=> "Mensaje enviado!"
			);
		echo json_encode( $response );
	}
}
/* End of file Portada.php */
/* Location: ./application/controllers/Home.php */
