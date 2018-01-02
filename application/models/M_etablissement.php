  <?php
  class M_etablissement extends  MY_Model{
      public $id;
      public $code;
      public $nom;
      public $status;
      public $responsable;
      public $jour_creation;
      public $mois_creation;
      public $annee_creation;
      public $Adresse;
      public $Telephone;

      public function get_etablissement()
      {
            $json_file = file_get_contents("http://codeco.simendev.com/etab-privee");
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

      public function get_etablissement_type($type){
  
        $sql_ll="SELECT id,code,nom,`status`,responsable,jour_creation,mois_creation,annee_creation,adresse,telephone FROM etablissement WHERE `status` =?";
        
        $query = $this->db->query($sql_ll,array($type));
        
        return $query->result(); 
    }
      public function get_count_etablissement_type($type){
  
        $sql_ll="SELECT COUNT(id) AS 'nbr' FROM etablissement WHERE `status` =?";
        
        $query = $this->db->query($sql_ll,array($type));
        
        return $query->result(); 
    }
  	
      
  }
