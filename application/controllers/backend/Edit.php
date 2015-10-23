<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//Call layout
		$this->layout->setLayout('backend/edit');
	}

	public function index()
	{
		//Breadcrumbs
    $this->breadcrumbs->push('Home', '/');
    $this->breadcrumbs->push('Listado', '/admin/listado');
    $this->breadcrumbs->push('Editar', '#');

		//Layout options
		$this->layout->css( array('/assets/backend/css/additional.css') );
		$this->layout->js( array('/assets/backend/js/additional.js') );
		
		$data["info"] = "Información";
		
		//Layout load view
		$this->layout->view('edit', $data);
	}
}
/* End of file Portada.php */
/* Location: ./application/controllers/Edit.php */