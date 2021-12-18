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
				 	<h4 class='text-dark'> <i class="fa fa-info-circle"></i> Doctor Details</h4>
				  </div>
					<div class="card-body">
				    	<div class="row mt-2">
				    		<div class="col-md-4 col-lg-4 col-sm-12">
				    			<img src="https://familydoctor.org/wp-content/uploads/2018/02/41808433_l.jpg" width="100%" class="img img-fluid img-responsive img-thumbnail shadow-sm">
				    		</div>
				    		<div class="col-md-8 col-lg-8 col-sm-12">
				    			<div class="row mt-2">
				    				<div class="col-lg-6 col-md-6 col-sm-12">
				    					<p><b>Full Name  :</b> <?php echo $doctor[0]['doctor_name']?></p>
				    				</div>
				    				<div class="col-lg-6 col-md-6 col-sm-12">
				    					<p><b>Department Name  :</b> <?php echo $doctor[0]['dept_name']?></p>
				    				</div>
				    			</div>


				    			<div class="row">
				    				<div class="col-lg-6 col-md-6 col-sm-12">
				    					<p><b>Username  :</b> <?php echo $doctor[0]['username']?></p>
				    				</div>
				    				<div class="col-lg-6 col-md-6 col-sm-12">
				    					<p><b>Gender  :</b> <?php echo $doctor[0]['doctor_gender']?></p>
				    				</div>
				    			</div>

				    			<div class="row">
				    				<div class="col-lg-6 col-md-6 col-sm-12">
				    					<p><b>Date of Birth  :</b> <?php echo $doctor[0]['doctor_dob']?></p>
				    				</div>
				    				<div class="col-lg-6 col-md-6 col-sm-12">
				    					<p><b>Phone No  :</b> <?php echo $doctor[0]['doctor_phone']?></p>
				    				</div>
				    			</div>

				    			<div class="row">
				    				<div class="col-lg-6 col-md-6 col-sm-12">
				    					<p><b>Address  :</b> <?php echo $doctor[0]['doctor_address']?></p>
				    				</div>
				    				<div class="col-lg-6 col-md-6 col-sm-12">
				    					<p><b>Created At :</b> <?php echo $doctor[0]['created_at']?></p>
				    				</div>
				    			</div>

				    			<div class="row">
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
	 			</div>
	</div>	
  
</section> 
  <!-- Start of Footer -->
  <?php  include_once 'footer.php';?>
  <!-- End of Footer -->

</main> 
	