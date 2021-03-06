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
		
		$a = $this->usrs->get_connected()[0];	
		if ($a != null) {

            $allData = array(
                'id' => $a['id_users'],
                'email' => $a['email'],
                'photo' => $a['photo'],
                'prenom' => $a['prenom'],
                'nom' => $a['nom'],
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'logged_in' => TRUE
			);
            $mess['statut_ok'] = 'ok';
			$allData['mess'] = $mess;
			$this->session->set_userdata($allData);
            $data['photo'] = $a['photo'];
			$this->load->view('V_blog-home-1');
			
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
		/*$data = $this->input->post('pic');
		var_dump($this->input->post('pic'));
		echo '<br>';
		var_dump($data);
		exit();*/
		//if ( $data != '') {
			$suite_req = site_url();
			//$a = $this->usrs->get_connected();
			$p = $_FILES['pic']['name'];
			$upload_extension =  explode(".", $p);
			$upload_extension = end($upload_extension);
			$up_ext = $upload_extension;
			move_uploaded_file($_FILES['pic']['tmp_name'], './image/'.$_SESSION['id'].'.'.$upload_extension);
			$data_photo = $_SESSION['id'].'.'.$up_ext;
			$this->usrs->photo = $data_photo;
			$data_photo = $this->usrs->update_photo($_SESSION['id']);
			$photo['photo'] = $data_photo;
			//$this->session->unset_userdata('photo');
			$this->session->set_userdata($photo);
			/*var_dump($_SESSION);
			exit(); */
			//header("Location:".$suite_req."C_connexion/BlogUser");
			$this->BlogUser(); //load->view('V_blog-home-1');
		/*}else{
			$this->BlogUser();
		} */
	}

	public function log_out()
	{
        $suite_req = site_url();
        $this->session->sess_destroy();	// destruction des donnees de la session
        header("Location:".$suite_req."sign-in");

	   /* $this->session->sess_destroy();
		$this->load->view('V_connexion');*/
	}

	

	public function Index()
	{
        /*$a = $this->usrs->get_tofProfil($_SESSION['id']);
	    $data['photo'] = $a;*/
		$this->load->view('index');
	}

	public function About()
	{
        /*$a = $this->usrs->get_tofProfil($_SESSION['id']);
        $data['photo'] = $a;*/
        $this->load->view('V_about');
	}

	public function Service()
	{
        /*$data['photo'] = $this->usrs->get_tofProfil($_SESSION['id']);
	    //var_dump($data['photo']);
	    exit();*/
	    $this->load->view('V_services');
	}

	public function Contact()
	{
        /*$a = $this->usrs->get_tofProfil($_SESSION['id']);
        $data['photo'] = $a['photo'];*/
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