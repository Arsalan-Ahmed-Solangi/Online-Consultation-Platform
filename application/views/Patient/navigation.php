<nav class="header-nav ms-auto">

      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center " href="#" data-bs-toggle="dropdown">
            <?php $name = $this->session->userdata('patient')['patient_name'] ?>
            <?php echo strtoupper($name)?> <i class="fa fa-angle-down p-1"></i> 
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            
           
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('Admin/profile')?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            

           
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('Logout')?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav>
