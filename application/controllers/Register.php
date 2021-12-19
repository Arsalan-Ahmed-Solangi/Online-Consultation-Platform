<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database');  
	}
	//****Start of Register Page*******//
	public function index()
	{	
		$title['title'] = "Register";
		$this->load->view('Includes/header.php',$title);
		$this->load->view('register');
		$this->load->view('Includes/footer.php');
	}
	//****End of Register Page*********// 

	/********************************************************/
	/*				  	Save Register 			 			*/
    /********************************************************/
	public function save()
	{	 
        if($this->input->post() && !empty($this->input->post()))
        {
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>'); 
			$this->form_validation->set_rules('fullname','First Name','trim|required|max_length[20]'); 
			$this->form_validation->set_rules('username', 'username', 'trim|required|max_length[50]|valid_email|is_unique[patients.username]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
           //***Start of Check Valdiation********//
            if($this->form_validation->run() == FALSE){
               $this->index(); 
            }else{

                    /**************************************************************/
                    /*                     Getting  Inputs Data                   */
                    /**************************************************************/
                 
                        $fullname = $this->input->post('fullname');
                        $username = $this->input->post('username');
                        $password = $this->input->post('password');
                        $status_id = 1;
						date_default_timezone_set('Australia/Melbourne');
						$date = date('m/d/Y h:i:s a', time());
						 
                    /**************************************************************/
                    /*                  End   Getting  Inputs Data                */
                    /**************************************************************/

                        $data = array
                        (
                            'patient_name'  => $fullname ?? null,
                            'username'      => $username ?? null,
                            'password'      => $password ?? null, 
                            'status_id'     => $status_id,
							 
                        );
                    
                    /**************************************************************/
                    /*             Create & Updated With  Check Register Edit Id  */
                    /**************************************************************/  

                        $result = $this->Database->insert('patients',$data); 

                        if($result)
                        { 
							$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Registerd  successfully!</div>');
							redirect('Login'); 
                        }else{
							$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
							$this->index(); 
                        }	

                    /**************************************************************/
                    /*       End  Create & Updated With  Check Register Edit Id   */
                    /**************************************************************/
                }
        }else{
            $this->index();
        } 
	}
	//***End of Save Register**********//

}
