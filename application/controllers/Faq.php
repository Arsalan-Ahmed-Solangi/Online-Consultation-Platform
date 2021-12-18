<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {


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
    /*                     Faq  Listing                           */
    /**************************************************************/

        public function index()
        {	 
            //***Start of Get Faq******//
            $data['faq'] = $this->Database->select('faqs',array('status_id'!=3));
            //***End of Get Faq*******// 
            $title['title'] = "FAQ";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/view_faq',$data);
            $this->load->view('Includes/footer');
        }

	/**************************************************************/
    /*                    End Faq  Listing                        */
    /**************************************************************/


    /**************************************************************/
    /*                     Faq Add View                          */
    /**************************************************************/
	
        public function add()
        {
            $title['title'] = "Faq";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/add_faq',$title);
            $this->load->view('Includes/footer');
        }
    
    /**************************************************************/
    /*                    End Faq Add View                        */
    /**************************************************************/

    /**************************************************************/
    /*                     Faq Edit View                          */
    /**************************************************************/

        public function edit($id=''){
            $data['faq'] = $this->Database->selectWhere('faqs',array('faq_id'=>$id));
            $title['title'] = "Edit Faq";
            $this->load->view('Includes/header',$title);
            $this->load->view('Admin/add_faq',$data);
            $this->load->view('Includes/footer');  
        }

    /**************************************************************/
    /*                   End  Faq Edit View                       */
    /**************************************************************/

    /**************************************************************/
    /*                     Save & Update Data                     */
    /**************************************************************/

	public function save()
	{	 
        if($this->input->post() && !empty($this->input->post()))
        {
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger error" >','</div>');
            $this->form_validation->set_rules('faq_name', 'Faq title', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('faq_desc','Faq description','required');
            $this->form_validation->set_rules('Status_id','Faq status','required'); 
           //***Start of Check Valdiation********//
            if($this->form_validation->run() == FALSE){
                if($this->input->post('hiddenFaqid') && !empty($this->input->post('hiddenFaqid') ))
                {   
                    $id = $this->input->post('hiddenFaqid');
                    $this->edit($id);
                }else{
                    $this->add();
                }
            }else{

                    /**************************************************************/
                    /*                     Getting  Inputs Data                   */
                    /**************************************************************/
                 
                        $title_name = $this->input->post('faq_name');
                        $tile_desc = $this->input->post('faq_desc');
                        $status_id = $this->input->post('Status_id');

                    /**************************************************************/
                    /*                  End   Getting  Inputs Data                */
                    /**************************************************************/

                        $data = array
                        (
                            'faq_title'     => $title_name ?? null,
                            'faq_desc'     => $tile_desc ?? null,
                            'status_id'     => $status_id,
                        );
                    
                    /**************************************************************/
                    /*             Create & Updated With  Check Faq Edit Id       */
                    /**************************************************************/
                    
                        if($this->input->post('hiddenFaqid') && !empty($this->input->post('hiddenFaqid') ))
                        { 
                            $where = array('faq_id'=> $this->input->post('hiddenFaqid') );
                            $result = $this->Database->update('faqs',$where,$data);
                        }else{
                            $result = $this->Database->insert('faqs',$data);
                        } 

                        if($result)
                        {
                            if($this->input->post('hiddenFaqid') && !empty($this->input->post('hiddenFaqid') ))
                            {
                                $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Faq Updated successfully!</div>');
                                redirect('Faq');
                            }else{
                                $this->session->set_flashdata('success', '<div class="alert alert-success error" align="center"> Faq Created successfully!</div>');
                                redirect('Faq');
                            }  
                        }else{
                                 $this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Failed to created</div>');
                                if($this->input->post('hiddenFaqid')  && !empty($this->input->post('hiddenFaqid') ))
                                {
                                    $this->edit();
                                }else{
                                    $this->add();
                                } 
                        }	

                    /**************************************************************/
                    /*           End  Create & Updated With  Check Faq Edit Id   */
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
   /*                   Change Faq Status                */
   /******************************************************/

	public function status($faq_id,$status_id){

		
		if($status_id == 1) $data = array('status_id'=>2);

		else if($status_id == 2) $data = array('status_id'=>1);
		
		$where = array('faq_id'=>$faq_id);
		$result = $this->Database->update("faqs",$where,$data);
		if($result){
			$this->session->set_flashdata('success', '<div class="alert alert-success error" align="center">Faq status changed successfully</div>');
						  redirect('Faq');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger error" align="center">Faq status failed!</div>');
				$this->add();
		}

	}
  /***************************************************************/
  /*                 End   Change Faq Status                    */
  /**************************************************************/

}
