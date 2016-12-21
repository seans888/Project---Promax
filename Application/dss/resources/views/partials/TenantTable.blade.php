<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Tenant Name</th>
                          </thead>
                          <?php
                            $tenants = $Model;
                          ?>
                          @foreach($tenants as $tenant)
                          <tr>
                            <td><a href = '/tenant/get/{{$tenant->id}}'>{{$tenant->tenantname}}</a></td>
                           
                          </tr>
                          @endforeach
                        </table>
                      </div>