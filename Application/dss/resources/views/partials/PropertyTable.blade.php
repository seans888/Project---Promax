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
                          @foreach($Properties as $Property)
                          <tr>
                            
                            <td><a href = '/property/get/{{$Property->id}}'>{{$Property->name}}</a></td>
                            <td>{{$Property->desc}}</td>
                            
                          </tr>
                          @endforeach
                        </table>
                      </div>