<?php
  class M_type_dossier_piece extends  MY_Model{
  
      public $id_dossier_piece;
      public $id_type_piece;
      public $id_type_dossier;
      public $etat_dossier_piece;
      public $obligatoire;
  
      public function get_db_table()
      {
         return 'type_dossier_piece';
      }
  
      public function get_db_table_pk()
      {
          return 'id_dossier_piece';
      }
  	
      public function get_piece($id_type_dossier){
  
  		$sql_ll="SELECT dp.id_dossier_piece, dp.id_type_piece,tp.libelle_type_piece,dp.id_type_dossier,dp.etat_dossier_piece,dp.obligatoire FROM type_dossier_piece dp LEFT JOIN type_piece tp ON(dp.id_type_piece=tp.id_type_piece) WHERE id_type_dossier=? AND dp.archiver=0 ";
  		
  		$query = $this->db->query($sql_ll,array($id_type_dossier));
  		
  		return $query->result(); 
      }

      public function get_piece_dossier($id_type_dossier){

          $sql_ll="SELECT id_type_piece ,libelle_type_piece FROM type_piece WHERE id_type_piece NOT IN(select id_type_piece FROM type_dossier_piece where id_type_dossier=? AND archiver=0 )";

          $query = $this->db->query($sql_ll,array($id_type_dossier));

          return $query->result();
      }
      public function archive_piece_dossier($id_type_dossier){

          $sql_ll="UPDATE type_dossier_piece SET archiver=1 WHERE id_dossier_piece=?";

          $query = $this->db->query($sql_ll,array($id_type_dossier));
      }

      
  }
