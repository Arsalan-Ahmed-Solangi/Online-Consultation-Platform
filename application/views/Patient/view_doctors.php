<!-- Start of Header-->
<header id="header" class="header fixed-top d-flex align-items-center">


<!-- Start of Sidebar Top -->
<div class="d-flex align-items-center justify-content-between">
<a href="index.html" class="logo d-flex align-items-center">

<span class="d-none d-lg-block">PATIENT PANEL</span>
</a>
<i class="bi bi-list toggle-sidebar-btn"></i>
</div>
<!-- End of Sidebar Logo -->


<!-- Start of Navigation -->
<?php include_once 'navigation.php';?>
<!-- End of Navigation -->

</header>
<!-- End of Header -->

<!-- Start of Sidebar-->
<?php include_once 'sidebar.php' ?>
<!-- End of Sidebar-->
<!-- End of Header  -->
<main id="main" class="main"  >  
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
             <h4 class='text-dark'> <i class="fa fa-users"></i> View Doctors</h4>
          </div>
            <div class="card-body">
                <table class="table table-borderless table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th>SR</th>
                                <th>Name</th>
                                <th>Username </th>
                            
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                          
                                foreach ($doctors ?? array() as $key => $value) {
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo ++$key?></td>
                                        <td><?php echo $value['doctor_name']?></td>
                                        <td><?php echo $value['username']?></td>
                                          
                                        <td>
                                            <?php 

                                                if($value['doctor_status'] == 1){
                                                    ?>
                                                    <span class="badge bg-success">Active</span>
                                                    <?php
                                                }else if($value['doctor_status'] == 2){
                                                        ?>
                                                    <span class="badge bg-danger">Inactive</span>
                                                    <?php
                                                }

                                            ?>
                                        </td>
                                        <td>

                                                                                         <a href="<?php echo base_url('Patient_dashboard/showDoctors/').$value['doctor_id'];?>" class="badge bg-dark"><i class="fa fa-eye"></i></a>
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
