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
				 	<h4 class='text-dark'><i class="fa fa-user"></i> Profile Information</h4>
				 </div>
				<div class="card-body">
				    <form action="" method="POST" class="form"> 
			 		<div class="row mt-2">
			 			<div class="col-md-6 col-lg-6 col-sm-12">
			 				<div class="form-group">
			 					<label>Full Name <span class="text-danger">*</span></label>
			 					<input value="<?php echo $profile['name'] ?>" type="text" maxlength="20" name="name" required placeholder="Enter Full Name" class="form-control">
			 						<?php echo form_error('name') ?> 
			 				</div>
			 			</div>
			 			<div class="col-md-6 col-lg-6 col-sm-12">
			 				<div class="form-group">
			 					<label>Username <span class="text-danger">*</span></label>
			 					<input value="<?php echo $profile['username'] ?>" type="text" maxlength="50" name="email" required placeholder="Enter email address" class="form-control"> 
			 					<?php echo form_error('email') ?> 
			 				</div>
			 			</div>
			 		</div>

			 		<div class="row">
			 			<div class="col-md-12 col-lg-12 col-sm-12 offset-md-10">
			 				<div class="form-group mt-3">
			 				
			 					<button type="submit"  name="editProfile" class="btn btn-primary">Update</button> 

			 				</div>
			 			</div>
			 		</div>
			 		</form>
				</div>

	  	 </div>

	  	 <div class="card"> 
			
				 <div class="card-header ">
			
				 	<h4 class='text-dark'><i class="fa fa-key"></i> Change Password</h4>
				 
				 </div>
				<div class="card-body">
				    <form action="<?php echo base_url('Admin/changePassword');?>" method="POST" class="form"> 
			 		<div class="row mt-2">
			 			<div class="col-md-6 col-lg-6 col-sm-12">
			 				<div class="form-group">
			 					<label>Old Password <span class="text-danger">*</span></label>
			 					<input  type="password" maxlength="20" name="oldpassword"  placeholder="Enter Full Name" required class="form-control"> 
			 					<?php echo form_error('oldpassword') ?>
			 				</div>
			 			</div>
			 			<div class="col-md-6 col-lg-6 col-sm-12">
			 				<div class="form-group">
			 					<label>New Password <span class="text-danger">*</span></label>
			 					<input  type="password" maxlength="20" name="newpassword"  placeholder="Enter email address" required class="form-control"> 
			 						<?php echo form_error('newpassword') ?>
			 				</div>
			 			</div>
			 		</div>

			 		<div class="row mt-2">
			 			<div class="col-md-6 col-lg-6 col-sm-12">
			 				<div class="form-group">
			 					<label>Confirm Password <span class="text-danger">*</span></label>
			 					<input  type="password" maxlength="20" name="confirmpassword"  placeholder="Enter email address" required class="form-control"> 
			 						<?php echo form_error('confirmpassword') ?>
			 				</div>
			 			</div>
			 		</div>

			 		<div class="row">
			 			<div class="col-md-12 col-lg-12 col-sm-12 offset-md-10">
			 				<div class="form-group mt-3">
			 				
			 					<button type="submit"  name="editProfile" class="btn btn-primary">Update</button> 

			 				</div>
			 			</div>
			 		</div>
			 		</form>
				</div>

	  	 </div>
	</div>	
  
</section> 
 
</main> 
