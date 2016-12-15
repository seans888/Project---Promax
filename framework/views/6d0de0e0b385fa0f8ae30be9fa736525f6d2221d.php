<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Code</th>
                            <th>Description</th>
                            <th>VATable</th>
                            <th>WTaxable</th>
                            <th>Penalizable</th>
                            <th>System Defined</th>
                            

                          </thead>
                          <?php
                            $documentitems = $Model;
                          ?>
                          <?php foreach($documentitems as $documentitem): ?>
                          <tr>
                            <td><a href = '/documentitem/get/<?php echo e($documentitem->code); ?>'><?php echo e($documentitem->code); ?></a></td>
                            <td><?php echo e($documentitem->desc); ?></td>
                            <td><?php echo e(($documentitem->vataxable) ? "yes" : "no"); ?></td>
                            <td><?php echo e(($documentitem->wtaxable) ? "yes" : "no"); ?></td>
                            <td><?php echo e(($documentitem->penalizable) ? "yes" : "no"); ?></td>
                            <td><?php echo e(($documentitem->systemVariable) ? "yes" : "no"); ?></td>
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>