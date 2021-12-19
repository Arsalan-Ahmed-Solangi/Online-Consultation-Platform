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
                <form action="<?php echo base_url('Patients/save');?>" method="POST" class="form"  enctype="multipart/form-data">
                    <div class="row mt-2">
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Patients Name <span class="text-danger">*</span></label>
                                <input value="<?=isset($patients['patient_name'])?$patients['patient_name']:''?>"  type="text" maxlength="20" name="patient_name" required placeholder="Enter Patients Name" class="form-control mt-2">
                                <?php echo form_error('patient_name') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Username<span class="text-danger">*</span></label>
                                <input value="<?=isset($patients['username'])?$patients['username']:''?>"  type="text" maxlength="20" name="username" required placeholder="Enter Username" class="form-control mt-2">
                                <?php echo form_error('username') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Patients Phone<span class="text-danger">*</span></label>
                                <input value="<?=isset($patients['patient_phone'])?$patients['patient_phone']:''?>"  type="text" maxlength="20" name="patient_phone" required placeholder="Enter Patients Phone" class="form-control mt-2">
                                <?php echo form_error('patient_phone') ?>
                            </div>
                        </div> 
                    </div> 
                    <div class="row mt-2">
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Patients DOB<span class="text-danger">*</span></label>
                                <input value="<?=isset($patients['patient_dob'])?$patients['patient_dob']:''?>"  type="date" maxlength="20" name="patient_dob" required placeholder="Enter Receptionist DOB" class="form-control mt-2">
                                <?php echo form_error('patient_dob') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Patients Gender<span class="text-danger">*</span></label> 
                                <select name="patient_gender" required class="form-select mt-2">
                                    <option value="">---SELECT Gender---</option>
                                    <option value="male" <?=isset($patients['patient-gender']) && $patients['patient-gender'] =='Male'?'selected="selected"':''?>>Male</option>
                                    <option value="female" <?=isset($patients['patient-gender']) && $patients['patient-gender'] =='Female'?'selected="selected"':''?>>Female</option>
                                </select> 
                                <?php echo form_error('patient_gender') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Patients Address<span class="text-danger">*</span></label>
                                <textarea name="patient_address"   class="form-control mt-2" required placeholder="Enter Patients Address"><?=isset($patients['patient_address']) && !empty($patients['patient_address'])?$patients['patient_address']:''?></textarea>
                                <?php echo form_error('patient_address') ?>
                            </div>
                        </div> 
                    </div> 
                    <div class="row mt-2">
                    <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group">
                                <label>Patients Status <span class="text-danger">*</span></label>
                                <select name="status_id" required class="form-select mt-2">
                                    <option value="">---SELECT STATUS---</option>
                                    <option value="1" <?=isset($patients['status_id']) && $patients['status_id'] =='1'?'selected="selected"':''?>>Active</option>
                                    <option value="2" <?=isset($patients['status_id']) && $patients['status_id'] =='2'?'selected="selected"':''?>>Inactive</option>
                                </select> 
                                <?php echo form_error('status_id') ?>
                            </div>
				    	 </div>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Password<span class="text-danger">*</span></label>
                                <input value="<?=isset($patients['password'])?$patients['password']:''?>"  type="password" maxlength="20" name="password" required placeholder="Enter Password" class="form-control mt-2">
                                <?php echo form_error('password') ?>
                            </div>
                        </div> 
                        <?php 
                            if(isset($patients['patient_profile']) && !empty($patients['patient_profile']))
                            {
                                $required='';
                            }else{
                                $required='required';
                            }
                        ?>
                        <div class="col-md-4 col-lg-4 col-sm-4">
                            <div class="form-group ">
                                <label>Patients Pic<span class="text-danger">*</span></label>
                                <input   type="file" maxlength="100" name="patient_profile"   class="form-control mt-2" accept="image/*" <?=$required?> >
                                <span><?=isset($patients['patient_profile'])?$patients['patient_profile']:''?></span>
                                <?php echo form_error('patient_profile') ?>
                            </div>
                        </div>  
                      
                        <div class="col-md-4 col-lg-4 col-sm-4 mt-2">
                            <div class="form-group ">
                                <label>Uploaded Picture<span class="text-danger">*</span></label>
                                <br>
                                <img  src="<?=base_url()?>assets/uploads/patients/<?=$patients['patient_profile']?>" alt="Image" class="media-object img-rounded thumb48 mt-3"  width="200" height="180" style='border: 1px solid'>
                                <input type='hidden' name='hiddenPicture' value='<?=isset($patients['patient_profile'])?$patients['patient_profile']:''?>'>
                                <input type='hidden' name='hiddenId' value='<?=isset($patients['patient_id'])?$patients['patient_id']:''?>'>

                                <?php echo form_error('patient_profile') ?>
                            </div>
                        </div> 
                    </div>  
                    <div class="row">
                             <div class="col-md-12 col-lg-12 col-sm-12 offset-md-10">
                                 <div class="form-group mt-3"> 
                                     <button type="submit"  name="submi" class="btn btn-primary"> Update</button> 

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
