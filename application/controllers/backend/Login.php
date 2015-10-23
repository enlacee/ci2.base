<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//Call layout
		$this->layout->setLayout('backend/login');
	}

	public function index()
	{

		//Layout options
		$this->layout->css( array('/assets/backend/css/additional.css') );
		$this->layout->js( array('/assets/backend/js/additional.js') );

		$data["info"] = "Información";

		//Layout load view
		$this->layout->view('login', $data);
	}
}
/* End of file Portada.php */
/* Location: ./application/controllers/Login.php */
