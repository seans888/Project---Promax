<div class="box-body">
            <div class="form-horizontal">
               <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Invoice Number: </label>
                    <div class="col-sm-8">
                      <input readonly type = 'number' class="form-control" name = 'id' value = '<?php echo e($Model->id); ?>' id='getInvoice_id' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Status: </label>
                    <div class="col-sm-8">
                      <input type = 'text' readonly class="form-control" name = 'status' id='getInvoice_status' value ="<?php echo e(($Model->status != null) ? $Model->status : App\Constants::DRAFT); ?>" <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?> />
                      
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Billing Date: </label>
                    <div class="col-sm-8">
                      <input required type = 'date' class="form-control" name = 'date' value = '<?php echo e(($Model->date != null) ? $Model->date : date("Y-m-d")); ?>' id='getInvoice_date' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Contract ID: </label>
                    <div class="col-sm-8">
                    <?php if($Model->status == null || $Model->status == App\Constants::DRAFT): ?>
                      <select class="form-control" name = 'reservationcontract_id' id='getInvoice_contractid' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>>
                        <option value = ""></option>
                        <?php foreach($contracts as $contract): ?>
                          <option value = "<?php echo e($contract->id); ?>" <?php echo e(($Model->reservationcontract_id == $contract->id) ? "selected" : ""); ?>><?php echo e($contract->id); ?> - <?php echo e($contract->businessname); ?>; Unit: <?php echo e($contract->unitnumber); ?>; start date: <?php echo e($contract->startdate); ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?php else: ?>
                      <input class="form-control" type = 'text' readonly value='<?php echo e($Model->reservationcontract_id); ?>' />
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div> <!-- end row -->


               <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Billing Period Start: </label>
                    <div class="col-sm-8">
                      <input  type = 'date' class="form-control" name = 'billingPeriodStart' value = '<?php echo e($Model->billingPeriodStart); ?>' id='getInvoice_billingPeriodStart' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Billing Period End: </label>
                    <div class="col-sm-8">
                       <input type = 'date' class="form-control" name = 'billingPeriodEnd' value = '<?php echo e($Model->billingPeriodEnd); ?>' id='getInvoice_billingPeriodEnd' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Due Date: </label>
                    <div class="col-sm-8">
                      <input  type = 'date' class="form-control" name = 'duedate' value = '<?php echo e($Model->duedate); ?>' id='getInvoice_duedate' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Issued By: </label>
                    <div class="col-sm-8">
                     <input readonly type = 'text' class="form-control" name = 'issuedBy' value = '<?php echo e(($Model->issuedBy == null) ? Auth::user()->name : $Model->issuedBy); ?>' id='getInvoice_issuedBy' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>/>
                   
                    </div>
                  </div>
                </div>
              </div> <!-- end row -->

               <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Total Amount: </label>
                    <div class="col-sm-8">
                      <input readonly type = 'text' step = '0.01' class="form-control" value = '<?php echo e(number_format($Model->Amount(),2)); ?>' id='getInvoice_billingPeriodStart' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Total Balance: </label>
                    <div class="col-sm-8">
                       <input readonly type = 'text'  step = '0.01' class="form-control" value = '<?php echo e(number_format($Model->Balance(),2)); ?>' id='getInvoice_billingPeriodEnd' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Description: </label>
                    <div class="col-md-10">
                       <input type = 'text' class="form-control" name = 'desc' value = '<?php echo e($Model->desc); ?>' id='getInvoice_desc' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
                
              </div> <!-- end row -->

               <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Payer: </label>
                    <div class="col-sm-8">
                      <select required class="form-control" name = 'payer' id='getInvoice_payer' <?php echo e(($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : ""); ?>>
                          <option value = ""></option>
                          <?php foreach($payers as $payer): ?>
                            <option value = "<?php echo e($payer->id); ?>" <?php echo e(($Model->payer_id == $payer->id) ? "selected" : ""); ?>><?php echo e($payer->tenantname); ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                  </div>
                </div>
                
                </div>
                
              </div> <!-- end row -->
            </div>
            <div class="row">
        
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#invoiceForm_documentDetails" data-toggle="tab">Document Details</a></li>
              <li><a href="#invoiceForm_paymentDetails" data-toggle="tab"  >Payment Details</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="invoiceForm_documentDetails">                 
                <div class="box">
                  <div class="box-header">
                    
                    <div class="btn-group" style="margin-left:30px">
                      <?php if(Auth::user()->canAdd('invoice') && $Model->status == App\Constants::DRAFT): ?>
                      <!-- <button type="button" class="btn btn-default" id='getInvoice_newdocumentdetail'><i class="fa fa-plus"></i></button> -->
                      <?php endif; ?>
                    </div>
                  </div>
                </form>
                  <?php echo $__env->make('partials.invoiceDetailsTable', ['Model' => $Model, 'canAdd' => (Auth::user()->canAdd('invoice') && $Model->status == App\Constants::DRAFT) ? true : false, 'documentItems' => $documentItems ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
              </div>

                </form>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="invoiceForm_paymentDetails">                 
                <div class="box">
                  <div class="box-header">
                    
                    <div class="btn-group" style="margin-left:30px">
                      <?php if(Auth::user()->canAdd('payment') && $Model->Balance() > 0 && $Model->status == App\Constants::INVOICE_UNPAID): ?>
                      <form action = "/invoice/generatepayment/<?php echo e($Model->id); ?>" method = "POST">
                        <?php echo csrf_field(); ?>

                      <input type = 'text' name = 'referencenumber' id = 'getInvoice_newpaymentreferencenumber' placeholder = 'Enter Payment Reference number' class = "form-control" />
                      <input type = 'number' step = '0.01' name = 'amountpaid' id = 'getInvoice_amountpaid' placeholder = 'Payment Amount' class = "form-control" required name = 'amountpaid'/>
                      <input type="submit" class="btn btn-default" id='getInvoice_newpayment' value = "Apply Payment" />
                      </form>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php echo $__env->make('partials.paymentDetailsTable', ['Model' => $Model], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
          </div>