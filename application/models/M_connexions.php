<?php
class M_connexions extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function test_connexion()
	{
		$this->load->helper('url');
		$login = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$sql_ll = "SELECT 
					usr.id AS page_bidar_, CONCAT(UPPER(usr.prenom), ' ',UPPER(usr.nom)) AS user_conn,
					pr.libelle_type_profil AS profil, 
					pr.id_type_profil AS id_profil, 
					usr.ien ,
					usr.id_atlas,
					usr.password,
					atl.ordre_atlas
				FROM
					sys_niits usr 
				INNER JOIN sys_type_profil pr ON (pr.id_type_profil = usr.id_profil)  
				LEFT JOIN atlas atl ON (usr.id_atlas = atl.code_atlas)  
				WHERE 
					usr.email = ? AND usr.password = ?";
		
		$query = $this->db->query($sql_ll,array($login,$pass));
		return $query->row_array();
	}
}
