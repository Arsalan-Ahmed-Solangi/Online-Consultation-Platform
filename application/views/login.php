<div class="container mt-5">
	<div class="card shadow-lg bg-white p-3 mb-2" style="width: 40%;margin:auto">
		<h3 align="center" class="text-custom"><i class="fa fa-hospital" aria-hidden="true"></i></h3>
		<h4 align="center" class="text-custom">Login to Your Account</h4>
		<p class="text-secondary" align="center">Enter your username & password to login</p>
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
		<form action="<?php echo base_url('Login/login');?>" method="POST" id="form">
			<div class="form-group mt-2">
				<label class="text-secondary mb-2">Username <span class="text-danger">*</span></label>
				<input type="email" maxlength="50" placeholder="Enter your username" name="username" required class="form-control">
			</div>

			<div class="form-group mt-2">
				<label class="text-secondary mb-2">Password <span class="text-danger">*</span></label>
				<input type="password" maxlength="20" placeholder="Enter your password" name="password" required class="form-control">
			</div>

			<div class="form-group mt-2">
				<label class="text-secondary mb-2">Role Type <span class="text-danger">*</span></label>
				<select name="role" required class="form-select">
					<option value="">---SELECT ROLE ---</option>
					<?php 

						foreach ($roles as $key => $value) {
							?>
							<option value="<?php echo $value['role_id']?>"><?php echo $value['role_type']?></option>
							<?php
						}


					?>

				</select>
			</div>

			<div class="form-group mt-2">
				<button type="submit" name="login" class="form-control btn-primary"><i class="fa fa-sign-in"></i>	Login</button>
				<p class="text-secondary mt-2" align="center"> <a href="" class="text-primary" style="text-decoration: none;">Remind Password</a>  <br/>Don't have an account? <a href="<?php echo base_url('Register');?>" class="text-primary" style="text-decoration: none;">Create Account</a></p>
			</div>
		</form>
	</div>
</div>