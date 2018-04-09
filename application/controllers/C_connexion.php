<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/

class C_connexion extends MY_Controller
{	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_users','usrs');
		$this->load->library('session');

	}




	public function connexion()
	{
        $suite_req = base_url();
		$a = $this->usrs->get_connected();

		if ($a['photo'] == null) {
			$pict = 'img1.png';
		}else{
			$pict = $a['photo'];
		}

		if ($this->usrs->email != null AND $this->usrs->password != null) {

		$msg = array(
					'id' =>$a['id_users'],
					'email' => $a['email'],
					'prenom' => $a['prenom'],
					'nom' => $a['nom'],
					'photo' => $pict,
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'logged_in' => TRUE
					);
		$msgAlrt['statut_ok'] = 'Ok';
		$msg['mess'] = $msgAlrt;
		$this->session->set_userdata($msg);
		header("Location:".$suite_req."C_connexion/BlogUser");
		}else{
			$msgAlrt['msg_no_no'] = 'Vous devez d\'abord vous connecter!';
			$this->load->view('V_connexion',$msgAlrt);
		}
		return $a;
	}

	public function verifConn()
	{
		if ($this->input->post('save')) {
			$this->usrs->email = $this->input->post('email');
			$this->usrs->password = $this->input->post('pwd');
			if($this->usrs->get_connected()!=null){
				$this->connexion();
			}else{
				$msgAlrt['statut_no'] = 'Non';
				$this->load->view('V_connexion', $msgAlrt);
			}
		}
		
	}

	public function getImage()
	{
		$p = $_FILES['pic']['name'];
		$upload_extension =  explode(".", $p);
		$upload_extension = end($upload_extension);
		$up_ext = $upload_extension;
		move_uploaded_file($_FILES['pic']['tmp_name'], './image/'.$_SESSION['a']['id_users'].'.'.$upload_extension);
		$data_photo = $_SESSION['a']['id_users'].'.'.$up_ext;
		$this->usrs->photo = $data_photo;
		$this->usrs->save_photo($_SESSION['a']['id_users']);
		$this->BlogUser();
	}

	public function log_out()
	{	
		$this->session->sess_destroy();
		$this->load->view('V_connexion');
	}

	

	public function index()
	{
		$this->load->view('index');
	}

	public function About()
	{
		$this->load->view('V_about');
	}

	public function Service()
	{
		$this->load->view('V_services');
	}

	public function Contact()
	{
		$this->load->view('V_contact');
	}

	public function Conn()
	{
		$this->load->view('V_connexion');
	}

	public function Inscrip()
	{
		$this->load->view('V_inscription');
	}

	public function BlogUser()
	{
		$this->load->view('V_blog-home-1');
	}

	public function Dconst()
	{
        $suite_req = base_url();
	    header("Location:".$suite_req."C_recrutement");
	}
	public function tof_profil()
	{
		$this->usrs->get_tofProfil();
	}
	
    /*public function logged_only()
	{
		$stat = false;
		if (session_status() == PHP_SESSION_NONE) {
		//$this->load->view('V_connexion');
			$stat = true;
		}
		return $stat;
	}*/

}



?>