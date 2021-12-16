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
			  <h1 class='mt-3 mb-4 text-center'>Add Appointment </h1> 
			  <div class="row">
              <div class="col-md-4   col-xs-12 mt-2 ">
					<div class="form-group mt-2">
						<label class="mb-2">Doctors<span class="text-danger">*</span></label>
						<select class='form-control select2' name='doctors' id='doctors' required data-select='Choose Doctors Options'>
						 <option value=''>Choose Department Options</option>			
						 <option value='2'>Ali</option>			
						 <option value='3'>Ahmed</option>	  
						 <option value='4'>Junaid</option>	  
						 </select>
					</div>
				</div> 
                <div class="col-md-4   col-xs-12 mt-2 ">
					<div class="form-group mt-2">
						<label class="mb-2">Patients<span class="text-danger">*</span></label>
						<select class='form-control select2' name='patients' id='patients' required data-select='Choose Patient Options'>
						 <option value=''>Choose Patient Options</option>			
						 <option value='2'>Saggar</option>			
						 <option value='3'>Rabiqa</option>	  
						 <option value='5'>Rafique</option>	  
						 </select>
					</div>
				</div>
                <div class="col-md-4   col-xs-12 mt-2 ">
					<div class="form-group mt-2">
						<label class="mb-2">Department<span class="text-danger">*</span></label>
						<select class='form-control select2' name='department' id='department' required data-select='Choose Department Options'>
						 <option value=''>Choose Department Options</option>			
						 <option value='1'>Orthopaedics</option>			
						 <option value='2'>Psychiatry</option>	  
						 <option value='3'>Accident & Emergency</option>	  
						 </select>
					</div>
				</div>
                <div class="col-md-4   col-xs-12 mt-2">
					<div class="form-group mt-2">
						<label class="mb-2">Appointment Date <span class="text-danger">*</span></label>
						 <input class='form-control' type='date' name='appointmentDate' id='appointmentDate' placeholder="Select Appointment Date">
					</div>
				</div>
				<div class="col-md-4   col-xs-12 mt-2">
					<div class="form-group mt-2">
						<label class="mb-2">Email<span class="text-danger">*</span></label>
						 <input class='form-control' type='email' name='email' id='email' placeholder="Enter  Email">
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
                <div class="col-md-6   col-xs-12 mt-2 ">
					<div class="form-group mt-2">
						<label class="mb-2">Description<span class="text-danger">*</span></label>
						 <textarea class='form-control' name='description' placeholder="Enter Description" col='1' row='1'></textarea>
					</div>
				</div>
                
				<div class="col-md-6  col-xs-12 mt-2">
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
