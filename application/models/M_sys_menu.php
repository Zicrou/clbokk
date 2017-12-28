<?php 
class M_sys_menu extends CI_model 
{	
	public function get_menu_liste()
	{
		$sql = "SELECT 
					m.id_menu,
					m.libelle as m_libelle,
					
					sm.id_sous_menu,
					sm.libelle as sm_libelle
				FROM
					sys_sous_menu sm
				INNER JOIN sys_menu m ON
					m.id_menu = sm.id_menu
				ORDER BY m.rang ASC";

		$query = $this->db->query($sql);
		return $query->result();
	}	
}


