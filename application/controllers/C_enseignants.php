 <?php
 defined('BASEPATH') OR exit('No direct script access allowed'); 
    
   class C_enseignants extends MY_Controller { 
    
   	public function __construct() 
   	{ 
   	    parent::__construct(); 
		  $this->load->model('M_enseignants', 'enseignant'); 
		  $this->load->model('M_type_dossier_piece', 'type_piece');
		  $this->load->model('M_type_dossier', 'type_dossier');
		  $this->load->model('M_depot', 'depot');
		  $this->load->model('M_circuit', 'circuit');
		  $this->load->model('M_specialite', 'specialite');
		  
   	} 
    
   	public function index() 
   	{ 
   		$all_data = $this->enseignant->get_data_liste();
   		$data['all_data'] = $all_data;
   		$this->load->view('V_enseignants', $data); 
   	}
	   public function demande_autorisaton()
	   {
		
		$this->type_dossier->id_type_dossier=1;
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
		if(($date_jour>=$date_debut && $date_jour<=$date_fin)||($this->session->lfc_jafr12_s['id_atlas']==1))
		{
			$data_speciliate=$this->specialite->get_data();
			$data['select_specialite'] 	= create_select_list($data_speciliate, 'code_specialite', 'nom_specialite', '');
			$data['piece'] = $this->type_piece->get_piece(1);
			$this->load->view('V_autorisation_enseignant',$data);
		}
		else
		{
			$d=$date_debut;
			$data['titre']="AUTORISATION D'ENSEIGNEMENT OU D'EXERCER DANS LES ECOLES PRIVÉES DU SÉNÉGAL";
			$data['message']=" Periode de depot : du ".$date_debut->format('d-M-Y')." au ".$date_fin->format('d-M-Y');
			$this->load->view('V_hors_delai',$data);
		}
	   }
	   public function save_autorisation()
	   {
		$this->enseignant->ien_ens = $this->input->post('ien_ens'); 
		$this->enseignant->prenom_ens = $this->input->post('prenom_ens'); 
		$this->enseignant->nom_ens = $this->input->post('nom_ens'); 
		$this->enseignant->cni = $this->input->post('cni'); 
		$this->enseignant->sexe_ens = $this->input->post('sexe_ens'); 
		$this->enseignant->date_nais_ens = $this->input->post('date_nais_ens'); 
		$this->enseignant->numero_autorisation = '0'; 
		$this->enseignant->profil_aca = $this->input->post('profil_aca'); 
		$this->enseignant->profil_pro = $this->input->post('profil_pro'); 
		$this->enseignant->css = $this->input->post('css'); 
		$this->enseignant->ipres = $this->input->post('ipres'); 
		$this->enseignant->ipm = $this->input->post('ipm'); 
		$this->enseignant->code_specialite = $this->input->post('code_specialite'); 
		$this->enseignant->etat_ens = '0'; 
		$this->enseignant->statut_ens = $this->input->post('statut_ens'); 
		$this->enseignant->save();

		$this->depot->id_Type_dossier = 1; 
   		$this->depot->niveau = 1; 
   		$this->depot->id_deposant = $this->enseignant->id_ens; 
   		$this->depot->date_depot = date("Y-m-d"); 
   		$this->depot->numero_depot = 0; 
		$this->depot->id_user = 1; 
		$atlas=$this->session->lfc_jafr12_s['id_atlas'];
		$depot_central=($atlas==1)?1:0;
   		$this->depot->depot_central= $depot_central; 
		$this->depot->save();  
		$circuits=$this->circuit->get_cicuit_dossier(1);
		$etat_traitement="en_cours";
		$atlas=$this->session->lfc_jafr12_s['id_atlas'];
		foreach ($circuits as $circuit)
		{
			if($atlas==$circuit->id_type_structure)
			{
				$etat_traitement='a_traité';
			}
			$data = array(
				'id_circuit '=> $circuit->id_circuit, 
				'id_depot '=> $this->depot->id_depot,
				'etat'=>$etat_traitement ,
				'code_traitement'=> '0',
				'date_traitement'=> date("Y-m-d")
				);
				
				$this->db->insert('circuit_depot', $data);
				if($etat_traitement=='a_traité')
				{
					$etat_traitement='en_attente';
				}
		}
			$piece=$this->type_piece->get_piece(1);
			
			
			foreach ($piece as $value)
			{
				$filename = $_FILES["pj_".$value->id_type_piece]["name"];
					$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
					$file_ext = substr($filename, strripos($filename, '.')); // get file name
					$filesize = $_FILES["pj_".$value->id_type_piece]["size"];
					$allowed_file_types = array('.gif','.jpg','.png','.PNG','.jpeg','.pdf');	

						if (in_array($file_ext,$allowed_file_types) && ($filesize < 300000))
						{	
							$data = array(
							'id_type_piece '=> $value->id_type_piece, 
							'id_depot '=> $this->depot->id_depot,
							'extension '=> $file_ext
							);
							$this->db->insert('piece_joint', $data);
							
							
							$id=$this->db->insert_id(); 
							// $newfilename = $this->depot->id_depot."_".$value->id_type_piece. $file_ext;
							$newfilename = $id.$file_ext;
								move_uploaded_file($_FILES["pj_".$value->id_type_piece]["tmp_name"], "./uploads/" . $newfilename);
								//echo "File uploaded successfully.";		
								
						}
						elseif (empty($file_basename))
						{	
							// file selection error
							//echo "Please select a file to upload.";
						} 
						elseif ($filesize > 300000)
						{	
							// file size error
							//echo "The file you are trying to upload is too large.";
						}
						else
						{
							// file type error
							//echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
							unlink($_FILES["pj_".$value->id_type_piece]["tmp_name"]);
						}				
				
			}
			$slq_cascade="UPDATE circuit_depot cd JOIN depot d ON(d.id_depot=cd.id_depot) JOIN circuit c ON(cd.id_circuit=c.id_circuit) SET cd.etat=? WHERE cd.id_depot=?  AND c.ordre <?";
			$atlas=$this->session->lfc_jafr12_s['id_atlas'];
			$this->index();
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
