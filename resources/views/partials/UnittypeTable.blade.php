<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Unit type</th>
                          </thead>
                          <?php
                            $unittypes = $Model;
                          ?>
                          @foreach($unittypes as $unittype)
                          <tr>
                            <td><a href = '/unittype/get/{{$unittype->unittype}}'>{{$unittype->unittype}}</a></td>
                           
                          </tr>
                          @endforeach
                        </table>
                      </div>