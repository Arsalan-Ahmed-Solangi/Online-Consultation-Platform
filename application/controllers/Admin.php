<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


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

	//****Start of Admin Dashboard*******//
	public function index()
	{	


		//***Start of Get Enquiries******//
		$data['enquiries'] = $this->Database->select('enquiries');
		//***End of Get Enquiries*******//

		$data['name'] = $this->session->userdata('admin')['name'];
		$title['title'] = "Dashboard";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/dashboard',$data);
		$this->load->view('Includes/footer');
	}
	//****End of Admin Dashboard*********//


	//***Start of View Profile********//
	public function profile()
	{	
		
		$data['name'] = $this->session->userdata('admin')['name'];
		$data['profile'] = $this->session->userdata('admin');
		$title['title'] = "Profile";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/profile',$data);
		$this->load->view('Includes/footer');
	}
	//***End of View Profile*********//


	//***Start of Change Password********//
	public function changePassword()
	{
		//***Start of Setting Rules*****//
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
	    $fullname=	$this->form_validation->set_rules('oldpassword', 'Old Password', 'required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('newpassword','New Password','required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|min_length[5]|max_length[20]');
		//***End of Setting Rules******//
			 


		//**Start of  Check Valdiation and Process******//
		if($this->form_validation->run() == FALSE)
		{ 

            $this->profile();
		}
		else{

				//*****Start of Getting Inputs*******//
			    $oldpassword = $this->input->post('oldpassword');
				$newpassword = $this->input->post('newpassword');
				$confirmPassword   = $this->input->post('confirmpassword');
				//***End of Getting Inputs******//


				//***Start of Check Old Password*******//
				$password = $this->session->userdata('admin')['password'];
				if($password == $oldpassword)
				{

					//****Start of Confirm New Password*******//
					if($newpassword == $confirmPassword)
					{

						//****Start of Update Password********//
						$data = array('password'=>$newpassword);
						$where = array('admin_id'=> $this->session->userdata('admin')['admin_id']);
						$result = $this->Database->update('admins',$where,$data);

						if($result){

		
							
							$record = $this->session->userdata('admin');
							$record['password'] = $newpassword;
							$this->session->set_userdata('admin', $record); 
							
							$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Password updated successfully!</div>');
						  redirect('Admin/profile');

						}else{
							$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to update</div>');
						  redirect('Admin/profile');
						}
						//***End of Update Password*********//

					}else
					{
	 					$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Confirm Password not matched!</div>');
						redirect('Admin/profile');
					}
					//****End of Confirm New Password********//

				}else{
	                $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Old Password not matched!</div>');
					redirect('Admin/profile');

				}
				//***End of Check Old Password*******//
			}
		//**End of Validation and Proccess*****//	 
			 
	}
	//***End of Change Password********//
	public function update()
	{
	 
			//***Start of Setting Rules*****//
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');
		    $fullname=	$this->form_validation->set_rules('fullName', 'FullName', 'required|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('userName','Email','trim|required|valid_email');
			$this->form_validation->set_rules('status', 'Status', 'required');
			//***End of Setting Rules******//
			 
				
		//**Start of  Check Valdiation******//
		if($this->form_validation->run() == FALSE)
		{ 
			$this->session->set_flashdata('error', '<p style="color:red" align="center">Record Updated Failed</p>');
			redirect('edit');
		}
		else{
 
			$fullname = $this->input->post('fullName');
			$username = $this->input->post('userName');
			$status   = $this->input->post('status'); 
			$id 	  = $this->input->post('hiddenAdminId');

			$data = array(
					'fullname' => $fullname,
					'username' => $username,
					'status_id' => $status, 
					
				); 
				$result = $this->Database->update('admins','admin_id',$id,$data);
		    if($result)
			{
				$this->session->set_flashdata('success', '<p style="color:green" align="center">Record Update Successgully</p>');
			 
				redirect('edit');
			}
		}
	}


}
