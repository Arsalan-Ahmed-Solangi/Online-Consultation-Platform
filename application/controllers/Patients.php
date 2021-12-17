<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct(); 
        $this->load->model('Database');
	}
	// public function add()
	// {	
	// 	$title['title'] = "Add Patient";
       
	// 	$this->load->view('Includes/header',$title);
 //        $this->load->view('Includes/header2',$title);
	// 	$this->load->view('Admin/navigation',$title);
	// 	$this->load->view('Admin/sidebar',$title); 
	// 	$this->load->view('Admin/add_patient');
	// 	$this->load->view('Includes/footer.php');
	// }
	 
	// public function view()
	// {	
	// 	$title['title'] = "View Patient";
       
	// 	$this->load->view('Includes/header',$title);
 //        $this->load->view('Includes/header2',$title);
	// 	$this->load->view('Admin/navigation',$title);
	// 	$this->load->view('Admin/sidebar',$title);


	// 	$this->load->view('Admin/view_patient');
	// 	$this->load->view('Includes/footer.php');
	// }
 
}
