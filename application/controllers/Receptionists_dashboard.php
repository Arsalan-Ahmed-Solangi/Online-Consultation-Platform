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
		// $doctors = $this->Database->selectAll("doctors",array("doctor_status !=" => 3));
		// $patients = $this->Database->selectAll("patients",array("status_id !=" => 3));
		// $appointments = $this->Database->selectAll("appointments",array("status_id !=" => 3));
		//****End of Count Doctors , Patients , Appointiments*********//

		//***Start of Get Enquiries******//
		$data['enquiries'] = $this->Database->select('enquiries');
		//***End of Get Enquiries*******//

		// $data['doctors'] = count($doctors);
		// $data['patients'] = count($patients);
		// $data['appointments'] = count($appointments);

		$title['title'] = "Dashboard";
		$this->load->view('Includes/header',$title);
		$this->load->view('Receptionists/dashboard',$data);
		$this->load->view('Includes/footer');
	}
	//****End of Receptionists Dashboard*********//

  /***************************************************************/
  /*                         View Notices                        */
  /***************************************************************/
  
  public function viewNotices()
  {
	  $data['notices'] = $this->Database->select('notices',array('status_id'!=3));
	  $data['title'] = "Notices";
	  $this->load->view('Includes/header',$data);
	  $this->load->view('Receptionists/view_notices',$data);
	  $this->load->view('Includes/footer');
  }
/***************************************************************/
/*                    End  View Notices                        */
/***************************************************************/

/***************************************************************/
/*                         Listing Patients                    */
/***************************************************************/
  
  public function viewPatients()
  {
	  $data['patients'] = $this->Database->select('patients',array('status_id'!=3));
	  $data['title'] = "Patients";
	  $this->load->view('Includes/header',$data);
	  $this->load->view('Receptionists/view_patients',$data);
	  $this->load->view('Includes/footer');
  }

/***************************************************************/
/*                    End  Listing Patients                    */
/***************************************************************/

/***************************************************************/
/*                         Show Patients                      */
/***************************************************************/
  
  public function showPatients($id)
  {
	 
	$data['patients'] = $this->Database->selectWhere('patients',array('patient_id'=>$id));
 
	  $title['title'] = "Patients";
	  $this->load->view('Includes/header',$title);
	  $this->load->view('Receptionists/show_patients',$data);
	  $this->load->view('Includes/footer');
  }
  
/***************************************************************/
/*                    End  Show Patients                       */
/***************************************************************/


/***************************************************************/
/*                         Listing Doctors                    */
/***************************************************************/
  
public function viewDoctors()
{
	$data = array
	( 
		'doctor_status'  => 1, 
	);	 
	$data['doctors'] = $this->Database->selectAll('doctors',$data);
	$data['title'] = "Doctors";
	$this->load->view('Includes/header',$data);
	$this->load->view('Receptionists/view_doctors',$data);
	$this->load->view('Includes/footer');
}

/***************************************************************/
/*                    End  Listing Doctors                    */
/***************************************************************/

/***************************************************************/
/*                         Show Doctors                      */
/***************************************************************/
  
public function showdDoctors($id)
{
   
//   $data['doctors'] = $this->Database->selectWhere('doctors',array('doctor_id'=>$id));
  $join = "doctors.dept_id = departments.dept_id";
  $data['doctor'] = $this->Database->selectJoin('doctors','departments',$join,array('doctor_status != '=>3,'doctor_id'=>$id));


	$title['title'] = "Doctors";
	$this->load->view('Includes/header',$title);
	$this->load->view('Receptionists/show_doctors',$data);
	$this->load->view('Includes/footer');
}

/***************************************************************/
/*                    End  Show Doctors                        */
/***************************************************************/
 

/***************************************************************/
/*                         Add Appointment                      */
/***************************************************************/
  
public function add_appointment()
{
  	//***Start of Get Departments and Patients********//
	$data['doctors'] = $this->Database->selectAll("doctors",array("doctor_status !=" => 3));
	$data['patients'] = $this->Database->selectAll("patients",array("status_id !=" => 3));
	//***End of Get Departments and Patients*********//

	$title['title'] = "Add Appointment";
	$this->load->view('Includes/header',$title);
	$this->load->view('Receptionists/add_appointment',$data);
	$this->load->view('Includes/footer');
}

