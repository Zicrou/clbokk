<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/

class C_dataCandid extends MY_Controller
{	
    public function __construct()
	{
		parent::__construct();
		//$this->load->model('M_users','usrs');
		//$this->load->library('session');
    }
    
    public function index()
    {
        # code...
        $this->load->view('dataCandid');
    }
}



?>