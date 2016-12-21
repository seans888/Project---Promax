<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Tenant Name</th>
                          </thead>
                          <?php
                            $tenants = $Model;
                          ?>
                          <?php foreach($tenants as $tenant): ?>
                          <tr>
                            <td><a href = '/tenant/get/<?php echo e($tenant->id); ?>'><?php echo e($tenant->tenantname); ?></a></td>
                           
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>