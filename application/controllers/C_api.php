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

    public function dataCandid()
    {
        $id = $_GET['id'];
        //echo $id;
        //var_dump($this->candid->get_db_table_pk());
        var_dump($this->candid->get_id_record($id));
    }

    /*public function demandeur_data(){
			$url = "http://localhost/codeigniter_2/index.php/Test_api/get_content_etudiant/1";
			$data_json=file_get_contents($url);
			$data_php = json_decode($data_json);
			print_r($data_php);
		}*/
}
