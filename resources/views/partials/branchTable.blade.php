<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                          <tr>
                            <th>Name</th>
                            <th>Description</th>
                          </tr>
                          </thead>
                         
                          <?php
                            $branches = $Model;
                          ?>
                          @foreach($branches as $branch)
                          <tr>
                            
                            <td><a href = '/project/{{$branch->id}}'>{{$branch->name}}</a></td>
                            <td>{{$branch->desc}}</td>
                            
                          </tr>
                          @endforeach
                        </table>
                      </div>