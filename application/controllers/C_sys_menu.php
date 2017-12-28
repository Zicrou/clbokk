<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_sys_menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sys_menu', 'menu');
    }

    public function index()
    {
        $menu_liste 			= $this->menu->get_menu_liste();
        
		$data['menu_liste'] 	= $menu_liste;
        $this->load->view('sys/V_sys_menu', $data);
    }
}
