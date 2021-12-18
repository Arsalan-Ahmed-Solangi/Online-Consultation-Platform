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
             <h4 class='text-dark'> <i class="fa fa-question-circle"></i> <?=$title?></h4>
          </div>
            <div class="card-body">
                <form action="<?php echo base_url('Notices/save');?>" method="POST" class="form">
                    <div class="row mt-2">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <div class="form-group ">
                                <label>Notice Title <span class="text-danger">*</span></label>
                                <input value="<?=isset($notices['notice_title'])?$notices['notice_title']:''?>"  type="text" maxlength="20" name="notice_title" required placeholder="Enter Title" class="form-control mt-2">
                                <?php echo form_error('notice_title') ?>
                            </div>
                        </div>
                    	<div class="col-md-6 col-lg-6 col-sm-6  ">
                            <div class="form-group">
                                <label>Notice Status <span class="text-danger">*</span></label>
                                <select name="Status_id" required class="form-select mt-2">
                                    <option value="">---SELECT STATUS---</option>
                                    <option value="1" <?=isset($notices['status_id']) && $notices['status_id'] =='1'?'selected="selected"':''?>>Active</option>
                                    <option value="2" <?=isset($notices['status_id']) && $notices['status_id'] =='2'?'selected="selected"':''?>>Inactive</option>
                                </select> 
                                <?php echo form_error('Status_id') ?>
                            </div>
				    	 </div>
                    </div> 
                    <div class="row mt-2">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group mt-2">
                                <label>Notice Description <span class="text-danger">*</span></label>
                                <textarea name="notice_desc" id="editor" class="form-control mt-2" required placeholder="Enter Notice Description"><?=isset($notices['notice_desc']) && !empty($notices['notice_desc'])?$notices['notice_desc']:''?></textarea>
                                <input type='hidden' name='hiddenNoticeid' value="<?=isset($notices['notice_id'])?$notices['notice_id']:''?>">
                                <?php echo form_error('notice_desc') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                             <div class="col-md-12 col-lg-12 col-sm-12 offset-md-10">
                                 <div class="form-group mt-3">
                                 
                                     <button type="submit"  name="submi" class="btn btn-primary"><?=isset($notices['notice_id'])?'Update':'Create'?></button> 

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
