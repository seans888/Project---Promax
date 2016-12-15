<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Contract ID</th>
                            <th>Status</th>
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
                          <?php foreach($contracts as $contract): ?>
                          <tr>
                            <td><a href = '/reservationcontract/get/<?php echo e($contract->id); ?>'><?php echo e($contract->id); ?></a></td>
                            <td><?php echo e($contract->status); ?></td>
                            <td><?php echo e($contract->Property->name); ?></td>
                            <td><?php echo e($contract->Unit->unittype_unittype); ?></td>
                            <td><?php echo e($contract->unitnumber); ?></td>
                            <td><?php echo e($contract->Tenant->tenantname); ?></td>
                            <td><?php echo e($contract->startdate); ?></td>
                            <td><?php echo e($contract->enddate); ?></td>
                            <td><?php echo e($contract->noOfDeposits); ?></td>
                            <td><?php echo e($contract->noOfAdvance); ?></td>
                            
                            
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>