<?php
class C_connexions extends CI_Controller {
	public function __construct()
	{		
		parent::__construct();	
	    //initialisation de la session	
		$this->load->library('session');
		//$this->load->model('M_table_param');
		$this->load->model('M_connexions', 'conn');	
		$this->load->model('M_configuration', 'conf');	
		$this->load->model('M_sys_role', 'role');	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('javascript');

	}


	public function verif_connexion()
	{
		$suite_req = site_url();
		//$elemen_cours = $this->M_table_param->get_annne_encours();
		$data['connexions_item'] = $this->conn->test_connexion();

 		if(empty($data['connexions_item']))
		{
			$the_data = array(
				'ip' 			=> $_SERVER['REMOTE_ADDR'] ,
				'navigateur' 	=> $_SERVER['HTTP_USER_AGENT'],
				'login' 		=> str_replace("'","",$this->input->post('username'))
					
			);

			//on log les erreurs
			header("Location:".$suite_req."sign-in?erreur=login");
		}else
		{

			//$ens_element = $this->p_str->get_data_liste_by_ens($data['connexions_item']['ien']);

			$datas_user = array(
				'lfc_jafr12_s'=> array(
					   'nom'		=> $data['connexions_item']['user_conn'],
					   'id'			=> $data['connexions_item']['page_bidar_'],
					   'ien'		=> $data['connexions_item']['ien'],
					   'profil'     => $data['connexions_item']['profil'],
					   'id_profil'	=> $data['connexions_item']['id_profil'],
					   'id_atlas'	=> $data['connexions_item']['id_atlas'],
					   'logged_in' 	=> TRUE
					)
				);


			
			//BAKS Recuperation des roles
			$id_profil 	= $data['connexions_item']['id_profil'];
			$ien 		= $data['connexions_item']['ien'];
			$id_atlas 		= $data['connexions_item']['id_atlas'];

			$tab_mrole	= array();   ///Tableau des roles des menus
			$tab_smrole	= array();  ///Tableau des roles des sous menus
			$cur_menu	= '';
			
			$tab_role	= $this->role->get_conn_roles($id_profil, $id_atlas, $ien);

			// var_dump($tab_role);
			// exit();
			
			foreach($tab_role as $val)
			{
				///Tableau des droits sur les menus
				if($cur_menu != $val->mcode)
				{
					$tab_mrole[$val->mcode] = 1;
					$cur_menu = $val->mcode;
				}
				
				//Tableau des droits sur les sous menus
				//On ne recup�re que les valeurs positives
				if($val->d_read != '-1'){ $tab_smrole[$val->smcode]['d_read']	= $val->d_read;}
				if($val->d_add != '-1'){ $tab_smrole[$val->smcode]['d_add']	= $val->d_add;}
				if($val->d_upd != '-1'){ $tab_smrole[$val->smcode]['d_upd']	= $val->d_upd;}
				if($val->d_del != '-1'){ $tab_smrole[$val->smcode]['d_del']	= $val->d_del;}
			}
			
			///Chargement des donn�es de la tableau $data
			$data['menu_roles']		= $tab_mrole;
			$data['smenu_roles']	= $tab_smrole;
		
			//Mise des donn�es en session
			$this->session->set_userdata('menu_roles', $data['menu_roles']);
			$this->session->set_userdata('smenu_roles', $data['smenu_roles']);
			//BAKS FIN Recuperation des roles
			
			
			//donnees en session
			$this->session->set_userdata($datas_user);	
			$this->session->set_userdata('id_atlas',$data['connexions_item']['id_atlas']);
			//on log les donnees begin : Enregistrement des donnees de l'utilisateur dans la table z_connexions ip, navigateur, profil, nom 
	
			
			$data['username']	= $data['connexions_item']['user_conn'];
			@$data['email']		= $data['connexions_item']['email'];

			$pass=$this->conf->encrypt($data['connexions_item']['password'],'idyby');
			$this->session->set_userdata('username', $data['connexions_item']['user_conn']);
			$this->session->set_userdata('pass', $pass);

			header("Location:".$suite_req."front-office");
		}
	}
	
		//se_deconnecter
	public function se_deconnecter()
	{

		$suite_req = site_url();
		// Test sur les param�tres d'URL qui permettront d'identifier un "contexte" de d�connexion
		$tab_data_ses = $this->session->all_userdata();
				
		$this->session->sess_destroy();	// destruction des donnees de la session
				
		@$page_bidar =  @$tab_data_ses['lfc_jafr12_s']['page_bidar'];
		@$profil_id = @$tab_data_ses['lfc_jafr12_s']['profil'];
		@$login = @$tab_data_ses['lfc_jafr12_s']['login'];
		//var_dump($tab_data_ses);
				
		$the_data = array(
			'ip' 			=> $_SERVER['REMOTE_ADDR'] ,
			'navigateur' 	=> $_SERVER['HTTP_USER_AGENT'],
			'page_bid' 		=> $page_bidar,
			'profil_id' 	=> $profil_id,
			'login' 		=> $login,
			'sens' 			=> 'OUT'
		);			
		@header("Location:".$suite_req."sign-in");
	}

}
