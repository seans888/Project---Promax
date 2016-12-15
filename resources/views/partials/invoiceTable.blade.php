<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Invoice Number</th>
                            <th>Status</th>
                            <th>Billing Date</th>
                            <th>Billing Period Start</th>
                            <th>Billing Period End</th>
                            <th>Due Date</th>
                            <th>Issued By</th>
                            <th>Amount</th>
                            <th>Balance</th>
                          </thead>
                          <?php
                            $invoices = $Model;
                          ?>
                          @foreach($invoices as $invoice)
                          <tr>
                            <td><a href = '/invoice/get/{{$invoice->id}}'>{{$invoice->id}}</a></td>
                            <td>{{$invoice->status}}</td>
                            <td>{{$invoice->date}}</td>
                            <td>{{$invoice->billingPeriodStart}}</td>
                            <td>{{$invoice->billingPeriodEnd}}</td>
                            <td>{{$invoice->duedate}}</td>
                            <td>{{$invoice->issuedBy}}</td>
                            <td>{{number_format($invoice->Amount(), 2)}}
                            <td>{{number_format($invoice->Balance(), 2)}}
                          </tr>
                          @endforeach
                        </table>
                      </div>