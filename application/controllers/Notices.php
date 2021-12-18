<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notices extends CI_Controller {


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
    /*                     Notice  Listing                        */
    /**************************************************************/

        public function index()
        {	 
            //***Start of Get Notices******//
            $data['notices'] = $this->Database->select('notices',array('status_id'!=3));
            //***End of Get Notices*******// 
            $title['title'] = "Notices";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/view_notices',$data);
            $this->load->view('Includes/footer');
        }

	/**************************************************************/
    /*                    End Notice  Listing                     */
    /**************************************************************/


    /**************************************************************/
    /*                     Notice Add View                        */
    /**************************************************************/
	
        public function add()
        {
            $title['title'] = "Notices";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/add_notices',$title);
            $this->load->view('Includes/footer');
        }
    
    /**************************************************************/
    /*                    End Notice Add View                     */
    /**************************************************************/

    /**************************************************************/
    /*                     Notice Notice View                     */
    /**************************************************************/

        public function edit($id=''){
            $data['notices'] = $this->Database->selectWhere('notices',array('notice_id'=>$id));
            $title['title'] = "Edit Notices";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/add_notices',$data);
            $this->load->view('Includes/footer');  
        }

    /**************************************************************/
    /*                   End  Notice Edit View                    */
    /**************************************************************/

    /**************************************************************/
    /*                     Save & Update Data                     */
    /**************************************************************/

	public function save()
	{	 
        if($this->input->post() && !empty($this->input->post()))
        {
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
            $this->form_validation->set_rules('notice_title', 'Notice title', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('notice_desc','Notice description','required');
            $this->form_validation->set_rules('Status_id','Faq status','required'); 
           //***Start of Check Valdiation********//
            if($this->form_validation->run() == FALSE){
                if($this->input->post('hiddenNoticeid') && !empty($this->input->post('hiddenNoticeid') ))
                {   
                    $id = $this->input->post('hiddenNoticeid');
                    $this->edit($id);
                }else{
                    $this->add();
                }
            }else{

                    /**************************************************************/
                    /*                     Getting  Inputs Data                   */
                    /**************************************************************/
                 
                        $title_name = $this->input->post('notice_title');
                        $tile_desc = $this->input->post('notice_desc');
                        $status_id = $this->input->post('Status_id');

                    /**************************************************************/
                    /*                  End   Getting  Inputs Data                */
                    /**************************************************************/

                        $data = array
                        (
                            'notice_title'     => $title_name ?? null,
                            'notice_desc'      => $tile_desc ?? null,
                            'status_id'        => $status_id,
                        );
                    
                    /**************************************************************/
                    /*             Create & Updated With  Check Notice Edit Id    */
                    /**************************************************************/
                    
                        if($this->input->post('hiddenNoticeid') && !empty($this->input->post('hiddenNoticeid') ))
                        { 
                            $where = array('notice_id'=> $this->input->post('hiddenNoticeid') );
                            $result = $this->Database->update('notices',$where,$data);
                        }else{
                            $result = $this->Database->insert('notices',$data);
                        } 

                        if($result)
                        {
                            if($this->input->post('hiddenNoticeid') && !empty($this->input->post('hiddenNoticeid') ))
                            {
                                $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Notices Updated successfully!</div>');
                                redirect('Notices');
                            }else{
                                $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Notices Created successfully!</div>');
                                redirect('Notices');
                            }  
                        }else{
                                 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
                                if($this->input->post('hiddenNoticeid')  && !empty($this->input->post('hiddenNoticeid') ))
                                {
                                    $id = $this->input->post('hiddenNoticeid');
                                    $this->edit($id);
                                }else{
                                    $this->add();
                                } 
                        }	

                    /**************************************************************/
                    /*      End  Create & Updated With  Check Notice Edit Id      */
                    /**************************************************************/
                }
        }else{
            $this->add();
        } 
	}
   /***************************************************************/
    /*                 End   Save & Update Data                  */
    /**************************************************************/

    
   /******************************************************/
   /*                   Change Notice Status             */
   /******************************************************/

	public function status($notice_id,$status_id){
		
		if($status_id == 1) $data = array('status_id'=>2);

		else if($status_id == 2) $data = array('status_id'=>1);
		
		$where = array('notice_id'=>$notice_id);
		$result = $this->Database->update("notices",$where,$data);
		if($result){
			$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Notice status changed successfully</div>');
						  redirect('Notices');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Notice status failed!</div>');
            if(isset($notice_id) && !empty($notice_id))
            {
                $this->edit($notice_id);
            }else{
                $this->add();
            } 
		}

	}
  /***************************************************************/
  /*                End Change Notice Status                    */
  /**************************************************************/

}
