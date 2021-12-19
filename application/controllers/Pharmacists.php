<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacists extends CI_Controller {


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
    /*                     Pharamcists  Listing                 */
    /**************************************************************/

        public function index()
        {	 
            //***Start of Get Pharamcists ******//
            $data['pharamcists'] = $this->Database->select('pharamcists',array('status_id'!=3));
            //***End of Get Pharamcists *******// 
            $title['title'] = "Pharmacists";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/view_pharmacists',$data);
            $this->load->view('Includes/footer');
        }

	/**************************************************************/
    /*                    End Pharamcists  Listing              */
    /**************************************************************/


    /**************************************************************/
    /*                     Pharamcists Add View                 */
    /**************************************************************/
	
        public function add()
        {
            $data['title'] = "Pharmacists";
            $this->load->view('Includes/header',$data);
            $this->load->view('Admin/add_pharmacists',$data);
            $this->load->view('Includes/footer');
        }
    
    /**************************************************************/
    /*                    End Pharamcists Add View              */
    /**************************************************************/

    /**************************************************************/
    /*                     Edit Pharamcists View                */
    /**************************************************************/

        public function edit($id=''){
            $data['pharamcists'] = $this->Database->selectWhere('pharamcists',array('pharmacist_id'=>$id));
            $title['title'] = "Edit Pharamcists";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/edit_pharmacists',$data);
            $this->load->view('Includes/footer');  
        }

    /**************************************************************/
    /*                   End  Pharamcists Edit View             */
    /**************************************************************/

    /**************************************************************/
    /*                     Save & Update Data                     */
    /**************************************************************/

	public function save()
	{	  
        if($this->input->post() && !empty($this->input->post()))
        {
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
            $this->form_validation->set_rules('pharmacist_name', 'Pharmacist Name', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('pharmacist_phone','Pharmacist Phone','required|numeric|max_length[13]'); 
            $this->form_validation->set_rules('pharmacist_dob','Pharmacist DOB','required'); 
            $this->form_validation->set_rules('pharmacist_gender', 'Pharmacist Gender', 'required');
            $this->form_validation->set_rules('pharmacist_address', 'Pharmacist Address', 'required');
            $this->form_validation->set_rules('status_id', 'Status', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required'); 

            
            
         
           //***Start of Check Valdiation********//
            if($this->form_validation->run() == FALSE){ 
                    $this->add(); 
            }else{ 
                
                    if (isset($_FILES['pharmacist_pic']['name']) && !empty($_FILES['pharmacist_pic']['name']))
                    { 
                        $config['upload_path']  = "./assets/uploads/Pharmacists/";
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $this->load->library("upload"); 
                        $this->upload->initialize($config);
                        if ( ! $this->upload->do_upload('pharmacist_pic'))
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

                                $pharmacist_name = $this->input->post('pharmacist_name');
                                $username = $this->input->post('username');
                                $pharmacist_phone = $this->input->post('pharmacist_phone');
                                $pharmacist_dob = $this->input->post('pharmacist_dob');
                                $pharmacist_gender = $this->input->post('pharmacist_gender');
                                $pharmacist_address = $this->input->post('pharmacist_address');
                                $Status_id = $this->input->post('status_id');
                                $password = $this->input->post('password');
                               
                                
                                if(isset($_FILES['pharmacist_pic']['name']) && !empty($_FILES['pharmacist_pic']['name']))
                                {
                                    $img = $_FILES['pharmacist_pic']['name']; 
                                   
                                }else{
                                     $img = $this->input->post('hiddenPicture'); 
                                }
                            /**************************************************************/
                            /*                  End   Getting  Inputs Data                */
                            /**************************************************************/

                                $data = array
                                (
                                    'pharmacist_name'      => $pharmacist_name ?? null,
                                    'username'               => $username ?? null,
                                    'password'               => $password ?? null,
                                    'pharmacist_gender'    => $pharmacist_gender ?? null,
                                    'pharmacist_dob'       => $pharmacist_dob ?? null,
                                    'pharmacist_phone'     => $pharmacist_phone ?? null,
                                    'pharmacist_pic'       => $img ?? null,
                                    'pharmacist_address'   => $pharmacist_address ?? null,
                                    'status_id'              => $Status_id ?? null, 
                                );
                    
                            /**************************************************************/
                            /*      Create & Updated With  Check Pharamcists Edit Id    */
                            /**************************************************************/
                                if( $this->input->post('hiddenId')  && !empty($this->input->post('hiddenId')))
                                {
                                    $where = array('pharmacist_id'=> $this->input->post('hiddenId')); 
                                    $result = $this->Database->update('pharamcists',$where,$data);
                                  
                                }else{
                                    $result = $this->Database->insert('pharamcists',$data);
                                } 

                                if($result)
                                { 
                                    if($this->input->post('hiddenId') && !empty($this->input->post('hiddenId') ))
                                    {
                                        $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Pharmacists Updated successfully!</div>');
                                        redirect('Pharmacists');
                                    }else{
                                        $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Pharmacists Created successfully!</div>');
                                        redirect('Pharmacists');
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
                                /*   End  Create & Updated With  Check Receptionists Edit Id  */
                                /**************************************************************/
                        }
                                    
                    }else{
                            
                            /**************************************************************/
                            /*                     Getting  Inputs Data                   */
                            /**************************************************************/

                            $pharmacist_name = $this->input->post('pharmacist_name');
                            $username = $this->input->post('username');
                            $pharmacist_phone = $this->input->post('pharmacist_phone');
                            $pharmacist_dob = $this->input->post('pharmacist_dob');
                            $pharmacist_gender = $this->input->post('pharmacist_gender');
                            $pharmacist_address = $this->input->post('pharmacist_address');
                            $Status_id = $this->input->post('status_id');
                            $password = $this->input->post('password');
                            $img = $this->input->post('hiddenPicture'); 
                            

                        /**************************************************************/
                        /*                  End   Getting  Inputs Data                */
                        /**************************************************************/

                            $data = array
                            (
                                'pharmacist_name'      => $pharmacist_name ?? null,
                                'username'               => $username ?? null,
                                'password'               => $password ?? null,
                                'pharmacist_gender'    => $pharmacist_gender ?? null,
                                'pharmacist_dob'       => $pharmacist_dob ?? null,
                                'pharmacist_phone'     => $pharmacist_phone ?? null,
                                'pharmacist_pic'       => $img ?? null,
                                'pharmacist_address'   => $pharmacist_address ?? null,
                                'status_id'              => $Status_id ?? null, 
                            );
                
                        /**************************************************************/
                        /*      Create & Updated With  Check Receptionists Edit Id    */
                        /**************************************************************/
                            if( $this->input->post('hiddenId')  && !empty($this->input->post('hiddenId')))
                            {
                             
                                $where = array('pharmacist_id'=> $this->input->post('hiddenId') );
                                $result = $this->Database->update('pharamcists',$where,$data);
                            }else{
                                $result = $this->Database->insert('pharamcists',$data);
                            } 

                            if($result)
                            { 
                                if($this->input->post('hiddenId') && !empty($this->input->post('hiddenId') ))
                                {
                                    $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Pharmacists Updated successfully!</div>');
                                    redirect('Pharmacists');
                                }else{
                                    $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Pharmacists Created successfully!</div>');
                                    redirect('Pharmacists');
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
                            /*   End  Create & Updated With  Check Receptionists Edit Id  */
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
   /*            Change Receptionists Status             */
   /******************************************************/

	public function status($pharmacist_id,$status_id){
		
		if($status_id == 1) $data = array('status_id'=>2);

		else if($status_id == 2) $data = array('status_id'=>1);
		
		$where = array('pharmacist_id'=>$pharmacist_id);
		$result = $this->Database->update("pharamcists",$where,$data);
		if($result){
			$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Pharmacists status changed successfully</div>');
			 redirect('Pharmacists');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Pharmacists status failed!</div>');
            if(isset($pharmacist_id) && !empty($pharmacist_id))
            {
                $this->edit($pharmacist_id);
            }else{
                $this->add();
            } 
		}

	}
  /***************************************************************/
  /*                End Change Receptionists Status              */
  /***************************************************************/

}
