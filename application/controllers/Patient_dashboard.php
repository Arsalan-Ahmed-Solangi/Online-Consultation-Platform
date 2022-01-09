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

		$id = $this->session->userdata('patient')['patient_id'];
		$data['patient'] = $this->Database->selectAll("patients",array("patient_id" => $id));
		

		$title['title'] = "Dashboard";
		$this->load->view('Includes/header',$title);
		$this->load->view('Patient/dashboard',$data);
		$this->load->view('Includes/footer');
	}
	//****End of Patient Dashboard*********//


	//***Start of Profile********//
	public function profile()
	{

		$id = $this->session->userdata('patient')['patient_id'];
		$data['patient'] = $this->Database->selectAll("patients",array("patient_id" => $id));


		$title['title'] = "Profile";
		$this->load->view('Includes/header',$title);
		$this->load->view('Patient/profile',$data);
		$this->load->view('Includes/footer');
	}
	//****End of Profile*******//
  

  	//***Start of Update Profile******//
  	public function updateProfile($id){

  		//***Start of Setting Rules*****//
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
		$email = $this->session->userdata('patient')['username'];
		if($email  ==  $this->input->post('username') ){
			 $this->form_validation->set_rules('username', 'Username', 'required|trim');
		}else
		{
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[patients.username]');
		}
	   

		//***End of Setting Rules******//

		//***Start of Check Valdiation********//
		if($this->form_validation->run() == FALSE){
			$this->profile();
		}else{


			//***Start of Getting Inputs******//
			$username = $this->input->post('username');
			//***End of Getting Inputs******//

			$data = array
					(
						'username'     => $username ?? null,
					);


	
			$id = $this->session->userdata('patient')['patient_id'];
			$where = array('patient_id'=> $id);
			$result = $this->Database->update('patients',$where,$data);

			if($result){

				$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Your profile updated successfully!!</div>');
				redirect('Patient_dashboard');

			}else{
				 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to Updated</div>');
					redirect('Patient_dashboard/profile');

			}	

  		}
  	}
  	//**End of Update Profile******//



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
				$password = $this->session->userdata('patient')['password'];
				if($password == $oldpassword)
				{

					//****Start of Confirm New Password*******//
					if($newpassword == $confirmPassword)
					{

						//****Start of Update Password********//
						$data = array('password'=>$newpassword);
						$where = array('patient_id'=> $this->session->userdata('patient')['patient_id']);
						$result = $this->Database->update('patients',$where,$data);

						if($result){

		
							
							$record = $this->session->userdata('patient');
							$record['password'] = $newpassword;
							$this->session->set_userdata('patient', $record); 

							$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Password updated successfully!</div>');
						  redirect('Patient_dashboard');

						}else{
							$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to update</div>');
						  redirect('Patient_dashboard/profile');
						}
						//***End of Update Password*********//

					}else
					{
	 					$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Confirm Password not matched!</div>');
						redirect('Patient_dashboard/profile');
					}
					//****End of Confirm New Password********//

				}else{
	                $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Old Password not matched!</div>');
					redirect('Patient_dashboard/profile');

				}
				//***End of Check Old Password*******//
			}
		//**End of Validation and Proccess*****//	 
			 
	}
	//***End of Change Password********//


	//***Start of View Appointments********//
	public function viewAppointments(){

		$id = $this->session->userdata('patient')['patient_id'];
		//***Start of Get Appointments******//
		$this->db->select('*');
		$this->db->from('appointments'); 
	    $this->db->join('patients', 'patients.patient_id=appointments.patient_id', 'join');
	    $this->db->join('doctors', 'doctors.doctor_id=appointments.doctor_id', 'join');
	    $this->db->where('appointments.appointment_status != ', "Deleted");
	    $this->db->where('patients.patient_id ',$id );
		$result = $this->db->get()->result_array();

		$data['appointments'] = $result;
		// //***End of Get Departments*******//
 
		$title['title'] = "Appointments";
		$this->load->view('Includes/header',$title);
		$this->load->view('Patient/view_appointment',$data);
		$this->load->view('Includes/footer');
	}
	//***End of View Appointment*********//


	//****Start of Add Appointments********//
	public function addAppointment()
	{
		//***Start of Get Departments and Patients********//
		$data['doctors'] = $this->Database->selectAll("doctors",array("doctor_status !=" => 3));
		// $data['patients'] = $this->Database->selectAll("patients",array("status_id !=" => 3));
		//***End of Get Departments and Patients*********//

		$title['title'] = "Add Appointment";
		$this->load->view('Includes/header',$title);
		$this->load->view('Patient/add_appointment',$data);
		$this->load->view('Includes/footer');
	}
	//***End of Add Appointments********//

	//**Start of Create Appointment********//
	public function createAppointment(){

		//***Start of Setting Rules*****//
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
	    $this->form_validation->set_rules('doctor_id', 'Doctor', 'required|trim');
		// $this->form_validation->set_rules('patient_id','Patient','required');
		$this->form_validation->set_rules('date','Patient','required');
		// $this->form_validation->set_rules('appointment_status','Appointment Status','required');
		// $this->form_validation->set_rules('status_id','Status','required');
		//***End of Setting Rules******//

		//***Start of Check Valdiation********//
		if($this->form_validation->run() == FALSE){
			$this->add();
		}else{

			//***Start of Getting Inputs******//
			$doctor_id = $this->input->post('doctor_id');
			$patient_id = $this->session->userdata('patient')['patient_id'];
			$date = $this->input->post('date');
			$appointment_status = $this->input->post('appointment_status');
			// $status_id = $this->input->post('status_id');
			//***End of Getting Inputs******//


			$data = array
					(
						'doctor_id'     	=> $doctor_id ?? null,
						'patient_id'    	=> $patient_id ?? null,
						'appointment_date'     			=> $date ?? null,
						'appointment_status'=> "pending" ?? null,
						
 					);
	
			$result = $this->Database->insert('appointments',$data);

			if($result){

				$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Appointment created successfully!</div>');
				redirect('Patient_dashboard/viewAppointments');

			}else{
				 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
					redirect('Patient_dashboard/addAppointment');

			}	

		}
		//***End of Check Valdiation********//
	}
	//**End of Create Appointment*********//



	  public function viewNotices()
	  {
		  $data['notices'] = $this->Database->select('notices',array('status_id'!=3));
		  $data['title'] = "Notices";
		  $this->load->view('Includes/header',$data);
		  $this->load->view('Patient/view_notices',$data);
		  $this->load->view('Includes/footer');
	  }

	  public function doctors()
		{
			$data = array
			( 
				'doctor_status'  => 1, 
			);	 
			$data['doctors'] = $this->Database->selectAll('doctors',$data);
			$data['title'] = "Doctors";
			$this->load->view('Includes/header');
			$this->load->view('Patient/view_doctors',$data);
			$this->load->view('Includes/footer');


		}


	public function showDoctors($id)
	{
	   
	//   $data['doctors'] = $this->Database->selectWhere('doctors',array('doctor_id'=>$id));
	  $join = "doctors.dept_id = departments.dept_id";
	  $data['doctor'] = $this->Database->selectJoin('doctors','departments',$join,array('doctor_status != '=>3,'doctor_id'=>$id));


		$title['title'] = "Doctors";
		$this->load->view('Includes/header',$title);
		$this->load->view('Patient/show_doctor',$data);
		$this->load->view('Includes/footer');
	}

	public function bp_temp(){
		
		$title['title'] = "How to check BP Temperature";
		$this->load->view('Includes/header',$title);
		$this->load->view('Patient/bp_check');
		$this->load->view('Includes/footer');
	}


/***************************************************************/
/*                    End  Listing Doctors                    */
/***************************************************************/


}
