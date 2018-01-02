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
        $data['type']= '';
         $data['all_data'] = $this->etablissement->get_data(); 
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
