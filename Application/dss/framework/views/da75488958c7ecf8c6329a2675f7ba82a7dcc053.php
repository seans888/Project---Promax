<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Unit type</th>
                          </thead>
                          <?php
                            $unittypes = $Model;
                          ?>
                          <?php foreach($unittypes as $unittype): ?>
                          <tr>
                            <td><a href = '/unittype/get/<?php echo e($unittype->unittype); ?>'><?php echo e($unittype->unittype); ?></a></td>
                           
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>