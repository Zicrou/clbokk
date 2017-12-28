 <?php
 defined('BASEPATH') OR exit('No direct script access allowed'); 
    
   class C_annee_scolaire extends MY_Controller { 
    
   	public function __construct() 
   	{ 
   	    parent::__construct(); 
   	   $this->load->model('M_annee_scolaire', 'annee'); 
   	} 
    
   	public function index() 
   	{ 
   		$all_data = $this->annee->get_data_liste(); 
   		$data['all_data'] = $all_data; 
          $data['all_type_status'] 	=  $this->annee->get_data(); 
   		$this->load->view('V_annee_scolaire', $data); 
   	} 
    
   	public function get_record(){ 
   		$args =func_get_args(); 
   		$this->annee->code_annee_scolaire =  $args[0]; 
   		$this->annee->get_record(); 
   		echo json_encode($this->annee, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
   	} 
    
   	public function delete(){ 
   		$args =func_get_args(); 
   		$this->annee->code_annee_scolaire =  $args[0]; 
   		echo json_encode($this->annee->delete(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
   	} 
    
   	public function save(){ 
   		$val_id = $this->input->post('code_annee_scolaire'); 
   		if (!empty($val_id)) 
   		{ 
   			$this->annee->code_annee_scolaire = $this->input->post('code_annee_scolaire'); 
   		}    		 
   		$this->annee->annee = $this->input->post('annee'); 
   		$this->annee->libelle_annee = $this->input->post('libelle_annee'); 
   		$this->annee->en_cours = $this->input->post('en_cours'); 
   		$this->annee->etat_annee = $this->input->post('etat_annee'); 
   		echo json_encode( $this->annee->save(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
   	} 
    
   } 
