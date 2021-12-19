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
		<h4 align="center" class="text-custom"><?=$title?></h4> 
		<form action="<?=base_url('Reset/forgotPassword')?>" method="POST" id="form">

			<div class="row">
				 
				<div class="col-md-12 col-lg-12 col-xs-6 col-sm-12">
					<div class="form-group mt-2">
						<label class="text-secondary mb-2">Username /Email<span class="text-danger">*</span></label>
						<input type="email" maxlength="50" placeholder="Enter your username / email" name="username" required class="form-control" value='<?=isset($users['username'])?$users['username']:''?>'>
						<?php echo form_error('username') ?>
					</div>
				</div>
				<?php 
					if(isset($users) && !empty($users['username']))
					{
					?>
						<div class="col-md-12 col-lg-12 col-xs-6 col-sm-12">
							<div class="form-group mt-2">
								<label class="text-secondary mb-2">Password<span class="text-danger">*</span></label>
								<input type="text" maxlength="50"  name="password"  class="form-control" value='<?=isset($users['password'])?$users['password']:''?>'>
							</div>
						</div>	
					<?php
					}else{

					
				?>
				<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
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
				</div>
				<?php } ?>
			</div> 
			<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
			<div class="form-group mt-3 text-center">
				<?php 
					if(!isset($users['username']) && empty($users['username']))
					{
						?>
							<button type="submit" name="login" class="btn btn-primary"><i class="fa fa-user-plus"></i>	Next</button>
						<?php
					}
				?>
				
				<p class="text-secondary mt-2" align="center"> Already have an account? <a href="<?php echo base_url('Login');?>" class="text-primary" style="text-decoration: none;">Login</a></p>
			</div>
			</div>
		</form>
	</div>
</div>