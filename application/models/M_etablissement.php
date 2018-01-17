<?php
  class M_etablissement extends  MY_Model{
    public $id;
      public $id_groupe_scolaire;
      public $code;
      public $nom;
      public $statut_religieux;
      public $jour_creation;
      public $mois_creation;
      public $annee_creation;
      public $adresse;
      public $telephone;
      public $arrete_ouverture;
      public $jour_ouverture;
      public $mois_ouverture;
      public $annee_ouverture;
      public $mail;
      public $longitude;
      public $latitude;
      public $id_atlas;
      public $id_cycle;
      public $numero_autorisation;
      public $Numero_reconnaissance;
      public $jour_reconnaissance;
      public $mois_reconnaissance;
      public $annee_reconnaissance;
      public $statut;
      public $numero_recepisse;
      public $jour_autorisation;
      public $mois_autorisation;
      public $annee_autorisation;

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
  
        $sql_ll="SELECT et.id,et.code,et.nom,et.statut,et.jour_creation,et.mois_creation,et.annee_creation,et.adresse,et.telephone,gs.libelle FROM etablissement et LEFT JOIN groupe_scolaires gs ON(et.id_groupe_scolaire=gs.id_groupe_scolaire) ";
        
        $query = $this->db->query($sql_ll);
        
        return $query->result(); 
    }

    public function get_etablissement_type($type){
  
        $sql_ll="SELECT et.id,et.code,et.nom,et.statut,et.jour_creation,et.mois_creation,et.annee_creation,et.adresse,et.telephone,gs.libelle FROM etablissement et LEFT JOIN groupe_scolaires gs ON(et.id_groupe_scolaire=gs.id_groupe_scolaire)  WHERE `statut` =?";
        
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

    public function get_statut_religieux(){
  
        $sql_ll="SELECT * FROM statut";
        
        $query = $this->db->query($sql_ll);
        
        return $query->result(); 
    }

    public function get_cycle(){  
        $sql_ll="SELECT * FROM cycle_enseignement";        
        $query = $this->db->query($sql_ll);        
        return $query->result(); 
    }

    public function set_reconnue($id){
        $sql_ll="UPDATE etablissement SET statut='Reconnu' WHERE id =?";        
        $this->db->query($sql_ll,array($id));
    }
    public function set_ouvert($date_ouverture,$recipisse,$id){
        $date = date_parse($date_ouverture);
        $jour = $date['day'];
        $mois = $date['month'];
        $annee = $date['year'];
        $sql_ll="UPDATE etablissement SET jour_ouverture=?,mois_ouverture=?,annee_ouverture=?,numero_recepisse=?,statut='En Instance' WHERE id=?";        
        $this->db->query($sql_ll,array($jour,$mois,$annee,$recipisse,$id));
    }
    public function set_autorise($date_autorisation,$recipisse,$id){
        $date = date_parse($date_autorisation);
        $jour = $date['day'];
        $mois = $date['month'];
        $annee = $date['year'];
        $sql_ll="UPDATE etablissement SET numero_autorisation=?,jour_autorisation=?,mois_autorisation=?,annee_autorisation=?,statut='Autorisé' WHERE id=?";        
        $this->db->query($sql_ll,array($recipisse,$jour,$mois,$annee,$id));
    }
  	
      
  }
