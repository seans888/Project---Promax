<div class="box-body">
            <div class="form-horizontal">

              <div class="form-group">
              
                <label for="inputEmail3" class="col-sm-2 control-label">Contract ID</label>
                <div class="col-sm-10">
                  
                    <input readonly type = 'text' class="form-control" name = 'id' value = '{{$Model->id}}' id='getReservationContract_id'/>
                    
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Property / Building: </label>
                <div class="col-sm-10">
                  <select required id='getReservationContract_propertyid' name='property' class="form-control">
                    <option value = "">--Please Select--</option>
                    @foreach($properties as $property)
                      @if($Model->property_id != null)
                        @if($Model->property_id == $property->id)
                          <option selected value = "{{$property->id}}">{{$property->name}}</option>
                        @else
                          <option value = "{{$property->id}}">{{$property->name}}</option>
                        @endif
                      @else
                        @if(isset($_GET['property']) && $_GET['property'] == $property->name)
                          <option selected value = "{{$property->id}}">{{$property->name}}</option>
                        @else
                          <option value = "{{$property->id}}">{{$property->name}}</option>
                        @endif
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Unit Number: </label>
                <div class="col-sm-10">
                  <input type = 'hidden' value = "{{$Model->unitnumber}}" name = 'unitnumber' id = "getReservationContract_unitno" />
                   <select required class="form-control" name = 'unitnumber_selector' value = '{{$Model->unitnumber}}' id='getReservationContract_unitno_selector'>
                    <option>--Please Select Property to populate Units--</option>
                    @foreach($units as $unit)
                      @if(isset($_GET['property']) && $unit->Property->name == $_GET['property'])
                      <option {{($Model->unitnumber == $unit->unitCode) ? "selected" : ""}} value = "{{json_encode(['unitcode' => $unit->unitCode, 'property_id' => $unit->property_id, 'unittype' => $unit->unittype_unittype])}}">{{$unit->unitCode}}</option>
                      @endif
                      @if($Model->property_id != null && $Model->property_id == $unit->property_id)
                      <option {{($Model->unitnumber == $unit->unitCode) ? "selected" : ""}}  value = "{{json_encode(['unitcode' => $unit->unitCode, 'property_id' => $unit->property_id, 'unittype' => $unit->unittype_unittype])}}">{{$unit->unitCode}}</option>
                      
                      @endif
                    @endforeach
                    
                   </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Unit Type: </label>
                <div class="col-sm-10">

                   <input required readonly type = 'text' class="form-control" name = 'unittype' value = '{{($Model->unitnumber != "") ? $Model->Unit->unittype_unittype : ""}}' id='getReservationContract_unittype'/>
                </div>
              </div>

              
             
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tenant's name / Company: </label>
                <div class="col-sm-10">
                  <select required class="form-control" name = 'tenant' id='getReservationContract_tenant'>

                      <option>--Please select--</option>
                    @foreach($tenants as $tenant)
                      @if($tenant->id == $Model->tenants_id)
                      <option selected value = "{{$tenant->id}}">{{$tenant->tenantname}}</option>
                      @else
                      <option value = "{{$tenant->id}}">{{$tenant->tenantname}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
 
             
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Employer's name: </label>
                <div class="col-sm-10">
                  <input required type = 'text' class="form-control" name = 'employersname' value = '{{$Model->employersname}}' id='getReservationContract_employersname'/>
                </div>
              </div>
 
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Business Name: </label>
                <div class="col-sm-10">
                  <input required type = 'text' class="form-control" name = 'businessname' value = '{{$Model->businessname}}' id='getReservationContract_businessname'/>
                </div>
              </div>
 
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nature of Business: </label>
                <div class="col-sm-10">
                  <input required type = 'text' class="form-control" name = 'natureofbusiness' value = '{{$Model->natureofbusiness}}' id='getReservationContract_natureofbusiness'/>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Reservation Fee: </label>
                <div class="col-sm-10">
                  <input required type = 'number' class="form-control" name = 'reservationfee' value = '{{$Model->reservationfee}}' id='getReservationContract_reservationfee'/>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Bank / Check No.: </label>
                <div class="col-sm-10">
                  <input required type = 'text' class="form-control" name = 'bankcheckno' value = '{{$Model->bankcheckno}}' id='getReservationContract_bankcheckno'/>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Monthly Rental: </label>
                <div class="col-sm-10">
                  <input required type = 'number' step = '0.01' class="form-control" name = 'unitBasicRent' value = '{{$Model->unitBasicRent}}' id='getReservationContract_unitbasicrent'/>
                </div>
              </div>

              <div class ="row">
                <div class = "col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">No of Deposits: </label>
                    <div class="col-sm-8">
                      <input required type = 'number' class="form-control" name = 'noOfDeposits' value = '{{$Model->noOfDeposits}}' id='getReservationContract_noofdeposits'/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">No of Advance: </label>
                    <div class="col-sm-8">
                      <input required type = 'number' class="form-control" name = 'noOfAdvance' value = '{{$Model->noOfAdvance}}' id='getReservationContract_noofadvance'/>
                    </div>
                  </div>
                </div>
              </div>

              <div class = "row">
                
                <h4 style = "margin-left: 60px;"><b>Term of Lease</b></h4>
                <div class = "col-sm-6">

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Contract Start date: </label>
                    <div class="col-sm-8">
                      <input required type = 'date' class="form-control" name = 'startdate' value = '{{$Model->startdate}}' id='getReservationContract_startdate'/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Contract End date: </label>
                    <div class="col-sm-8">
                      <input  type = 'date' class="form-control" name = 'enddate' value = '{{$Model->enddate}}' id='getReservationContract_enddate'/>
                    </div>
                  </div>
                </div>
              </div>
              

            </div>
          </div>
         
              
      

 