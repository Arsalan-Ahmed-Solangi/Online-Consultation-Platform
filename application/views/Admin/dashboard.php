
  <!-- Start of Header-->
  <?php  include_once 'header.php' ?>
	<!-- End of Header -->

  <!-- Start of Sidebar-->
  <?php include_once 'sidebar.php' ?>
	<!-- End of Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!--Start of Show Total Patients -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

               

                <div class="card-body">
                  <h5 class="card-title">Patients <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-users"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End of Show Total Patients -->

            <!-- Start of Show Total Doctors -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

              

                <div class="card-body">
                  <h5 class="card-title">Doctors <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-user-md"></i>
                    </div>
                    <div class="ps-3">
                      <h6>20</h6>
                     
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End of Show Total Doctors -->

            <!-- Start of Show Total Appointments  -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Appointments <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-address-card text-danger"></i>
                    </div>
                    <div class="ps-3">
                      <h6>20</h6>
                     
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End of Show Total Appointments -->

  
            <!--Start of Show Total Enquiries -->
            <div class="col-12">
              <div class="card recent-sales">

              
                <div class="card-body">
                  <h5 class="card-title"><i class="fa fa-question-circle"></i> Enquiries</h5>

                  <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                      <tr>
                        <th scope="col">SR</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                    

                      foreach ($enquiries as $key => $value) {
                          ?>
                           <tr align="center">
                            <th scope="row"><a href="#"><?php echo ++$key ?></a></th>
                            <td><b><?php echo  $value['fullname'] ?></b></td>
                            <td><?php echo  $value['email'] ?></td>
                            <td><?php echo  $value['message'] ?></td>
                            <td>
                              <a href="" class="text-danger" style="font-size: 18px;"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php
                        }

                      ?>
                     
                     
  
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
            <!-- End of Show Total Enquiries-->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


  