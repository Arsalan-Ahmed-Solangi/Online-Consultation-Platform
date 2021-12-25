<!-- Start of Header-->
<header id="header" class="header fixed-top d-flex align-items-center">


<!-- Start of Sidebar Top -->
<div class="d-flex align-items-center justify-content-between">
<a href="index.html" class="logo d-flex align-items-center">

<span class="d-none d-lg-block">PATIENT PANEL</span>
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
<main id="main" class="main"  >  
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
             <h4 class='text-dark'> <i class="fa fa-bells"></i> View Notices</h4>
          </div>
           
        </div>
        <?php 
        
                        if(isset($notices) && !empty($notices))
                        {
                            
                            foreach($notices as $notice)
                            {
                               
                                ?>
                                 <div class="col-lg-12 col-xxl-12 col-md-12">
                                    <div class="card info-card sales-card"> 
                                        <div class="card-body">
                                        <h5 class="card-title"><?=isset($notice['notice_title'])?ucwords($notice['notice_title']):''?></h5>
                                            <hr/>
                                            <div class="d-flex align-items-center">
                                                 
                                                <div class="ps-3">
                                                <p><?=isset($notice['notice_desc'])?ucwords($notice['notice_desc']):''?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <?php
                            }
                        }
                    
                    ?>
</div>  

</section> 
<!-- Start of Footer -->
<?php  include_once 'footer.php';?>
<!-- End of Footer -->

</main> 
