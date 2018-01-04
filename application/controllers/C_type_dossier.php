<?php
 defined('BASEPATH') OR exit('No direct script access allowed'); 
    
   class C_type_dossier extends MY_Controller { 
    
   	public function __construct() 
   	{ 
   	    parent::__construct(); 
   	   $this->load->model('M_type_dossier', 'type_dossier'); 
   	   $this->load->model('M_circuit', 'circuit'); 
   	   $this->load->model('M_type_dossier_piece', 'type_piece');
   	   $this->load->model('M_type_piece', 'piece');
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
		$this->type_dossier->id_type_dossier=$args[0];
		$this->type_dossier->get_record();
		$data_type_piece= $this->type_piece->get_piece_dossier($args[0]);
		$data['select_type_piece'] 	= create_select_list($data_type_piece, 'id_type_piece', 'libelle_type_piece', '');
		$data_structure= $this->circuit->get_structure($args[0]);
		$data['select_structure'] 	= create_select_list($data_structure, 'id_type_structure', 'libelle_type_structure', '');
		$data['all_circuit'] =  $this->circuit->get_cicuit_dossier($args[0]);
		$data['all_type'] =  $this->type_piece->get_piece($args[0]);
		$data['id_dossier_piece']=$args[0];
		$data['lib_dossier']=$this->type_dossier->libelle_type_dossier;
   		$this->load->view('V_parametre_dossier',$data);
   	}
	   public function delete_piece_dossier()
	   {
		   $args =func_get_args();
		   $this->type_piece->id_dossier_piece =  $args[0];
		   $this->type_piece->get_record();
		   $this->type_piece->archive_piece_dossier($args[0]);
		   $id_dossier=$this->type_piece->id_type_dossier;
		   $data_type_piece= $this->type_piece->get_piece_dossier($id_dossier);
		   $data['select_type_piece'] 	= create_select_list($data_type_piece, 'id_type_piece', 'libelle_type_piece', '');
		   $data['all_type'] =  $this->type_piece->get_piece($id_dossier);
		   $data['id_dossier_piece']=$id_dossier;
		   $this->load->view('V_parametre_dossier_piece',$data);
	   }
    public function delete_circuit()
	   {

		   $args =func_get_args();
		   $this->circuit->id_circuit =  $args[0];
		   $this->circuit->get_record();
		   $id_dossier=$this->circuit->id_type_dossier;
		   $this->circuit->delete();
		   $this->circuit->reordonne($id_dossier,$this->circuit->ordre);

		   $data_structure= $this->circuit->get_structure($id_dossier);
		   $data['select_structure'] 	= create_select_list($data_structure, 'id_type_structure', 'libelle_type_structure', '');
		   $data['all_circuit'] =  $this->circuit->get_cicuit_dossier($id_dossier);
		   $data['id_dossier_piece']=$id_dossier;
		   $this->load->view('V_parametre_circuit',$data);

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
	   public function save_type_piece()
	   {
		   $val_id = $this->input->post('id_dossier_piece');
		   if (!empty($val_id))
		   {
			   $this->type_piece->id_dossier_piece = $this->input->post('id_dossier_piece');
		   }
		   $this->type_piece->id_type_piece = $this->input->post('id_type_piece');
		   $this->type_piece->id_type_dossier = $this->input->post('id_type_dossier');
		   $this->type_piece->etat_dossier_piece='1';
		   $this->type_piece->obligatoire=($this->input->post('obligatoire')=="1")?'1':'-1';
		   $result = $this->type_piece->save();

		   $id_dossier=$this->input->post('id_type_dossier');
		   $data_type_piece= $this->type_piece->get_piece_dossier($id_dossier);
		   $data['select_type_piece'] 	= create_select_list($data_type_piece, 'id_type_piece', 'libelle_type_piece', '');
		   $data['all_type'] =  $this->type_piece->get_piece($id_dossier);
		   $data['id_dossier_piece']=$id_dossier;
		   $this->load->view('V_parametre_dossier_piece',$data);
	   }
	   public function save_circuit()
	   {
		   $val_id = $this->input->post('id_circuit');
		   $id_dossier=$this->input->post('id_type_dossier');
		   if (!empty($val_id))
		   {
			   $this->circuit->id_circuit = $this->input->post('id_circuit');
		   }
		   $this->circuit->id_type_dossier = $this->input->post('id_type_dossier');
		   $this->circuit->id_type_structure=$this->input->post('id_type_structure');
		   $this->circuit->ordre=$this->circuit->get_max_ordre($id_dossier);
		   $result = $this->circuit->save();


		   $data_structure= $this->circuit->get_structure($id_dossier);
		   $data['select_structure'] 	= create_select_list($data_structure, 'id_type_structure', 'libelle_type_structure', '');
		   $data['all_circuit'] =  $this->circuit->get_cicuit_dossier($id_dossier);
		   $data['id_dossier_piece']=$id_dossier;
		   $this->load->view('V_parametre_circuit',$data);

	   }
    
   } 
