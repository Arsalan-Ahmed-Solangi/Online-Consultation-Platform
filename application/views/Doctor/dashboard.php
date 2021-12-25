
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
    <div class="card"> 
          <div class="card-header ">
          <h4 class='text-dark'> <i class="fa fa-info-circle"></i> Profile Details</h4>
          </div>
          <div class="card-body">
              <div class="row mt-2">
                <div class="col-md-4 col-lg-4 col-sm-12">
                  <?php 

                    if(!empty($doctor[0]['doctor_pic'])){
                      ?>
                       <img src="<?php echo base_url('assets/uploads/doctors/'.$doctor[0]['doctor_pic'])?>" width="100%" class="img img-fluid img-responsive img-thumbnail shadow-sm">
                      <?php
                    }else{
                      ?>
                       <img src="https://365psd.com/images/istock/previews/9734/97343531-businessman-profile-icon-man-avatar-picture-flat-design-vector-icon.jpg" width="100%" class="img img-fluid img-responsive img-thumbnail shadow-sm">
                      <?php
                    }

                  ?>
                 
                </div>
                <div class="col-md-8 col-lg-8 col-sm-12">
                  <div class="row mt-2">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Full Name  :</b> <?php echo $doctor[0]['doctor_name']?></p>
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Username  :</b> <?php echo $doctor[0]['username']?></p>
                    </div>
                  </div>


                  <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Gender  :</b> <?php echo $doctor[0]['doctor_gender']?></p>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Date of Birth  :</b> <?php echo $doctor[0]['doctor_dob']?></p>
                    </div>
                  </div>

                  <div class="row">
                   
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Phone No  :</b> <?php echo $doctor[0]['doctor_phone']?></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Address  :</b> <?php echo $doctor[0]['doctor_address']?></p>
                    </div>
                  </div>

                  <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Created At :</b> <?php echo $doctor[0]['created_at']?></p>
                    </div>
                  </div>

                   <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Status  :</b>
                      <?php 

                              if($doctor[0]['doctor_status'] == 1){
                                ?>
                                <span class="badge bg-success">Active</span>
                                <?php
                              }else if($doctor[0]['doctor_status'] == 2){
                                ?>
                                <span class="badge bg-danger">Inactive</span>
                                <?php
                              }

                            ?>
                      </p>
                    </div>


                </div>
              </div>
          </div>
        </div>
    </section>


  <!-- Start of Footer -->
  <?php  include_once 'footer.php';?>
  <!-- End of Footer -->

  </main><!-- End #main -->
