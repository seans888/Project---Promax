                  
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <tr>
                            <th>Company ID</th>
                            <th>Name</th>
                            <th>Parent Company</th>
                            <th>Desc</th>
                          </tr>
                          <?php
                            $Companies =$Model;
                          ?>
                          <?php foreach($Companies as $Company): ?>
                          <tr>
                            <td><?php echo e($Company->id); ?></td>
                            <td><a href = '/company/<?php echo e($Company->id); ?>'><?php echo e($Company->name); ?></a></td>
                            <td><?php echo e(($Company->parent) ? $Company->parentCompany->name:""); ?></td>
                            <td><?php echo e($Company->desc); ?></td>
                           
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>