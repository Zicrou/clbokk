<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_api extends CI_Controller
{
	// La variable $action permet de connaitre l'action a effectuer (affichage, ajout, etc.)
	// La variable $arg contient l'argument
	public function apiGet()
	{
		// Code permettant de faire fonctionner l'API
		//http://stackoverflow.com/questions/18382740/cors-not-working-php
		if (isset($_SERVER['HTTP_ORIGIN']))
		{
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Max-Age: 86400');    // cache for 1 day
		}
		
		// Access-Control headers are received during OPTIONS requests
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
		{
		
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
			header("Access-Control-Allow-Methods: OPTIONS");
			
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
			
			exit(0);
		}
		
		//Action à faire
		$arg = func_get_args();
		$action = $arg[0];
		switch($action)
		{
			case 'get_annee':
				if(count($arg) == 2)
				{
					$this->get_annee($arg[1]);
				}else
				{
					$json = array("code" => "1", "msg" => "Nombre de paramètres incorrect");
					echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				}					
			
			break;
			
			case 'cycle_str':
				if(count($arg) == 2)
				{
					$this->cycle_str($arg[1]);
				}else
				{
					$json = array("code" => "1", "msg" => "Nombre de paramètres incorrect");
					echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				}	
			break;
			
			case 'list_etab_ens':
				if(count($arg) == 3)
				{
					$this->list_etab_ens($arg[1], $arg[2]);
				}else
				{
					$json = array("code" => "1", "msg" => "Nombre de paramètres incorrect");
					echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				}
			break;
			
			case 'planning_ens':
				if(count($arg) == 4)
				{
					$this->planning_ens($arg[1], $arg[2], $arg[3]);
				}else
				{
					$json = array("code" => "1", "msg" => "Nombre de paramètres incorrect");
					echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				}
			break;
			
			case 'classe_etab':
				if(count($arg) == 3)
				{
					$this->classe_etab($arg[1], $arg[2]);
				}else
				{
					$json = array("code" => "1", "msg" => "Nombre de paramètres incorrect");
					echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				}
			break;
			
			case 'classe_ens':
				if(count($arg) == 4)
				{
					$this->classe_ens($arg[1], $arg[2], $arg[3]);
				}else
				{
					$json = array("code" => "1", "msg" => "Nombre de paramètres incorrect");
					echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				}
			break;
			
			case 'discipline_ens':
				if(count($arg) == 4)
				{
					$this->discipline_ens($arg[1], $arg[2], $arg[3]);
				}else
				{
					$json = array("code" => "1", "msg" => "Nombre de paramètres incorrect");
					echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				}
			break;
			
			case 'classe_matiere_ens':
				if(count($arg) == 4)
				{
					$this->classe_matiere_ens($arg[1], $arg[2], $arg[3]);
				}else
				{
					$json = array("code" => "1", "msg" => "Nombre de paramètres incorrect");
					echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				}
			break;
			
			case 'salles_etab':
				if(count($arg) == 2)
				{
					$this->list_salles_etab($arg[1]);
				}else
				{
					$json = array("code" => "1", "msg" => "Nombre de paramètres incorrect");
					echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				}
			break;
			
			case 'eleves_classe':
				if(count($arg) == 3)
				{
					$this->list_eleve_classe($arg[1], $arg[2]);
				}else
				{
					$json = array("code" => "1", "msg" => "Nombre de paramètres incorrect");
					echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
				}
			break;
			
			default:
			$this->error_api();
			break;
		}
	}
	
	/*
	Liste des eleves par classe
	*/
	protected function list_eleve_classe($code_classe, $code_annee)
	{
		$this->load->model('M_classe_eleve', 'ce');
		$result = $this->ce->min_eleve_classe($code_classe, $code_annee);
		
		if(count($result) > 0)
		{
			$json = array("code" => "0", "msg" => "Success", "eleves" => $result);
		}else
		{
			$json = array("code" => "1", "msg" => "Pas de résultat");
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
	
	/*
	* Methode par défaut lorsqu'aucune methode valide n'est appelée
	*/
	protected function error_api()
	{
		$json = array("code" => "1", "msg" => "Erreur interne API");
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
	/*
	* Recupérer l'année en cours ou les années d'archives
	*/
	protected function get_annee($etat)
	{
		if(($etat == '1') or ($etat == '-1'))
		{
			$this->load->model('M_table_param', 'param');
			$result = $this->param->get_annne_archive($etat);
			if(!empty($result))
			{
				$json = array("code" => "0", "msg" => "Success", "resultat" =>$result);
			}else
			{
				$json = array("code" => "0", "msg" => "Pas de résultat");
			}
		}else
		{
			$json = array("code" => "1", "msg" => "Pas de résultat");
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
	/*
	* Le cycle de l'établissement
	*/
	protected function cycle_str($code_str)
	{
		$this->load->model('M_table_param', 'param');
		$result = $this->param->get_cycle_str($code_str);
		if(!empty($result))
		{
			$json = array("code" => "0", "msg" => "Success", "resultat" => $result);
		}else
		{
			$json = array("code" => "0", "msg" => "Pas de résultat");
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
	/*
	* Liste des établissement dans lesquels intervient l'enseignant
	*/
	protected function list_etab_ens($id_ens, $annee)
	{
		$this->load->model('M_personnel_etablissement', 'pe');
		$result = $this->pe->get_liste_etab_ens($id_ens, $annee);
		if(!empty($result))
		{
			$json = array("code" => "0", "msg" => "Success", "resultat" => $result);
		}else
		{
			$json = array("code" => "0", "msg" => "Pas de résultat");
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
	
	/*
	Emploi du temps de l'enseignant pour le jour indiqué
	*/
	protected function planning_ens($code_str, $jour, $annee)
	{
		$this->load->model('M_statistique', 'stats');
		$result = $this->stats->get_planning_jour_ens($code_str, $jour, $annee);
		if(!empty($result))
		{
			$json = array("code" => "0", "msg" => "Success", "resultat" => $result);
		}else
		{
			$json = array("code" => "0", "msg" => "Pas de résultat");
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
	
	/*
	Liste des calsses par etablissement
	*/
	protected function classe_etab($annee, $code_str)
	{
		$this->load->model('M_classe_pedagogique', 'cp');
		$result = $this->cp->get_classe_pedagogique_by_ans($annee, $code_str);
		if(!empty($result))
		{
			$json = array("code" => "0", "msg" => "Success", "resultat" => $result);
		}else
		{
			$json = array("code" => "0", "msg" => "Pas de résultat");
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
	/*
	Liste des disciplines de l'enseignant par structure
	*/
	protected function discipline_ens($id_ens, $code_str, $annee)
	{
		$this->load->model('M_affectation_enseignant_classe', 'edc');
		$result = $this->edc->discipline_enseignant($id_ens, $code_str, $annee);
		if(!empty($result))
		{
			$json = array("code" => "0", "msg" => "Success", "resultat" => $result);
		}else
		{
			$json = array("code" => "0", "msg" => "Pas de résultat");
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
	
	/*
	Liste des calsses de l'enseignant par structure
	*/
	protected function classe_ens($id_ens, $code_str, $annee)
	{
		$this->load->model('M_enseignants_matiere_classe', 'emc');
		$result = $this->emc->classe_enseignant($id_ens, $code_str, $annee);
		if(!empty($result))
		{
			$json = array("code" => "0", "msg" => "Success", "resultat" => $result);
		}else
		{
			$json = array("code" => "0", "msg" => "Pas de résultat");
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
	/*
	Liste des matieres de l'enseignant par strcuture
	*/
	protected function classe_matiere_ens($id_ens, $code_str, $annee)
	{
		$this->load->model('M_enseignants_matiere_classe', 'emc');
		$result = $this->emc->classe_matiere_enseignant($id_ens, $code_str, $annee);
		if(!empty($result))
		{
			$json = array("code" => "0", "msg" => "Success", "resultat" => $result);
		}else
		{
			$json = array("code" => "0", "msg" => "Pas de résultat");
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
	/*
	Liste des salles de l'établissement
	*/
	protected function list_salles_etab($code_str)
	{
		$this->load->model('M_classe_physique', 'cp');
		$result = $this->cp->list_salles_etab($code_str);
		if(!empty($result))
		{
			$json = array("code" => "0", "msg" => "Success", "resultat" => $result);
		}else
		{
			$json = array("code" => "0", "msg" => "Pas de résultat");
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
	}
	
}
