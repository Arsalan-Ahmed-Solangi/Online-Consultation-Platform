<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	

	//****Start of Logout*******//
	public function index()
	{	

		$this->session->unset_userdata('logged_in'); 
        $this->session->sess_destroy(); 
        redirect('Login');
	}
	//****End of Logout*********//
}
