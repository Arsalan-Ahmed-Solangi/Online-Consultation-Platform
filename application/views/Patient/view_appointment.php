
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
          <div class="card"> 
          <div class="card-header ">
          <h4 class='text-dark'> <i class="fa fa-eye"></i> View Appointments</h4>
          </div>
          <div class="card-body">
              <table class="table table-borderless table-striped table-hover datatable">
                  <thead>
                    <tr>
                      <th>SR</th>
                      <th>Patient Name</th>
                      <th>Doctor Name</th>
                      <th>Appointment Date</th>
                      <th>Status</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                      foreach ($appointments ?? array() as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo ++$key?></td>
                          <td><?php echo $value['patient_name']?></td>
                          <td><?php echo $value['doctor_name']?></td>
                          <td><?php echo $value['appointment_date']?></td>
                          <td>
                            <?php 


                              if($value['appointment_status'] == "Pending" || $value['appointment_status'] == "pending"){

                                ?>
                                <span class="badge bg-warning"><?php echo $value['appointment_status']?></span>
                                <?php

                              }else if($value['appointment_status'] == "Confirmed"){

                                ?>
                                <span class="badge bg-success"><?php echo $value['appointment_status']?></span>
                                <?php

                              }else if($value['appointment_status'] == "Cancelled"){
                                ?>
                                <span class="badge bg-danger"><?php echo $value['appointment_status']?></span>
                                <?php
                              }

                            ?>
                            
                          </td>
                          
                        </tr>
                        <?php
                      }

                    ?>
                  </tbody>
              </table>
          </div>
        </div>
       <!-- End Left side columns -->

      </div>
    </section>


  <!-- Start of Footer -->
  <?php  include_once 'footer.php';?>
  <!-- End of Footer -->

  </main><!-- End #main -->
