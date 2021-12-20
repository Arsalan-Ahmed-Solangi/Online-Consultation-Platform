<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct(); 
        $this->load->model('Database');
	}
	//****End of Constructor*******//


	//****Start of Index*******//
	public function index(){

	//***Start of Get Departments******//
	$join = "doctors.dept_id = departments.dept_id";
	$data['doctors'] = $this->Database->selectJoin('doctors','departments',$join,array('doctor_status != '=>3));
	//***End of Get Departments*******//
 
		$title['title'] = "Appointments";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/view_appointments',$data);
		$this->load->view('Includes/footer');
	}
	//***End of Index********//

}
