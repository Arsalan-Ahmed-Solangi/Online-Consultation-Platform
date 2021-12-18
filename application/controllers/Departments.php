<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct(); 
        $this->load->model('Database');
	}

	//****End of Constructor*******//

	//***Start of View Departments********//
	public function index(){


		$title['title'] = "Dashboard";
		$this->load->view('Includes/header',$title);
		$this->load->view('Admin/view_departments');
		$this->load->view('Includes/footer');
		
	}
	//***End of View Departments********//
	// public function add()
	// {	
	// 	$title['title'] = "Add Department";
       
	// 	$this->load->view('Includes/header',$title);
 //        $this->load->view('Includes/header2',$title);
	// 	$this->load->view('Admin/navigation',$title);
	// 	$this->load->view('Admin/sidebar',$title); 
	// 	$this->load->view('Admin/add_department');
	// 	$this->load->view('Includes/footer.php');
	// }
	 
	// public function view()
	// {	
	// 	$title['title'] = "View Department";
       
	// 	$this->load->view('Includes/header',$title);
 //        $this->load->view('Includes/header2',$title);
	// 	$this->load->view('Admin/navigation',$title);
	// 	$this->load->view('Admin/sidebar',$title); 
	// 	$this->load->view('Admin/view_department');
	// 	$this->load->view('Includes/footer.php');
	// }
 
}
