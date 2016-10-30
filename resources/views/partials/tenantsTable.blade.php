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
                            @if(Auth::user()->canAdd('enterreservationcontract') == null && Auth::user()->canDelete('enterreservationcontract') == null)
                            <th>Action</th>
                            @endif

                          </tr>
                          </thead>
                         
                          <?php
                            $tenants = $Model->Tenants;
                          ?>
                          
                          @foreach($tenants as $tenant)

                          <tr id = "tenantstable_current{{$tenant->id}}">
                            <td>{{$tenant->Unit->unittype_unittype}}</td>
                            <td>{{$tenant->unitnumber}}</td>
                            <td>{{$tenant->Tenant->tenantname}}</td>
                            <td>{{$tenant->startdate}}</td>
                            <td>{{$tenant->enddate}}</td>
                            <td>{{$tenant->noOfDeposits}}</td>
                            <td>{{$tenant->noOfAdvance}}</td>
                            <td>{{$tenant->totalDepositAmt}}</td>
                            <td>{{$tenant->unitBasicRent}}</td>
                            <td> 
                                <div class="btn-group">

                                  <button type="button" class="btn btn-default" id='tenantstable_edit' onclick="showedittenants({{$tenant->id}});"><i class="fa fa-file-text-o"></i> View</button>
                                    
                                </div>
                              </td>
                            </tr>
                          @endforeach
                         
                        </table>
                      </div>