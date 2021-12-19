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
             <h4 class='text-dark'> <i class="fa fa-user"></i> <?=$title?></h4>
          </div>
            <div class="card-body">
                <form action="<?php echo base_url('Pharmacists/save');?>" method="POST" class="form"  enctype="multipart/form-data">
                    <div class="row mt-2">
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Pharmacist Name <span class="text-danger">*</span></label>
                                <input  type="text" maxlength="20" name="pharmacist_name" required placeholder="Enter Pharmacist Name" class="form-control mt-2">
                                <?php echo form_error('pharmacist_name') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Username<span class="text-danger">*</span></label>
                                <input  type="text" maxlength="20" name="username" required placeholder="Enter Username" class="form-control mt-2">
                                <?php echo form_error('username') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Pharmacist Phone<span class="text-danger">*</span></label>
                                <input    type="number" maxlength="13" name="pharmacist_phone" required placeholder="Enter Pharmacist Phone" class="form-control mt-2">
                                <?php echo form_error('pharmacist_phone') ?>
                            </div>
                        </div> 
                    </div> 
                    <div class="row mt-2">
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Pharmacist DOB<span class="text-danger">*</span></label>
                                <input   type="date" maxlength="20" name="pharmacist_dob" required   class="form-control mt-2">
                                <?php echo form_error('pharmacist_dob') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Pharmacist Gender<span class="text-danger">*</span></label> 
                                <select name="pharmacist_gender" required class="form-select mt-2">
                                    <option value="">---SELECT Gender---</option>
                                    <option value="male"  >Male</option>
                                    <option value="female"  >Female</option>
                                    <option value="other"  >Other</option>
                                </select> 
                                <?php echo form_error('pharmacist_gender') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Pharmacist Address<span class="text-danger">*</span></label>
                                <textarea name="pharmacist_address"   class="form-control mt-2" required placeholder="Enter Pharmacist Address"></textarea>
                                <?php echo form_error('pharmacist_address') ?>
                            </div>
                        </div> 
                    </div> 
                    <div class="row mt-2">
                    <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group">
                                <label>Pharmacist Status <span class="text-danger">*</span></label>
                                <select name="status_id" required class="form-select mt-2">
                                    <option value="">---SELECT STATUS---</option>
                                    <option value="1" >Active</option>
                                    <option value="2"  >Inactive</option>
                                </select> 
                                <?php echo form_error('Status_id') ?>
                            </div>
				    	 </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Password<span class="text-danger">*</span></label>
                                <input    type="text" maxlength="20" name="password" required placeholder="Enter Password" class="form-control mt-2">
                                <?php echo form_error('password') ?>
                            </div>
                        </div> 
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Pharmacist Pic<span class="text-danger">*</span></label>
                                <input   type="file" maxlength="200" name="pharmacist_pic"   class="form-control mt-2" accept="image/*" required>
                                <?php echo form_error('pharmacist_pic') ?>
                            </div>
                        </div> 
                    </div>  
                    <div class="row">
                             <div class="col-md-12 col-lg-12 col-sm-12 offset-md-10">
                                 <div class="form-group mt-3"> 
                                     <button type="submit"  name="submi" class="btn btn-primary"> Create</button> 

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
