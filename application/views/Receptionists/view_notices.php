
  <!-- Start of Header-->
  <?php  include_once 'header.php' ?>
	<!-- End of Header -->

  <!-- Start of Sidebar-->
  <?php include_once 'sidebar.php' ?>
	<!-- End of Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <!-- <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">  
          
            <div class="col-lg-12">
                <div class="row"> 
                    <?php 
                        if(isset($notices) && !empty($notices))
                        {
                          
                            foreach($notices as $notice)
                            {
                               
                                ?>
                                 <div class="col-lg-4 col-xxl-4 col-md-4">
                                    <div class="card info-card sales-card"> 
                                        <div class="card-body">
                                        <h5 class="card-title"><?=isset($notice['notice_title'])?ucwords($notice['notice_title']):''?></h5>
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
            </div><!-- End Left side columns -->
      </div>
    </section>
    <?php  include_once 'footer.php';?>

  <!-- Start of Footer -->
  
  <!-- End of Footer -->

  </main><!-- End #main -->
