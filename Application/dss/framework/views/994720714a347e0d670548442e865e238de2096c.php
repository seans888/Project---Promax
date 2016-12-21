<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                          <tr>
                          
                            <th>Username</th>
                            <th>Name</th>
                            <th>UserType</th>
                            <th>Status</th>
                            <th>Email</th>
                          </tr>
                          </thead>
                         
                          <?php
                            $Users = $Model;
                          ?>
                          <?php foreach($Users as $user): ?>
                          <tr>
                            
                            <td><a href = '/user/<?php echo e($user->id); ?>'><?php echo e($user->username); ?></a></td>
                            <td><?php echo e($user->employee_id ? $user->employee->name : $user->name); ?></td>
                            <td><?php echo e($user->usertype->desc); ?></td>
                            <td><?php echo e($user->status); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            
                            
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>