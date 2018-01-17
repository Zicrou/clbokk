<?php
  class M_specialite extends  MY_Model{
  
      public $code_specialite;
      public $nom_specialite;
  
      public function get_db_table()
      {
         return 'specialite';
      }
  
      public function get_db_table_pk()
      {
          return 'code_specialite';
      }
  	
      public function get_data_liste(){
  
  		$sql_ll="SELECT code_specialite ,`nom_specialite`  FROM `specialite`  ";		    
  		
  		$query = $this->db->query($sql_ll);
  		
  		return $query->result(); 
      }
  
  }
