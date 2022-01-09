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
             <h4 class='text-dark'> <i class="fa fa-thermometer-half" aria-hidden="true"></i> How to check blood pressure</h4>
          </div>
            <div class="card-body p-4">
					<p><b>Before Checking Your Blood Pressure</b></p>
					<a class="btn btn-dark" href="https://www.youtube.com/watch?v=UGOoeqSo_ws&ab_channel=RegisteredNurseRN">Watch video</a>
					<ul>
						<li>Find a quiet place to check your blood pressure. You will need to listen for your heartbeat.</li>
						<li>Make sure that you are comfortable and relaxed with a recently emptied bladder (a full bladder may affect your reading).</li>
						<li>Roll up the sleeve on your arm or remove any tight-sleeved clothing.</li>
						<li>Rest in a chair next to a table for 5 to 10 minutes. Your arm should rest comfortably at heart level. Sit up straight with your back against the chair, legs uncrossed. Rest your forearm on the table with the palm of your hand facing up.</li>
					</ul>

					<img src="<?php echo base_url('assets/uploads/bp_check.jpg')?>"/>
            </div>
         </div>
</div>	

</section> 
<!-- Start of Footer -->
<?php  include_once 'footer.php';?>
<!-- End of Footer -->

</main> 
