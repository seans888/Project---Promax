                  <form class="form-horizontal">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Access Rights Table</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <tr>
                            <th>Module</th>
                            <th>Process</th>
                            <th>Enabled</th>
                          </tr>
                          <?php
                            $usertype = $UserType;
                            $UserTypeAccessLevelsAllRaw = $usertype->UserTypeAccessLevel();
                            $UserTypeAccessLevelsAll = $UserTypeAccessLevelsAllRaw->where('company_id', Auth::user()->company_id)->get();
                            
                          ?>
                          <?php foreach($UserTypeAccessLevelsAll as $UserTypeAccessLevel): ?>
                          <tr>
                            <td><?php echo e($UserTypeAccessLevel->AccessLevel->code); ?></td>
                            <td><?php echo e($UserTypeAccessLevel->AccessLevel->process); ?></td>
                            <td>
                              <label>
                                <input <?php echo e(($enabled == false) ? "disabled" : ""); ?> type="checkbox"  <?php echo e(($UserTypeAccessLevel->enabled) ? "checked" : ""); ?>>
                              </label>
                                
                            </td>
                           
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </form>