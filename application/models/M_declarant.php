<?php
  class M_declarant extends  MY_Model{
  
      public $id_declarant;
      public $prenom_declarant;
      public $nom_declarant;
      public $sexe_declarant;
      public $dipl_declarant;
      public $etat_declarant;
  
      public function get_db_table()
      {
         return 'declarant';
      }
  
      public function get_db_table_pk()
      {
          return 'id_declarant';
      }
  	
      public function get_data_liste(){
        $sql="SELECT id_declarant ,`prenom_declarant`,`nom_declarant`,`sexe_declarant`,`dipl_declarant`,`etat_declarant` FROM `declarant`  ";		    
        $query = $this->db->query($sql);
        return $query->result(); 
      }
  }
