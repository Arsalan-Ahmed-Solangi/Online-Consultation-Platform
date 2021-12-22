<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Controller {


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

	//****End of Constructor*******//

	//***Start of View Departments********//
	public function index(){


		//***Start of Get Departments******//
		$data['departments'] = $this->Database->select('departments',array('status_id !=' => 3));
		//***End of Get Departments*******//

		$title['title'] = "Departments";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/view_departments',$data);
		$this->load->view('Includes/footer');
		
	}
	//***End of View Departments********//


	//****Start of Add Department********//
	public function add()
	{
		$title['title'] = "Add Department";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/add_department');
		$this->load->view('Includes/footer');
	}
	//***End of Add Department**********//

	//****Start of Create Department*******//
	public function create(){

		//***Start of Setting Rules*****//
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
	    $fullname=	$this->form_validation->set_rules('dept_name', 'Department Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
		$this->form_validation->set_rules('dept_desc','Department description','required');
		//***End of Setting Rules******//

		//***Start of Check Valdiation********//
		if($this->form_validation->run() == FALSE){
			$this->add();
		}else{


			//***Start of Getting Inputs******//
			$dept_name = $this->input->post('dept_name');
			$dept_desc = $this->input->post('dept_desc');
			//***End of Getting Inputs******//

			$data = array
					(
						'dept_name'     => $dept_name ?? null,
						'dept_desc'     => $dept_desc ?? null,
						'status_id'     => 1,
 					);
	
			$result = $this->Database->insert('departments',$data);

			if($result){

				$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Your message has been sent. Thank you</div>');
				redirect('Departments');

			}else{
				 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
					redirect('Departments');

			}	
		}
		//***End of Check Validation*******//

	}
	//****End of Create Department********//


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


	//***Start of Edit Department********//
	public function edit($dept_id){

		$data['department'] = $this->Database->selectWhere('departments',array('dept_id'=>$dept_id));


		$title['title'] = "Edit Department";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/edit_department',$data);
		$this->load->view('Includes/footer');


	}
	//***End of Edit Department*******//

	//***Start of Update Department*********//
	public function update($dept_id){


		//***Start of Setting Rules*****//
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
	    $fullname=	$this->form_validation->set_rules('dept_name', 'Department Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
		$this->form_validation->set_rules('dept_desc','Department description','required');
		//***End of Setting Rules******//

		//***Start of Check Valdiation********//
		if($this->form_validation->run() == FALSE){
			$this->edit($dept_id);
		}else{


			//***Start of Getting Inputs******//
			$dept_name = $this->input->post('dept_name');
			$dept_desc = $this->input->post('dept_desc');
			//***End of Getting Inputs******//

			$data = array
					(
						'dept_name'     => $dept_name ?? null,
						'dept_desc' => $dept_desc ?? null,
					);
			$where = array('dept_id'=> $dept_id);
			$result = $this->Database->update('departments',$where,$data);

			if($result){

				$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Department updated successfully!</div>');
				redirect('Departments');

			}else{
				 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to Updated</div>');
					redirect('Departments');

			}	
		}
		//***End of Check Validation*******//
	}
	//***End of Update Department*********//
			

	//****Start of Check Pattern*******//
	function alpha_dash_space($fullname){
	    if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
	        $this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
	        return FALSE;
	    } else {
	        return TRUE;
	    }
    }
	//***End of Check Pattern*********//			
 
}
