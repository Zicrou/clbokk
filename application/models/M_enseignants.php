  <?php
  class M_enseignants extends  MY_Model{
  
      public $id_ens;
      public $ien_ens;
      public $prenom_ens;
      public $nom_ens;
      public $sexe_ens;
      public $date_nais_ens;
      public $numero_autorisation;
      public $profil_aca;
      public $profil_pro;
      public $css;
      public $ipres;
      public $ipm;
      public $code_specialite;
      public $etat_ens;
      public $statut_ens;
  
      public function get_db_table()
      {
         return 'enseignants';
      }
  
      public function get_db_table_pk()
      {
          return 'id_ens';
      }
  	
      public function get_data_liste(){
  
  		$sql_ll="SELECT id_ens ,`ien_ens`,`prenom_ens`,`nom_ens`,`sexe_ens`,`date_nais_ens`,`numero_autorisation`,`profil_aca`,`profil_pro`,`css`,`ipres`,`ipm`,`code_specialite`,`etat_ens`,`statut_ens` FROM `enseignants` LIMIT 100 ";
  		
  		$query = $this->db->query($sql_ll);
  		
  		return $query->result(); 
      }
  
  }
