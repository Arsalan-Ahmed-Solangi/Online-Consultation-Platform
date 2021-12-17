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
	<div class='col-md-12'>
	
	</div>
  <div class="row"> 
	<div class="col-lg-12">
	  <div class="row">  
		<div class="col-xxl-4 col-md-12">
		  <div class="card"> 
			  
			<div class="card-body"> 
			<?php  
			if(isset($_SESSION['success'])){
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			}else if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
			echo validation_errors();

		?>
            <form action='<?=base_url('Admin/update')?>' method="Post">
			  <h3 class='mt-3  text-left'> Profile </h3> 
			  <div class="row">
              <div class="col-md-4 col-xs-12  ">
					<div class="form-group  ">
						<label class="mb-2">Full Name<span class="text-danger">*</span></label>
						<input type="text" minlength="5" maxlength="20" placeholder="Enter Full Name" name="fullName" required class="form-control" value='<?=isset($loginData['fullname'])?$loginData['fullname']:''?>'>
					</div>
				</div>
				<div class="col-md-4 col-xs-12   ">
					<div class="form-group  ">
						<label class="mb-2">Username<span class="text-danger">*</span></label>
						<input type="text" maxlength="20" minlength="5"  placeholder="Enter Username" name="userName" required class="form-control" value='<?=isset($loginData['username'])?$loginData['username']:''?>'>
						<input type='hidden'  name='hiddenAdminId' value='<?=isset($loginData['admin_id'])?$loginData['admin_id']:''?>'/>
					</div>
				</div> 
				<?php 
					$status='null';
					if(isset($loginData['status_id']) && !empty($loginData['status_id']))
					{
						$status = $loginData['status_id'];
					}
				?>
				<div class="col-md-4  col-xs-12  ">
				<div class="form-group">
						<label class="mb-2">Status<span class="text-danger">*</span></label>
						<select class='form-control select2' name='status' id='status' required data-select='Choose Status Options'>
						 <option value=''>Choose Status Options</option>			
						 <option value='1' <?=$status == '1' ?'selected="selected"':''?>>Active</option>			
						 <option value='2' <?=$status == '2' ?'selected="selected"':''?>>Inactive</option>	  
						 <option value='3' <?=$status == '3' ?'selected="selected"':''?>>Deleted</option>	  
						 </select>
					</div>
				</div>
				<div class="col-md-12   col-xs-12 mt-3">
					<div class="form-group  ">
						 <button type='submit' class='btn btn-success' style='float:right' name='submit'>Edit</button>
					</div>
				</div>
			</div>
            </form>
			<?php  
			if(isset($_SESSION['changeSuccess'])){
				echo $_SESSION['changeSuccess'];
				unset($_SESSION['changeSuccess']);
			}else if(isset($_SESSION['changeError'])){
				echo $_SESSION['changeError'];
				unset($_SESSION['changeError']);
			}
			echo validation_errors();

		?>
            <form action='<?=base_url('Admin/changePassword')?>' method="Post">
            <div class="card-body border-top mt-3"> 
			  <h3 class='mt-3    text-left'> Change Password </h3> 
			  <div class="row">
              <div class="col-md-4 col-xs-12   ">
					<div class="form-group  ">
						<label class="mb-2">Old Password<span class="text-danger">*</span></label>
						<input type='hidden'  name='hiddenAdminId' value='<?=isset($loginData['admin_id'])?$loginData['admin_id']:''?>'/>

						<input type="password" maxlength="20" placeholder="Enter Old Password" name="oldpassword" required class="form-control">
					</div>
				</div>
				<div class="col-md-4 col-xs-12   ">
					<div class="form-group  ">
						<label class="mb-2">New Password<span class="text-danger">*</span></label>
						<input type="password" maxlength="20" placeholder="Enter New Password" name="password" required class="form-control">
					</div>
				</div> 
				<div class="col-md-4  col-xs-12  ">
					<div class="form-group  ">
						<label class="mb-2">Confirm Password<span class="text-danger">*</span></label>
						 <input class='form-control' type='password' name='confirmPassword' placeholder="Enter Confirm Password" >
					</div>
				</div>
				<div class="col-lg-12   col-xs-12 mt-3" style="margin-left:20px;">
					<div class="form-group">
						 <button type='submit' class='btn btn-success' style='float:right;' name='submit'>Change</button>
					</div>
				</div>
			</div>
		  </div>
            </form>
		  
		</div> 
	  </div>
	  
	</div> 
  </div>
</section> 
 
</main> 
