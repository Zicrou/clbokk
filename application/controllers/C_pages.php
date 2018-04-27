<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class C_pages extends MY_Controller
{
	public function index()
	{
		$this->load->view('index');
		//echo 'Maty-Oul';
	}

	public function About()
	{
		$this->load->view('V_about');
	}

	public function Service()
	{
		$this->load->view('V_services');
	}

	public function Contact()
	{
		$this->load->view('V_contact');
	}

	public function Conn()
	{
		$this->load->view('V_connexion');
	}

	public function Inscrip()
	{
		$this->load->view('V_inscription');
	}

	/*public function BlogUser()
	{
		$this->load->view('V_blog-home-1');
	}*/
	


	/*public function page()
	{
		$deny_page = array('V_blog-home-1', 'V_blog-home-2');
		$param =func_get_args();
		if (!in_array($param[0], $deny_page)) {
		
			$this->load->view($param[0]);
		}else{
			$this->load->view('V_connexion');
		}
		
	}*/
	
}

?>