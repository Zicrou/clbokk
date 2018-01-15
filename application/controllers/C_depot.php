 <?php
 defined('BASEPATH') OR exit('No direct script access allowed'); 
    
   class C_depot extends MY_Controller { 
    
   	public function __construct() 
   	{ 
   	    parent::__construct(); 
   	   $this->load->model('M_depot', 'depot'); 
   	   $this->load->model('M_circuit_depot', 'circuit_depot'); 
   	   $this->load->model('M_piece_joint', 'piece_joint'); 
   	   $this->load->model('M_circuit', 'circuit'); 
		  $this->load->model('M_type_dossier', 'dossier'); 		  
		  $this->load->model('M_type_dossier_piece', 'type_piece');
   	   $this->load->model('M_etablissement', 'etablissement'); 
   	   $this->load->model('M_enseignants', 'enseignant'); 
   	   $this->load->model('M_structure_localisation', 'localisation'); 
   	} 
    
   	public function get_depots() 
   	{ 
   		$all_data = $this->depot->get_list_depot(); 
   		$data['all_data'] = $all_data; 
   		$this->load->view('V_depot_en_cours', $data);          
	}

   	

	
	public function nbr_depot()
	{
		$nbr_notification= $this->depot->get_count_liste_depot();
		echo $nbr_notification[0]->nbr_notification;
	} 
	public function detail_depot()
    {
		$args =func_get_args(); 
		$data['all_data']=$this->depot->get_info_depot($args[0]);
		$data['piece_joint']=$this->piece_joint->get_piece_depot($args[0]);
		$data['circuit_Precedent']=$this->circuit_depot->get_circuit_depot($args[0]);
		$data['circuit_depot']=$this->circuit_depot->get_circuit_depot_atlas($args[0]);
		$this->load->view('V_detail_depot',$data);
	}
	/******************** demande d'autorisation ****************************/
		public function save_depot_autorisation()
		{
			if($this->session->lfc_jafr12_s['id_type_structure']==1 && $this->input->post('etat')=='traité')
			{
				$this->enseignant->valide_enseignant($this->input->post('id_deposant'));
			}
			$this->save_circuit_depot();
			$this->get_depots();
		}
	/******************** demande d'autorisation ****************************/
/******************** tranfert ****************************/
		public function detail_transfert()
		{
			$args =func_get_args(); 
			$data['all_data']=$this->depot->get_info_etablissement($args[0]);
			$data['piece_joint']=$this->piece_joint->get_piece_depot($args[0]);
			$data['circuit_Precedent']=$this->circuit_depot->get_circuit_depot($args[0]);
			$data['circuit_depot']=$this->circuit_depot->get_circuit_depot_atlas($args[0]);
			$this->load->view('V_detail_transfert',$data);
		}

		public function get_depot_trasfert() 
		{ 
			$args =func_get_args();
			$all_data = $this->depot->get_list_depot_etablissement(3); 
			$data['all_data'] = $all_data; 
			$this->load->view('V_transfert_en_cours', $data);          
		}
		
		public function save_transfert(){ 
			$this->localisation->id_atlas = $this->input->post('id_atlas');
			$this->localisation->code_str = $this->input->post('id_deposant'); 
			$this->localisation->numero_arrete = 0; 
			$this->localisation->date_arrete = 0; 
			$this->localisation->adresse_str = $this->input->post('adresse_str'); 
			$this->localisation->code_annee = 0; 
			$this->localisation->code_annee_sortie = 0; 
			$this->localisation->save(); 
			$this->save_depot(3,3,$this->input->post('id_deposant'));
			$this->get_depot_trasfert();
		}
		public function save_depot_transfert()
		{
			if($this->session->lfc_jafr12_s['id_type_structure']==1 && $this->input->post('etat')=='traité')
			{
				$this->localisation->get_last_etablissement_localisation($this->input->post('id_deposant'));
				$this->localisation->get_new_etablissement_localisation($this->input->post('id_deposant'),$this->input->post('numero_arrete'),$this->input->post('date_arrete'));
			}
			$this->save_circuit_depot();
			$this->get_depot_trasfert();
		}

/********************fin tranfert ****************************/

/******************** reconnaissance ****************************/
	public function save_reconnaissance(){ 
		$this->save_depot(4,3,$this->input->post('id_deposant'));
		$this->get_depot_reconnaissance();
	}
	public function detail_reconnaissance()
	{
		$args =func_get_args(); 
		$data['all_data']=$this->depot->get_info_etablissement($args[0]);
		$data['piece_joint']=$this->piece_joint->get_piece_depot($args[0]);
		$data['circuit_Precedent']=$this->circuit_depot->get_circuit_depot($args[0]);
		$data['circuit_depot']=$this->circuit_depot->get_circuit_depot_atlas($args[0]);
		$this->load->view('depot\reconnaissance\V_detail_reconnaissance',$data);
	}

	public function get_depot_reconnaissance() 
	{ 
		$args =func_get_args();
		$all_data = $this->depot->get_list_depot_etablissement(4); 
		$data['all_data'] = $all_data; 
		$this->load->view('depot\reconnaissance\V_reconnaissance_en_cours', $data);          
	}

	
	public function save_depot_reconnaissance()
	{
		if($this->session->lfc_jafr12_s['id_type_structure']==1 && $this->input->post('etat')=='traité')
		{
			$this->etablissement->set_reconnue($this->input->post('id_deposant'));
		}
		$this->save_circuit_depot();
		$this->get_depot_reconnaissance();
	}

/********************fin reconnaissance ****************************/

/******************** extension_cycle ****************************/
public function save_extension_cycle(){ 
	$this->save_depot(5,3,$this->input->post('id_deposant'));
	$this->get_depot_extension_cycle();
}
public function detail_extension_cycle()
{
	$args =func_get_args(); 
	$data['all_data']=$this->depot->get_info_etablissement($args[0]);
	$data['piece_joint']=$this->piece_joint->get_piece_depot($args[0]);
	$data['circuit_Precedent']=$this->circuit_depot->get_circuit_depot($args[0]);
	$data['circuit_depot']=$this->circuit_depot->get_circuit_depot_atlas($args[0]);
	$this->load->view('depot\extension_cycle\V_detail_extension_cycle',$data);
}

public function get_depot_extension_cycle() 
{ 
	$args =func_get_args();
	$all_data = $this->depot->get_list_depot_etablissement(5); 
	$data['all_data'] = $all_data; 
	$this->load->view('depot\extension_cycle\V_extension_cycle_en_cours', $data);          
}


public function save_depot_extension_cycle()
{
	if($this->session->lfc_jafr12_s['id_type_structure']==1 && $this->input->post('etat')=='traité')
	{
		$this->etablissement->set_reconnue($this->input->post('id_deposant'));
	}
	$this->save_circuit_depot();
	$this->get_depot_extension_cycle();
}

/********************fin extension_cycle ****************************/

/******************** extension_classe ****************************/
public function save_extension_classe(){ 
	$this->save_depot(6,3,$this->input->post('id_deposant'));
	$this->get_depot_extension_classe();
}
public function detail_extension_classe()
{
	$args =func_get_args(); 
	$data['all_data']=$this->depot->get_info_etablissement($args[0]);
	$data['piece_joint']=$this->piece_joint->get_piece_depot($args[0]);
	$data['circuit_Precedent']=$this->circuit_depot->get_circuit_depot($args[0]);
	$data['circuit_depot']=$this->circuit_depot->get_circuit_depot_atlas($args[0]);
	$this->load->view('depot\extension_classe\V_detail_extension_classe',$data);
}

public function get_depot_extension_classe() 
{ 
	$args =func_get_args();
	$all_data = $this->depot->get_list_depot_etablissement(6); 
	$data['all_data'] = $all_data; 
	$this->load->view('depot\extension_classe\V_extension_classe_en_cours', $data);          
}


public function save_depot_extension_classe()
{
	if($this->session->lfc_jafr12_s['id_type_structure']==1 && $this->input->post('etat')=='traité')
	{
		$this->etablissement->set_reconnue($this->input->post('id_deposant'));
	}
	$this->save_circuit_depot();
	$this->get_depot_extension_classe();
}

/********************fin extension_classe ****************************/
	
	public function save_circuit_depot()
	{
		$slq_cascade="UPDATE circuit_depot cd JOIN depot d ON(d.id_depot=cd.id_depot) JOIN circuit c ON(cd.id_circuit=c.id_circuit) SET cd.etat=? WHERE cd.id_depot=?  AND c.ordre =?";
		$atlas=$this->session->lfc_jafr12_s['id_type_structure'];
		$etat=$this->input->post('etat');
		if($atlas<>1 && $etat=='traité')
		{
			$etat='en_cours';
		}
		$this->circuit_depot->id_circuit_depot = $this->input->post('id_circuit_depot');
		$this->circuit_depot->id_depot = $this->input->post('id_depot'); 
   		$this->circuit_depot->id_circuit = $this->input->post('id_circuit'); 
   		$this->circuit_depot->etat = $etat; 
   		$this->circuit_depot->date_traitement = date("Y-m-d"); 
   		$this->circuit_depot->code_traitement = $this->input->post('code_traitement'); 
		$this->circuit_depot->save();
		$this->circuit->id_circuit=$this->input->post('id_circuit');    
		$this->circuit->get_record();
		$ordre=$this->circuit->ordre+1;
		if($etat!="rejeté")
		{
			$query = $this->db->query($slq_cascade,array('a_traité',$this->circuit_depot->id_depot,$ordre));
		}    
		
	}

	public function save_depot($dossier,$niveau,$deposant)
	   {
		
		$atlas=$this->session->lfc_jafr12_s['id_type_structure'];
		$user=$this->session->lfc_jafr12_s['id'];
		$this->depot->id_Type_dossier = $dossier; 
   		$this->depot->niveau = $niveau; 
   		$this->depot->id_deposant = $deposant; 
   		$this->depot->date_depot = date("Y-m-d"); 
   		$this->depot->numero_depot = 0; 
		$this->depot->id_user = $user; 
		$depot_central=($atlas==1)?1:0;
   		$this->depot->depot_central= $depot_central; 
		$this->depot->save();  
		$circuits=$this->circuit->get_cicuit_dossier($dossier);
		$etat_traitement="en_cours";
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
			$piece=$this->type_piece->get_piece($dossier);
			
			
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
			// $slq_cascade="UPDATE circuit_depot cd JOIN depot d ON(d.id_depot=cd.id_depot) JOIN circuit c ON(cd.id_circuit=c.id_circuit) SET cd.etat=? WHERE cd.id_depot=?  AND c.ordre <?";
			// $atlas=$this->session->lfc_jafr12_s['id_type_structure'];
			//$this->dossier->get_depot_dossier(3);
	   } 
   } 
