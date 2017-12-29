 <?php
 defined('BASEPATH') OR exit('No direct script access allowed'); 
    
   class C_enseignants extends MY_Controller { 
    
   	public function __construct() 
   	{ 
   	    parent::__construct(); 
		  $this->load->model('M_enseignants', 'enseignant'); 
		  $this->load->model('M_type_dossier_piece', 'type_piece');
		  $this->load->model('M_depot', 'depot');
   	} 
    
   	public function index() 
   	{ 
   		$all_data = $this->enseignant->get_data_liste();
   		$data['all_data'] = $all_data;
   		$this->load->view('V_enseignants', $data); 
   	}
	   public function demande_autorisaton()
	   {
   		$data['piece'] = $this->type_piece->get_piece(1);
		$this->load->view('V_autorisation_enseignant',$data);
	   }
	   public function save_autorisation()
	   {
		$this->enseignant->ien_ens = $this->input->post('ien_ens'); 
		$this->enseignant->prenom_ens = $this->input->post('prenom_ens'); 
		$this->enseignant->nom_ens = $this->input->post('nom_ens'); 
		$this->enseignant->sexe_ens = $this->input->post('sexe_ens'); 
		$this->enseignant->date_nais_ens = $this->input->post('date_nais_ens'); 
		$this->enseignant->numero_autorisation = $this->input->post('numero_autorisation'); 
		$this->enseignant->profil_aca = $this->input->post('profil_aca'); 
		$this->enseignant->profil_pro = $this->input->post('profil_pro'); 
		$this->enseignant->css = $this->input->post('css'); 
		$this->enseignant->ipres = $this->input->post('ipres'); 
		$this->enseignant->ipm = $this->input->post('ipm'); 
		$this->enseignant->code_specialite = $this->input->post('code_specialite'); 
		$this->enseignant->etat_ens = $this->input->post('etat_ens'); 
		$this->enseignant->statut_ens = $this->input->post('statut_ens'); 
		$this->enseignant->save();
		
			$piece=$this->type_piece->get_piece(1);
			var_dump($piece);
			$i=1;
			foreach ($piece as $value)
			{
				 
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
                $config['max_size']             = 300000;
                $config['max_width']            = 1024;
				$config['max_height']           = 768;
				$config['file_name']           = $value->id_type_piece;
				
				$this->load->library('upload', $config);
				$i+=1;
					if ( ! $this->upload->do_upload('pj_'.$value->id_type_piece))
					{
							$error = array('error' => $this->upload->display_errors());

							
					}
					else
					{
												
							$data = array('upload_data' => $this->upload->data());
							$this->depot->id_depot ='';
							$this->depot->id_Type_dossier = 1; 
							$this->depot->id_type_piece = $value->id_type_piece; 
							$this->depot->niveau = 1; 
							$this->depot->id_deposant = $this->enseignant->id_ens ; 
							$this->depot->date_depot =date("Y-m-d"); 
							$this->depot->numero_depot = 0; 
							$this->depot->id_user = 1; 
							$this->depot->save(); 

							
					}
				
				//echo strlen($this->input->post('pj_'.$value->id_type_piece));
			}
			//echo strlen($this->input->post('pj_10333333333333'));
	   }
    
   	public function get_record(){ 
   		$args =func_get_args(); 
   		$this->enseignant->id_ens =  $args[0]; 
   		$this->enseignant->get_record(); 
   		echo json_encode($this->enseignant, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
   	} 
    
   	public function delete(){ 
   		$args =func_get_args(); 
   		$this->enseignant->id_ens =  $args[0]; 
   		echo json_encode($this->enseignant->delete(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
   	} 
    
   	public function save(){ 
   		$val_id = $this->input->post('id_ens'); 
   		if (!empty($val_id)) 
   		{ 
   			$this->enseignant->id_ens = $this->input->post('id_ens'); 
   		} 
   		 
   		$this->enseignant->ien_ens = $this->input->post('ien_ens'); 
   		$this->enseignant->prenom_ens = $this->input->post('prenom_ens'); 
   		$this->enseignant->nom_ens = $this->input->post('nom_ens'); 
   		$this->enseignant->sexe_ens = $this->input->post('sexe_ens'); 
   		$this->enseignant->date_nais_ens = $this->input->post('date_nais_ens'); 
   		$this->enseignant->numero_autorisation = $this->input->post('numero_autorisation'); 
   		$this->enseignant->profil_aca = $this->input->post('profil_aca'); 
   		$this->enseignant->profil_pro = $this->input->post('profil_pro'); 
   		$this->enseignant->css = $this->input->post('css'); 
   		$this->enseignant->ipres = $this->input->post('ipres'); 
   		$this->enseignant->ipm = $this->input->post('ipm'); 
   		$this->enseignant->code_specialite = $this->input->post('code_specialite'); 
   		$this->enseignant->etat_ens = $this->input->post('etat_ens'); 
   		$this->enseignant->statut_ens = $this->input->post('statut_ens'); 
   		echo json_encode( $this->enseignant->save(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); 
   	} 
    
   } 
