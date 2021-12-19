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


	//****Start of Add Department********//
	public function add()
	{
		$title['title'] = "Add Doctor";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/add_doctor');
		$this->load->view('Includes/footer');
	}
	//***End of Add Department**********//


	//****Start of create doctor*********//
	public function create()
	{

		//**Start of Valdiation rules*******//
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
        $this->form_validation->set_rules('doctor_name', 'Full Name', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('username','Username','required|trim|is_unique[doctors.username]');
        $this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('phone_no','Phone No','required|numeric|max_length[11]'); 
        $this->form_validation->set_rules('dob','Date of Birth','required'); 
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('dept_id', 'Department', 'required');
        $this->form_validation->set_rules('status_id', 'Status', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required'); 
 
        //****End of Validation rules********//

        //***Start of Check Validation*********//
		if($this->form_validation->run() == FALSE)
		{
			$this->add();
		}else
		{
			$name = $_FILES['file']['name'] ?? null ;

			//******Start of Add Profile Picture***********//
			$config['upload_path'] = './assets/uploads/doctors/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 1024;
            $config['overwrite'] = TRUE; //overwrite user avatar
          
            $config['file_name'] 			 = $name;
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('file'))
            {
            	
            	$error = array('error' => $this->upload->display_errors());

            	$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">'.$error.'</div>');
					redirect('Doctors/add');
           	}else{
           		
           		//***Start of Getting Input Fields*******//
				$doctor_name = $this->input->post('doctor_name');
                $username = $this->input->post('username');
                $phone_no = $this->input->post('phone_no');
                $dob = $this->input->post('dob');
                $gender = $this->input->post('gender');
                $address = $this->input->post('address');
                $status_id = $this->input->post('status_id');
                $dept_id = $this->input->post('dept_id');
                $password = $this->input->post('password');
              
           		//***End of Getting Input Fields*********//

                //*****Start of Setting Data********//
           		 $data = array
                (
                    'doctor_name'      		=> $doctor_name ?? null,
                    'username'              => $username ?? null,
                    'password'              => $password ?? null,
                    'doctor_gender'    			=> $gender ?? null,
                    'doctor_dob'      			 	=> $dob ?? null,
                    'doctor_phone'    		 	=> $phone_no ?? null,
                    'doctor_pic'       		=> $name?? null,
                    'doctor_address'   			=> $address ?? null,
                    'doctor_status'             => $status_id ?? null,
                    'dept_id'             	=> $dept_id ?? null, 
                    'created_at'			=> date("Y-m-d"),
                );
                //***End of Setting Data********//       


                $result = $this->Database->insert('doctors',$data);    
                if($result){
						$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Doctor Created successfully!</div>');
						redirect('Doctors');
                }else{
                	
                	$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
                                        redirect('Doctors/add');
                } 
           	}
			//****End of Add Profile Picture*************//


		}
        //***End of Check Validation********//
            
	}
	//****End of create doctor*********//

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
