<main id="main" class="main" style='margin-top: 0px;'>  
<section class="section dashboard">
	<div class='col-md-12'>
		
	</div>
  <div class="row"> 
	<div class="col-lg-12">
	  <div class="row">  
		<div class="col-xxl-4 col-md-12">
		  <div class="card"> 
			<div class="card-body"> 
			  <h1 class='mt-3 mb-4 text-center'>Add Doctor </h1> 
			  <div class="row">
				<div class="col-md-4 col-xs-12  mt-2">
					<div class="form-group mt-2">
						<label class="mb-2">Doctor Name <span class="text-danger">*</span></label>
						<input type="text" maxlength="30" placeholder="Enter Doctor  name" name="doctorName" required class="form-control">
					</div>
				</div>
				<div class="col-md-4   col-xs-12 mt-2">
					<div class="form-group mt-2">
						<label class="mb-2">Username <span class="text-danger">*</span></label>
						<input type="email" maxlength="50" placeholder="Enter username" name="userName" required class="form-control">
					</div>
				</div>
				<div class="col-md-4   col-xs-12 mt-2">
					<div class="form-group mt-2">
						<label class="mb-2">Password <span class="text-danger">*</span></label>
						<input type="password" maxlength="50" placeholder="Enter Password" name="password" required class="form-control">
					</div>
				</div>
				<div class="col-md-4   col-xs-12 mt-2">
					<div class="form-group mt-2">
						<label class="mb-2">Doctor Gender <span class="text-danger">*</span></label>
						 <select class='form-control select2' name='doctorGender' id='doctorGender' required data-select='Choose Doctor Gender Options'>
						 <option value=''>Choose Doctor Gender Options</option>			
						 <option value='male'>Male</option>			
						 <option value='female'>Female</option>	  
						 </select>
					</div>
				</div>
				<div class="col-md-4   col-xs-12 mt-2">
					<div class="form-group mt-2">
						<label class="mb-2">Date Of Birth <span class="text-danger">*</span></label>
						 <input class='form-control' type='date' name='doctorDOB' id='doctorDOB' placeholder="Select Date of Birth">
					</div>
				</div>
				<div class="col-md-4   col-xs-12 mt-2 ">
					<div class="form-group mt-2">
						<label class="mb-2">Phone Number <span class="text-danger">*</span></label>
						 <input class='form-control' type='number' name='phoneNumber' id='phoneNumber' placeholder="Enter Phone Number">
					</div>
				</div>
				<div class="col-md-4   col-xs-12 mt-2 ">
					<div class="form-group mt-2">
						<label class="mb-2">Address<span class="text-danger">*</span></label>
						 <textarea class='form-control' name='address' placeholder="Enter Address" col='10' row='10'></textarea>
					</div>
				</div>
				<div class="col-md-4   col-xs-12 mt-2 ">
					<div class="form-group mt-2">
						<label class="mb-2">Status<span class="text-danger">*</span></label>
						<select class='form-control select2' name='status' id='status' required data-select='Choose Status Options'>
						 <option value=''>Choose Status Options</option>			
						 <option value='1'>Active</option>			
						 <option value='2'>Inactive</option>	  
						 <option value='3'>Deleted</option>	  
						 </select>
					</div>
				</div>
				<div class="col-md-4   col-xs-12 mt-2 ">
					<div class="form-group mt-2">
						<label class="mb-2">Department<span class="text-danger">*</span></label>
						<select class='form-control select2' name='doctorGender' id='doctorGender' required data-select='Choose Department Options'>
						 <option value=''>Choose Department Options</option>			
						 <option value='orthopaedics'>Orthopaedics</option>			
						 <option value='psychiatry'>Psychiatry</option>	  
						 <option value='accidentEmergency'>Accident & Emergency</option>	  
						 </select>
					</div>
				</div>
				<div class="col-md-12   col-xs-12 mt-2">
					<div class="form-group mt-2">
						<label class="mb-2">Upload Profile Picture<span class="text-danger">*</span></label>
						 <input class='form-control' type='file' name='profilePicture'>
					</div>
				</div>
				<div class="col-md-12   col-xs-12 mt-3 text-center">
					<div class="form-group mt-2">
						 <button type='button' class='btn btn-success' name='submit'>Submit</button>
					</div>
				</div>
			</div>
		  </div>
		  
		</div> 
	  </div>
	  
	</div> 
  </div>
</section> 
 
</main> 
