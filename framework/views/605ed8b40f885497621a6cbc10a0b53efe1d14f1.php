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
                          
                            <th>Ref. No.</th>
                            <th>Status.</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Amount applied to invoice</th>
                            <th>Description</th>
                          </tr>
                          </thead>
                         
                          <?php
                            $details = $Model->Payments;
                          ?>
                          <?php if($details != null): ?>
                            <?php foreach($details as $detail): ?>

                            <tr id = "paymentdetail_<?php echo e($detail->id); ?>">
                              <td><a href="/payment/get/<?php echo e($detail->ReferenceNumber()); ?>"><?php echo e($detail->ReferenceNumber()); ?></a></td>
                              <td><?php echo e($detail->status); ?></td>
                              <td><?php echo e($detail->date); ?></td>
                              <td><?php echo e($detail->amount); ?></td>
                              <td><?php echo e($detail->AmountAppliedForInvoice($Model->id)); ?></td>
                              <td><?php echo e($detail->desc); ?></td>
                              <td></td>
                            </tr>
                            <?php endforeach; ?>
                          <?php endif; ?>
                         
                        </table>
                      </div>