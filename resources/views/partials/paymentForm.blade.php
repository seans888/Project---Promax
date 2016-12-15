  <div class="box-body">
            <div class="form-horizontal">
              <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Reference Number: </label>
                    <div class="col-sm-8">
                      <input type = 'text' class="form-control" name = 'referencenumber' value = '{{$Model->ReferenceNumber()}}' id='getPayment_id' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Payment Status: </label>
                    <div class="col-sm-8">
                      <input type = 'text' readonly class="form-control" name = 'status' id='getPayment_status' value ="{{($Model->status != null) ? $Model->status : App\Constants::DRAFT}}" {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }} />
                      
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Payment Date: </label>
                    <div class="col-sm-8">
                      <input required type = 'date' class="form-control" name = 'date' value = '{{$Model->date}}' id='getPayment_date' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Total Payment Amount: </label>
                    <div class="col-sm-8">
                      <input required type = 'number' step = '0.01' class="form-control" name = 'amount' value = '{{$Model->amount}}' id='getPayment_date' {{(($Model->status != null && $Model->status != App\Constants::DRAFT) || $Model->amount > 0) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
              </div> <!-- end row -->
              <div class = "row">
                <div class = "col-sm-12">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">Description: </label>
                    <div class="col-sm-11">
                      <input type = 'text' class = "form-control" value = "{{$Model->desc}}" name = "desc"  {{( ($Model->status != null && $Model->status != App\Constants::DRAFT)) ? "disabled" : "" }} {{($Model->status == null) ? "required" : ""}} />
                    </div>
                  </div>
                </div>
              </div><!-- end row -->
              <hr>
              <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Available Balance: </label>
                    <div class="col-sm-8">
                      <input type = 'text' class = "form-control" name = "availableBalance" disabled value = "{{$Model->PaymentAvailableBalance()}}"/>
                    
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Apply Invoice: </label>
                    <div class="col-sm-8">
                      <select class = "form-control" name = 'applyinvoice' >
                        <option value = ""></option>
                        @foreach($invoices as $invoice)
                          
                        <option value = "{{$invoice->id}}">{{$invoice->id}} - {{number_format($invoice->Balance(), 2)}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Apply Payment Amount: </label>
                    <div class="col-sm-8">
                      <input type = 'number' step="0.01" class = "form-control" name = "paymentAmountForInvoice"  {{( ($Model->status != null && $Model->status != App\Constants::DRAFT)) ? "disabled" : "" }} {{($Model->status == null) ? "required" : ""}} {{($Model->amount > 0) ? "max=" . $Model->PaymentAvailableBalance() . "":""}} min = "1"/>
                    </div>
                  </div>
                </div>
                 
              </div><!-- end row -->
              
            </div><!-- end Form -->

            <div class="row">
        
              <div class="col-md-12">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#invoiceForm_documentDetails" data-toggle="tab">List of Invoices</a></li>
                  </ul>

                  <div class="tab-content">
                    <div class="active tab-pane" id="invoiceForm_documentDetails">                 
                      <div class="box">
                        <div class="box-header">
                          
                          <div class="btn-group" style="margin-left:30px">
                            
                          </div>
                        </div>
                      </form>
                        @include('partials.PaymentinvoiceTable', ['Model' => $Model->InvoicePayments])
                      </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="invoiceForm_paymentDetails">                 
                      <div class="box">
                        <div class="box-header">
                          
                          <div class="btn-group" style="margin-left:30px">
                            @if(Auth::user()->canAdd('payment') && $Model->PaymentAvailableBalance() > 0)
                            <button type="button" class="btn btn-default" id='getPayment_newdocumentdetail'><i class="fa fa-plus"></i></button>
                            @endif
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
              </div>
              <!-- /.col -->
            </div>
          </div>