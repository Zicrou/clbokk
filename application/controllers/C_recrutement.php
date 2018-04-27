<?php
/**
 * Created by PhpStorm.
 * User: Zicrou
 * Date: 05/04/2018
 * Time: 15:34
 */



class C_recrutement extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Candidats', 'candid');
    }

    public function index()
    {
        $metier = $this->candid->get_metier();
        $region = $this->candid->get_region();
       /* var_dump($metier);
        var_dump($region);
        exit();*/
        $data['select_metier'] = create_select_list($metier, 'metier1', 'metier1');
        $data['select_region'] = create_select_list($region, 'region', 'region');
        $this->load->view('V_blog-home-2', $data);
    }

    public function rechCandid()
    {
        $met = $this->input->post('metier');
        $reg = $this->input->post('region');
        $metier = $this->candid->get_metier();
        $region = $this->candid->get_region();
        $data['select_metier'] = create_select_list($metier, 'metier1', 'metier1');
        $data['select_region'] = create_select_list($region, 'region', 'region');
        $data['consCandid'] = $this->candid->get_data_const($reg, $met);
        $this->load->view('V_blog-home-2', $data);
    }

    public function dataCandid()
    {
        //$this->load->view('dataCandid');
        $data = $_GET['id'];
        echo $data;     
    }
}
