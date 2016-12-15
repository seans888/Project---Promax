<style>
.fixedwidth {
  width: auto;
}
</style>

  <?php if(session('affirm2')): ?>
   <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            
            <?php echo e(session('affirm2')); ?>

          </div>
    
  <?php endif; ?>
<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                          <tr>
                          
                            <th>Status</th>
                            <th>Unit type</th>
                            <th>Unit No.</th>
                            <th>Tenant Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>No. Of Deposits</th>
                            <th>No. Of Advance</th>
                            <th>Total Deposit Amt.</th>
                            <th>Unit Basic Rent</th>
                            <?php if(Auth::user()->canAdd('enterreservationcontract') == null && Auth::user()->canDelete('enterreservationcontract') == null): ?>
                            <th>Action</th>
                            <?php endif; ?>

                          </tr>
                          </thead>
                         
                          <?php
                            $tenants = $Model->Tenants;
                          ?>
                          
                          <?php foreach($tenants as $tenant): ?>

                          <tr id = "tenantstable_current<?php echo e($tenant->id); ?>">
                            <td><?php echo e($tenant->status); ?></td>
                            <td><?php echo e($tenant->Unit->unittype_unittype); ?></td>
                            <td><?php echo e($tenant->unitnumber); ?></td>
                            <td><?php echo e($tenant->Tenant->tenantname); ?></td>
                            <td><?php echo e($tenant->startdate); ?></td>
                            <td><?php echo e($tenant->enddate); ?></td>
                            <td><?php echo e($tenant->noOfDeposits); ?></td>
                            <td><?php echo e($tenant->noOfAdvance); ?></td>
                            <td><?php echo e($tenant->totalDepositAmt); ?></td>
                            <td><?php echo e($tenant->unitBasicRent); ?></td>
                            <td> 
                                <div class="btn-group">

                                  <button type="button" class="btn btn-default" id='tenantstable_edit' onclick="showedittenants(<?php echo e($tenant->id); ?>);"><i class="fa fa-file-text-o"></i> View</button>
                                    
                                </div>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                         
                        </table>
                      </div>