<div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Employee ID</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-sm">
                    <input value="{{$Model->code}}" name='code' id="getemployee_code" value='{{$Model->code}}' type="text" min="1" class="form-control" placeholder="Keep blank for generating Employee ID" />
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-flat" data-toggle="modal" data-target="#EmployeeLookup"><i class = "fa fa-search"></i></button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Whole Name</label>
                <div class="col-sm-10">
                  <input required id='getemployee_name' name='name' value='{{($Model->name) ? $Model->name : old("name")}}' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                  <input required id='getemployee_lastname' name='lastname' value='{{($Model->lastname) ? $Model->lastname : old("lastname")}}' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                  <input required id='getemployee_firstname' name='firstname' value='{{($Model->firstname) ? $Model->firstname : old("firstname")}}' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Middle Name</label>
                <div class="col-sm-10">
                  <input id='getemployee_middlename' name='middlename' value='{{($Model->middlename) ? $Model->middlename : old("middlename")}}' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Suffix</label>
                <div class="col-sm-10">
                  <input id='getemployee_suffix' name='suffix' value='{{($Model->suffix) ? $Model->suffix : old("suffix")}}' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Employee Address</label>
                <div class="col-sm-10">
                  <textarea required id = 'getemployee_address' name = 'address' class="form-control" rows="3" placeholder="Address">{{($Model->address) ? $Model->address : old('address')}}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Department</label>
                <div class="col-sm-10">
                  <select required id='getemployee_department' name='department' class="form-control">
                  <option value = "">--Please select--</option>
                  @foreach($departments as $department)
                  <option value = "{{$department->code}}" {{ ($Model->department_code) ? (($department->code == $Model->department_code) ? "selected" : "") : (($department->code == old('department')) ? "selected" : "")  }}>{{$department->desc}}</option>
                  @endforeach
                  </select>                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Contact number 1</label>
                <div class="col-sm-10">
                  <input required id='getemployee_contact1' name='contact1' value='{{($Model->contact1) ? $Model->contact1 : old("contact1")}}' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Contact number 2</label>
                <div class="col-sm-10">
                  <input id='getemployee_contact2' name='contact2' value='{{($Model->contact2) ? $Model->contact2 : old("contact2")}}' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email address</label>
                <div class="col-sm-10">
                  <input required id='getemployee_email' name='email' value='{{($Model->email) ? $Model->email : old("email")}}' type="email" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                  <select required id='getemployee_status' name='status'  class="form-control">
                    <option value = "">--Please select</option>
                    <option value = "employed" {{ ($Model->status) ? (("employed" == $Model->status) ? "selected" : "") : (("employed" == old('status')) ? "selected" : "")  }} >Employed</option>
                    <option value = "diseased" {{ ($Model->status) ? (("diseased" == $Model->status) ? "selected" : "") : (("diseased" == old('status')) ? "selected" : "")  }} >Diseased</option>
                    <option value = "terminated" {{ ($Model->status) ? (("terminated" == $Model->status) ? "selected" : "") : (("terminated" == old('status')) ? "selected" : "")  }} >Terminated</option>
                   
                  </select>                  
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Employee Type</label>
                <div class="col-sm-10">
                  <select required id='getemployee_employeeType' name='employeeType'  class="form-control">
                    <option value = "">--Please select--</option>
                    <option value = "freelancer" {{ ($Model->employeeType) ? (("freelancer" == $Model->employeeType) ? "selected" : "") : (("freelancer" == old('status')) ? "selected" : "")  }} >Freelancer</option>
                    <option value = "contractual" {{ ($Model->employeeType) ? (("contractual" == $Model->employeeType) ? "selected" : "") : (("contractual" == old('status')) ? "selected" : "")  }} >contractual</option>
                    <option value = "employed" {{ ($Model->employeeType) ? (("employed" == $Model->employeeType) ? "selected" : "") : (("employed" == old('status')) ? "selected" : "")  }} >Employed</option>
                    <option value = "regular" {{ ($Model->employeeType) ? (("regular" == $Model->employeeType) ? "selected" : "") : (("regular" == old('status')) ? "selected" : "")  }} >Regular</option>
                    <option value = "OJT" {{ ($Model->employeeType) ? (("OJT" == $Model->employeeType) ? "selected" : "") : (("OJT" == old('status')) ? "selected" : "")  }} >OJT</option>
                  
                  </select>                  
                </div>
              </div>

              
            </div>
          </div>
          
<div class="modal fade" id="EmployeeLookup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:90%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Employee</h4>
      </div>
      <div class="modal-body">

        @include('partials.EmployeeTable', ['Model' => App\Employee::where('company_id', Auth::user()->company_id)->get(), 'mode' => 'optionButton', 'selectedID' => $Model->id, 'nullable' => false] )
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="EmployeeLookupConfirm">Accept Selection</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="SelectEmployee_cancel">Cancel</button>
      </div>
    </div>
  </div>
</div>