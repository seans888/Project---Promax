<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Reference Number</th>
                            <th>Payment Date</th>
                            <th>Status</th>
                            <th>Payer</th>
                            <th>Amount</th>
                            </thead>
                          <?php
                            $payments = $Model;
                          ?>
                          <?php foreach($payments as $payment): ?>
                          <tr>
                            <td><a href = '/payment/get/<?php echo e($payment->ReferenceNumber()); ?>'><?php echo e($payment->ReferenceNumber()); ?></a></td>
                            <td><?php echo e($payment->date); ?></td>
                            <td><?php echo e($payment->status); ?></td>
                            <td><?php echo e($payment->Payer()); ?></td>
                            <td><?php echo e(number_format($payment->amount, 2)); ?></td>
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>