<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//***Start of Constructor*******//
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database');


		//***Start of Check Session*******//
		if($this->session->userdata('admin'))
		{
			redirect('Admin');
		}else if($this->session->userdata('doctor'))
		{
			redirect('Doctor_dashboard');
		}else if($this->session->userdata('patient'))
		{
			redirect('Patient_dashboard');
		}else if($this->session->userdata('receptionist'))
		{
			redirect('Receptionists_dashboard');
		}else if($this->session->userdata('pharmacist'))
		{
			redirect('Admin');
		}
		//***End of Check Session********//

	}
	//***End of Constructor*********//

	//****Start of Login Page*******//
	public function index()
	{	

		//***Start of Get Roles*******//
		$roles = $this->Database->select("roles");
		$roles['roles'] = $roles;
		//***End of Get Roles*******//

		$title['title'] = "Login";
		$this->load->view('Includes/header.php',$title);
		$this->load->view('login',$roles);
		$this->load->view('Includes/footer.php');
	}
	//****End of Login Page*********//


	//***Start of Login Proccess***********//
	public function login(){


		//***Start of Setting Rules*****//
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');
		$this->form_validation->set_rules('username','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('role', 'Role Type', 'required');
		//***End of Setting Rules******//

		//**Start of  Check Valdiation******//
		if($this->form_validation->run() == FALSE)
		{
			redirect('Login');
		}else
		{

			//**Start of Getting Input Data*******//
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$role = $this->input->post('role');
			//**End of Getting Input Data*******//

			//**Start of Check Role*****//
			$table = "";
			if($role == 1) $table = "admins";
			else if($role == 2) $table = "doctors";
			else if($role == 3) $table = "patients";
			else if($role == 4) $table = "receptionist";
			else if($role == 4) $table = "pharmacist";
			//**End of Check Role*****//

			//***Start of Check Login Crendentials********//
			 $data = array("username"=>$username ,"password"=>$password);
			 $result = $this->Database->selectWhere($table,$data);

		
			if(!empty($result)){

				
				//***Start of Check User Status*******//
				if($result['status_id'] == 1){

					if($role == 1){
						$this->session->set_userdata("admin",$result);
					    redirect('Admin');
					}else if($role == 2){
						$this->session->set_userdata("doctor",$result);
					    redirect('Doctor_dashboard');
					}else if($role == 3){
						$this->session->set_userdata("patient",$result);
					    redirect('Patient_dashboard');
					}else if($role == 4 ){
						$this->session->set_userdata("receptionist",$result);
					    redirect('Receptionists_dashboard');
					}else if($role == 5){
						// $this->session->set_userdata("doctors",$result);
					 //    redirect('Doctor_dasboard');
					}

				}else{
					$this->session->set_flashdata('error', '<p style="color:red" align="center">Your account is Inactive</p>');
					redirect('Login');	
				}
				//***End of Check User Status*******//

			}else{
				$this->session->set_flashdata('error', '<p style="color:red" align="center">Invalid Credentails</p>');
				redirect('Login');
			}
			//***End of Check Login Credentials********//

		}
		//**End of Check Valdiation*******//

	}
	//***End of Login Process************//

}
