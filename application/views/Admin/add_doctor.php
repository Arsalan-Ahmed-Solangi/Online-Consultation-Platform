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
				 	<h4 class='text-dark'> <i class="fa fa-user-md"></i> Add Doctor</h4>
				  </div>
					<div class="card-body">
				    	<form action="<?php echo base_url('Doctors/create');?>" method="POST" id="form" enctype="multipart/form-data">
				    		<div class="row mt-2">
				    			<div class="col-md-6 col-lg-6 col-sm-12">
				    				<div class="form-group">
				    					<label>Full Name <span class="text-danger">*</span></label>
				    					<input   type="text" maxlength="20" name="doctor_name" required placeholder="Enter Full Name" class="form-control">
				    					<?php echo form_error('doctor_name') ?>
				    				</div>
				    			</div>

				    			<div class="col-md-6 col-lg-6 col-sm-12">
				    				<div class="form-group">
				    					<label>Username <span class="text-danger">*</span></label>
				    						<input   type="email" maxlength="50" name="username" required placeholder="Enter username" class="form-control">
				    					<?php echo form_error('username') ?>
				    				</div>
				    			</div>
				    		</div>

				    		<div class="row mt-2">
				    			<div class="col-md-6 col-lg-6 col-sm-12">
				    				<div class="form-group">
				    					<label>Gender <span class="text-danger">*</span></label>
				    					<select name="gender" required class="form-select">
				    						<option value="">---SELECT GENDER---</option>
				    						<option value="Male">Male</option>
				    						<option value="Female">Female</option>
				    					</select>
				    					<?php echo form_error('gender') ?>
				    				</div>
				    			</div>

				    			<div class="col-md-6 col-lg-6 col-sm-12">
				    				<div class="form-group">
				    					<label>Date of Birth <span class="text-danger">*</span></label>
				    						<input   type="date" maxlength="50" name="dob" required class="form-control">
				    					<?php echo form_error('dob') ?>
				    				</div>
				    			</div>
				    		</div>

				    		<div class="row mt-2">
				    			<div class="col-md-6 col-lg-6 col-sm-12">
				    				<div class="form-group">
				    					<label>Phone No <span class="text-danger">*</span></label>
				    					<input   type="number" placeholder="Enter phone no" maxlength="11" minlength="11" name="phone_no" required class="form-control">
				    					<?php echo form_error('phone_no') ?>
				    				</div>
				    			</div>

				    			<div class="col-md-6 col-lg-6 col-sm-12">
				    				<div class="form-group">
				    					<label>Address  <span class="text-danger">*</span></label>
				    					<textarea name="address" required placeholder="Enter address" class="form-control"></textarea>
				    					<?php echo form_error('address') ?>
				    				</div>
				    			</div>
				    		</div>
							 
				    		<div class="row mt-2">
				    			<div class="col-md-6 col-lg-6 col-sm-12">
				    				<div class="form-group">
				    				<label>Department <span class="text-danger">*</span></label>
				    					<select name="dept_id" required class="form-select">
				    						<option value="">---SELECT DEPARTMNET---</option>
				    						<?php 

				    							foreach ($departments as $key => $value) {
				    									
				    									?>
				    									<option value="<?php echo $value['dept_id']?>"><?php echo $value['dept_name']?></option>
				    									<?php

				    							}

				    						?>
				    	
				    					</select>
				    					<?php echo form_error('dept_id') ?>
				    				</div>
				    			</div>

				    			<div class="col-md-6 col-lg-6 col-sm-12">
				    				<div class="form-group">
				    					<label>Password<span class="text-danger">*</span></label>
				    					<input type="password" name="password" required class="form-control" placeholder="Enter account password">
				    					<?php echo form_error('password') ?>

				    				</div>
				    			
				    			</div>
				    		</div>
				    			

				    		<div class="row mt-2">
				    			<div class="col-md-6 col-sm-12 col-lg-12">
				    				<label>Profile Picture <span class="text-danger">*</span></label>
				    					<input type="file" name="file" required class="form-control" accept="Image/*">
				    					<?php echo form_error('file') ?>

				    			</div>
				    			<div class="col-md-6">
				    					<div class="form-group mt-2">
				    					<label>Status <span class="text-danger">*</span></label>
				    					<select name="status_id" required class="form-select">
				    						<option value="">---SELECT STATUS---</option>
				    						<option value="1">Active</option>
				    						<option value="2">Inactive</option>
				    					</select>
				    					<?php echo form_error('status_id') ?>
				    				</div>
				    			</div>

						 		
						 		</div>

						 		<div class="row">
						 				<div class="col-md-12 col-lg-12 col-sm-12 offset-md-10">
						 				<div class="form-group mt-3">
						 				
						 					<button type="submit"  name="addDoctor" class="btn btn-primary">Create</button> 

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

</main> 


