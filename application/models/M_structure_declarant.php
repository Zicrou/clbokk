<?php
  class M_structure_declarant extends  MY_Model{
  
      public $id_structure_declarant;
      public $date_gerance;
      public $annee_debut_gerance;
      public $annee_sortie;
      public $id_structure;
      public $id_declarant;
      public $type_declarant;
  
      public function get_db_table()
      {
         return 'structure_declarant';
      }
  
      public function get_db_table_pk()
      {
          return 'id_structure_declarant';
      }
  	
      public function get_data_liste(){
    		$sql="SELECT id_structure_declarant ,`date_gerance`,`annee_debut_gerance`,`annee_sortie`,`id_structure`,`id_declarant`,`type_declarant` FROM `structure_declarant`  ";		    
    		$query = $this->db->query($sql_ll);
    		return $query->result(); 
      }
  
  }
