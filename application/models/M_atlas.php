 <?php
  class M_atlas extends  MY_Model{
  
      public $code_atlas;
      public $code_type_regroupement;
      public $reg_code_atlas;
      public $libelle_atlas;
      public $ordre_atlas;
      public $date_last_modif;
  
      public function get_db_table()
      {
         return 'atlas';
      }
  
      public function get_db_table_pk()
      {
          return 'code_atlas';
      }
  	
      public function get_data_liste(){  
  		$sql_ll="SELECT code_atlas ,`code_type_regroupement`,`reg_code_atlas`,`libelle_atlas`,`ordre_atlas`,`date_last_modif` FROM `atlas`  "; 		
  		$query = $this->db->query($sql_ll);  		
  		return $query->result(); 
      }
      
      public function get_region(){  
  		$sql_ll="SELECT code_atlas ,libelle_atlas FROM atlas WHERE ordre_atlas=1 "; 		
  		$query = $this->db->query($sql_ll);  		
  		return $query->result(); 
      }

      public function get_departement_region(){  
  		$sql_ll="SELECT a.code_atlas, a.libelle_atlas,at.reg_code_atlas FROM atlas a JOIN atlas at on (at.code_atlas=a.reg_code_atlas) WHERE a.ordre_atlas=3"; 		
  		$query = $this->db->query($sql_ll);  		
  		return $query->result(); 
      }
      
      public function get_commune_departement(){  
  		$sql_ll="SELECT a.code_atlas, a.libelle_atlas,atl.reg_code_atlas FROM atlas a JOIN (atlas at  JOIN atlas atl ON (atl.code_atlas=at.reg_code_atlas)) ON (at.code_atlas=a.reg_code_atlas) WHERE a.ordre_atlas=6"; 		
  		$query = $this->db->query($sql_ll);  		
  		return $query->result(); 
      }
      
  
  }
