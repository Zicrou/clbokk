<?php
  class M_depot extends  MY_Model{
  
      public $id_depot;
      public $id_Type_dossier;
      public $niveau;
      public $id_deposant;
      public $date_depot;
      public $numero_depot;
      public $id_user;
      public $id_type_piece;
  
      public function get_db_table()
      {
         return 'depot';
      }
  
      public function get_db_table_pk()
      {
          return 'id_depot';
      }
  	
      public function get_data_liste(){
  
  		$sql_ll="SELECT id_depot ,`id_Type_dossier`,`niveau`,`id_deposant`,`date_depot`,`numero_depot`,`id_user`       ";     
  		$sql_ll.=" , CASE `etat`  ";
  		$sql_ll.="     WHEN '1' THEN 'Actif' ";
  		$sql_ll.="     WHEN '-1' THEN 'Inactif' ";
  		$sql_ll.="  END etat ";
  		$sql_ll.=" FROM `depot`  ";		    
  		
  		$query = $this->db->query($sql_ll);
  		
  		return $query->result(); 
      }
  
  }
