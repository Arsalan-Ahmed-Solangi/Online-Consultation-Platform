<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct(); 
        $this->load->model('Database');
	}
	// public function add()
	// {	
	// 	$title['title'] = "Add Doctors";
       
	// 	$this->load->view('Includes/header',$title);
 //        $this->load->view('Includes/header2',$title);
	// 	$this->load->view('Admin/navigation',$title);
	// 	$this->load->view('Admin/sidebar',$title); 
	// 	$this->load->view('Admin/add_doctors');
	// 	$this->load->view('Includes/footer.php');
	// }
	 
	// public function view()
	// {	
	// 	$title['title'] = "View Doctors";
       
	// 	$this->load->view('Includes/header',$title);
 //        $this->load->view('Includes/header2',$title);
	// 	$this->load->view('Admin/navigation',$title);
	// 	$this->load->view('Admin/sidebar',$title);


	// 	$this->load->view('Admin/view_doctors');
	// 	$this->load->view('Includes/footer.php');
	// }
 
}
