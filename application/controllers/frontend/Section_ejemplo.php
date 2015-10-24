<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section_ejemplo extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//Call layout
		$this->layout->setLayout('frontend/base');
	}

	public function index()
	{
		//Layout options
		$this->layout->setTitle("Section ejemplo");
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
		$this->layout->view('section_ejemplo', $data);
	}
}