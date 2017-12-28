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
        // $all_data = $this->etablissement->get_etablissement();
        // foreach( $all_data as $etablissement)
        // {
        //  $this->etablissement->id = null; 
        //  $this->etablissement->code = $etablissement->CODE_ADMINISTRATIF;
        //  $this->etablissement->nom = $etablissement->NOM_STRUCTURE; 
        //  $this->etablissement->status = $etablissement->LIBELLE_TYPE_RECONNAISSANCE_PRIVE; 
        //  $this->etablissement->responsable = $etablissement->NOM_CHEF_STRUCTURE; 
        //  $this->etablissement->jour_creation= $etablissement->DATE_CREATION_J;
        //  $this->etablissement->mois_creation = $etablissement->DATE_CREATION_M;
        //  $this->etablissement->annee_creation = $etablissement->DATE_CREATION;
        //  $this->etablissement->Adresse = $etablissement->ADRESSE;
        //  $this->etablissement->Telephone = $etablissement->TELEPHONE;         
        //  $this->etablissement->save(); 
        // }  
         $data['all_data'] = $this->etablissement->get_data(); 
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
         $this->etablissement->status = $this->input->post('status'); 
         $this->etablissement->responsable = $this->input->post('responsable'); 
         $this->etablissement->jour_creation= $this->input->post('jour_creation');
         $this->etablissement->mois_creation = $this->input->post('mois_creation');
         $this->etablissement->annee_creation = $this->input->post('annee_creation');
         $this->etablissement->Adresse = $this->input->post('Adresse');
         $this->etablissement->Telephone = $this->input->post('Telephone');    
         echo json_encode( $this->etablissement->save(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
     } 
  
 } 
