<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url('Patient_dashboard');?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-address-card"></i><span>Appointments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url('Patient_dashboard/viewAppointments')?>">
               <i class="fa fa-plus-circle" style="font-size:12px"></i><span>Add Appointment</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('Patient_dashboard/viewAppointments')?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Appointment</span>
            </a>
          </li>
          <!-- <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li> -->
        </ul>
      </li>
     
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-user-md"></i><span>Doctors</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
     
          <li>
            <a href="<?=base_url('Patient_dashboard/viewDoctors')?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Doctors</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-users"></i><span>Prescriptions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>viewPatient">
              <i class="fa fa-eye"></i><span>View Prescriptions</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->


      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav_notices" data-bs-toggle="collapse" href="#">
          <i class="fa fa-bell"></i><span>Notices</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav_notices" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a  href="<?=base_url('Notices')?>">
              <i class="fa fa-eye" style="font-size:12px"></i><span>View Notices</span>
            </a>
          </li> 
        </ul>
      </li>
      
    </ul>

  </aside>
