<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Notes</th>
                            

                          </thead>
                          <?php
                            $usertypes = $Model;
                          ?>
                          <?php foreach($usertypes as $usertype): ?>
                          <tr>
                            <td><a href = '/usertype/<?php echo e($usertype->code); ?>'><?php echo e($usertype->desc); ?></a></td>
                            <td><?php echo e($usertype->desc); ?></td>
                            <td><?php echo e($usertype->notes); ?></td>
                            
                            
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>