<?php
  class M_type_structure extends  MY_Model{
  
      public $id_type_structure;
      public $libelle_type_structure;
  
      public function get_db_table()
      {
         return 'type_structure';
      }
  
      public function get_db_table_pk()
      {
          return 'id_type_structure';
      }
  	
      public function get_data_liste(){
  
  		$sql_ll="SELECT id_type_structure ,`libelle_type_structure`       ";     
  		$sql_ll.=" , CASE `etat`  ";
  		$sql_ll.="     WHEN '1' THEN 'Actif' ";
  		$sql_ll.="     WHEN '-1' THEN 'Inactif' ";
  		$sql_ll.="  END etat ";
  		$sql_ll.=" FROM `type_structure`  ";		    
  		
  		$query = $this->db->query($sql_ll);
  		
  		return $query->result(); 
      }
  
  }
