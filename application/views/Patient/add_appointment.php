
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
          <div class="card"> 
          <div class="card-header ">
          <h4 class='text-dark'> <i class="fa fa-address-card"></i> Add Appointment</h4>
          </div>
          <div class="card-body">
              <form action="<?php echo base_url('patient_dashboard/createAppointment');?>" method="POST" id="form" >
                <div class="row mt-2">

                  <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Doctors<span class="text-danger">*</span></label>
                      <select name="doctor_id" required class="form-select" id="doctor_id">
                        <option value="">---SELECT DOCTOR---</option>
                        <?php 

                          foreach ($doctors as $key => $value) {
                            ?>
                            <option value="<?php echo $value['doctor_id']?>"><?php echo $value['doctor_name']?></option>
                            <?php
                          }

                        ?>
                      </select>
                      <?php echo form_error('doctor_id') ?>
                    </div>
                  </div>

                

                 

                </div>

                <div class="row mt-2">
                  <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label>Appointment Date <span class="text-danger">*</span></label>
                      <input type="date" name="date" class="form-control" required>
                      <?php echo form_error('date') ?>
                    </div>
                  </div>

                
                </div>
             

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 offset-md-10">
                    <div class="form-group mt-3">
                    
                      <button type="submit"  name="addAppointment" class="btn btn-primary">Create</button> 

                    </div>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </section>


  <!-- Start of Footer -->
  <?php  include_once 'footer.php';?>
  <!-- End of Footer -->

  </main><!-- End #main -->
