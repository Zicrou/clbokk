<?php
  class M_circuit_depot extends  MY_Model{
  
      public $id_circuit_depot;
      public $id_depot;
      public $id_circuit;
      public $etat;
      public $code_traitement;
      public $date_traitement;
  
      public function get_db_table()
      {
         return 'circuit_depot';
      }
  
      public function get_db_table_pk()
      {
          return 'id_circuit_depot';
      }
  	
      public function get_data_liste(){  
        $sql_ll="SELECT id_circuit_depot ,`id_depot`,`id_circuit`,`code_traitement`,`date_traitement`  FROM `circuit_depot`  ";  		
        $query = $this->db->query($sql_ll);
        return $query->result(); 
      }

      public function get_circuit_depot($id_depot){ 
        $sql_ll="SELECT cd.id_circuit_depot ,cd.id_depot,cd.id_circuit,c.id_type_structure,ts.libelle_type_structure,cd.code_traitement,cd.etat,cd.date_traitement  FROM circuit_depot cd JOIN (circuit c JOIN type_structure ts ON(c.id_type_structure=ts.id_type_structure) ) ON(cd.id_circuit=c.id_circuit )  WHERE cd.id_depot=? AND cd.etat='traité' ORDER BY c.ordre";
        $query = $this->db->query($sql_ll,array($id_depot));  		
        return $query->result(); 
      }

      public function get_circuit_depot_atlas($id_depot){
        $atlas=$this->session->lfc_jafr12_s['id_atlas'];  
        $sql_ll="SELECT cd.id_circuit_depot ,cd.id_depot,cd.id_circuit,c.id_type_structure,cd.code_traitement,cd.etat,cd.date_traitement  FROM circuit_depot cd JOIN circuit c ON(cd.id_circuit=c.id_circuit )  WHERE cd.id_depot=? AND c.id_type_structure=?";
        $query = $this->db->query($sql_ll,array($id_depot,$atlas));  		
        return $query->result(); 
      }
  
  }
