<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SessionData{
    var $CI;

    function __construct(){
        $this->CI =& get_instance();
    }

    function initializeData() {
          // This function will run after the constructor for the controller is ran
          // Set any initial values here

		if (!$this->CI->session->userdata('user')) {
			$data = array(
				'id' => 1,
				'name' => 'pepe rios',
				'uploads' => array()
			);
			$this->CI->session->set_userdata('user', $data);
		}
    }
}
