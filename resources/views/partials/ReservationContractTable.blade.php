<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Contract ID</th>
                            <th>Status</th>
                            <th>Tax Adjustment</th>
                            <th>Latest Billing Date</th>
                            <th>Property</th>
                            <th>Unit type</th>
                            <th>Unit No.</th>
                            <th>Tenant Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>No. Of Deposits</th>
                            <th>No. Of Advance</th>
                          </thead>
                          <?php
                            $contracts = $Model;
                          ?>
                          @foreach($contracts as $contract)
                          <tr>
                            <td><a href = '/reservationcontract/get/{{$contract->id}}'>{{$contract->id}}</a></td>
                            <td>{{$contract->status}}</td>
                            <td>{{$contract->taxAdjustment}}</td>
                            <td>{{$contract->LatestBillingDate()}}</td>
                            <td>{{$contract->Property->name}}</td>
                            <td>{{$contract->Unit->unittype_unittype}}</td>
                            <td>{{$contract->unitnumber}}</td>
                            <td>{{$contract->Tenant->tenantname}}</td>
                            <td>{{$contract->startdate}}</td>
                            <td>{{$contract->enddate}}</td>
                            <td>{{$contract->noOfDeposits}}</td>
                            <td>{{$contract->noOfAdvance}}</td>
                            
                            
                          </tr>
                          @endforeach
                        </table>
                      </div>