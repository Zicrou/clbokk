<?php
  class M_depot extends  MY_Model{
  
      public $id_depot;
      public $id_Type_dossier;
      public $niveau;
      public $id_deposant;
      public $date_depot;
      public $numero_depot;
      public $id_user;
  
      public function get_db_table()
      {
         return 'depot';
      }
  
      public function get_db_table_pk()
      {
          return 'id_depot';
      }
  	
      public function get_list_depot(){
  
  		$sql_ll="SELECT cd.id_circuit_depot,cd.id_depot,d.date_depot,cd.etat,cd.code_traitement,cd.date_traitement,c.id_type_structure,c.ordre,e.prenom_ens,e.nom_ens,td.libelle_type_dossier FROM circuit_depot cd JOIN( circuit c JOIN type_dossier td ON(c.id_type_dossier=td.id_type_dossier))ON(cd.id_circuit=c.id_circuit) JOIN( depot d JOIN enseignants e ON(d.id_deposant=e.id_ens) )ON(d.id_depot=cd.id_depot) AND c.id_type_structure=3 AND cd.etat IN ('en_attente','en_cours')  AND  cd.id_depot NOT IN(SELECT cd2.id_depot FROM circuit_depot cd2 JOIN( circuit c2 JOIN type_dossier td2 ON(c2.id_type_dossier=td2.id_type_dossier))ON(cd2.id_circuit=c2.id_circuit) WHERE cd2.id_depot=cd.id_depot AND c2.ordre=c.ordre-1 AND cd2.etat IN ('en_attente','en_cours') )";		    
  		
  		$query = $this->db->query($sql_ll);
  		
  		return $query->result(); 
      }
  
  }
