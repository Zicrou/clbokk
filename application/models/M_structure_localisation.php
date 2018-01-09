  <?php
  class M_structure_localisation extends  MY_Model{
  
      public $id_structure_localistion;
      public $id_atlas;
      public $code_str;
      public $numero_arrete;
      public $date_arrete;
      public $adresse_str;
      public $code_annee;
      public $code_annee_sortie;
  
      public function get_db_table()
      {
         return 'structure_localisation';
      }

  
      public function get_db_table_pk()
      {
          return 'id_structure_localistion';
      }
  	
      public function get_data_liste(){
  
  		$sql_ll="SELECT id_structure_localistion ,id_atlas,code_str,numero_arrete,date_arrete,adresse_str,code_annee,code_annee_sortie FROM structure_localisation  ";		    
  		
  		$query = $this->db->query($sql_ll);
  		
  		return $query->result(); 
      }

      public function get_last_etablissement_localisation($structure){

        $sql_ll="SELECT id_structure_localistion FROM structure_localisation WHERE code_str=? AND code_annee_sortie='9999' ";
        $query = $this->db->query($sql_ll,array($structure));
        $query_id_last=$query->result();
        if(isset($query_id_last[0]))
				{					
					$id_last_localisation=$query_id_last[0]->id_structure_localistion;
          $sql="UPDATE structure_localisation SET code_annee_sortie=".date('Y')." WHERE id_structure_localistion=".$id_last_localisation;
          $this->db->query($sql);
				}
      }

      public function get_new_etablissement_localisation($structure,$numero_arrete,$date_arrete){  
        $sql_ll="SELECT id_structure_localistion FROM structure_localisation WHERE code_str= ? AND code_annee_sortie=0 ";	 
        $query = $this->db->query($sql_ll,array($structure));
        $query_id_new=$query->result();
        if(isset($query_id_new[0]))
				{					
					$id_new_localisation=$query_id_new[0]->id_structure_localistion;
					$sql="UPDATE structure_localisation SET numero_arrete=?,date_arrete=?,code_annee=".date('Y').",code_annee_sortie='9999'  WHERE id_structure_localistion=".$id_new_localisation;
          $this->db->query($sql,array($numero_arrete,$date_arrete));
        }      
        
      }  
  }
