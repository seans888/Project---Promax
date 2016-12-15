<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Invoice Number</th>
                            <th>Status</th>
                            <th>Billing Date</th>
                            <th>Billing Period Start</th>
                            <th>Billing Period End</th>
                            <th>Due Date</th>
                            <th>Issued By</th>
                            <th>Amount</th>
                            <th>Amount Applied</th>
                            <th>Balance</th>
                            <th></th>
                          </thead>
                          <?php
                            $invoicePayments = $Model;
                          ?>
                          <?php foreach($invoicePayments as $invoicePayment): ?>
                          <tr>
                            <td><a href = '/invoice/get/<?php echo e($invoicePayment->Invoice->id); ?>'><?php echo e($invoicePayment->Invoice->id); ?></a></td>
                            <td><?php echo e($invoicePayment->Invoice->status); ?></td>
                            <td><?php echo e($invoicePayment->Invoice->date); ?></td>
                            <td><?php echo e($invoicePayment->Invoice->billingPeriodStart); ?></td>
                            <td><?php echo e($invoicePayment->Invoice->billingPeriodEnd); ?></td>
                            <td><?php echo e($invoicePayment->Invoice->duedate); ?></td>
                            <td><?php echo e($invoicePayment->Invoice->issuedBy); ?></td>
                            <td><?php echo e(number_format($invoicePayment->Invoice->Amount(), 2)); ?></td>
                            <td><?php echo e(number_format($invoicePayment->paymentAmountForInvoice, 2)); ?></td>
                            <td><?php echo e(number_format($invoicePayment->Invoice->Balance(),2)); ?></td>
                            <td>
                              <?php if($Model->first()->Payment->status == "On Hold" && Auth::user()->canDelete('payment')): ?>
                              <button type="button" class="btn btn-default" onclick="invoicepaymentDelete('<?php echo e($invoicePayment->id); ?>','<?php echo e($invoicePayment->referencenumber); ?>')"><i class="fa fa-trash"></i></button>
                              <?php endif; ?>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>