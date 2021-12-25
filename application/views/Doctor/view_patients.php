
  <!-- Start of Header-->
  <?php  include_once 'header.php' ?>
  <!-- End of Header -->

  <!-- Start of Sidebar-->
  <?php include_once 'sidebar.php' ?>
  <!-- End of Sidebar-->

<!-- End of Header  -->
<main id="main" class="main"	>  
<section class="section dashboard">


<div class="container">
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
             <h4 class='text-dark'> <i class="fa fa-eye"></i> View <?=isset($title)?$title:''?></h4>
          </div>
            <div class="card-body">
                <table class="table table-borderless table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th>SR</th>
                                <th>Patients Name</th>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                foreach ($patients as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$key?></td>
                                        <td><?php echo $value['patient_name']?></td>
                                        <td><?php echo $value['username']?></td>
                                        <td><?php echo $value['patient_phone']?></td>

                                        <td>
                                            <?php 

                                                if($value['status_id'] == 1){
                                                    ?>
                                                    <span class="badge bg-success">Active</span>
                                                    <?php
                                                }else if($value['status_id'] == 2){
                                                        ?>
                                                    <span class="badge bg-danger">Inactive</span>
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
</div>	

</section> 
<!-- Start of Footer -->
<?php  include_once 'footer.php';?>
<!-- End of Footer -->

</main> 
