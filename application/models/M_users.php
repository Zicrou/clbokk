<?php

/**
* 
*/
	class M_users extends MY_Model{
		public $id_users;
		public $nom;
		public $prenom;
		public $pseudo;
		public $email;
		public $password;
		public $adresse;
		public $telephone;
		public $date_creation;
		public $confirmation_token;
		public $confirmed_at;
		public $etat;
		public $photo;
		//public $date_confirn_at;
		

		public function get_db_table()
      {
         return 'users';
      }
  
      public function get_db_table_pk()
      {
          return 'id_users';
      }

      public function save_users()
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
      }

      public function get_all_users(){
			return $this->db->select('*')->from($this->get_db_table())->get()->result();
		}

		public function get_user_id($id)
		{
			return $this->db->select('*')->from($this->get_db_table())->where($this->get_db_table_pk(), $id)->get()->result();
		}

		public function get_phone()
		{
			$qur=("SELECT * FROM users WHERE telephone='".$this->telephone."'");
			$req=$this->db->query($qur);
			return $req->row_array();
		}

		public function get_email()
		{
			$qur="SELECT * FROM users WHERE email='".$this->email."'";//'seck@gmail.com'
			$req=$this->db->query($qur);
			return $req->row_array();
		}

		public function get_tofProfil($id)
		{
			return $this->db->select('photo')->from($this->get_db_table())->where($this->get_db_table_pk(), $id)->get()->result();
		}

		public function get_connected()
		{
			$qur="SELECT *  FROM users WHERE email = '".$this->email."' AND password = '".$this->password."' "; //$this->password
			$req=$this->db->query($qur);
			return $req->row_array();
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