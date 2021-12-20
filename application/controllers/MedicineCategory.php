<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends CI_Controller {

	//***Start of Constructor*******//
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database');

	}
	//***End of Constructor*********//

	//****Start of View Categories*******//
	public function index()
	{	 
		$roles = $this->Database->select("categories");
		$roles['roles'] = $roles;
		$title['title'] = "Reset Password";
		$this->load->view('Includes/header.php',$title);
		$this->load->view('Reset',$roles);
		$this->load->view('Includes/footer.php');
	}
	//****End of View Categories*******//
}
