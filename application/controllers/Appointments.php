<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {


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


	//****Start of Index*******//
	public function index(){

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
		$this->load->view('Admin/view_appointments',$data);
		$this->load->view('Includes/footer');
	}
	//***End of Appointments********//


	//***Start of Add Appointments********//
	public function add()
	{

		//***Start of Get Departments and Patients********//
		$data['doctors'] = $this->Database->selectAll("doctors",array("doctor_status !=" => 3));
		$data['patients'] = $this->Database->selectAll("patients",array("status_id !=" => 3));
		//***End of Get Departments and Patients*********//

		$title['title'] = "Add Appointment";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/add_appointment',$data);
		$this->load->view('Includes/footer');
	}
	//***End of Add Appointments*******//


	//**Start of Create Appointment********//
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
			$this->add();
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
						'appointment_date'     			=> $date ?? null,
						'appointment_status'=> $appointment_status ?? null,
						
 					);
	
			$result = $this->Database->insert('appointments',$data);

			if($result){

				$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Appointment created successfully!</div>');
				redirect('Appointments');

			}else{
				 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
					redirect('Appointments/add');

			}	

		}
		//***End of Check Valdiation********//
	}
	//**End of Create Appointment*********//



	//***Start of Edit  Appointment*******//
	public function edit($id){

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
		$this->load->view('Admin/edit_appointment',$data);
		$this->load->view('Includes/footer');


	}
	//**End of Edit Appointments*********//



	//****Start of Update Appointment*********//
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
			$this->edit($id);
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
						'appointment_date'     			=> $date ?? null,
						'appointment_status'=> $appointment_status ?? null,
						
 					);
	
			$result = $this->Database->update('appointments',array("appointment_id" => $id),$data);

			if($result){

				$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Appointment Updated successfully!</div>');
				redirect('Appointments');

			}else{
				 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to update</div>');
					redirect('Appointments/edit/'.$id);

			}	

		}
		//***End of Check Valdiation********//	
	}
	//****End of Update Appointment********//

}
