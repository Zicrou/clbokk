<?php 
class M_sys_user extends CI_model 
{	
	public function get_user_liste( $code_str)
	{
		$sql = "SELECT
					usr.id as id_user, CONCAT(UPPER(usr.prenom), ' ',UPPER(usr.nom)) AS prenom_nom,
					usr.email,
					pr.libelle_type_profil AS profil,
					usr.ien
				FROM
					sys_niits usr
				INNER JOIN sys_type_profil pr ON (pr.id_type_profil = usr.id_profil)
				
               ";
	//WHERE usr.code_str = '$code_str'
		$query = $this->db->query($sql);
		return $query->result();
	}	
}