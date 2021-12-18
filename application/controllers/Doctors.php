<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct(); 
        $this->load->model('Database');
	}
	//***End of Constructor******//


	//***Start of View Doctors******//
	public function index()
	{
		//***Start of Get Departments******//
		$join = "doctors.dept_id = departments.dept_id";
		$data['doctors'] = $this->Database->selectJoin('doctors','departments',$join,array('doctor_status != '=>3));
		//***End of Get Departments*******//

		$title['title'] = "Doctors";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/view_doctors',$data);
		$this->load->view('Includes/footer');
	}
	//***End of View Doctors******//


	//****Start of Show Doctor******//
	public function show($doctor_id){

		//***Start of Get Departments******//
		$join = "doctors.dept_id = departments.dept_id";
		$data['doctor'] = $this->Database->selectJoin('doctors','departments',$join,array('doctor_status != '=>3,'doctor_id'=>$doctor_id));


		//***End of Get Departments*******//

		$title['title'] = "Doctor Details";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/show_doctor',$data);
		$this->load->view('Includes/footer');
	}
	//****End of show Doctor******//


	//****Start of Change Doctor Status********//
	public function status($doctor_id,$status_id){

		
		if($status_id == 1) $data = array('doctor_status'=>2);

		else if($status_id == 2) $data = array('doctor_status'=>1);
		
		$where = array('doctor_id'=>$doctor_id);
		$result = $this->Database->update("doctors",$where,$data);
		if($result){
			$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Doctor status changed successfully</div>');
						  redirect('Doctors');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Doctor status failed!</div>');
					redirect('Doctors');
		}

	}
	//***End of Change Doctor Status*********//


	//***Start of Delete Doctor********//
	public function delete($doctor_id,$status_id){

		$data = array('doctor_status' => 3);
		$where = array('doctor_id'=>$doctor_id);
		$result = $this->Database->update("doctors",$where,$data);
		if($result){
			$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Doctor Deleted successfully</div>');
						  redirect('Doctors');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Doctor delete failed!</div>');
					redirect('Doctors');
		}
	}
	//***End of Delete Doctor********//

}
