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
             <h4 class='text-dark'> <i class="bi-reception-3"></i> <?=$title?></h4>
          </div>
            <div class="card-body">
                <form action="<?php echo base_url('Receptionists/save');?>" method="POST" class="form"  enctype="multipart/form-data">
                    <div class="row mt-2">
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Receptionist Name <span class="text-danger">*</span></label>
                                <input value="<?=isset($receptionists['receptionist_name'])?$receptionists['receptionist_name']:''?>"  type="text" maxlength="20" name="receptionist_name" required placeholder="Enter Receptionist Name" class="form-control mt-2">
                                <?php echo form_error('receptionist_name') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Username<span class="text-danger">*</span></label>
                                <input value="<?=isset($receptionists['username'])?$receptionists['username']:''?>"  type="text" maxlength="20" name="username" required placeholder="Enter Username" class="form-control mt-2">
                                <?php echo form_error('username') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Receptionist Phone<span class="text-danger">*</span></label>
                                <input value="<?=isset($receptionists['receptionist_phone'])?$receptionists['receptionist_phone']:''?>"  type="text" maxlength="20" name="receptionist_phone" required placeholder="Enter Receptionist Phone" class="form-control mt-2">
                                <?php echo form_error('receptionist_phone') ?>
                            </div>
                        </div> 
                    </div> 
                    <div class="row mt-2">
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Receptionist DOB<span class="text-danger">*</span></label>
                                <input value="<?=isset($receptionists['receptionist_dob'])?$receptionists['receptionist_dob']:''?>"  type="text" maxlength="20" name="receptionist_dob" required placeholder="Enter Receptionist DOB" class="form-control mt-2">
                                <?php echo form_error('receptionist_dob') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Receptionist Gender<span class="text-danger">*</span></label> 
                                <select name="receptionist_gender" required class="form-select mt-2">
                                    <option value="">---SELECT Gender---</option>
                                    <option value="male" <?=isset($receptionists['receptionist_gender']) && $receptionists['receptionist_gender'] =='male'?'selected="selected"':''?>>Male</option>
                                    <option value="female" <?=isset($receptionists['receptionist_gender']) && $receptionists['receptionist_gender'] =='female'?'selected="selected"':''?>>Female</option>
                                    <option value="other" <?=isset($receptionists['receptionist_gender']) && $receptionists['receptionist_gender'] =='other'?'selected="selected"':''?>>Other</option>
                                </select> 
                                <?php echo form_error('receptionist_gender') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Receptionist Address<span class="text-danger">*</span></label>
                                <textarea name="receptionist_address"   class="form-control mt-2" required placeholder="Enter Receptionist Address"><?=isset($receptionists['receptionist_address']) && !empty($receptionists['receptionist_address'])?$receptionists['receptionist_address']:''?></textarea>
                                <?php echo form_error('receptionist_address') ?>
                            </div>
                        </div> 
                    </div> 
                    <div class="row mt-2">
                    <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group">
                                <label>Receptionist Status <span class="text-danger">*</span></label>
                                <select name="Status_id" required class="form-select mt-2">
                                    <option value="">---SELECT STATUS---</option>
                                    <option value="1" <?=isset($receptionists['status_id']) && $receptionists['status_id'] =='1'?'selected="selected"':''?>>Active</option>
                                    <option value="2" <?=isset($receptionists['status_id']) && $receptionists['status_id'] =='2'?'selected="selected"':''?>>Inactive</option>
                                </select> 
                                <?php echo form_error('Status_id') ?>
                            </div>
				    	 </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Password<span class="text-danger">*</span></label>
                                <input value="<?=isset($receptionists['password'])?$receptionists['password']:''?>"  type="text" maxlength="20" name="password" required placeholder="Enter Password" class="form-control mt-2">
                                <?php echo form_error('password') ?>
                            </div>
                        </div> 
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Receptionist Pic<span class="text-danger">*</span></label>
                                <input   type="file" maxlength="100" name="receptionist_pic"   class="form-control mt-2" accept="image/*" required>
                                <?php echo form_error('receptionist_pic') ?>
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
