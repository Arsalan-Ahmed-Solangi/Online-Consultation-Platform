
  
	<!-- Start of Back To Top -->
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	<!-- End of Back To Top -->

 

	<!-- Start of Javascript-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script> -->

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>/assets/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url()?>/assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>/assets/assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?=base_url()?>/assets/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?=base_url()?>/assets/assets/vendor/quill/quill.min.js"></script>
  <script src="<?=base_url()?>/assets/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=base_url()?>/assets/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=base_url()?>/assets/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>/assets/assets/js/main.js"></script>


	<script type="text/javascript">
		$(document).ready(function(){

			$("#form").validate();
      $(".form").validate();
			$('.error').delay(4000).fadeOut('slow');
		});
	</script>
	<!-- End of Javascript -->

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea#editor',
    menubar: false
  });
</script>

	
</body>
</html>
