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

	//****Start of Reset Password Page*******//
	public function index()
	{	

		$title['title'] = "Reset Password";
		$this->load->view('Includes/header.php',$title);
		$this->load->view('reset');
		$this->load->view('Includes/footer.php');
	}
	//****End of Reset Page*********//
}
