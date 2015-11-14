<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $data = array();

    function __construct ()
    {
        parent::__construct();
        $this->loadVariableImage();

        //ENVIRONMENT != 'development' || $this->output->enable_profiler(TRUE);
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
            base_url() . 'assets/lib/formvalidation.io/dist/css/formValidation.css',
            base_url() . 'assets/lib/formvalidation.io/dist/css/bootstrapValidator.css'
        ));
        $this->layout->js(array(
            base_url() . 'assets/lib/formvalidation.io/vendor/jquery/jquery.min.js',
            base_url() . 'assets/lib/formvalidation.io/vendor/bootstrap/js/bootstrap.min.js',
            base_url() . 'assets/lib/formvalidation.io/dist/js/formValidation.js',
            base_url() . 'assets/lib/formvalidation.io/dist/js/framework/bootstrap.js'
        ));
    }

        // images tmp (imagenes temporales)
    /**
     * list of variables for consummer and response
     * process (create thumbnail)
     */
    public function loadVariableImage()
    {

        $this->load->vars(array(
            'varGlobal' => array(
                //'tmpPath'   => FCPATH . 'assets/images/tmp/',
                //'tmpUrl'    => base_url() . 'assets/images/tmp/'
                'path_upload'   => './assets/images/',
                'tmpPath'       => './assets/images/tmp/',
                'tmpUrl'        => base_url() . 'assets/images/tmp/'
            )
        ));

    }
}
