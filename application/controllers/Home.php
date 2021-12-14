<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	//****Start of Login Page*******//
	public function index()
	{	
		$title['title'] = "Health Care System";
		$this->load->view('public/Includes/header.php',$title);
		$this->load->view('public/index');
		$this->load->view('public/Includes/footer.php');
	}
	//****End of Login Page*********//
}
