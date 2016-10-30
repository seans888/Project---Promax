<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                          <tr>
                            <th>Name</th>
                            <th>Description</th>
                          </tr>
                          </thead>
                         
                          <?php
                            $branches = $Model;
                          ?>
                          <?php foreach($branches as $branch): ?>
                          <tr>
                            
                            <td><a href = '/property/get/<?php echo e($branch->id); ?>'><?php echo e($branch->name); ?></a></td>
                            <td><?php echo e($branch->desc); ?></td>
                            
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>