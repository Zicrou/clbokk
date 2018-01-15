<?php
 defined('BASEPATH') OR exit('No direct script access allowed'); 
    
 class C_etablissement extends CI_Controller { 
  
     public function __construct() 
     { 
         parent::__construct(); 
        $this->load->model('M_etablissement', 'etablissement'); 
        $this->load->model('M_type_dossier_piece', 'type_piece');
        $this->load->model('M_type_dossier', 'type_dossier');
        $this->load->model('M_depot', 'depot');
        $this->load->model('M_circuit', 'circuit');
        $this->load->model('M_atlas', 'atlas'); 
     } 
     
  
     public function index() 
     { 
        //  $all_data = $this->etablissement->get_etablissement();
        //  $cpt=0;
        // foreach( $all_data as $etablissement)
        // {
        //     $cpt+=1;
        //     $query=$this->etablissement->get_etablissement_id_by_code($etablissement->CODE_ADMINISTRATIF);
        //     $id=(isset($query[0]->id))?$query[0]->id:null;
        //     //echo $id." (".$cpt.")".$etablissement->CODE_ADMINISTRATIF."<br>";
        //  $this->etablissement->id =$id; 
        //  $this->etablissement->code = $etablissement->CODE_ADMINISTRATIF;
        //  $this->etablissement->nom = $etablissement->NOM_STRUCTURE; 
        //  $this->etablissement->status = $etablissement->CODE_TYPE_SOUS_STATUT_ETAB; 
        //  $this->etablissement->responsable = $etablissement->NOM_DECLARANT_RESPONSABLE; 
        //  $this->etablissement->jour_creation= $etablissement->DATE_CREATION_J;
        //  $this->etablissement->mois_creation = $etablissement->DATE_CREATION_M;
        //  $this->etablissement->annee_creation = $etablissement->DATE_CREATION;
        //  $this->etablissement->Adresse = $etablissement->ADRESSE;
        //  $this->etablissement->Telephone = $etablissement->TELEPHONE;
        //  $this->etablissement->jour_ouverture = $etablissement->DATE_OUVERTURE_J;
        // $this->etablissement->mois_ouverture = $etablissement->DATE_OUVERTURE_M;
        // $this->etablissement->annee_ouverture = $etablissement->DATE_OUVERTURE;
        // $this->etablissement->chef_etablissement = $etablissement->NOM_CHEF_STRUCTURE;
        // $this->etablissement->mail = $etablissement->E_MAIL_STRUCTURE;
        // $this->etablissement->longitude = $etablissement->ORDONNNEE_Y;
        // $this->etablissement->latitude = $etablissement->ABSCISSE_X;
        // $this->etablissement->cycle = $etablissement->CODE_TYPE_SYSTEME_ENSEIGNEMENT;
        // $this->etablissement->numero_autorisation = $etablissement->NUM_ARRETE_AUT;
        // $this->etablissement->Numero_reconnaissance = $etablissement->NUM_ARRETE_RECONNAISSANCE;
        // $this->etablissement->jour_reconnaissance = $etablissement->DATE_RECONNAISSANCE_J;
        // $this->etablissement->mois_reconnaissance = $etablissement->DATE_RECONNAISSANCE_M;
        // $this->etablissement->annee_reconnaissance = $etablissement->DATE_RECONNAISSANCE;
        // $this->etablissement->id_groupe_scolaire = $etablissement->id_groupe_scolaire;
        // echo json_encode($this->etablissement->save(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
          
        // }  

        $data['type']= '';
         $data['all_data'] = $this->etablissement->get_etablissement_liste(); 
         $this->load->view('V_etablissement', $data); 
         $this->load->model('M_type_dossier_piece', 'type_piece');
         $this->load->model('M_type_dossier', 'type_dossier');
         $this->load->model('M_depot', 'depot');
         $this->load->model('M_circuit', 'circuit');
     } 
     public function get_etablissement_type() 
     { 
         $type='';
         $args =func_get_args();
         switch ($args[0]) {
            case 1:
            $type='Autorisé';
                break;
            case 2:
            $type='Non Autorisé';
                break;
            case 3:
            $type='Reconnu';
                break;
            case 4:
            $type='En Instance';
                break;
        }
         $data['type']= $type;       
         $data['all_data'] = $this->etablissement->get_etablissement_type($type); 
         $this->load->view('V_etablissement', $data); 
     } 

    public function demande_transfert()
	   {
		
		$this->type_dossier->id_type_dossier=3;
		$this->type_dossier->get_record();
		$jour_debut=$this->type_dossier->jour_debut;
		$jour_fin=$this->type_dossier->jour_fin;
		$mois_debut=$this->type_dossier->mois_debut;
		$mois_fin=$this->type_dossier->mois_fin;
		$anne_debut=date('Y');
		$annee_fin=date('Y');
		if($mois_debut > $mois_fin)
		$annee_fin+=1;
		$date_jour= new DateTime(date('Y-m-d'));
		$date_debut =new DateTime($anne_debut.'-'.$mois_debut.'-'.$jour_debut);
		$date_fin =new DateTime($annee_fin.'-'.$mois_fin.'-'.$jour_fin);
		if(($date_jour>=$date_debut && $date_jour<=$date_fin)||($this->session->lfc_jafr12_s['id_type_structure']==1))
		{
			$data_region=$this->atlas->get_region();
			$data['select_region'] 	= create_select_list($data_region, 'code_atlas', 'libelle_atlas', '');
			$data_departement=$this->atlas->get_departement_region();
			$data['select_departement'] 	= create_select_list($data_departement, 'code_atlas', 'libelle_atlas', null,'reg_code_atlas');
			$data_commune=$this->atlas->get_commune_departement();
			$data['select_commune'] 	= create_select_list($data_commune, 'code_atlas', 'libelle_atlas', null,'reg_code_atlas');
			$data['piece'] = $this->type_piece->get_piece(3);
			$this->load->view('V_transfert_etablissement',$data);
		}
		else
		{
			$d=$date_debut;
			$data['titre']="DEMANDE DE TRANSFERT D'ETABLISSEMENT";
			$data['message']=" Periode de depot : du ".$date_debut->format('d-M-Y')." au ".$date_fin->format('d-M-Y');
			$this->load->view('V_hors_delai',$data);
		}
    }

    public function demande_reconnaissance()
	   {
		
		$this->type_dossier->id_type_dossier=4;
		$this->type_dossier->get_record();
		$jour_debut=$this->type_dossier->jour_debut;
		$jour_fin=$this->type_dossier->jour_fin;
		$mois_debut=$this->type_dossier->mois_debut;
		$mois_fin=$this->type_dossier->mois_fin;
		$anne_debut=date('Y');
		$annee_fin=date('Y');
		if($mois_debut > $mois_fin)
		$annee_fin+=1;
		$date_jour= new DateTime(date('Y-m-d'));
		$date_debut =new DateTime($anne_debut.'-'.$mois_debut.'-'.$jour_debut);
		$date_fin =new DateTime($annee_fin.'-'.$mois_fin.'-'.$jour_fin);
		if(($date_jour>=$date_debut && $date_jour<=$date_fin)||($this->session->lfc_jafr12_s['id_type_structure']==1))
		{
			$data['piece'] = $this->type_piece->get_piece(4);
			$this->load->view('depot\reconnaissance\V_reconnaissance_etablissement',$data);
		}
		else
		{
			$d=$date_debut;
			$data['titre']="DEMANDE DE RECONNAISSANCE D'ETABLISSEMENT";
			$data['message']=" Periode de depot : du ".$date_debut->format('d-M-Y')." au ".$date_fin->format('d-M-Y');
			$this->load->view('V_hors_delai',$data);
		}
    }

    public function demande_ouverture()
	   {
		
		$this->type_dossier->id_type_dossier=4;
		$this->type_dossier->get_record();
		$jour_debut=$this->type_dossier->jour_debut;
		$jour_fin=$this->type_dossier->jour_fin;
		$mois_debut=$this->type_dossier->mois_debut;
		$mois_fin=$this->type_dossier->mois_fin;
		$anne_debut=date('Y');
		$annee_fin=date('Y');
		if($mois_debut > $mois_fin)
		$annee_fin+=1;
		$date_jour= new DateTime(date('Y-m-d'));
		$date_debut =new DateTime($anne_debut.'-'.$mois_debut.'-'.$jour_debut);
		$date_fin =new DateTime($annee_fin.'-'.$mois_fin.'-'.$jour_fin);
		if(($date_jour>=$date_debut && $date_jour<=$date_fin)||($this->session->lfc_jafr12_s['id_type_structure']==1))
		{
            $data['piece'] = $this->type_piece->get_piece(4);
            $statut=$this->etablissement->get_statut_religieux();
			$data['select_statut_religieux'] 	= create_select_list($statut, 'id_statut', 'libelle_statut', null,null);
			$this->load->view('depot/ouverture_ecole/V_ouverture_ecole_etablissement',$data);
		}
		else
		{
			$d=$date_debut;
			$data['titre']="DEMANDE DE RECONNAISSANCE D'ETABLISSEMENT";
			$data['message']=" Periode de depot : du ".$date_debut->format('d-M-Y')." au ".$date_fin->format('d-M-Y');
			$this->load->view('V_hors_delai',$data);
		}
    }

    public function demande_extension_cycle()
	   {
		
		$this->type_dossier->id_type_dossier=5;
		$this->type_dossier->get_record();
		$jour_debut=$this->type_dossier->jour_debut;
		$jour_fin=$this->type_dossier->jour_fin;
		$mois_debut=$this->type_dossier->mois_debut;
		$mois_fin=$this->type_dossier->mois_fin;
		$anne_debut=date('Y');
		$annee_fin=date('Y');
		if($mois_debut > $mois_fin)
		$annee_fin+=1;
		$date_jour= new DateTime(date('Y-m-d'));
		$date_debut =new DateTime($anne_debut.'-'.$mois_debut.'-'.$jour_debut);
		$date_fin =new DateTime($annee_fin.'-'.$mois_fin.'-'.$jour_fin);
		if(($date_jour>=$date_debut && $date_jour<=$date_fin)||($this->session->lfc_jafr12_s['id_type_structure']==1))
		{
			$data['piece'] = $this->type_piece->get_piece(5);
			$this->load->view('depot\extension_cycle\V_extension_cycle',$data);
		}
		else
		{
			$d=$date_debut;
			$data['titre']="DEMANDE D'EXTENSION DE CYCLE";
			$data['message']=" Periode de depot : du ".$date_debut->format('d-M-Y')." au ".$date_fin->format('d-M-Y');
			$this->load->view('V_hors_delai',$data);
		}
    }

    public function demande_extension_classe()
	   {		
		$this->type_dossier->id_type_dossier=6;
		$this->type_dossier->get_record();
		$jour_debut=$this->type_dossier->jour_debut;
		$jour_fin=$this->type_dossier->jour_fin;
		$mois_debut=$this->type_dossier->mois_debut;
		$mois_fin=$this->type_dossier->mois_fin;
		$anne_debut=date('Y');
		$annee_fin=date('Y');
		if($mois_debut > $mois_fin)
		$annee_fin+=1;
		$date_jour= new DateTime(date('Y-m-d'));
		$date_debut =new DateTime($anne_debut.'-'.$mois_debut.'-'.$jour_debut);
		$date_fin =new DateTime($annee_fin.'-'.$mois_fin.'-'.$jour_fin);
		if(($date_jour>=$date_debut && $date_jour<=$date_fin)||($this->session->lfc_jafr12_s['id_type_structure']==1))
		{
			$data['piece'] = $this->type_piece->get_piece(6);
			$this->load->view('depot\extension_classe\V_extension_classe',$data);
		}
		else
		{
			$d=$date_debut;
			$data['titre']="DEMANDE D'EXTENSION DE CLASSE";
			$data['message']=" Periode de depot : du ".$date_debut->format('d-M-Y')." au ".$date_fin->format('d-M-Y');
			$this->load->view('V_hors_delai',$data);
		}
    }


    
        public function get_nom_etablissement()
        {
            $args =func_get_args();
            $etablissement=$this->etablissement->get_etablissement_by_code($args[0]);
            $id=0;
            $nom="";
            $date_ouverture="";
            $arrete_ouverture="";
            if(isset($etablissement[0]))
            {
                $id=$etablissement[0]->id;
                $nom=$etablissement[0]->nom;
                $jour=($etablissement[0]->jour_ouverture>0)?str_pad($etablissement[0]->jour_ouverture, 2, "0", STR_PAD_LEFT):'___';
                $mois=($etablissement[0]->mois_ouverture>0)?str_pad($etablissement[0]->mois_ouverture, 2, "0", STR_PAD_LEFT):'___';
                $date_ouverture=($etablissement[0]->annee_ouverture>0)?$jour."/".$mois."/".$etablissement[0]->annee_ouverture :'___/___/_____';
                $arrete_ouverture=$etablissement[0]->arrete_ouverture;
            }
            echo '{"id":'.$id.',"nom":"'.$nom.'","date_ouverture":"'.$date_ouverture.'","arrete_ouverture":"'.$arrete_ouverture.'"}';            
        }

        public function get_arrete()
        {
            $args =func_get_args();
            $etablissement=$this->etablissement->get_etablissement_by_code($args[0]);
            $id=0;
            $jour=0;
            $mois=0;
            $annee=0;
            $arrete="";
            if(isset($etablissement[0]))
            {
                $id=$etablissement[0]->id;
                $nom=$etablissement[0]->nom;
            }
            echo '{"id":'.$id.',"nom":"'.$nom.'"}';            
        }
  
     public function get_record(){ 
         $args =func_get_args(); 
         $this->etablissement->id =  $args[0]; 
         $this->etablissement->get_record(); 
         echo json_encode($this->etablissement, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
     } 
  
     public function delete(){ 
         $args =func_get_args(); 
         $this->etablissement->id =  $args[0]; 
         echo json_encode($this->etablissement->delete(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
     } 
  
     public function save(){ 
         $val_id = $this->input->post('id'); 
         if (!empty($val_id)) 
         { 
             $this->etablissement->id = $this->input->post('id'); 
         } 
          
         $this->etablissement->code = $this->input->post('code'); 
         $this->etablissement->nom = $this->input->post('nom'); 
         $this->etablissement->statut = $this->input->post('statut'); 
         $this->etablissement->responsable = $this->input->post('responsable'); 
         $this->etablissement->jour_creation= $this->input->post('jour_creation');
         $this->etablissement->mois_creation = $this->input->post('mois_creation');
         $this->etablissement->annee_creation = $this->input->post('annee_creation');
         $this->etablissement->Adresse = $this->input->post('Adresse');
         $this->etablissement->Telephone = $this->input->post('Telephone');    
         echo json_encode( $this->etablissement->save(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
     }
     
  
 } 
