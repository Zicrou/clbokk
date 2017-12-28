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
  
  		$sql_ll="SELECT id_circuit ,`id_type_dossier`,`id_type_structure`,`ordre` FROM `circuit` WHERE `id_type_structure`=?  ";		    
  		
  		$query = $this->db->query($sql_ll,array($id_type_dossier));
  		
  		return $query->result(); 
      }
  
  }
