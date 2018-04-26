<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/

class C_inscription extends MY_Controller
{
	
	public function pages()
	{
		$param =func_get_args();
		$this->load->view($param[0]);
	}
	public function new_inscrit()
	{
		if (isset($_POST['save'])) {
			$errors[]="";
			$alphabet="0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
			$str = substr(str_shuffle(str_repeat($alphabet, 5)), 0, 60);
			$this->load->model('M_users', 'usrs');
			$this->usrs->nom=$this->input->post('nom');
			$this->usrs->prenom=$this->input->post('prenom');
			$this->usrs->email=$this->input->post('email');
			$this->usrs->password=$this->input->post('pwd');
			$this->usrs->adresse=$this->input->post('adresse');
			$this->usrs->telephone=$this->input->post('phone'); // '2217845612325';
			$this->usrs->date_creation=date('Y-m-d H:i:s');
			$this->usrs->confirmation_token=$str;
			$this->usrs->etat = 1;
			$errors['errs_phone'] = ($this->usrs->get_phone()!=NULL)? 'Ce numero existe deja':'';
			$errors['errs_mail'] = ($this->usrs->get_email()!=NULL)? 'Cet eamil existe deja':'';
			if($errors['errs_phone']!='' || $errors['errs_mail']!='') {
				$this->load->view('V_inscription',$errors);
			}else{
				$this->usrs->save();
				$this->load->view('V_nice');
			}
		}else{
			$this->load->view('V_inscription');
		}
		

		/*
		}*/

	}

	public function newer()
	{
		$this->load->model('M_users', 'usrs');
		$param =func_get_args();
		$data = $this->usrs->get_user_id($param[0]);
		$data_json =json_encode($data);
		echo $data_json;
		
	}

	public function get_all()
	{
		$this->load->model('M_users', 'usrs');
		$data = $this->usrs->get_all_users();
		$data_json =json_encode($data);
		echo $data_json;
		
	}

	public function test($NumPhone)
	{
		$this->load->model('M_users', 'usrs');
		$param =func_get_args();
		$data = $this->usrs->get_phone($NumPhone);
		$data_json =json_encode($data);
		echo $data_json;
	}
	
}

?>