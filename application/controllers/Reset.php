<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends CI_Controller {

	//***Start of Constructor*******//
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database');

	}
	//***End of Constructor*********//

	//****Start of Reset Password Page*******//
	public function index()
	{	 
		$roles = $this->Database->select("roles");
		$roles['roles'] = $roles;
		$title['title'] = "Reset Password";
		$this->load->view('Includes/header.php',$title);
		$this->load->view('forgot_password',$roles);
		$this->load->view('Includes/footer.php');
	}
	//****End of Reset Page*********//

	//****Start of Add Department********//
	public function forgotPassword()
	{
		$title['title'] = "forgot";
	
		if($this->input->post('username'))
		{
			$dataArray = $this->input->post();
			$tableName='';
			if(isset($dataArray['role']) && $dataArray['role'] ==1)
			{
				$tableName='admins';
			}else if(isset($dataArray['role']) && $dataArray['role'] ==2){
				$tableName='doctors';
			}else if(isset($dataArray['role']) && $dataArray['role'] ==3){
				$tableName='patients';
			}
			else if(isset($dataArray['role']) && $dataArray['role'] ==4){
				$tableName='receptionists';
			}
			
			$users = $this->Database->selectWhere($tableName,array('username'=>$dataArray['username']));
			$users['users'] = $users;
		 
			$this->load->view('Includes/header',$title);
			$this->load->view('forgot_password',$users);
			$this->load->view('Includes/footer');

		}else{
			$this->index();
		}
		
		
		
	}
	//***End of Add Department**********//

}
