<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Unit Number</th>
                            <th>Property</th>
                            <th>Unit type</th>

                          </thead>
                          <?php
                            $units = $Model;
                          ?>
                          @foreach($units as $unit)
                          <tr>
                            <td><a href = '/units/get/{{$unit->unitCode}}'>{{$unit->unitCode}}</a></td>
                            <td>{{$unit->Property->name}}</td>
                            <td>{{$unit->unittype_unittype}}</td>
                           
                          </tr>
                          @endforeach
                        </table>
                      </div>