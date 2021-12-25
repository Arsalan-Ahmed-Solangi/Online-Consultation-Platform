
  <!-- Start of Header-->
  <?php  include_once 'header.php' ?>
  <!-- End of Header -->

  <!-- Start of Sidebar-->
  <?php include_once 'sidebar.php' ?>
  <!-- End of Sidebar-->

  <main id="main" class="main">

   

    <section class="section dashboard">
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
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

          <div class="card"> 
            <div class="card-header ">
            <h4 class='text-dark'> <i class="fa fa-edit"></i> Edit Profile</h4>
            </div>
            <div class="card-body">
               <form action="<?php echo base_url('Doctor_dashboard/updateProfile/').$doctor[0]['doctor_id'] ?>" method="POST" id="form">
                <div class="row mt-2">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group ">
                        <label>Username <span class="text-danger">*</span></label>
                        <input value="<?php echo $doctor[0]['username']?>" type="email" required name="username" class="form-control" placeholder="Enter Username">
                          <?php echo form_error('username') ?>
                      </div>

                  </div>  
                  <div class="col-lg-6 col-md-6 col-sm-12">
                      <button class="btn btn-primary mt-4" type="submit" name="editProfile">Save</button>
                  </div>
                </div>
                </form>
            </div>
          </div>

           <div class="card"> 
            <div class="card-header ">
            <h4 class='text-dark'> <i class="fa fa-key"></i> Change Password</h4>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url('Doctor_dashboard/changePassword');?>" method="POST" > 
                <div class="row mt-2">
                  <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Old Password <span class="text-danger">*</span></label>
                      <input  type="password" maxlength="20" name="oldpassword"  placeholder="Enter your old password"  class="form-control"> 
                      <?php echo form_error('oldpassword') ?>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>New Password <span class="text-danger">*</span></label>
                      <input  type="password" maxlength="20" name="newpassword"  placeholder="Enter your new password"  class="form-control"> 
                        <?php echo form_error('newpassword') ?>
                    </div>
                  </div>
                </div>

                <div class="row mt-2">
                  <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Confirm Password <span class="text-danger">*</span></label>
                      <input  type="password" maxlength="20" name="confirmpassword"  placeholder="Confirm your password"  class="form-control"> 
                        <?php echo form_error('confirmpassword') ?>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 col-lg-12 col-sm-12 offset-md-10">
                    <div class="form-group mt-3">
                    
                      <button type="submit"  name="editProfile" class="btn btn-primary">Save</button> 

                    </div>
                  </div>
                </div>
                </form>
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
