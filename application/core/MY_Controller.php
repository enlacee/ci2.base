<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $data = array();

    function __construct ()
    {
        parent::__construct();

        ENVIRONMENT != 'development' || $this->output->enable_profiler(TRUE);
/*        $this->load->database();
        $this->data['user'] = 'Joost';
*/
    }

    /**
    * *Agregar librerias validador de formularios con formValidation.io*
    * Add libraries for validator form with formValidation.io
    *
    * @return void
    */
    public function addLibraryFormValidation()
    {
        $this->layout->css(array(
            'assets/lib/formvalidation.io/dist/css/formValidation.css',
            'assets/css/bootstrapValidator.css'
        ));
        $this->layout->js(array(
            'assets/lib/formvalidation.io/vendor/jquery/jquery.min.js',
            'assets/lib/formvalidation.io/vendor/bootstrap/js/bootstrap.min.js',
            'assets/lib/formvalidation.io/dist/js/formValidation.js',
            'assets/lib/formvalidation.io/dist/js/framework/bootstrap.js'
        ));
    }
}
