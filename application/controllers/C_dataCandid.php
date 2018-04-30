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
			$url = "http://localhost/clbokk/datac?id=1";
			$data_json=file_get_contents($url);
			$data_php = json_decode($data_json);
			print_r($data_php);
    }
}



?>