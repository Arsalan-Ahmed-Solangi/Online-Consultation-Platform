<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_dashboard extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database');

		// **Start of Check Session****//
		if(!$patient = $this->session->userdata('patient')){
			redirect('Login');
		}
		// **End of Check Session*****//


	}
	//**End of Constructor*******//

	//****Start of Patient Dashboard*******//
	public function index()
	{	


		//****Start of Count Patients ********//
		$patients = $this->Database->selectAll("patients",array("status_id !=" => 3));
		//***Start of Get Enquiries******//
		$data['enquiries'] = $this->Database->select('enquiries');
		//***End of Get Enquiries*******//
		$data['doctors'] = count($patients);
		$title['title'] = "Dashboard";
		$this->load->view('Includes/header',$title);
		$this->load->view('Patient/dashboard',$data);
		$this->load->view('Includes/footer');
	}
	//****End of Patient Dashboard*********//

  

}
