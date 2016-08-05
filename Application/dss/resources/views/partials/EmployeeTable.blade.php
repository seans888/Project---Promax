<div class="box-body table-responsive">
                        <table class="table table-hover" id='dataTable'>
                          <thead>
                          <tr>
                          @if($mode == "optionButton" || $mode == "checkbox")
                            <th>Select</th>
                          @endif
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Employee Type</th>
                            <th>Position</th>
                            <th>Department</th>
                          </tr>
                          </thead>
                          @if($mode == "optionButton" || $mode == "checkbox")
                          @if($nullable)
                          <tr>
                            <td><input type = 'radio' name = 'EmployeeLookup'  value = '' {{($selectedID == '') ? "checked" : ""}}/></td>
                            <td>Unnassign Employee</td>
                            <td>Unnassign Employee</td>
                            <td>Unnassign Employee</td>
                            <td>Unnassign Employee</td>
                            <td>Unnassign Employee</td>
                            <td>Unnassign Employee</td>
                            <td>Unnassign Employee</td>
                            <td>Unnassign Employee</td>
                          </tr>
                          @endif
                          @endif
                          
                          <?php
                            $Employees = $Model;
                          ?>
                          @foreach($Employees as $Employee)
                          <tr>
                         
                          @if($mode == "optionButton" || $mode == "checkbox")
                            <td><input id="EmployeeLookup{{$Employee->id}}" type = 'radio' name = 'EmployeeLookup' value = '{{$Employee->id}}' {{($selectedID == $Employee->id) ? "checked" : ""}}/></td>
                          @endif

                            <td><a href = '/employee/{{$Employee->id}}'>{{$Employee->code}}</a></td>
                            <td>{{$Employee->name}}</td>
                            <td>{{$Employee->contact1}}</td>
                            <td>{{$Employee->email}}</td>
                            <td>{{$Employee->status}}</td>
                            <td>{{$Employee->employeeType}}</td>
                            <td>{{$Employee->position}}</td>
                            <td>{{$Employee->Department_code}}</td>
                            
                          </tr>
                          @endforeach
                        </table>
                      </div>