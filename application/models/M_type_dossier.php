<?php
  class M_type_dossier extends  MY_Model{
  
      public $id_type_dossier;
      public $libelle_type_dossier;
      public $niveau;
      public $jour_debut;
      public $mois_debut;
      public $jour_fin;
      public $mois_fin;
  
      public function get_db_table()
      {
         return 'type_dossier';
      }
  
      public function get_db_table_pk()
      {
          return 'id_type_dossier';
      }
  	
      public function get_data_liste(){
  
  		$sql_ll="SELECT id_type_dossier ,`libelle_type_dossier`,`niveau`,`jour_debut`,`mois_debut`,`jour_fin`,`mois_fin`  FROM `type_dossier`  ";		    
  		
  		$query = $this->db->query($sql_ll);
  		
  		return $query->result(); 
      }
  
  }
