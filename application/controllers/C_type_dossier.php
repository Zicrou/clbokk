<?php
 defined('BASEPATH') OR exit('No direct script access allowed'); 
    
   class C_type_dossier extends MY_Controller { 
    
   	public function __construct() 
   	{ 
   	    parent::__construct(); 
   	   $this->load->model('M_type_dossier', 'type_dossier'); 
   	   $this->load->model('M_circuit', 'circuit'); 
   	   $this->load->model('M_type_piece', 'type_piece'); 
   	} 
    
   	public function index() 
   	{ 
   		$all_data = $this->type_dossier->get_data_liste(); 
   		$data['all_data'] = $all_data; 
          $data['all_type_status'] 	=  $this->type_dossier->get_data(); 
   		$this->load->view('V_type_dossier', $data); 
	   }
	public function parametre_dossier() 
   	{ 
		$args =func_get_args();
   		// $all_data = $this->type_dossier->get_data_liste(); 
   		// $all_data = $this->type_dossier->get_data_liste(); 
   		 $data['all_circuit'] =  $this->circuit->get_cicuit_dossier($args[0]); 
		//   $data['all_type_status'] 	=  $this->type_dossier->get_data(); 
		$data['id']="test";
   		$this->load->view('V_parametre_dossier',$data); 
   	} 
    
   	public function get_record(){ 
   		$args =func_get_args(); 
   		$this->type_dossier->id_type_dossier =  $args[0]; 
   		$this->type_dossier->get_record(); 
   		echo json_encode($this->type_dossier, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
   	} 
    
   	public function delete(){ 
   		$args =func_get_args(); 
   		$this->type_dossier->id_type_dossier =  $args[0]; 
   		echo json_encode($this->type_dossier->delete(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
   	} 
    
   	public function save(){ 
   		$val_id = $this->input->post('id_type_dossier'); 
   		if (!empty($val_id)) 
   		{ 
   			$this->type_dossier->id_type_dossier = $this->input->post('id_type_dossier'); 
   		} 
   		 
   		$this->type_dossier->libelle_type_dossier = $this->input->post('libelle_type_dossier'); 
   		$this->type_dossier->niveau = $this->input->post('niveau'); 
   		$this->type_dossier->jour_debut = $this->input->post('jour_debut'); 
   		$this->type_dossier->mois_debut = $this->input->post('mois_debut'); 
   		$this->type_dossier->jour_fin = $this->input->post('jour_fin'); 
   		$this->type_dossier->mois_fin = $this->input->post('mois_fin'); 
   		echo json_encode( $this->type_dossier->save(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
   	} 
    
   } 
