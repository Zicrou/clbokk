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

	public function Portfolio2col()
	{
		$this->load->view('V_portfolio-2-col');
	}
	
	public function Portfolio3col()
	{
		$this->load->view('V_portfolio-3-col');
	}

	public function Portfolio4col()
	{
		$this->load->view('V_portfolio-4-col');
	}
	
	public function Portfolioitem()
	{
		$this->load->view('V_portfolio-item');
	}

	public function Pricing()
	{
		$this->load->view('V_pricing');
	}

	public function Sidebar()
	{
		$this->load->view('V_sidebar');
	}

	public function Faq()
	{
		$this->load->view('V_faq');
	}

	public function Fullwidth()
	{
		$this->load->view('V_full-width');
	}


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