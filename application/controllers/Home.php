<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->setLayout('layouts/frontend/base');
        $this->load->model('Post_model');
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

        
        $this->load->model('Blog_model');
        var_dump($this->Blog_model->get_last_ten_entries());
        
		$params = array(
			'data' => ''
		);
 
		//Layout load view
		$this->layout->view('frontend/home/index', $params);
	}
    
	public function getPostByCategory($category)
	{
		// ----- init pagination
        $limit = 6;
		$page = 0;
        $count = $this->Post_model->listAll('post',$status='', $order='', $limit, $offset='', $rows=true);

        if ($count > 0) {
            $total_pages = ceil($count/$limit);
        } else {
           $total_pages = 1;
        }
        if ($page > $total_pages) { $page = $total_pages; }// $page = 0
        if ($page < 1) { $page = 1; }

        $start = $limit * $page - $limit;

        $data['pag']['limit'] = $limit;
        $data['pag']['page'] = $page;
        $data['pag']['last_page'] = $total_pages;
        $data['pag']['start'] = $start;
        // ----- end pagination
		$data['data'] = $this->Post_model->listAll('post',$status='', $order='', $limit, $start, $rows=false);

		return $data;
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
