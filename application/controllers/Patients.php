<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {


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

	/**************************************************************/
    /*                     Patients  Listing                      */
    /**************************************************************/

        public function index()
        {	 
            //***Start of Get Patients ******//
            $data['patients'] = $this->Database->select('patients',array('status_id'!=3));
            //***End of Get Patients *******// 
            $title['title'] = "Patients";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/view_patients',$data);
            $this->load->view('Includes/footer');
        }

	/**************************************************************/
    /*                    End Patients  Listing      	          */
    /**************************************************************/


    /**************************************************************/
    /*                     Patients Add View      		           */
    /**************************************************************/
	
        public function add()
        {
            $data['title'] = "Patients";
            $this->load->view('Includes/header',$data);
            $this->load->view('Admin/add_patients',$data);
            $this->load->view('Includes/footer');
        }
    
    /**************************************************************/
    /*                    End Patients Add View            		  */
    /**************************************************************/

    /**************************************************************/
    /*                     Edit Patients View     		          */
    /**************************************************************/

        public function edit($id=''){
            $data['patients'] = $this->Database->selectWhere('patients',array('patient_id'=>$id));
            $title['title'] = "Edit Patients";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/edit_patients',$data);
            $this->load->view('Includes/footer');  
        }

    /**************************************************************/
    /*                   End  Patients  Edit View         	     */
    /**************************************************************/

    /**************************************************************/
    /*                     Save & Update Data                     */
    /**************************************************************/

	public function save()
	{	  
      
        if($this->input->post() && !empty($this->input->post()))
        { 
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
            $this->form_validation->set_rules('patient_name', 'Patient Name', 'required|trim|max_length[20]');
            if(!$this->input->post('hiddenId'))
            {
			$this->form_validation->set_rules('username', 'username', 'trim|required|max_length[50]|valid_email|is_unique[patients.username]');
             }
            $this->form_validation->set_rules('patient_phone','Patient Phone','required|numeric|max_length[13]'); 
            $this->form_validation->set_rules('patient_dob','Patient DOB','required'); 
            $this->form_validation->set_rules('patient_gender','Patient DOB','required');  
            $this->form_validation->set_rules('patient_address', 'Patient Address', 'required');
            $this->form_validation->set_rules('status_id', 'Status Address', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required'); 

            
            
         
           //***Start of Check Valdiation********//
            if($this->form_validation->run() == FALSE){ 
                    $this->add(); 
            }else{ 
              
                    if (isset($_FILES['patient_profile']['name']) && !empty($_FILES['patient_profile']['name']))
                    { 
                        $_FILES['patient_profile']['name'] = "patient".time().".png";
                        $name = $_FILES['patient_profile']['name'] ?? null ;

                        $config['upload_path']  = "./assets/uploads/patients/";
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $config['max_size']             = 1024;
                        $config['overwrite'] = TRUE; //overwrite user avatar
                        $config['file_name'] 			 = $name;
                        $this->load->library("upload"); 
                        $this->upload->initialize($config);
                        if ( ! $this->upload->do_upload('patient_profile'))
                        {
                              $error = array('error' => $this->upload->display_errors()); 
                            //   echo '<pre/>';
                              $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">'.print_r($error).'</div>');
                             
                              if($this->input->post('hiddenId') && !empty($this->input->post('hiddenId') ))
                              {   
                                  $id = $this->input->post('hiddenId');
                                  $this->edit($id);
                              }else{
                                  $this->add();
                              }
                        }
                        else
                        { 
                            // $data = array('upload_data' => $this->upload->data());
                        
                            /**************************************************************/
                            /*                     Getting  Inputs Data                   */
                            /**************************************************************/

					

                                $patient_name = $this->input->post('patient_name');
                                $username = $this->input->post('username');
                                $patient_phone = $this->input->post('patient_phone');
                                $patient_dob = $this->input->post('patient_dob');
                                $patient_gender = $this->input->post('patient_gender');
                                $patient_address = $this->input->post('patient_address');
                                $Status_id = $this->input->post('status_id');
                                $password = $this->input->post('password');
                               
                                if(isset($_FILES['patient_profile']['name']) && !empty($_FILES['patient_profile']['name']))
                                {
                                    $img = $_FILES['patient_profile']['name']; 
                                }else{
                                     $img = $this->input->post('hiddenPicture'); 
                                }

                            /**************************************************************/
                            /*                  End   Getting  Inputs Data                */
                            /**************************************************************/

                                $data = array
                                (
                                    'patient_name'      => $patient_name ?? null,
                                    'username'          => $username ?? null,
                                    'password'          => $password ?? null,
                                    'patient-gender'    => $patient_gender ?? null,
                                    'patient_dob'       => $patient_dob ?? null,
                                    'patient_phone'     => $patient_phone ?? null,
                                    'patient_profile'   => $img ?? null,
                                    'patient_address'   => $patient_address ?? null,
                                    'status_id'         => $Status_id ?? null, 
                                );
                    
                            /**************************************************************/
                            /*      Create & Updated With  Check Patients Edit Id  		  */
                            /**************************************************************/
                                if( $this->input->post('hiddenId')  && !empty($this->input->post('hiddenId')))
                                {
                                 
                                    $where = array('patient_id'=> $this->input->post('hiddenId') );
                                    $result = $this->Database->update('patients',$where,$data);
                                }else{
                                    $result = $this->Database->insert('patients',$data);
                                } 

                                if($result)
                                { 
                                    if($this->input->post('hiddenId') && !empty($this->input->post('hiddenId') ))
                                    {
                                        $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Patients Updated successfully!</div>');
                                        redirect('Patients');
                                    }else{
                                        $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Patients Created successfully!</div>');
                                        redirect('Patients');
                                    }
                                    
                                }else{
                                    $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
                                    if($this->input->post('hiddenId')  && !empty($this->input->post('hiddenId') ))
                                    {
                                        $id = $this->input->post('hiddenId');
                                        $this->edit($id);
                                    }else{
                                        $this->add();
                                    }  
                                }	

                                /**************************************************************/
                                /*   End  Create & Updated With  Check Patients  Edit Id      */
                                /**************************************************************/
                        }
                                    
                    }else{
                            
                            /**************************************************************/
                            /*                     Getting  Inputs Data                   */
                            /**************************************************************/ 
                          
							$patient_name = $this->input->post('patient_name');
							$username = $this->input->post('username');
							$patient_phone = $this->input->post('patient_phone');
							$patient_dob = $this->input->post('patient_dob');
							$patient_gender = $this->input->post('patient_gender');
							$patient_address = $this->input->post('patient_address');
							$Status_id = $this->input->post('status_id');
							$password = $this->input->post('password');
                            $img = $this->input->post('hiddenPicture'); 
                            
                        /**************************************************************/
                        /*                  End   Getting  Inputs Data                */
                        /**************************************************************/

							$data = array
							(
								'patient_name'      => $patient_name ?? null,
								'username'          => $username ?? null,
								'password'          => $password ?? null,
								'patient-gender'    => $patient_gender ?? null,
								'patient_dob'       => $patient_dob ?? null,
								'patient_phone'     => $patient_phone ?? null,
								'patient_profile'   => $img ?? null,
								'patient_address'   => $patient_address ?? null,
								'status_id'         => $Status_id ?? null, 
							);
                
                        /**************************************************************/
                        /*      Create & Updated With  Check Patients Edit Id         */
                        /**************************************************************/
                            if( $this->input->post('hiddenId')  && !empty($this->input->post('hiddenId')))
                            {
                             
                                $where = array('patient_id'=> $this->input->post('hiddenId') );
                                $result = $this->Database->update('patients',$where,$data);
                            }else{
                                $result = $this->Database->insert('patients',$data);
                            } 

                            if($result)
                            { 
                                if($this->input->post('hiddenId') && !empty($this->input->post('hiddenId') ))
                                {
                                    $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Patients Updated successfully!</div>');
                                    redirect('Patients');
                                }else{
                                    $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Patients Created successfully!</div>');
                                    redirect('Patients');
                                }
                                
                            }else{
                                $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
                                if($this->input->post('hiddenId')  && !empty($this->input->post('hiddenId') ))
                                {
                                    $id = $this->input->post('hiddenId');
                                    $this->edit($id);
                                }else{
                                    $this->add();
                                }  
                            }	

                            /**************************************************************/
                            /*   End  Create & Updated With  Check Patients Edit Id       */
                            /**************************************************************/
                    }
                }
        }else{
            $this->add();
        } 
	}
   /***************************************************************/
    /*                 End   Save & Update Data                  */
    /**************************************************************/

    
   /******************************************************/
   /*            Change Patients Status                  */
   /******************************************************/

	public function status($patient_id,$status_id){
		
		if($status_id == 1) $data = array('status_id'=>2);

		else if($status_id == 2) $data = array('status_id'=>1);
		
		$where = array('patient_id'=>$patient_id);
		$result = $this->Database->update("patients",$where,$data);
		if($result){
			$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Receptionists status changed successfully</div>');
			 redirect('Patients');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Receptionists status failed!</div>');
            if(isset($patient_id) && !empty($patient_id))
            {
                $this->edit($patient_id);
            }else{
                $this->add();
            } 
		}

	}
  /***************************************************************/
  /*                End Change Patients Status                  */
  /***************************************************************/

}
