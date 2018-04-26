<?php

	/**
	* 
	*/
	class M_Candidats extends MY_MODEL
	{
		
		public $id_Cpersos;
		public $payed;
		public $domaine;
		public $nom;
		public $prenom;
		public $type;
		public $nationalite;
		public $pays;
		public $region;
		public $departerment;
		public $date_inscription;
		public $disponibilite;
		public $metier1;
		public $metier2;
		public $metier3;
		public $annees_experience;
		public $entreprise_frequente;
		public $telephone1;
		public $telephone2;
		public $description;
		public $preuve_telephone1;
		public $preuve_telephone2r;
		public $preuve_image;
		public $certificat_travail;
		public $DIPLOME;
		public $insertedBy;

		public function get_db_table()
		{
			return 'candidats';
		}

		public function get_db_table_pk()
		{
			return 'id_Cpersos';
		}

		public function get_data()
        {
            return $this->db->select('*')
                ->from($this->get_db_table())
                ->get()
                ->result();
        }


        public function get_data_const($reg, $met1)
        {
            return $this->db->select('*')
                ->from($this->get_db_table())
                ->where('domaine', 'construction')
                ->where('payed', 'yes')
                ->where('region', $reg)
                ->where('metier1', $met1)
                ->get()
                ->result();
        }

        public function get_metier()
        {
            return $this->db
                ->distinct()
                ->select('metier1')
                ->from($this->get_db_table())
                ->where('domaine', 'construction')
                ->get()
                ->result();
        }

        public function get_region()
        {
            return $this->db
                ->distinct()
                ->select('region')
                ->from($this->get_db_table())
                ->where('domaine', 'construction')
                ->get()
                ->result();
        }

    }

?>