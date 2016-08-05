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
                          @foreach($UserTypeAccessLevelsAll as $UserTypeAccessLevel)
                          <tr>
                            <td>{{$UserTypeAccessLevel->AccessLevel->code}}</td>
                            <td>{{$UserTypeAccessLevel->AccessLevel->process}}</td>
                            <td>
                              <label>
                                <input {{($enabled == false) ? "disabled" : ""}} type="checkbox"  {{($UserTypeAccessLevel->enabled) ? "checked" : ""}}>
                              </label>
                                
                            </td>
                           
                          </tr>
                          @endforeach
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </form>