/***************************************************************/
/*                    End  Add Appointment                     */
/***************************************************************/
 
/***************************************************************/
/*                    Start of Create Appointment              */
/***************************************************************/	
	public function create(){

		//***Start of Setting Rules*****//
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
	    $this->form_validation->set_rules('doctor_id', 'Doctor', 'required|trim');
		$this->form_validation->set_rules('patient_id','Patient','required');
		$this->form_validation->set_rules('date','Patient','required');
		$this->form_validation->set_rules('appointment_status','Appointment Status','required');
		// $this->form_validation->set_rules('status_id','Status','required');
		//***End of Setting Rules******//

		//***Start of Check Valdiation********//
		if($this->form_validation->run() == FALSE){
			$this->add_appointment();
		}else{

			/* Start of Getting Inputs */

			$doctor_id = $this->input->post('doctor_id');
			$patient_id = $this->input->post('patient_id');
			$date = $this->input->post('date');
			$appointment_status = $this->input->post('appointment_status');
			 
			/* End of Getting Inputs */


			$data = array
					(
						'doctor_id'     	=> $doctor_id ?? null,
						'patient_id'    	=> $patient_id ?? null,
						'appointment_date'     			=> $date ?? null,
						'appointment_status'=> $appointment_status ?? null,
						
 					);
	
			$result = $this->Database->insert('appointments',$data);

			if($result){

				$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Appointment created successfully!</div>');
				redirect('Receptionists_dashboard/listingAppointment');

			}else{
				 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
					redirect('Receptionists_dashboard/add_appointment');

			}	

		}
		//***End of Check Valdiation********//
	}
/***************************************************************/
/*                    End of Create Appointment                */
/***************************************************************/	

/***************************************************************/
/*                   Start of Listing Appointment              */
/***************************************************************/

	public function listingAppointment()
	{
			//***Start of Get Appointments******//
			$this->db->select('*');
			$this->db->from('appointments'); 
			$this->db->join('patients', 'patients.patient_id=appointments.patient_id', 'join');
			$this->db->join('doctors', 'doctors.doctor_id=appointments.doctor_id', 'join');
			$this->db->where('appointments.appointment_status != ', "Deleted");
			$result = $this->db->get()->result_array();
	
			$data['appointments'] = $result;
			// //***End of Get Departments*******//
	 
			$title['title'] = "Appointments";
			$this->load->view('Includes/header',$title);
			$this->load->view('Receptionists/view_appointments',$data);
			$this->load->view('Includes/footer');
	}

/***************************************************************/
/*                    End of Listing Appointment              */
/***************************************************************/


/***************************************************************/
/*                   Start of Edit Appointment              */
/***************************************************************/

public function editAppointment($id){

	$this->db->select('*');
	$this->db->from('appointments'); 
	$this->db->join('patients', 'patients.patient_id=appointments.patient_id', 'join');
	$this->db->join('doctors', 'doctors.doctor_id=appointments.doctor_id', 'join');
	$this->db->where('appointments.appointment_id = ',"$id");
	$result = $this->db->get()->result_array(); 
	$data['appointments'] = $result; 
	//***Start of Get Departments and Patients********//
	$data['doctors'] = $this->Database->selectAll("doctors",array("doctor_status !=" => 3));
	$data['patients'] = $this->Database->selectAll("patients",array("status_id !=" => 3));
	//***End of Get Departments and Patients*********//
	$title['title'] = "Edit Appointment";
	$this->load->view('Includes/header',$title);
	$this->load->view('Receptionists/edit_appointment',$data);
	$this->load->view('Includes/footer'); 
}

/***************************************************************/
/*                    End of Edit Appointment                  */
/***************************************************************/


/***************************************************************/
/*                   Start of Update Appointment              */
/***************************************************************/

