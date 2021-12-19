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
		$roles = $this->Database->select("roles");
		$roles['roles'] = $roles;
		$title['title'] = "Reset Password";
		$this->load->view('Includes/header.php',$title);
		$this->load->view('Reset',$roles);
		$this->load->view('Includes/footer.php');
	}
	//****End of Reset Page*********//

	//****Start of Verify Password********//
	public function verify()
	{
		
		
		//***Start of Setting Rules*****//
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
	    $fullname=	$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('role','User Role','required');
		//***End of Setting Rules******//

		//***Start of Check Valdiation********//
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{


			//***Start of Getting Inputs******//
			$username = $this->input->post('username');
			$role_id = $this->input->post('role');
			//***End of Getting Inputs******//


			//****Start of Get Role Table*******//
			$table = "";
			if($role_id == 1) $table = "admins";
			else if($role_id == 2) $table = "doctors";
			else if($role_id == 3) $table = "patients";
			else if($role_id == 4) $table = "receptionists";
			else if($role_id == 5) $table = "pharamcists";
			else{
				$this->session->set_flashdata('error', '<div class="alert alert-success error" align="center">Username is Invalid</div>');
				redirect('Reset');
			}
			//****End of Get Role Table********//


			
			//***Start of Verify Email*******//
			$where = array("username" => $username);
			$result = $this->Database->selectAll($table,$where);



			if(count($result)){
					$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"><b>Your old password is : '.$result[0]['password'].'</b></div>');
				redirect('Reset');
			}else{
				$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Username is Invalid</div>');
				redirect('Reset');
			}
			//***End of Verify Email*******//
	
		
	}
	//***End of Verify Password**********//
	}
}
