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
	public function save_circuit_depot()
	{
		$slq_cascade="UPDATE circuit_depot cd JOIN depot d ON(d.id_depot=cd.id_depot) JOIN circuit c ON(cd.id_circuit=c.id_circuit) SET cd.etat=? WHERE cd.id_depot=?  AND c.ordre =?";
		$atlas=$this->session->lfc_jafr12_s['id_atlas'];
		$etat=$this->input->post('etat');
		if($atlas<>1 && $etat=='traité')
		{
			$etat='en_cours';
		}
		$this->circuit_depot->id_circuit_depot = $this->input->post('id_circuit_depot');
		$this->circuit_depot->id_depot = $this->input->post('id_depot'); 
   		$this->circuit_depot->id_circuit = $this->input->post('id_circuit'); 
   		$this->circuit_depot->etat = $etat; 
   		$this->circuit_depot->code_traitement = 1; 
   		$this->circuit_depot->date_traitement = date("Y-m-d"); 
		$this->circuit_depot->save();
		$this->circuit->id_circuit=$this->input->post('id_circuit');    
		$this->circuit->get_record();
		$ordre=$this->circuit->ordre+1;
		if($etat!="rejeté")
		{
			$query = $this->db->query($slq_cascade,array('a_traité',$this->circuit_depot->id_depot,$ordre));
		}    
		$this->get_depots();
	} 
   } 