public function update($id){

	//***Start of Setting Rules*****//
	$this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
	$this->form_validation->set_rules('doctor_id', 'Doctor', 'required|trim');
	$this->form_validation->set_rules('patient_id','Patient','required');
	$this->form_validation->set_rules('date','Patient','required');
	$this->form_validation->set_rules('appointment_status','Appointment Status','required');
	// $this->form_validation->set_rules('status_id','Status','required');
	//***End of Setting Rules******//

	//***Start of Check Valdiation********//
	if($this->form_validation->run() == FALSE){
		$this->editAppointment($id);
	}else{

		//***Start of Getting Inputs******//
		$doctor_id = $this->input->post('doctor_id');
		$patient_id = $this->input->post('patient_id');
		$date = $this->input->post('date');
		$appointment_status = $this->input->post('appointment_status');
		// $status_id = $this->input->post('status_id');
		//***End of Getting Inputs******//


		$data = array
				(
					'doctor_id'     	=> $doctor_id ?? null,
					'patient_id'    	=> $patient_id ?? null,
					'appointment_date'  => $date ?? null,
					'appointment_status'=> $appointment_status ?? null,
					
				 );

		$result = $this->Database->update('appointments',array("appointment_id" => $id),$data);
		echo '<pre/>';
		print_r($result);
		if($result){

			$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Appointment Updated successfully!</div>');
			redirect('Receptionists_dashboard/listingAppointment');

		}else{
			 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to update</div>');
				redirect('Receptionists_dashboard/editAppointment/'.$id);

		}	

	}
	//***End of Check Valdiation********//	
}

/***************************************************************/
/*                    End of Update Appointment                */
/***************************************************************/


/***************************************************************/
/*                  Start of show profile	                   */
/***************************************************************/

public function profile($id)
{
	 
	$data['receptionists'] = $this->Database->selectAll("receptionists",array("receptionist_id" => $id));

	$title['title'] = "Receptionists";
	$this->load->view('Includes/header',$title);
	$this->load->view('Receptionists/profile',$data);
	$this->load->view('Includes/footer');
}

/***************************************************************/
/*                    End of show profile     		           */
/***************************************************************/



/***************************************************************/
/*                  Start of Update profile	                   */
/***************************************************************/
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
	  $this->profile($id);
  }else{


	  //***Start of Getting Inputs******//
	  $username = $this->input->post('username');
	  //***End of Getting Inputs******//

	  $data = array
			  (
				  'username'     => $username ?? null,
			  );



	  $where = array('receptionist_id'=> $id);
	  $result = $this->Database->update('receptionists',$where,$data);

	  if($result){

		  $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Your profile updated successfully!!</div>');
		  redirect('Receptionists_dashboard');

	  }else{
		   $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to Updated</div>');
			  redirect('Receptionists_dashboard/profile'.$id);

	  }	

	}
}

/***************************************************************/
/*                    End of Update profile     		       */
/***************************************************************/

/***************************************************************/
/*                   Start of Change Password                  */
/***************************************************************/
public function changePassword($id)
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

		$this->profile($id);
	}
	else{

			//*****Start of Getting Inputs*******//
			$oldpassword = $this->input->post('oldpassword');
			$newpassword = $this->input->post('newpassword');
			$confirmPassword   = $this->input->post('confirmpassword');
			//***End of Getting Inputs******//


			//***Start of Check Old Password*******//
			$password = $this->session->userdata('receptionist')['password'];
			if($password == $oldpassword)
			{

				//****Start of Confirm New Password*******//
				if($newpassword == $confirmPassword)
				{

					//****Start of Update Password********//
					$data = array('password'=>$newpassword);
					$where = array('receptionist_id'=> $id);
					$result = $this->Database->update('receptionists',$where,$data);

					if($result){

	
						
						$record = $this->session->userdata('receptionist');
						$record['password'] = $newpassword;
						$this->session->set_userdata('receptionist', $record); 

						$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Password updated successfully!</div>');
					  redirect('Receptionists_dashboard');

					}else{
						$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to update</div>');
					  redirect('Receptionists_dashboard/profile'.$id);
					}
					//***End of Update Password*********//

				}else
				{
					 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Confirm Password not matched!</div>');
					redirect('Receptionists_dashboard/profile'.$id);
				}
				//****End of Confirm New Password********//

			}else{
				$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Old Password not matched!</div>');
				redirect('Receptionists_dashboard/profile'.$id);

			}
			//***End of Check Old Password*******//
		}
	//**End of Validation and Proccess*****//	 
		 
}

/***************************************************************/
/*                    End of Change Password 		           */
/***************************************************************/


}
