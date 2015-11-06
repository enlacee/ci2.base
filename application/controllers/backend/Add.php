<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->setLayout('layouts/backend/add');
	}

	public function index()
	{
		//Breadcrumbs
    $this->breadcrumbs->push('Home', '/');
    $this->breadcrumbs->push('Listado', '/admin/listado');
    $this->breadcrumbs->push('Agregar', '#');
    
		//Layout options
		$this->layout->css( array('/assets/backend/css/additional.css') );
		$this->layout->js( array('/assets/backend/js/additional.js') );
		
		$data["info"] = "Información";
		
		//Layout load view
		$this->layout->view('backend/add/index', $data);
	}
}