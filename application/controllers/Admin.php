<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database');

		// **Start of Check Session****//
		if(!$admin = $this->session->userdata('admin')){
			redirect('Login');
		}
		// **End of Check Session*****//
	}
	//**End of Constructor*******//

	//****Start of Admin Dashboard*******//
	public function index()
	{	
		$title['title'] = "Dashboard";
		$this->load->view('Includes/header.php',$title);
		$this->load->view('Admin/dashboard.php');
		$this->load->view('Includes/footer.php');
	}
	//****End of Admin Dashboard*********//
}
