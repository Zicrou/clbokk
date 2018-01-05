<?php
 defined('BASEPATH') OR exit('No direct script access allowed'); 
    
 class C_etablissement extends CI_Controller { 
  
     public function __construct() 
     { 
         parent::__construct(); 
        $this->load->model('M_etablissement', 'etablissement'); 
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
