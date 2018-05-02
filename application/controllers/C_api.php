<?php
/**
 * Created by PhpStorm.
 * User: Zicrou
 * Date: 05/04/2018
 * Time: 15:34
 */



class C_api extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Candidats', 'candid');
    }

    public function datacShow()
    {
        
        $id = func_get_args();
       $dataCand= $this->candid->get_id_record($id[0]);
       //$data_json = json_encode($dataCand);
       print_r($dataCand);
    }
    
    public function dataCandid()
    {
        $id = func_get_args();
       $dataCand= $this->candid->get_id_record($id[0]);
       $data_json = json_encode($dataCand);
       echo $data_json;
    }

    /*public function demandeur_data(){
			$url = "http://localhost/codeigniter_2/index.php/Test_api/get_content_etudiant/1";
			$data_json=file_get_contents($url);
			$data_php = json_decode($data_json);
			print_r($data_php);
		}*/
}
