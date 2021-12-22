<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database'); 
	}
	//****Start of Login Page*******//
	public function index()
	{	
		//***Start of Get Departments******//
		$data['departments'] = $this->Database->select('departments',array('status_id !=' => 3));
		//***End of Get Departments*******//
	
		 
		 
		$data['title'] = "Health Care System";
		$this->load->view('public/Includes/header.php',$data);
		$this->load->view('public/index');
		$this->load->view('public/Includes/footer.php');
	}
	//****End of Login Page*********//

	/**********************************************/
	/*			Start for create contact 		  */
	/**********************************************/
	public function saveContact(){
	 
		//***Start of Setting Rules*****//
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
		$this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[20]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|valid_email');
		$this->form_validation->set_rules('subject','Subject','required|trim|max_length[30]');
		$this->form_validation->set_rules('message','Message','required');


		//***End of Setting Rules******//

		//***Start of Check Valdiation********//
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{


			//***Start of Getting Inputs******//
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			//***End of Getting Inputs******//

			$data = array
					(
						'fullname'     => $name ?? null,
						'email'    	   => $email ?? null,
						'subject'      => $subject ?? null,
						'message'      => $message ?? null,
						'status_id'    => 1,
 					);
	
			$result = $this->Database->insert('enquiries',$data);

			if($result){

				$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Messaage Send successfully!</div>');
				redirect('Home');

			}else{
				 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
					redirect('Home');

			}	
		}
		//***End of Check Validation*******//

	}
	
	/**********************************************/
	/*			End for create contact	 		  */
	/**********************************************/

}
