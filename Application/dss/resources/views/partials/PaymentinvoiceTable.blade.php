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
                            <th>Amount Applied</th>
                            <th>Balance</th>
                            <th></th>
                          </thead>
                          <?php
                            $invoicePayments = $Model;
                          ?>
                          @foreach($invoicePayments as $invoicePayment)
                          <tr>
                            <td><a href = '/invoice/get/{{$invoicePayment->Invoice->id}}'>{{$invoicePayment->Invoice->id}}</a></td>
                            <td>{{$invoicePayment->Invoice->status}}</td>
                            <td>{{$invoicePayment->Invoice->date}}</td>
                            <td>{{$invoicePayment->Invoice->billingPeriodStart}}</td>
                            <td>{{$invoicePayment->Invoice->billingPeriodEnd}}</td>
                            <td>{{$invoicePayment->Invoice->duedate}}</td>
                            <td>{{$invoicePayment->Invoice->issuedBy}}</td>
                            <td>{{number_format($invoicePayment->Invoice->Amount(), 2)}}</td>
                            <td>{{number_format($invoicePayment->paymentAmountForInvoice, 2)}}</td>
                            <td>{{number_format($invoicePayment->Invoice->Balance(),2)}}</td>
                            <td>
                              @if($Model->first()->Payment->status == "On Hold" && Auth::user()->canDelete('payment'))
                              <button type="button" class="btn btn-default" onclick="invoicepaymentDelete('{{$invoicePayment->id}}','{{$invoicePayment->referencenumber}}')"><i class="fa fa-trash"></i></button>
                              @endif
                            </td>
                          </tr>
                          @endforeach
                        </table>
                      </div>