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
                          <form action = "/tenant/<?php echo e($Model->id); ?>" method="post">
                            <input type = 'hidden' name = '_token' value = "<?php echo csrf_token(); ?>"/>
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
                          <?php foreach($tenants as $tenant): ?>

                          <tr id = "tenantstable_current<?php echo e($tenant->id); ?>">
                            <td><?php echo e($tenant->unittype); ?></td>
                            <td><?php echo e($tenant->unitnumber); ?></td>
                            <td><?php echo e($tenant->tenantname); ?></td>
                            <td><?php echo e($tenant->startdate); ?></td>
                            <td><?php echo e($tenant->enddate); ?></td>
                            <td><?php echo e($tenant->noOfDeposits); ?></td>
                            <td><?php echo e($tenant->noOfAdvance); ?></td>
                            <td><?php echo e($tenant->totalDepositAmt); ?></td>
                            <td><?php echo e($tenant->unitBasicRent); ?></td>
                            <td><?php echo e($tenant->vat); ?></td>
                            <td><?php echo e($tenant->whtax); ?></td>
                            <td><?php echo e($tenant->lgwhtax); ?></td>
                            <td><?php echo e($tenant->unittotalrent); ?></td>
                            <td> 
                                <div class="btn-group">

                                  <button type="button" class="btn btn-default" id='tenantstable_edit' onclick="showedittenants('tenantstable_update<?php echo e($tenant->id); ?>', 'tenantstable_current<?php echo e($tenant->id); ?>' );"><i class="fa fa-pencil"></i></button>
                                  <form action = "/delete/tenant/<?php echo e($tenant->id); ?>" method = "post">

                                    <?php echo csrf_field(); ?>

                                    <button onclick="return confirm('are you sure you want to delete this item?')" type="submit" class="btn btn-default" id='tenantstable_delete'><i class="fa fa-trash"></i></button>
                                  </form>
                                </div>
                              </td>
                            </tr>


                            <form action = "/update/tenant/<?php echo e($Model->id); ?>" method="post" onsubmit="return confirm('Are you sure you want to update this entry?');">
                            <input type = 'hidden' name = '_token' value = "<?php echo csrf_token(); ?>"/>
                            <input type = 'hidden' name = 'tenant_id' value = "<?php echo e($tenant->id); ?>"/>
                          <tr id = "tenantstable_update<?php echo e($tenant->id); ?>" style = "display:none;">
                            <td><input value = "<?php echo e($tenant->unittype); ?>" width = "100" required name = 'unittype' type = 'text'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->unitnumber); ?>" width = "100" required name = 'unitnumber' type = 'text'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->tenantname); ?>" width = "100" required name = 'tenantname' type = 'text'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->startdate); ?>" width = "100" required name = 'startdate' type = 'date'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->enddate); ?>" width = "100" name = 'enddate' type = 'date'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->noOfDeposits); ?>" width = "100" name = 'noOfDeposits' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->noOfAdvance); ?>" width = "100" name = 'noOfAdvance' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->totalDepositAmt); ?>" width = "100" name = 'totalDepositAmt' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->unitBasicRent); ?>" width = "100" name = 'unitBasicRent' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->vat); ?>" width = "100" name = 'vat' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->whtax); ?>" width = "100" name = 'whtax' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->lgwhtax); ?>" width = "100" name = 'lgwhtax' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td><input value = "<?php echo e($tenant->unittotalrent); ?>" width = "100" name = 'unittotalrent' type = 'number' step ='0.01'  class="form-control fixedwidth"/></td>
                            <td> 
                              <div class="btn-group">
                                <button type="submit" class="btn btn-default" id='tenantstable_savenewentry'><i class="fa fa-save"></i></button>
                                <button type="reset" onclick = "hideedittenants('tenantstable_update<?php echo e($tenant->id); ?>', 'tenantstable_current<?php echo e($tenant->id); ?>');" class="btn btn-default" id='tenantstable_cancelnewentry'><i class="fa fa-refresh"></i></button>
                              </div>
                            </td>
                          </tr>
                          </form>
                          <?php endforeach; ?>
                         
                        </table>
                      </div>