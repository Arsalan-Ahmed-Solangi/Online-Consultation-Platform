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
		$title['title'] = "Dashboard";
		$this->load->view('Includes/header.php',$title);
		$this->load->view('Admin/dashboard.php');
		$this->load->view('Includes/footer.php');
	}
	//****End of Admin Dashboard*********//

	public function edit()
	{	
		$title['title']= 'Profile'; 
		$result['loginData'] = $this->Database->selectWhere('admins',array('admin_id' => 1)); 
		$this->session->set_userdata("login",$result['loginData'] );

		$this->load->view('Includes/header',$title);
        $this->load->view('Includes/header2',$title);
		$this->load->view('Admin/navigation',$title);
		$this->load->view('Admin/sidebar',$title);

		$this->load->view('Admin/profile.php',$result);
		$this->load->view('Includes/footer.php');
	}
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

	public function changePassword()
	{
	 
			//***Start of Setting Rules*****//
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">','</div>');
		    $fullname=	$this->form_validation->set_rules('oldpassword', 'Old Password', 'required|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|min_length[5]|max_length[20]');
			//***End of Setting Rules******//
			 
				
		//**Start of  Check Valdiation******//
		if($this->form_validation->run() == FALSE)
		{ 
			$this->session->set_flashdata('changeError', '<p style="color:red" align="center">Record Updated Failed</p>');
			redirect('edit');
		}
		else{
 
				$oldpassword = $this->input->post('oldpassword');
				$password = $this->input->post('password');
				$confirmPassword   = $this->input->post('confirmPassword'); 
				$id 	  = $this->input->post('hiddenAdminId');
				$result = $this->Database->selectWhere('admins',array('admin_id' => $id));  
	
				if($result['password'] !==  $oldpassword) {  
					$this->session->set_flashdata('changeError', '<p style="color:red" align="center"> Old  Password does not match</p>');
					redirect('edit');
				}
				else{
					if($password == $confirmPassword)
					{
						$data = array( 
							'password' => $password,  
						); 
						$result = $this->Database->update('admins','admin_id',$id,$data);
						if($result)
						{
							$this->session->set_flashdata('changeSuccess', '<p style="color:green" align="center">Password Changed Success fully </p>');
							redirect('edit');
						}
					}else{
						$this->session->set_flashdata('changeError', '<p style="color:red" align="center">Password & Confirm Password does not match</p>');
						redirect('edit');
					}
				} 
			}
	}
}
