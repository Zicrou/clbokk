<?php
  class M_type_piece extends  MY_Model{
  
      public $id_type_piece;
      public $libelle_type_piece;
  
      public function get_db_table()
      {
         return 'type_piece';
      }
  
      public function get_db_table_pk()
      {
          return 'id_type_piece';
      }
  	
      public function get_data_liste(){
  
  		$sql_ll="SELECT id_type_piece ,`libelle_type_piece`   FROM `type_piece`  ";		    
  		
  		$query = $this->db->query($sql_ll);
  		
  		return $query->result(); 
      }
  
  }
