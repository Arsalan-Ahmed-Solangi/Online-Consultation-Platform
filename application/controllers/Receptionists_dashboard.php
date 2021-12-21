Receptionists_dashboard
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receptionists_dashboard extends CI_Controller {


	//***Start of Constructor******//
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database');

		// **Start of Check Session****//
		if(!$receptionist = $this->session->userdata('receptionist')){
			redirect('Login');
		}
		// **End of Check Session*****//


	}
	//**End of Constructor*******//

	//****Start of Receptionists  Dashboard*******//
    public function index()
	{	


		//****Start of Count Doctors , Patients , Appointments********//
		// $doctors = $this->Database->selectAll("doctors",array("doctor_status !=" => 3));
		// $patients = $this->Database->selectAll("patients",array("status_id !=" => 3));
		// $appointments = $this->Database->selectAll("appointments",array("status_id !=" => 3));
		//****End of Count Doctors , Patients , Appointiments*********//

		//***Start of Get Enquiries******//
		$data['enquiries'] = $this->Database->select('enquiries');
		//***End of Get Enquiries*******//

		// $data['doctors'] = count($doctors);
		// $data['patients'] = count($patients);
		// $data['appointments'] = count($appointments);

		$title['title'] = "Dashboard";
		$this->load->view('Includes/header',$title);
		$this->load->view('Receptionists/dashboard',$data);
		$this->load->view('Includes/footer');
	}
	//****End of Receptionists Dashboard*********//

  /***************************************************************/
  /*                         View Notices                        */
  /***************************************************************/
  
  public function viewNotices()
  {
	  $data['notices'] = $this->Database->select('notices',array('status_id'!=3));
	  $data['title'] = "Notices";
	  $this->load->view('Includes/header',$data);
	  $this->load->view('Receptionists/view_notices',$data);
	  $this->load->view('Includes/footer');
  }
/***************************************************************/
/*                    End  View Notices                        */
/***************************************************************/

/***************************************************************/
/*                         Listing Patients                    */
/***************************************************************/
  
  public function viewPatients()
  {
	  $data['patients'] = $this->Database->select('patients',array('status_id'!=3));
	  $data['title'] = "Patients";
	  $this->load->view('Includes/header',$data);
	  $this->load->view('Receptionists/view_patients',$data);
	  $this->load->view('Includes/footer');
  }

/***************************************************************/
/*                    End  Listing Patients                    */
/***************************************************************/

/***************************************************************/
/*                         Show Patients                      */
/***************************************************************/
  
  public function showPatients($id)
  {
	 
	$data['patients'] = $this->Database->selectWhere('patients',array('patient_id'=>$id));
 
	  $title['title'] = "Patients";
	  $this->load->view('Includes/header',$title);
	  $this->load->view('Receptionists/show_patients',$data);
	  $this->load->view('Includes/footer');
  }
  
/***************************************************************/
/*                    End  Show Patients                       */
/***************************************************************/


/***************************************************************/
/*                         Listing Doctors                    */
/***************************************************************/
  
public function viewDoctors()
{
	$data = array
	( 
		'doctor_status'  => 1, 
	);	 
	$data['doctors'] = $this->Database->selectAll('doctors',$data);
	$data['title'] = "Doctors";
	$this->load->view('Includes/header',$data);
	$this->load->view('Receptionists/view_doctors',$data);
	$this->load->view('Includes/footer');
}

/***************************************************************/
/*                    End  Listing Doctors                    */
/***************************************************************/

/***************************************************************/
/*                         Show Doctors                      */
/***************************************************************/
  
public function showdDoctors($id)
{
   
//   $data['doctors'] = $this->Database->selectWhere('doctors',array('doctor_id'=>$id));
  $join = "doctors.dept_id = departments.dept_id";
  $data['doctor'] = $this->Database->selectJoin('doctors','departments',$join,array('doctor_status != '=>3,'doctor_id'=>$id));


	$title['title'] = "Doctors";
	$this->load->view('Includes/header',$title);
	$this->load->view('Receptionists/show_doctors',$data);
	$this->load->view('Includes/footer');
}

/***************************************************************/
/*                    End  Show Doctors                        */
/***************************************************************/
 
}
