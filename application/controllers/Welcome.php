<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller {

	public function __construct() {
		parent::__construct();
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
		//$this->layout->css( array('/assets/css/additional.css') );
		//$this->layout->js( array('/assets/js/additional.js') );

		$data["info"] = "Información";

		//Layout load view
		$this->layout->view('frontend/home/index', $data);
	}
}
