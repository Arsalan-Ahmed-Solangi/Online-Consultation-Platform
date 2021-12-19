<div class="container mt-5">
	<?php  
			if(isset($_SESSION['success'])){
				echo $_SESSION['success'];
				unset($_SESSION['success']);
			}else if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
			
		?>
	<div class="card shadow-lg bg-white p-3 mb-2" style="width: 50%;margin:auto">
		<h3 align="center" class="text-custom"><i class="fa fa-user-plus" aria-hidden="true"></i></h3>
		<h4 align="center" class="text-custom">Create an Account</h4>
		<p class="text-secondary" align="center">Enter your personal details to create account</p>
		<form action="<?=base_url('Register/save')?>" method="POST" id="form">

			<div class="row">
				<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
					<div class="form-group mt-2">
						<label class="text-secondary mb-2">Full Name <span class="text-danger">*</span></label>
						<input type="text" maxlength="20" placeholder="Enter your full name" name="fullname" required class="form-control">
						<?php echo form_error('fullname') ?>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
					<div class="form-group mt-2">
						<label class="text-secondary mb-2">Username <span class="text-danger">*</span></label>
						<input type="email" maxlength="50" placeholder="Enter your username" name="username" required class="form-control">
						<?php echo form_error('username') ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
					<div class="form-group mt-2">
						<label class="text-secondary mb-2">Password <span class="text-danger">*</span></label>
						<input type="password" maxlength="20" placeholder="Enter your password" name="password" required class="form-control">
						<?php echo form_error('password') ?>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
					
					<div class="form-group mt-2">
						<label class="text-secondary mb-2">Confirm Password <span class="text-danger">*</span></label>
						<input type="password" maxlength="20" placeholder="Confirm your password" name="confirm_password" required class="form-control">
						<?php echo form_error('confirm_password') ?>
					</div>
				</div>
			</div>
			
			<div class="form-group mt-2">
				<button type="submit" name="login" class="form-control btn-primary"><i class="fa fa-user-plus"></i>	Register</button>
				<p class="text-secondary mt-2" align="center"> Already have an account? <a href="<?php echo base_url('Login');?>" class="text-primary" style="text-decoration: none;">Login</a></p>
			</div>
		</form>
	</div>
</div>