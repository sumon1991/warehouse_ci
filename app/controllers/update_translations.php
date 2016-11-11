<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Update_translations extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

       /* if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            redirect('login');
        }*/

    }

    function index($action = NULL)
    {
        $this->lang->load('auth','english');
		//fetch all the data in $var variable
		$var=$this->lang->language;
		//print $var
		print_r($var);
    }
  
}
