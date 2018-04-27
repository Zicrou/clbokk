<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class C_test extends MY_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_users','usrs');
		$this->load->library('session');
	}

	public function test()
	{
		//echo '<img src='.base_url().'image/img1.png>';
		$this->load->view('test');
	}
}

?>