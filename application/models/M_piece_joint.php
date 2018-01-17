<?php 
  class M_piece_joint extends  MY_Model{
  
      public $id_piece_joint;
      public $id_type_piece;
      public $id_depot;
      public $extension;
  
      public function get_db_table()
      {
         return 'piece_joint';
      }
  
      public function get_db_table_pk()
      {
          return 'id_piece_joint';
      }
  	
      public function get_piece_depot($id_depot){
  
  		$sql_ll="SELECT pj.id_piece_joint ,pj.id_type_piece,tp.libelle_type_piece,pj.id_depot,pj.extension FROM piece_joint pj JOIN type_piece tp ON (pj.id_type_piece=tp.id_type_piece) WHERE  id_depot=?";		    
  		
  		$query = $this->db->query($sql_ll,array($id_depot));
  		
  		return $query->result(); 
      }
      
  
  }
