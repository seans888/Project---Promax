<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Notes</th>
                            

                          </thead>
                          <?php
                            $usertypes = $Model;
                          ?>
                          @foreach($usertypes as $usertype)
                          <tr>
                            <td><a href = '/usertype/{{$usertype->code}}'>{{$usertype->desc}}</a></td>
                            <td>{{$usertype->desc}}</td>
                            <td>{{$usertype->notes}}</td>
                            
                            
                          </tr>
                          @endforeach
                        </table>
                      </div>