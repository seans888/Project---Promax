<div class="box-body">
      
            <div class="form-horizontal">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tenant ID: </label>
                <div class="col-sm-10">

                   <input readonly  type = 'text' class="form-control" name = 'id' value = '<?php echo e($Model->id); ?>' id='gettenant_tenant'/>
                </div>
              </div>

               <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Full Name / Company Name: </label>
                <div class="col-sm-10">
                   <input required type = 'text' class="form-control" name = 'tenantname' value = '<?php echo e($Model->tenantname); ?>' id='gettenant_tenantname'/>
                </div>
              </div>

			<div class ="row">
				<div class = "col-sm-4">
					<div class="form-group">
		                <label for="inputEmail3" class="col-sm-6 control-label">Last Name: </label>
		                <div class="col-sm-6">
		                   <input required type = 'text' class="form-control" name = 'lastname' value = '<?php echo e($Model->lastname); ?>' id='gettenant_lastname'/>
		                </div>
	              	</div>
	              </div>
				<div class = "col-sm-4">
					<div class="form-group">
		                <label for="inputEmail3" class="col-sm-6 control-label">First Name: </label>
		                <div class="col-sm-6">
		                   <input required type = 'text' class="form-control" name = 'firstname' value = '<?php echo e($Model->firstname); ?>' id='gettenant_firstname'/>
		                </div>
		              </div>
	            </div>
	            <div class = "col-sm-4">
				
				<div class="form-group">
	                <label for="inputEmail3" class="col-sm-6 control-label">Middle Name: </label>
	                <div class="col-sm-6">
	                   <input type = 'text' class="form-control" name = 'middlename' value = '<?php echo e($Model->middlename); ?>' id='gettenant_middlename'/>
	                </div>
	              </div>
	          </div>
	      	</div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Address: </label>
                <div class="col-sm-10">
                  <textarea class="form-control" required name = 'address' id = 'gettenant_address'><?php echo e($Model->address); ?></textarea>
                </div>
              </div>
              
              <div class ="row">
                <div class = "col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Tel No.: </label>
                    <div class="col-sm-8">
                      <input required type = 'text' class="form-control" name = 'telno' value = '<?php echo e($Model->telno); ?>' id='gettenant_telno'/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Mobile No.: </label>
                    <div class="col-sm-8">
                      <input required type = 'text' class="form-control" name = 'mobileno' value = '<?php echo e($Model->mobileno); ?>' id='gettenant_mobile'/>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class ="row">
                <div class = "col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Occupation: </label>
                    <div class="col-sm-8">
                      <input required type = 'text' class="form-control" name = 'occupation' value = '<?php echo e($Model->occupation); ?>' id='gettenant_occupation'/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Civil Status: </label>
                    <div class="col-sm-8">
                      <input required type = 'text' class="form-control" name = 'civilstatus' value = '<?php echo e($Model->civilstatus); ?>' id='gettenant_civilstatus'/>
                    </div>
                  </div>
                </div>
              </div>
 

            </div>
          </div>
         
              
      

 