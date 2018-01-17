<?php
  class M_groupe_scolaires extends  MY_Model{
  
      public $id_groupe_scolaire;
      public $code;
      public $libelle;
      public $email;
      public $telephone;
      public $etat;
  
      public function get_db_table()
      {
         return 'groupe_scolaires';
      }
  
      public function get_db_table_pk()
      {
          return 'id_groupe_scolaire';
      }
  	
      public function get_data_liste(){  
    		$sql="SELECT id_groupe_scolaire ,`code`,`libelle`,`email`,`telephone` FROM `groupe_scolaires`  "; 		
    		$query = $this->db->query($sql);
    		return $query->result(); 
      }
  
  }
