<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receptionists extends CI_Controller {


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
    /*                     Receptionists  Listing                 */
    /**************************************************************/

        public function index()
        {	 
            //***Start of Get Receptionists ******//
            $data['receptionists'] = $this->Database->select('receptionists',array('status_id'!=3));
            //***End of Get Receptionists *******// 
            $title['title'] = "Receptionists";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/view_receptionists',$data);
            $this->load->view('Includes/footer');
        }

	/**************************************************************/
    /*                    End Receptionists  Listing              */
    /**************************************************************/


    /**************************************************************/
    /*                     Receptionists Add View                 */
    /**************************************************************/
	
        public function add()
        {
            $data['title'] = "Receptionists";
            $this->load->view('Includes/header',$data);
            $this->load->view('Admin/add_receptionists',$data);
            $this->load->view('Includes/footer');
        }
    
    /**************************************************************/
    /*                    End Receptionists Add View              */
    /**************************************************************/

    /**************************************************************/
    /*                     Edit Receptionists View                */
    /**************************************************************/

        public function edit($id=''){
            $data['receptionists'] = $this->Database->selectWhere('receptionists',array('notice_id'=>$id));
            $title['title'] = "Edit Receptionists";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/edit_Receptionists',$data);
            $this->load->view('Includes/footer');  
        }

    /**************************************************************/
    /*                   End  Receptionists Edit View             */
    /**************************************************************/

    /**************************************************************/
    /*                     Save & Update Data                     */
    /**************************************************************/

	public function save()
	{	  
      
        if($this->input->post() && !empty($this->input->post()))
        {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
            $this->form_validation->set_rules('receptionist_name', 'Receptionists Name', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('receptionist_phone','Receptionists Phone','required|numeric|max_length[13]'); 
            $this->form_validation->set_rules('receptionist_dob','Receptionists DOB','required'); 
            $this->form_validation->set_rules('receptionist_address', 'Receptionists Address', 'required');
            $this->form_validation->set_rules('Status_id', 'Status Address', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required'); 

            
            
         
           //***Start of Check Valdiation********//
            if($this->form_validation->run() == FALSE){ 
                    $this->add(); 
            }else{ 
                
                    if (isset($_FILES['receptionist_pic']['name']) && !empty($_FILES['receptionist_pic']['name']))
                    { 
                        $config['upload_path']  = "./assets/uploads/receptonists/";
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $this->load->library("upload"); 
                        $this->upload->initialize($config);
                        if ( ! $this->upload->do_upload('receptionist_pic'))
                        {
                              $error = array('error' => $this->upload->display_errors()); 
                              echo '<pre/>';
                              $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">'.print_r($error).'</div>');
                              $this->add();
                        }
                        else
                        { 
                            // $data = array('upload_data' => $this->upload->data());
                        
                            /**************************************************************/
                            /*                     Getting  Inputs Data                   */
                            /**************************************************************/
                
                                $receptionist_name = $this->input->post('receptionist_name');
                                $username = $this->input->post('username');
                                $receptionist_phone = $this->input->post('receptionist_phone');
                                $receptionist_dob = $this->input->post('receptionist_dob');
                                $receptionist_gender = $this->input->post('receptionist_gender');
                                $receptionist_address = $this->input->post('receptionist_address');
                                $Status_id = $this->input->post('Status_id');
                                $password = $this->input->post('password');
                                $img = $_FILES['receptionist_pic']['name']; 

                            /**************************************************************/
                            /*                  End   Getting  Inputs Data                */
                            /**************************************************************/

                                $data = array
                                (
                                    'receptionist_name'      => $receptionist_name ?? null,
                                    'username'               => $username ?? null,
                                    'password'               => $password ?? null,
                                    'receptionist_gender'    => $receptionist_gender ?? null,
                                    'receptionist_dob'       => $receptionist_dob ?? null,
                                    'receptionist_phone'     => $receptionist_phone ?? null,
                                    'receptionist_pic'       => $img ?? null,
                                    'receptionist_address'   => $receptionist_address ?? null,
                                    'status_id'              => $Status_id ?? null, 
                                );
                    
                            /**************************************************************/
                            /*      Create & Updated With  Check Receptionists Edit Id    */
                            /**************************************************************/
                    
                                
                                    $result = $this->Database->insert('receptionists',$data);
                                

                                if($result)
                                { 
                                    $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Receptionists Created successfully!</div>');
                                    redirect('Receptionists'); 
                                }else{
                                    $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
                                    $this->add(); 
                                }	

                                /**************************************************************/
                                /*   End  Create & Updated With  Check Receptionists Edit Id  */
                                /**************************************************************/
                        }
                                    
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
   /*            Change Receptionists Status             */
   /******************************************************/

	public function status($notice_id,$status_id){
		
		if($status_id == 1) $data = array('status_id'=>2);

		else if($status_id == 2) $data = array('status_id'=>1);
		
		$where = array('notice_id'=>$notice_id);
		$result = $this->Database->update("receptionists",$where,$data);
		if($result){
			$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Receptionists status changed successfully</div>');
			 redirect('Receptionists');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Receptionists status failed!</div>');
            if(isset($notice_id) && !empty($notice_id))
            {
                $this->edit($notice_id);
            }else{
                $this->add();
            } 
		}

	}
  /***************************************************************/
  /*                End Change Receptionists Status              */
  /***************************************************************/

}
