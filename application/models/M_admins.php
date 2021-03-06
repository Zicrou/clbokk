<?php

/**
* 
*/
	class M_admins extends MY_Model{
		public $id_admin;
		public $nom;
		public $prenom;
		public $pseudo;
		public $email;
		public $mdp;
		public $adresse;
		public $telephone;
		public $date_connect;
		public $rights;
		
		

		public function get_db_table()
      {
         return 'admins';
      }
  
      public function get_db_table_pk()
      {
          return 'id_admin';
      }

     /* public function save_admins()
      {
      	try 
	  	{
  			$req = $this->db->insert();
  			$status = 'Success: ';
  			$d = array();
	        $d['id'] = $this->db_insert_id();
	        $d['status'] = $status;
	        $d['message'] = 'Enregistrement effectué avec succées.';
        	return $d;
      		
      	} catch (Exception $e) {
      		$d = array();
		    $d['id'] = 0;
		    $d['status'] = 'error';
		    $d['message'] = $e->getMessage();
        	return $d;
      		return $e->getMessage();
      	}
      }*/

      public function get_all_admins(){
			return $this->db->select('*')->from($this->get_db_table())->get()->result();
		}

		public function get_admin_id($id)
		{
			return $this->db->select('*')->from($this->get_db_table())->where($this->get_db_table_pk(), $id)->get()->result();
		}

		public function get_phone()
		{
			$qur=("SELECT * FROM admin WHERE telephone='".$this->telephone."'");
			$req=$this->db->query($qur);
			return $req->row_array();
		}

		public function get_email()
		{
			$qur="SELECT * FROM admin WHERE email='".$this->email."'";//'seck@gmail.com'
			$req=$this->db->query($qur);
			return $req->row_array();
		}

		public function get_tofProfil($id)
		{
			return $this->db->select('photo')->from($this->get_db_table())->where($this->get_db_table_pk(), $id)->get()->result();
		}

		

		public function update_photo($id_users)
		{
			//Requete update pour modifier le champs photo especifique a chaque id.
			$this->db->set('photo', $this->photo);
			$this->db->where('id_users', $id_users);
			$this->db->update('users');
			return $this->photo;
		}

	}

?>