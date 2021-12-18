<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct(); 
        $this->load->model('Database');
	}

	//****End of Constructor*******//

	//***Start of View Departments********//
	public function index(){


		//***Start of Get Departments******//
		$data['departments'] = $this->Database->select('departments',array('status_id'!=3));
		//***End of Get Departments*******//

		$title['title'] = "Dashboard";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/view_departments',$data);
		$this->load->view('Includes/footer');
		
	}
	//***End of View Departments********//


	//****Start of Change Department Status********//
	public function status($dept_id,$status_id){

		
		if($status_id == 1) $data = array('status_id'=>2);

		else if($status_id == 2) $data = array('status_id'=>1);
		
		$where = array('dept_id'=>$dept_id);
		$result = $this->Database->update("departments",$where,$data);
		if($result){
			$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Department status changed successfully</div>');
						  redirect('Departments');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Department status failed!</div>');
					redirect('Departments');
		}

	}
	//***End of Change Department Status*********//
		
 
}
