<!-- Start of Header-->
<header id="header" class="header fixed-top d-flex align-items-center">


<!-- Start of Sidebar Top -->
<div class="d-flex align-items-center justify-content-between">
<a href="index.html" class="logo d-flex align-items-center">

<span class="d-none d-lg-block">ADMIN PANEL</span>
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
                                <th>Pharmacists  Name</th>
                                <th>Username</th>
                                <th>Pharmacists Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                foreach ($pharamcists as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$key?></td>
                                        <td><?php echo $value['pharmacist_name']?></td>
                                        <td><?php echo $value['username']?></td>
                                        <td><?php echo $value['pharmacist_phone']?></td>

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
                                        <td>

                                            <?php 

                                                if($value['status_id'] == 1){
                                                    ?>
                                                    <a href="<?php echo base_url('Pharmacists/status/').$value['pharmacist_id'].'/'.$value['status_id'];?>" class="badge bg-danger">Inactive</a>
                                                    <?php
                                                }else if($value['status_id'] == 2){
                                                    ?>
                                                    <a href="<?php echo base_url('Pharmacists/status/').$value['pharmacist_id'].'/'.$value['status_id'];?>" class="badge bg-success">Active</a>
                                                    <?php
                                                }	

                                            ?>
                                            <a href="<?php echo base_url('Pharmacists/edit/').$value['pharmacist_id'];?>" class="badge bg-primary"><i class="fa fa-edit"></i></a>
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
