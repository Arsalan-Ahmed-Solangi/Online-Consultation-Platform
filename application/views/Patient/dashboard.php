
  <!-- Start of Header-->
  <?php  include_once 'header.php' ?>
	<!-- End of Header -->

  <!-- Start of Sidebar-->
  <?php include_once 'sidebar.php' ?>
	<!-- End of Sidebar-->

  <main id="main" class="main">

   

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
             <?php  
                  if(isset($_SESSION['success'])){
                      echo $_SESSION['success'];
                      unset($_SESSION['success']);
                  }else if(isset($_SESSION['error'])){
                      echo $_SESSION['error'];
                      unset($_SESSION['error']);
                  }
                  
              ?>
            <div class="card"> 
          <div class="card-header ">
          <h4 class='text-dark'> <i class="fa fa-info-circle"></i> Profile Details</h4>
          </div>
          <div class="card-body">
              <div class="row mt-2">
                <div class="col-md-4 col-lg-4 col-sm-12">
                  <?php 

                    if(!empty($patient[0]['patient_profile'])){
                      ?>
                       <img src="<?php echo base_url('assets/uploads/patients/'.$patient[0]['patient_profile'])?>" width="100%" class="img img-fluid img-responsive img-thumbnail shadow-sm">
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
                      <p><b>Full Name  :</b> <?php echo $patient[0]['patient_name']?></p>
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Username  :</b> <?php echo $patient[0]['username']?></p>
                    </div>
                  </div>


                  <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Gender  :</b> <?php echo $patient[0]['patient_gender']?></p>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Date of Birth  :</b> <?php echo $patient[0]['patient_dob']?></p>
                    </div>
                  </div>

                  <div class="row">
                   
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Phone No  :</b> <?php echo $patient[0]['patient_phone']?></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Address  :</b> <?php echo $patient[0]['patient_address']?></p>
                    </div>
                  </div>

                  <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Created At :</b> <?php echo $patient[0]['created_at']?></p>
                    </div>
                  </div>

                   <div class="col-lg-6 col-md-6 col-sm-12">
                      <p><b>Status  :</b>
                      <?php 

                              if($patient[0]['status_id'] == 1){
                                ?>
                                <span class="badge bg-success">Active</span>
                                <?php
                              }else if($patient[0]['status_id'] == 2){
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

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>


  <!-- Start of Footer -->
  <?php  include_once 'footer.php';?>
  <!-- End of Footer -->

  </main><!-- End #main -->
