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
                          @foreach($Users as $user)
                          <tr>
                            
                            <td><a href = '/user/{{$user->id}}'>{{$user->username}}</a></td>
                            <td>{{$user->employee_id ? $user->employee->name : $user->name}}</td>
                            <td>{{$user->usertype->desc}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->email}}</td>
                            
                            
                          </tr>
                          @endforeach
                        </table>
                      </div>