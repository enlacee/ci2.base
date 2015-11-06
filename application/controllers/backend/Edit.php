<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$file = FCPATH."application/core/Admin_Controller.php"; (is_file($file)) ? include($file) : die("error: {$file}");


class Edit extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		//Call layout
		$this->layout->setLayout('layouts/backend/edit');
		$this->load->model('Post_model');
	}

	public function index()
	{
		//Breadcrumbs
		$this->breadcrumbs->push('Home', '/');
		$this->breadcrumbs->push('Listado', '/admin/listado');
		$this->breadcrumbs->push('Editar', '#');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data = array();
		if ($this->input->post()) {
			$mydata = $this->input->post();
			unset($mydata['id']);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('ac_posts', $mydata);
			$data['result'] = 'datos actualizados';
		} else {

		}

		$data['data'] = $this->getData();

		//Layout load view
		$this->layout->css( array('/assets/backend/css/additional.css') );
		$this->layout->js( array('/assets/backend/js/additional.js') );
		$this->layout->view('backend/edit/index', $data);
	}

	/**
	* set idLanguage (1= spanish,2 = english)
	*/
	public function getData()
	{
		$data = array();
		$page = $this->uri->segment(1);
		$subPage = $this->uri->segment(2);
		$string = $this->uri->segment(3);

		$idLang = (int) substr($string, 0, 1);
		$title = substr($string, 1, strlen($string));
		if ($idLang == 0) {
			$idLang = 1;
		}
		// set $this->id_lang (id languague general)
		$this->id_lang = $idLang;

		if (!empty($title)) {
			$title = str_replace('-', ' ', $title);
			$data = $this->Post_model->getByTitle($title);

		}

		return $data;
	}
}
