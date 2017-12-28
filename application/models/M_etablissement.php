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
  	
      
  }
