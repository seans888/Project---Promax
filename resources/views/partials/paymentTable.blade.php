<div class="box-body table-responsive">
                        <table class="table table-hover" id="dataTable">
                          <thead>
                            <th>Reference Number</th>
                            <th>Payment Date</th>
                            <th>Payment Status</th>
                            <th>Payer</th>
                            <th>Amount</th>
                            </thead>
                          <?php
                            $payments = $Model;
                          ?>
                          @foreach($payments as $payment)
                          <tr>
                            <td><a href = '/payment/get/{{$payment->ReferenceNumber()}}'>{{$payment->ReferenceNumber()}}</a></td>
                            <td>{{$payment->date}}</td>
                            <td>{{$payment->status}}</td>
                            <td>{{$payment->Payer()}}</td>
                            <td>{{number_format($payment->amount, 2)}}</td>
                          </tr>
                          @endforeach
                        </table>
                      </div>