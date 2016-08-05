                  
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <tr>
                            <th>Company ID</th>
                            <th>Name</th>
                            <th>Parent Company</th>
                            <th>Desc</th>
                          </tr>
                          <?php
                            $Companies =$Model;
                          ?>
                          @foreach($Companies as $Company)
                          <tr>
                            <td>{{$Company->id}}</td>
                            <td><a href = '/company/{{$Company->id}}'>{{$Company->name}}</a></td>
                            <td>{{($Company->parent) ? $Company->parentCompany->name:""}}</td>
                            <td>{{$Company->desc}}</td>
                           
                          </tr>
                          @endforeach
                        </table>
                      </div>