<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accueil extends MY_Controller {
			/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL* 		http://example.com/index.php/welcome
	 *	- or -* 		http://example.com/index.php/welcome/index
	 *	- or -* Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */



	public function home()
	{
		
		$this->load->model('M_depot','depot');
		$this->load->model('M_etablissement','etablissement');
		$data['nbr_notification']= $this->depot->get_count_liste_depot();
		$data['autoriser']=$this->etablissement->get_count_etablissement_type('Autorisé');
		$autoriser_nbr=$this->etablissement->get_count_etablissement_type('Autorisé');

		$data['non_autoriser']=$this->etablissement->get_count_etablissement_type('Non Autorisé');
		$non_autoriser_nbr=$this->etablissement->get_count_etablissement_type('Non Autorisé');

		$data['reconnu']=$this->etablissement->get_count_etablissement_type('Reconnu');
		$reconnu_nbr=$this->etablissement->get_count_etablissement_type('Reconnu');

		$data['instance']=$this->etablissement->get_count_etablissement_type('En Instance');
		$instance_nbr=$this->etablissement->get_count_etablissement_type('En Instance');
		$total=$autoriser_nbr[0]->nbr+$non_autoriser_nbr[0]->nbr+$reconnu_nbr[0]->nbr+$instance_nbr[0]->nbr;
		$autoriser_pc=$autoriser_nbr[0]->nbr * 100/$total;
		$data['autoriser_pc']=round($autoriser_pc,2);

		$non_autoriser_pc=$non_autoriser_nbr[0]->nbr * 100/$total;
		$data['non_autoriser_pc']=round($non_autoriser_pc,2);

		$reconnu_pc=$reconnu_nbr[0]->nbr * 100/$total;
		$data['reconnu_pc']=round($reconnu_pc,2);

		$instance_pc=$instance_nbr[0]->nbr * 100/$total;
		$data['instance_pc']=round($instance_pc,2);
		// $this->load->model('M_personnel_structure');
		// $this->load->model('M_statistique', 'stat');
		// $annee_pass=$this->M_table_param->get_annne_archive('-1');


				//Redefinission de la variable code_str dans la table session
		// if($this->input->post('etab_select') != null)
		// {
		// 	$this->change_etab($this->input->post('etab_select'));
		// }


		// //Redefinission de la variable ans dans la table
		// if($this->input->post('annee_select') != null)
		// {
		// 	$this->change_annee($this->input->post('annee_select'));
		// }
		
		$this->load->view('template/layout',$data);
	}

	// public function change_etab($code_str)
	// {
	// 	$this->session->set_userdata('code_str', $code_str);
	// 	$tab_data_ses = $this->session->all_userdata();
	// 	unset($tab_data_ses['lfc_jafr12_s']['code_str']);
	// 	$tab_data_ses['lfc_jafr12_s']['code_str'] = $code_str;
	// }

	// public function change_annee($ans)
	// {
	// 	$tab_ans = explode('bks', $ans);
		
	// 	unset($this->session->ans);
	// 	$this->session->set_userdata('ans',$tab_ans[0]);
		
	// 	unset($this->session->libelle_annee);
	// 	$this->session->set_userdata('libelle_annee', $tab_ans[1]);
	// }
}

