<style>
.fixedwidth {
  width: auto;
}
</style>

  @if(session('affirm2'))
   <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            
            {{session('affirm2')}}
          </div>
    
  @endif
<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                          <tr>
                          
                            <th>Unit type</th>
                            <th>Unit No.</th>
                            <th>Tenant Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>No. Of Deposits</th>
                            <th>No. Of Advance</th>
                            <th>Total Deposit Amt.</th>
                            <th>Unit Basic Rent</th>
                            <th>VAT</th>
                            <th>W/H Tax</th>
                            <th>LG W/H Tax</th>
                            <th>Unit Total Rent</th>
                            <th>Action</th>


                          </tr>
                          </thead>
                         
                          <?php
                            $tenants = $Model->Tenants;
                          ?>
                          <form action = "/tenant/{{$Model->id}}" method="post">
                            <input type = 'hidden' name = '_token' value = "{!! csrf_token() !!}"/>
                          <tr id = "tenantstable_newentry">
                            <td><input width = "100" required name = 'unittype' type = 'text'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" required name = 'unitnumber' type = 'text'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" required name = 'tenantname' type = 'text'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" required name = 'startdate' type = 'date'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" name = 'enddate' type = 'date'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" name = 'noOfDeposits' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" name = 'noOfAdvance' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" name = 'totalDepositAmt' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" name = 'unitBasicRent' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" name = 'vat' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" name = 'whtax' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" name = 'lgwhtax' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input width = "100" name = 'unittotalrent' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td> 
                              <div class="btn-group">
                                <button type="submit" class="btn btn-default" id='tenantstable_savenewentry'><i class="fa fa-save"></i></button>
                                <button type="button" class="btn btn-default" id='tenantstable_cancelnewentry'><i class="fa fa-refresh"></i></button>
                              </div>
                            </td>
                          </tr>
                          </form>
                          @foreach($tenants as $tenant)

                          <tr id = "tenantstable_current{{$tenant->id}}">
                            <td>{{$tenant->unittype}}</td>
                            <td>{{$tenant->unitnumber}}</td>
                            <td>{{$tenant->tenantname}}</td>
                            <td>{{$tenant->startdate}}</td>
                            <td>{{$tenant->enddate}}</td>
                            <td>{{$tenant->noOfDeposits}}</td>
                            <td>{{$tenant->noOfAdvance}}</td>
                            <td>{{$tenant->totalDepositAmt}}</td>
                            <td>{{$tenant->unitBasicRent}}</td>
                            <td>{{$tenant->vat}}</td>
                            <td>{{$tenant->whtax}}</td>
                            <td>{{$tenant->lgwhtax}}</td>
                            <td>{{$tenant->unittotalrent}}</td>
                            <td> 
                                <div class="btn-group">

                                  <button type="button" class="btn btn-default" id='tenantstable_edit' onclick="showedittenants('tenantstable_update{{$tenant->id}}', 'tenantstable_current{{$tenant->id}}' );"><i class="fa fa-pencil"></i></button>
                                  <form action = "/delete/tenant/{{$tenant->id}}" method = "post">

                                    {!! csrf_field() !!}
                                    <button onclick="return confirm('are you sure you want to delete this item?')" type="submit" class="btn btn-default" id='tenantstable_delete'><i class="fa fa-trash"></i></button>
                                  </form>
                                </div>
                              </td>
                            </tr>


                            <form action = "/update/tenant/{{$Model->id}}" method="post" onsubmit="return confirm('Are you sure you want to update this entry?');">
                            <input type = 'hidden' name = '_token' value = "{!! csrf_token() !!}"/>
                            <input type = 'hidden' name = 'tenant_id' value = "{{$tenant->id}}"/>
                          <tr id = "tenantstable_update{{$tenant->id}}" style = "display:none;">
                            <td><input value = "{{$tenant->unittype}}" width = "100" required name = 'unittype' type = 'text'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->unitnumber}}" width = "100" required name = 'unitnumber' type = 'text'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->tenantname}}" width = "100" required name = 'tenantname' type = 'text'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->startdate}}" width = "100" required name = 'startdate' type = 'date'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->enddate}}" width = "100" name = 'enddate' type = 'date'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->noOfDeposits}}" width = "100" name = 'noOfDeposits' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->noOfAdvance}}" width = "100" name = 'noOfAdvance' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->totalDepositAmt}}" width = "100" name = 'totalDepositAmt' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->unitBasicRent}}" width = "100" name = 'unitBasicRent' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->vat}}" width = "100" name = 'vat' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->whtax}}" width = "100" name = 'whtax' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->lgwhtax}}" width = "100" name = 'lgwhtax' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "{{$tenant->unittotalrent}}" width = "100" name = 'unittotalrent' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td> 
                              <div class="btn-group">
                                <button type="submit" class="btn btn-default" id='tenantstable_savenewentry'><i class="fa fa-save"></i></button>
                                <button type="reset" onclick = "hideedittenants('tenantstable_update{{$tenant->id}}', 'tenantstable_current{{$tenant->id}}');" class="btn btn-default" id='tenantstable_cancelnewentry'><i class="fa fa-refresh"></i></button>
                              </div>
                            </td>
                          </tr>
                          </form>
                          @endforeach
                         
                        </table>
                      </div>