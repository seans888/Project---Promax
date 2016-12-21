<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Unit Number</th>
                            <th>Property</th>
                            <th>Unit type</th>

                          </thead>
                          <?php
                            $units = $Model;
                          ?>
                          <?php foreach($units as $unit): ?>
                          <tr>
                            <td><a href = '/units/get/<?php echo e($unit->unitCode); ?>'><?php echo e($unit->unitCode); ?></a></td>
                            <td><?php echo e($unit->Property->name); ?></td>
                            <td><?php echo e($unit->unittype_unittype); ?></td>
                           
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>