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
		if ($this->usrs->email != null AND $this->usrs->password != null) {

            $allData = array(
                'id' => $a['id_users'],
                'email' => $a['email'],
                'prenom' => $a['prenom'],
                'nom' => $a['nom'],
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'logged_in' => TRUE
            );
            $mess['statut_ok'] = 'Ok';
            $data['mess'] = $mess;
            $this->session->set_userdata($allData);
            $data['photo'] = $a['photo'];
            $this->load->view('V_blog-home-1', $data);
		    //header("Refresh:1; Location:".$suite_req."C_connexion/BlogUser"); //""
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


    /*public function tofProfil()
    {
        $photoProfil = $this->usrs->get_tofProfil($_SESSION['id']);
        if ($photoProfil == null) {
            $tof = 'img1.png';
        } else{
            $tof = $photoProfil;
        }
        return $tof;
    }*/
	public function getImage()
	{
	    //$a = $this->usrs->get_connected();
	    $p = $_FILES['pic']['name'];
		$upload_extension =  explode(".", $p);
		$upload_extension = end($upload_extension);
		$up_ext = $upload_extension;
		move_uploaded_file($_FILES['pic']['tmp_name'], './image/'.$_SESSION['id'].'.'.$upload_extension);
		$data_photo = $_SESSION['id'].'.'.$up_ext;
		$this->usrs->photo = $data_photo;
        $data_photo = $this->usrs->update_photo($_SESSION['id']);
        $data['photo'] = $data_photo;
		$this->load->view('V_blog-home-1', $data);
	}

	public function log_out()
	{
        $suite_req = site_url();
        $this->session->sess_destroy();	// destruction des donnees de la session
        header("Location:".$suite_req."sign-in");

	   /* $this->session->sess_destroy();
		$this->load->view('V_connexion');*/
	}

	

	public function index()
	{
        $a = $this->usrs->get_tofProfil($_SESSION['id']);
	    $data['photo'] = $a;
		$this->load->view('index', $data);
	}

	public function About()
	{
        $a = $this->usrs->get_tofProfil($_SESSION['id']);
        $data['photo'] = $a;
        $this->load->view('V_about', $data);
	}

	public function Service()
	{
        $data['photo'] = $this->usrs->get_tofProfil($_SESSION['id']);
	    //var_dump($data['photo']);
	    exit();
	    $this->load->view('V_services', $data);
	}

	public function Contact()
	{
        $a = $this->usrs->get_tofProfil($_SESSION['id']);
        $data['photo'] = $a['photo'];
	    $this->load->view('V_contact', $data);
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
        $a = $this->usrs->get_tofProfil($_SESSION['id']);
        $data['photo'] = $a['photo'];
	    $this->load->view('V_blog-home-1', $data);
	}

    /*	public function compte()
    {
        $this->load->view('V_blog-home-1');
    }*/
	public function Dconst()
	{
        $suite_req = base_url();
	    header("Location:".$suite_req."C_recrutement");
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