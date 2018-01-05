  <?php
  class M_circuit extends  MY_Model{
  
      public $id_circuit;
      public $id_type_dossier;
      public $id_type_structure;
      public $ordre;
  
      public function get_db_table()
      {
         return 'circuit';
      }
  
      public function get_db_table_pk()
      {
          return 'id_circuit';
      }
  	
      public function get_cicuit_dossier($id_type_dossier){
  
  		$sql_ll="SELECT c.id_circuit ,c.id_type_dossier,c.id_type_structure,ts.libelle_type_structure,c.ordre FROM circuit c JOIN type_structure ts ON (c.id_type_structure=ts.id_type_structure) WHERE c.id_type_dossier=?  AND archiver=0 ORDER BY  c.ordre ";
  		
  		$query = $this->db->query($sql_ll,array($id_type_dossier));
  		
  		return $query->result(); 
      }

    public function get_structure($id_type_dossier){

          $sql_ll="SELECT id_type_structure, libelle_type_structure FROM type_structure WHERE id_type_structure NOT IN(SELECT id_type_structure FROM circuit WHERE 	id_type_dossier=? AND archiver=0 )";

          $query = $this->db->query($sql_ll,array($id_type_dossier));

          return $query->result();
      }

    public function archive_structure($id_type_dossier){
        $sql_ll="UPDATE circuit SET archiver=1 WHERE id_circuit=?";
        $query = $this->db->query($sql_ll,array($id_type_dossier));
    }
      public function get_max_ordre($id_type_dossier){
          $sql_ll="SELECT MAX(ordre) as max FROM circuit WHERE id_type_dossier=? AND archiver=0 ";
          $query = $this->db->query($sql_ll,array($id_type_dossier));
          $result=$query->result();
          $max='1';
          foreach ($result as $value)
          {
              $max=$value->max+1;
          }
          return $max;
      }

      public function reordonne($dossier,$ordre)
      {
          $sql_ll="UPDATE `circuit` SET ordre=ordre-1 WHERE id_type_dossier=?  AND ordre >=? AND archiver=0 ";

          $query = $this->db->query($sql_ll,array($dossier,$ordre));


      }
  }
