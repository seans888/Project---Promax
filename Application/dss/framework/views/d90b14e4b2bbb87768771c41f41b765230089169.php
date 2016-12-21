<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                          <tr>
                            <th>Name</th>
                            <th>Description</th>
                          </tr>
                          </thead>
                         
                          <?php
                            $Properties = $Model;
                          ?>
                          <?php foreach($Properties as $Property): ?>
                          <tr>
                            
                            <td><a href = '/property/get/<?php echo e($Property->id); ?>'><?php echo e($Property->name); ?></a></td>
                            <td><?php echo e($Property->desc); ?></td>
                            
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>