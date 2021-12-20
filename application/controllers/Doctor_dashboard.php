<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_dashboard extends CI_Controller {


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

	//****Start of Doctor Dashboard*******//
	public function index()
	{	


		//****Start of Count Doctors ********//
		$doctors = $this->Database->selectAll("doctors",array("doctor_status !=" => 3)); 
		//***Start of Get Enquiries******//
		$data['enquiries'] = $this->Database->select('enquiries');
		//***End of Get Enquiries*******//
		$data['doctors'] = count($doctors);
		$title['title'] = "Dashboard";
		$this->load->view('Includes/header',$title);
		$this->load->view('Doctor/dashboard',$data);
		$this->load->view('Includes/footer');
	}
	//****End of Doctor Dashboard*********//

  

}
