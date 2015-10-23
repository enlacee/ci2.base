<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//Call layout
		$this->layout->setLayout('backend/listing');
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
		$this->layout->view('listing', $data);
	}
}
/* End of file Portada.php */
/* Location: ./application/controllers/Listing.php */