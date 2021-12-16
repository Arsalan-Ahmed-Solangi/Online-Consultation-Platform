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
			  <h1 class='mt-3 mb-4 text-center'>Add Department </h1> 
			  <div class="row">
				<div class="col-md-6 col-xs-12  mt-2">
					<div class="form-group mt-2">
						<label class="mb-2">Department <span class="text-danger">*</span></label>
						<input type="text" maxlength="30" placeholder="Enter Department  name" name="departmentName" required class="form-control">
					</div>
				</div> 
				<div class="col-md-6   col-xs-12 mt-2 ">
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
				<div class="col-md-12   col-xs-12 mt-2 ">
					<div class="form-group mt-2">
						<label class="mb-2">Description<span class="text-danger">*</span></label>
						 <textarea class='form-control' name='description' placeholder="Enter Description" col='10' row='10'></textarea>
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
