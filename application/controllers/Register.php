<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


	//****Start of Register Page*******//
	public function index()
	{	
		$title['title'] = "Register";
		$this->load->view('Includes/header.php',$title);
		$this->load->view('register');
		$this->load->view('Includes/footer.php');
	}
	//****End of Register Page*********//
}
