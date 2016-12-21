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
  
                        <table class="table table-hover">
                          <thead>
                          <tr>
                          
                            <th>Document Item</th>
                            <th>Notes</th>
                            <th>Amount</th>
                            
                            <th></th>
                          </tr>
                          </thead>
                         
                          <?php
                            $details = $Model->InvoiceDetails;
                          ?>
                          <?php if($canAdd): ?>
                          <tr>
                            <td>
                              <select class = 'form-control' id="invoicedetail_document">
                                <option value = "">--Select a document--</option>
                                <?php foreach($documentItems as $document): ?>
                                <option value = "<?php echo e($document->code); ?>"><?php echo e($document->code); ?></option>
                                <?php endforeach; ?>
                              </select>
                            </td>
                            <td><input type = 'text' class = 'form-control' id="invoicedetail_note"/></td>
                            <td><input type = 'number' step='0.01' class = 'form-control' id = "invoicedetail_amount"/></td>
                            <td><button type="button" class="btn btn-default" id='invoicedetail_save' onclick="invoicedetailSave('<?php echo e($Model->id); ?>')"><i class="fa fa-save"></i></button>
                                   </td>
                          </tr>       
                          <?php endif; ?>                   
                          <?php foreach($details as $detail): ?>

                          <tr id = "invoicedetail_<?php echo e($detail->id); ?>">
                            <td><?php echo e($detail->documentItem_code); ?></td>
                            <td><?php echo e($detail->note); ?></td>
                            <td><?php echo e(number_format($detail->amount,2)); ?></td>
                            <td>
                              <?php if($Model->status == "On Hold" && Auth::user()->canDelete('invoice')): ?>
                              <button type="button" class="btn btn-default" id='invoicedetail_delete' onclick="invoicedetailDelete('<?php echo e($detail->id); ?>','<?php echo e($Model->id); ?>')"><i class="fa fa-trash"></i></button>
                              <?php endif; ?>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                         
                        </table>
                      </div>