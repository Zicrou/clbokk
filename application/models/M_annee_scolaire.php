<?php
  class M_annee_scolaire extends  MY_Model{
  
      public $code_annee_scolaire;
      public $annee;
      public $libelle_annee;
      public $en_cours;
      public $etat_annee;
  
      public function get_db_table()
      {
         return 'annee_scolaire';
      }
  
      public function get_db_table_pk()
      {
          return 'code_annee_scolaire';
      }
  	
      public function get_data_liste(){
  
  		$sql_ll="SELECT code_annee_scolaire ,`annee`,`libelle_annee`,`en_cours`,`etat_annee` FROM `annee_scolaire`";		    
  		
  		$query = $this->db->query($sql_ll);
  		
  		return $query->result(); 
      }  
  }