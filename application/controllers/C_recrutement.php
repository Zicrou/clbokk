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

    public function datacShow()
    {
        $id = func_get_args();
        $dataCand= $this->candid->get_id_record($id[0]);
        print_r($dataCand);
    }
    
    public function dataCandid()
    {
        $id = func_get_args();
       $dataCand= $this->candid->get_id_record($id[0]);
       $data_json = json_encode($dataCand);
       echo $data_json;
    }
}
