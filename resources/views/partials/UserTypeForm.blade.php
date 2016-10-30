<div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">UserType Code</label>
                <div class="col-sm-10">
                  <input required value="{{$Model->code}}" name='code' id="getUserType_code" value='{{$Model->code}}' type="text" min="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">UserType Desc</label>
                <div class="col-sm-10">
                  <input required id='getUserType_desc' name='desc' value='{{($Model->desc) ? $Model->desc : old("desc")}}' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Notes</label>
                <div class="col-sm-10">
                  <Textarea placeholder = "describe the responsibility" id='getUserType_notes' name='notes'  rowspan='3' class="form-control">{{($Model->notes) ? $Model->notes : old("notes")}}</Textarea>                  
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
                          @foreach($UserTypeAccessLevelsAll as $UserTypeAccessLevel)
                          <tr>
                            <td>{{$UserTypeAccessLevel->AccessLevel->code}}</td>
                            <td>{{$UserTypeAccessLevel->AccessLevel->process}}</td>
                            @if(strtolower(Auth::user()->usertype_code) == "admin" || strtolower(Auth::user()->usertype_code) == "superadmin")
                            <td>
                              <label>
                                <input id = 'accessrights_{{$UserTypeAccessLevel->id}}' name = 'accessrights_{{$UserTypeAccessLevel->id}}' onclick="updateUserTypeAccess({{$UserTypeAccessLevel->id}});" type="checkbox"  {{($UserTypeAccessLevel->enabled) ? "checked" : "" }} {{ (strtolower($usertype->code) == 'admin' && $UserTypeAccessLevel->AccessLevel->code == "usertypes") ? "disabled" : "" }}>
                              </label>
                                
                            </td>
                            <td>
                              <label>
                                <input id = 'accessrights_CanAdd_{{$UserTypeAccessLevel->id}}' name = 'accessrights_CanAdd_{{$UserTypeAccessLevel->id}}' onclick="updateUserTypeAccess({{$UserTypeAccessLevel->id}});" type="checkbox"  {{($UserTypeAccessLevel->canadd) ? "checked" : ""}} >
                              </label>
                                
                            </td>
                            <td>
                              <label>
                                <input id = 'accessrights_CanSave_{{$UserTypeAccessLevel->id}}' name = 'accessrights_CanSave_{{$UserTypeAccessLevel->id}}' onclick="updateUserTypeAccess({{$UserTypeAccessLevel->id}});" type="checkbox"  {{($UserTypeAccessLevel->cansave) ? "checked" : ""}}>
                              </label>
                                
                            </td>
                           
                            <td>
                              <label>
                                <input id = 'accessrights_CanDelete_{{$UserTypeAccessLevel->id}}' name = 'accessrights_CanDelete_{{$UserTypeAccessLevel->id}}' onclick="updateUserTypeAccess({{$UserTypeAccessLevel->id}});" type="checkbox"  {{($UserTypeAccessLevel->candelete) ? "checked" : ""}}>
                              </label>
                                
                            </td>
                            @else
                            <td>
                              <label>
                                <input id = 'accessrights_{{$UserTypeAccessLevel->id}}' name = 'accessrights_{{$UserTypeAccessLevel->id}}' type="checkbox" disabled {{($UserTypeAccessLevel->enabled) ? "checked" : "" }} >
                              </label>
                                
                            </td>
                            <td>
                              <label>
                                <input id = 'accessrights_CanAdd_{{$UserTypeAccessLevel->id}}' name = 'accessrights_CanAdd_{{$UserTypeAccessLevel->id}}' disabled onclick="updateUserTypeAccess({{$UserTypeAccessLevel->id}});" type="checkbox"  {{($UserTypeAccessLevel->canadd) ? "checked" : ""}} >
                              </label>
                                
                            </td>
                            <td>
                              <label>
                                <input id = 'accessrights_CanSave_{{$UserTypeAccessLevel->id}}' name = 'accessrights_CanSave_{{$UserTypeAccessLevel->id}}' disabled onclick="updateUserTypeAccess({{$UserTypeAccessLevel->id}});" type="checkbox"  {{($UserTypeAccessLevel->cansave) ? "checked" : ""}}>
                              </label>
                                
                            </td>
                           
                            <td>
                              <label>
                                <input id = 'accessrights_CanDelete_{{$UserTypeAccessLevel->id}}' name = 'accessrights_CanDelete_{{$UserTypeAccessLevel->id}}' disabled onclick="updateUserTypeAccess({{$UserTypeAccessLevel->id}});" type="checkbox"  {{($UserTypeAccessLevel->candelete) ? "checked" : ""}}>
                              </label>
                                
                            </td>
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
            </div>
          </div>