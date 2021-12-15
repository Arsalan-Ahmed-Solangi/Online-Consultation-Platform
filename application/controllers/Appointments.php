<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct(); 
        $this->load->model('Database');
	}
	public function add()
	{	
		$title['title'] = "Add Appointment";
       
		$this->load->view('Includes/header',$title);
        $this->load->view('Includes/header2',$title);
		$this->load->view('Admin/navigation',$title);
		$this->load->view('Admin/sidebar',$title); 
		$this->load->view('add_appointment');
		$this->load->view('Includes/footer.php');
	}
	 
	public function view()
	{	
		$title['title'] = "View Appointments";
       
		$this->load->view('Includes/header',$title);
        $this->load->view('Includes/header2',$title);
		$this->load->view('Admin/navigation',$title);
		$this->load->view('Admin/sidebar',$title);


		$this->load->view('view_appointment');
		$this->load->view('Includes/footer.php');
	}
 
}
