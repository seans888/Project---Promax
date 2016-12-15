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
                            <th>Balance</th>
                          </thead>
                          <?php
                            $invoices = $Model;
                          ?>
                          <?php foreach($invoices as $invoice): ?>
                          <tr>
                            <td><a href = '/invoice/get/<?php echo e($invoice->id); ?>'><?php echo e($invoice->id); ?></a></td>
                            <td><?php echo e($invoice->status); ?></td>
                            <td><?php echo e($invoice->date); ?></td>
                            <td><?php echo e($invoice->billingPeriodStart); ?></td>
                            <td><?php echo e($invoice->billingPeriodEnd); ?></td>
                            <td><?php echo e($invoice->duedate); ?></td>
                            <td><?php echo e($invoice->issuedBy); ?></td>
                            <td><?php echo e(number_format($invoice->Amount(), 2)); ?>

                            <td><?php echo e(number_format($invoice->Balance(), 2)); ?>

                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>