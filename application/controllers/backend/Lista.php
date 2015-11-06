<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//Call layout
		$this->layout->setLayout('layouts/backend/lista');
	}

	public function index()
	{
		//Breadcrumbs
		$this->breadcrumbs->push('Home', '/');
		$this->breadcrumbs->push('Listado', '#');

		//Layout options
		$this->layout->css( array('/assets/backend/css/additional.css') );
		$this->layout->js( array('/assets/backend/js/additional.js') );

		$data["info"] = "Información";

		//Layout load view
		$this->layout->view('backend/lista/index', $data);
	}
}
/* End of file Portada.php */
/* Location: ./application/controllers/Listing.php */
