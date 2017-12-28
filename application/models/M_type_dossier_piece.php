<?php
  class M_type_dossier_piece extends  MY_Model{
  
      public $id_dossier_piece;
      public $id_type_piece;
      public $id_type_dossier;
      public $etat_dossier_piece;
      public $obligatoire;
  
      public function get_db_table()
      {
         return 'type_dossier_piece';
      }
  
      public function get_db_table_pk()
      {
          return 'id_dossier_piece';
      }
  	
      public function get_data_liste(){
  
  		$sql_ll="SELECT id_dossier_piece ,`id_type_piece`,`id_type_dossier`,`etat_dossier_piece`,`obligatoire` FROM `type_dossier_piece` WHERE id_type_dossier=?  ";		    
  		
  		$query = $this->db->query($sql_ll,array());
  		
  		return $query->result(); 
      }
  
  }
