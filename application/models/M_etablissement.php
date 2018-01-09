  <?php
  class M_etablissement extends  MY_Model{
    public $id;
    public $id_groupe_scolaire;
    public $code;
    public $nom;
    public $statut;
    public $responsable;
    public $jour_creation;
    public $mois_creation;
    public $annee_creation;
    public $adresse;
    public $telephone;
    public $arrete_ouverture;
    public $jour_ouverture;
    public $mois_ouverture;
    public $annee_ouverture;
    public $chef_etablissement;
    public $mail;
    public $longitude;
    public $latitude;
    public $localisation_administrative;
    public $id_cycle;
    public $numero_autorisation;
    public $Numero_reconnaissance;
    public $jour_reconnaissance;
    public $mois_reconnaissance;
    public $annee_reconnaissance;

      public function get_etablissement()
      {
            $json_file = file_get_contents(base_url().'configuration/etablissement.json');
            $jfo = json_decode($json_file);
            return $jfo->resultat;
      }
  
      public function get_db_table()
      {
         return 'etablissement';
      }
  
      public function get_db_table_pk()
      {
          return 'id';
      }
    public function get_etablissement_liste(){
  
        $sql_ll="SELECT et.id,et.code,et.nom,et.statut,et.responsable,et.jour_creation,et.mois_creation,et.annee_creation,et.adresse,et.telephone,gs.libelle FROM etablissement et LEFT JOIN groupe_scolaires gs ON(et.id_groupe_scolaire=gs.id_groupe_scolaire) ";
        
        $query = $this->db->query($sql_ll);
        
        return $query->result(); 
    }

    public function get_etablissement_type($type){
  
        $sql_ll="SELECT et.id,et.code,et.nom,et.statut,et.responsable,et.jour_creation,et.mois_creation,et.annee_creation,et.adresse,et.telephone,gs.libelle FROM etablissement et LEFT JOIN groupe_scolaires gs ON(et.id_groupe_scolaire=gs.id_groupe_scolaire)  WHERE `statut` =?";
        
        $query = $this->db->query($sql_ll,array($type));
        
        return $query->result(); 
    }
    
    public function get_etablissement_by_code($code){
  
        $sql_ll="SELECT * FROM etablissement WHERE code =?";
        
        $query = $this->db->query($sql_ll,array($code));
        
        return $query->result(); 
    }
      public function get_count_etablissement_type($type){
  
        $sql_ll="SELECT COUNT(id) AS 'nbr' FROM etablissement WHERE `statut` =?";
        
        $query = $this->db->query($sql_ll,array($type));
        
        return $query->result(); 
    }
  	
      
  }
