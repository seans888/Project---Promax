<div class="box-body">
            <div class="form-horizontal">
              <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Reference Number: </label>
                    <div class="col-sm-8">
                      <input type = 'text' class="form-control" name = 'referencenumber' value = '<?php echo e($Model->ReferenceNumber()); ?>' id='getPayment_id' <?php echo e(($Model->status != null && $Model->status != "On Hold") ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Status: </label>
                    <div class="col-sm-8">
                      <input type = 'text' readonly class="form-control" name = 'status' id='getPayment_status' value ="<?php echo e(($Model->status != null) ? $Model->status : 'On Hold'); ?>" <?php echo e(($Model->status != null && $Model->status != "On Hold") ? "disabled" : ""); ?> />
                      
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Billing Date: </label>
                    <div class="col-sm-8">
                      <input required type = 'date' class="form-control" name = 'date' value = '<?php echo e($Model->date); ?>' id='getPayment_date' <?php echo e(($Model->status != null && $Model->status != "On Hold") ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Total Payment Amount: </label>
                    <div class="col-sm-8">
                      <input required type = 'number' step = '0.01' class="form-control" name = 'amount' value = '<?php echo e($Model->amount); ?>' id='getPayment_date' <?php echo e((($Model->status != null && $Model->status != "On Hold") || $Model->amount > 0) ? "disabled" : ""); ?>/>
                    </div>
                  </div>
                </div>
              </div> <!-- end row -->
              <hr>
              <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Available Balance: </label>
                    <div class="col-sm-8">
                      <input type = 'text' class = "form-control" name = "availableBalance" disabled value = "<?php echo e($Model->PaymentAvailableBalance()); ?>"/>
                    
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Apply Invoice: </label>
                    <div class="col-sm-8">
                      <select class = "form-control" name = 'applyinvoice' <?php echo e(( ($Model->status != null && $Model->status != "On Hold")) ? "disabled" : ""); ?> <?php echo e(($Model->status == null) ? "required" : ""); ?> >
                        <option value = ""></option>
                        <?php foreach($invoices as $invoice): ?>
                          
                        <option value = "<?php echo e($invoice->id); ?>"><?php echo e($invoice->id); ?> - <?php echo e(number_format($invoice->Balance(), 2)); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Apply Invoice Amount: </label>
                    <div class="col-sm-8">
                      <input type = 'number' step="0.01" class = "form-control" name = "paymentAmountForInvoice"  <?php echo e(( ($Model->status != null && $Model->status != "On Hold")) ? "disabled" : ""); ?> <?php echo e(($Model->status == null) ? "required" : ""); ?> <?php echo e(($Model->amount > 0) ? "max=" . $Model->PaymentAvailableBalance() . "":""); ?> min = "1"/>
                    </div>
                  </div>
                </div>
              </div><!-- end row -->
            </div><!-- end Form -->

            <div class="row">
        
              <div class="col-md-12">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#invoiceForm_documentDetails" data-toggle="tab">List of Invoices</a></li>
                  </ul>

                  <div class="tab-content">
                    <div class="active tab-pane" id="invoiceForm_documentDetails">                 
                      <div class="box">
                        <div class="box-header">
                          
                          <div class="btn-group" style="margin-left:30px">
                            
                          </div>
                        </div>
                      </form>
                        <?php echo $__env->make('partials.PaymentinvoiceTable', ['Model' => $Model->InvoicePayments], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="invoiceForm_paymentDetails">                 
                      <div class="box">
                        <div class="box-header">
                          
                          <div class="btn-group" style="margin-left:30px">
                            <?php if(Auth::user()->canAdd('payment') && $Model->PaymentAvailableBalance() > 0): ?>
                            <button type="button" class="btn btn-default" id='getPayment_newdocumentdetail'><i class="fa fa-plus"></i></button>
                            <?php endif; ?>
                          </div>
                        </div>
                      </form>
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