<div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">UserType Code</label>
                <div class="col-sm-10">
                  <input required value="<?php echo e($Model->code); ?>" name='code' id="getUserType_code" value='<?php echo e($Model->code); ?>' type="text" min="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">UserType Desc</label>
                <div class="col-sm-10">
                  <input required id='getUserType_desc' name='desc' value='<?php echo e(($Model->desc) ? $Model->desc : old("desc")); ?>' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Notes</label>
                <div class="col-sm-10">
                  <Textarea placeholder = "describe the responsibility" id='getUserType_notes' name='notes'  rowspan='3' class="form-control"><?php echo e(($Model->notes) ? $Model->notes : old("notes")); ?></Textarea>                  
                </div>
              </div>

              <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Access Rights Table</h3>

                        
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                       <table class="table table-hover" id='dataTable'>
                          <thead>
                          <tr>
                            <th>Module</th>
                            <th>Process</th>
                            <th>Enabled</th>
                            <th>Can Add</th>
                            <th>Can Save</th>
                            <th>Can Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $usertype = $Model;
                            $UserTypeAccessLevelsAllRaw = $usertype->UserTypeAccessLevel();
                            $UserTypeAccessLevelsAll = $UserTypeAccessLevelsAllRaw->where('company_id', Auth::user()->company_id)
                            ->where('AccessLevel_code', '!=', 'myaccount')->get();
                            
                          ?>
                          <?php foreach($UserTypeAccessLevelsAll as $UserTypeAccessLevel): ?>
                          <tr>
                            <td><?php echo e($UserTypeAccessLevel->AccessLevel->code); ?></td>
                            <td><?php echo e($UserTypeAccessLevel->AccessLevel->process); ?></td>
                            <?php if(strtolower(Auth::user()->usertype_code) == "admin" || strtolower(Auth::user()->usertype_code) == "superadmin"): ?>
                            <td>
                              <label>
                                <input id = 'accessrights_<?php echo e($UserTypeAccessLevel->id); ?>' name = 'accessrights_<?php echo e($UserTypeAccessLevel->id); ?>' onclick="updateUserTypeAccess(<?php echo e($UserTypeAccessLevel->id); ?>);" type="checkbox"  <?php echo e(($UserTypeAccessLevel->enabled) ? "checked" : ""); ?> <?php echo e((strtolower($usertype->code) == 'admin' && $UserTypeAccessLevel->AccessLevel->code == "usertypes") ? "disabled" : ""); ?>>
                              </label>
                                
                            </td>
                            <td>
                              <label>
                                <input id = 'accessrights_CanAdd_<?php echo e($UserTypeAccessLevel->id); ?>' name = 'accessrights_CanAdd_<?php echo e($UserTypeAccessLevel->id); ?>' onclick="updateUserTypeAccess(<?php echo e($UserTypeAccessLevel->id); ?>);" type="checkbox"  <?php echo e(($UserTypeAccessLevel->canadd) ? "checked" : ""); ?> >
                              </label>
                                
                            </td>
                            <td>
                              <label>
                                <input id = 'accessrights_CanSave_<?php echo e($UserTypeAccessLevel->id); ?>' name = 'accessrights_CanSave_<?php echo e($UserTypeAccessLevel->id); ?>' onclick="updateUserTypeAccess(<?php echo e($UserTypeAccessLevel->id); ?>);" type="checkbox"  <?php echo e(($UserTypeAccessLevel->cansave) ? "checked" : ""); ?>>
                              </label>
                                
                            </td>
                           
                            <td>
                              <label>
                                <input id = 'accessrights_CanDelete_<?php echo e($UserTypeAccessLevel->id); ?>' name = 'accessrights_CanDelete_<?php echo e($UserTypeAccessLevel->id); ?>' onclick="updateUserTypeAccess(<?php echo e($UserTypeAccessLevel->id); ?>);" type="checkbox"  <?php echo e(($UserTypeAccessLevel->candelete) ? "checked" : ""); ?>>
                              </label>
                                
                            </td>
                            <?php else: ?>
                            <td>
                              <label>
                                <input id = 'accessrights_<?php echo e($UserTypeAccessLevel->id); ?>' name = 'accessrights_<?php echo e($UserTypeAccessLevel->id); ?>' type="checkbox" disabled <?php echo e(($UserTypeAccessLevel->enabled) ? "checked" : ""); ?> >
                              </label>
                                
                            </td>
                            <td>
                              <label>
                                <input id = 'accessrights_CanAdd_<?php echo e($UserTypeAccessLevel->id); ?>' name = 'accessrights_CanAdd_<?php echo e($UserTypeAccessLevel->id); ?>' disabled onclick="updateUserTypeAccess(<?php echo e($UserTypeAccessLevel->id); ?>);" type="checkbox"  <?php echo e(($UserTypeAccessLevel->canadd) ? "checked" : ""); ?> >
                              </label>
                                
                            </td>
                            <td>
                              <label>
                                <input id = 'accessrights_CanSave_<?php echo e($UserTypeAccessLevel->id); ?>' name = 'accessrights_CanSave_<?php echo e($UserTypeAccessLevel->id); ?>' disabled onclick="updateUserTypeAccess(<?php echo e($UserTypeAccessLevel->id); ?>);" type="checkbox"  <?php echo e(($UserTypeAccessLevel->cansave) ? "checked" : ""); ?>>
                              </label>
                                
                            </td>
                           
                            <td>
                              <label>
                                <input id = 'accessrights_CanDelete_<?php echo e($UserTypeAccessLevel->id); ?>' name = 'accessrights_CanDelete_<?php echo e($UserTypeAccessLevel->id); ?>' disabled onclick="updateUserTypeAccess(<?php echo e($UserTypeAccessLevel->id); ?>);" type="checkbox"  <?php echo e(($UserTypeAccessLevel->candelete) ? "checked" : ""); ?>>
                              </label>
                                
                            </td>
                            <?php endif; ?>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
            </div>
          </div>