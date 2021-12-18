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
				 	<h4 class='text-dark'> <i class="fa fa-plus-circle"></i> Add Department</h4>
				  </div>
					<div class="card-body">
				    	<form action="<?php echo base_url('Departments/create');?>" method="POST" id="form">
				    		<div class="row mt-2">
				    			<div class="col-md-6 col-lg-6 col-sm-12">
				    				<div class="form-group">
				    					<label>Department Name <span class="text-danger">*</span></label>
				    					<input value="<?php  echo $department['dept_name'] ?? null ?>"  type="text" maxlength="20" name="dept_name" required placeholder="Enter Department Name" class="form-control">
				    					<?php echo form_error('dept_name') ?>
				    				</div>
				    			</div>

				    			<div class="col-md-6 col-lg-6 col-sm-12">
				    				<div class="form-group">
				    					<label>Department Status <span class="text-danger">*</span></label>
				    					<select name="Status_id" required class="form-select">
				    						<option value="">---SELECT STATUS---</option>
				    						<option value="1">Active</option>
				    						<option value="2">Inactive</option>
				    					</select>
				    					<?php echo form_error('status_id') ?>
				    				</div>
				    			</div>
				    		</div>
				    			<div class="row mt-2">
				    			<div class="col-md-12 col-lg-12 col-sm-12">
				    				<div class="form-group mt-2">
				    					<label>Department Description <span class="text-danger">*</span></label>
				    					<textarea name="dept_desc" id="editor" class="form-control" required placeholder="Enter Department Description"></textarea>
				    					<?php echo form_error('dept_desc') ?>
				    				</div>
				    			</div>
				    		
				    		</div>

				    		<div class="row">
						 			<div class="col-md-12 col-lg-12 col-sm-12 offset-md-10">
						 				<div class="form-group mt-3">
						 				
						 					<button type="submit"  name="updateDepartment" class="btn btn-primary">Create</button> 

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
