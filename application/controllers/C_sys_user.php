<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_sys_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('M_sys_user', 'user');
		//$this->load->model('M_table_param');
    }

    public function index()
    {
        //$elemen_cours = $this->M_table_param->get_annne_encours();
		$code_str =  $this->session->code_str;
		
		$user_data 			= $this->user->get_user_liste( $code_str);
        $data['user_data'] 			= $user_data;
        $this->load->view('sys/V_sys_user', $data);
    }
}
