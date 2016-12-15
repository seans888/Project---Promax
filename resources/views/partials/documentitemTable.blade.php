<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Code</th>
                            <th>Description</th>
                            <th>VATable</th>
                            <th>WTaxable</th>
                            <th>Penalizable</th>
                            <th>System Defined</th>
                            

                          </thead>
                          <?php
                            $documentitems = $Model;
                          ?>
                          @foreach($documentitems as $documentitem)
                          <tr>
                            <td><a href = '/documentitem/get/{{$documentitem->code}}'>{{$documentitem->code}}</a></td>
                            <td>{{$documentitem->desc}}</td>
                            <td>{{($documentitem->vataxable) ? "yes" : "no"}}</td>
                            <td>{{($documentitem->wtaxable) ? "yes" : "no"}}</td>
                            <td>{{($documentitem->penalizable) ? "yes" : "no"}}</td>
                            <td>{{($documentitem->systemVariable) ? "yes" : "no"}}</td>
                          </tr>
                          @endforeach
                        </table>
                      </div>