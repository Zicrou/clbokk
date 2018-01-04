  <?php
  class M_enseignants extends  MY_Model{
  
      public $id_ens;
      public $ien_ens;
      public $cni;
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
  
  		$sql_ll="SELECT ens.id_ens ,ens.ien_ens,ens.prenom_ens,ens.nom_ens,ens.sexe_ens,ens.date_nais_ens,ens.numero_autorisation,ens.profil_aca,ens.profil_pro,ens.css,ens.ipres,ens.ipm,s.nom_specialite,ens.etat_ens,ens.statut_ens FROM enseignants ens JOIN specialite s on (ens.code_specialite=s.code_specialite) WHERE
      ens.id_ens > ((SELECT 
              MAX(id_ens)
          FROM
          enseignants) - 200)  ";
  		
  		$query = $this->db->query($sql_ll);
  		
  		return $query->result(); 
      }
  
  }
