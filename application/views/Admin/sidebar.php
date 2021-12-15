<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
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
            <a href="<?=base_url()?>addDepartment"> 
              <i class="fa fa-plus-circle" style="font-size:12px"></i><span>Add Department</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>viewDepartment">
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
            <a href="<?=base_url()?>addDoctors">
              <i class="bi bi-circle"></i><span>Add Doctors</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>viewDoctors">
              <i class="bi bi-circle"></i><span>View Doctors</span>
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
            <a href="<?=base_url()?>addPatient">
              <i class="bi bi-circle"></i><span>Add Patient</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>viewPatient">
              <i class="bi bi-circle"></i><span>View Patient</span>
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
            <a href="<?=base_url()?>addAppointment">
              <i class="bi bi-circle"></i><span>Add Appointment</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>viewAppointments">
              <i class="bi bi-circle"></i><span>View Appointment</span>
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
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-stethoscope"></i><span>Prescriptions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-users"></i><span>Human Resources</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="fa fa-user" style="font-size:12px"></i><span>Nurse</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="fa fa-user" style="font-size:12px"></i><span>Receptionists</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="fa fa-user" style="font-size:12px"></i><span>Pharmacists</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->


	
			<li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="fa fa-medkit"></i>
          <span>Medicines</span>
        </a>
      </li>

			<li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="fa fa-tint"></i>
          <span>Blood Bank</span>
        </a>
      </li>

			<li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="fa fa-bell"></i>
          <span>Notices</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="fa fa-cog"></i>
          <span>Website Settings</span>
        </a>
      </li>

    </ul>

  </aside>
