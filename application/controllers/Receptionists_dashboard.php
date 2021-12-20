Receptionists_dashboard
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receptionists_dashboard extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database');

		// **Start of Check Session****//
		if(!$receptionist = $this->session->userdata('receptionist')){
			redirect('Login');
		}
		// **End of Check Session*****//


	}
	//**End of Constructor*******//

	//****Start of Receptionists  Dashboard*******//
    public function index()
	{	


		//****Start of Count Doctors , Patients , Appointments********//
		$doctors = $this->Database->selectAll("doctors",array("doctor_status !=" => 3));
		$patients = $this->Database->selectAll("patients",array("status_id !=" => 3));
		$appointments = $this->Database->selectAll("appointments",array("status_id !=" => 3));
		//****End of Count Doctors , Patients , Appointiments*********//

		//***Start of Get Enquiries******//
		$data['enquiries'] = $this->Database->select('enquiries');
		//***End of Get Enquiries*******//

		$data['doctors'] = count($doctors);
		$data['patients'] = count($patients);
		$data['appointments'] = count($appointments);

		$title['title'] = "Dashboard";
		$this->load->view('Includes/header',$title);
		$this->load->view('Receptionists/dashboard',$data);
		$this->load->view('Includes/footer');
	}
	//****End of Receptionists Dashboard*********//

  

}
