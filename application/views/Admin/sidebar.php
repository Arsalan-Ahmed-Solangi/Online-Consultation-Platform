<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url('Admin');?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Departments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url('Departments/add')?>"> 
              <i class="fa fa-plus-circle" style="font-size:12px"></i><span>Add Department</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('Departments')?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Departments</span>
            </a>
          </li>
			 </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-user-md"></i><span>Doctors</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>	 
            <a href="<?=base_url('Doctors/add')?>">
              <i class="fa fa-plus-circle" style="font-size:12px"></i><span>Add Doctors</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('Doctors')?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Doctors</span>
            </a>
          </li>
          <!-- <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li> -->
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-users"></i><span>Patients</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('Patients/add');?>">
               <i class="fa fa-plus-circle" style="font-size:12px"></i>Add Patient</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('Patients');?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Patient</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-address-card"></i><span>Appointments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url('Appointments/add')?>">
               <i class="fa fa-plus-circle" style="font-size:12px"></i><span>Add Appointment</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('Appointments')?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Appointment</span>
            </a>
          </li>
          <!-- <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li> -->
        </ul>
      </li><!-- End Charts Nav -->

			<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Prescriptions" data-bs-toggle="collapse" href="#">
          <i class="fa fa-stethoscope"></i><span>Prescriptions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Prescriptions" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>addAppointment">
               <i class="fa fa-plus-circle" style="font-size:12px"></i><span>Add Prescriptions</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>viewAppointments">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Prescriptions</span>
            </a>
          </li>
        </ul>
      </li>

         <li class="nav-item">
          <hr/>
         </li>
	
			
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav_rec" data-bs-toggle="collapse" href="#">
          <i class="fa fa-user"></i><span>Receptionists</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav_rec" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a  href="<?php echo base_url('Receptionists/add');?>">
              <i class="fa fa-plus-circle" style="font-size:12px"></i><span>Add Receptionist</span>
            </a>
          </li>
          <li>
            <a  href="<?=base_url('Receptionists')?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Receptionists</span>
            </a>
          </li> 
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav_phr" data-bs-toggle="collapse" href="#">
          <i class="fa fa-user"></i><span>Pharmacists</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav_phr" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a  href="<?php echo base_url('Pharmacists/add');?>">
              <i class="fa fa-user" style="font-size:12px"></i><span>Add Pharmacist</span>
            </a>
          </li>
          <li>
            <a  href="<?=base_url('Pharmacists')?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Pharmacists</span>
            </a>
          </li> 
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav_notices" data-bs-toggle="collapse" href="#">
          <i class="fa fa-bell"></i><span>Notices</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav_notices" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a  href="<?php echo base_url('Notices/add');?>">
              <i class="fa fa-plus-circle" style="font-size:12px"></i><span>Add Notice</span>
            </a>
          </li>
          <li>
            <a  href="<?=base_url('Notices')?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Notices</span>
            </a>
          </li> 
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav_faq" data-bs-toggle="collapse" href="#">
          <i class="bi bi-question-circle"></i><span>F.A.Q</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav_faq" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a  href="<?php echo base_url('Faq/add');?>">
              <i class="fa fa-plus-circle" style="font-size:12px"></i><span>Add Faq</span>
            </a>
          </li>
          <li>
            <a  href="<?=base_url('Faq')?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Faq</span>
            </a>
          </li> 
        </ul>
      </li>
     


     <!--  <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="fa fa-cog"></i>
          <span>Website Settings</span>
        </a>
      </li> -->

    </ul>

  </aside>
