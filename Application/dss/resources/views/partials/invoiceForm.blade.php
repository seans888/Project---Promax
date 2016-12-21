<div class="box-body">
            <div class="form-horizontal">
               <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Invoice Number: </label>
                    <div class="col-sm-8">
                      <input readonly type = 'number' class="form-control" name = 'id' value = '{{$Model->id}}' id='getInvoice_id' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Status: </label>
                    <div class="col-sm-8">
                      <input type = 'text' readonly class="form-control" name = 'status' id='getInvoice_status' value ="{{($Model->status != null) ? $Model->status : App\Constants::DRAFT}}" {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }} />
                      
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Billing Date: </label>
                    <div class="col-sm-8">
                      <input required type = 'date' class="form-control" name = 'date' value = '{{($Model->date != null) ? $Model->date : date("Y-m-d")}}' id='getInvoice_date' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Contract ID: </label>
                    <div class="col-sm-8">
                    @if($Model->status == null || $Model->status == App\Constants::DRAFT)
                      <select class="form-control" name = 'reservationcontract_id' id='getInvoice_contractid' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}>
                        <option value = ""></option>
                        @foreach($contracts as $contract)
                          <option value = "{{$contract->id}}" {{($Model->reservationcontract_id == $contract->id) ? "selected" : ""}}>{{$contract->id}} - {{$contract->businessname}}; Unit: {{$contract->unitnumber}}; start date: {{$contract->startdate}}</option>
                        @endforeach
                      </select>
                      @else
                      <input class="form-control" type = 'text' readonly value='{{$Model->reservationcontract_id}}' />
                      @endif
                    </div>
                  </div>
                </div>
              </div> <!-- end row -->


               <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Billing Period Start: </label>
                    <div class="col-sm-8">
                      <input  type = 'date' class="form-control" name = 'billingPeriodStart' value = '{{$Model->billingPeriodStart}}' id='getInvoice_billingPeriodStart' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Billing Period End: </label>
                    <div class="col-sm-8">
                       <input type = 'date' class="form-control" name = 'billingPeriodEnd' value = '{{$Model->billingPeriodEnd}}' id='getInvoice_billingPeriodEnd' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Due Date: </label>
                    <div class="col-sm-8">
                      <input  type = 'date' class="form-control" name = 'duedate' value = '{{$Model->duedate}}' id='getInvoice_duedate' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Issued By: </label>
                    <div class="col-sm-8">
                     <input readonly type = 'text' class="form-control" name = 'issuedBy' value = '{{($Model->issuedBy == null) ? Auth::user()->name : $Model->issuedBy}}' id='getInvoice_issuedBy' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                   
                    </div>
                  </div>
                </div>
              </div> <!-- end row -->

               <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Total Amount: </label>
                    <div class="col-sm-8">
                      <input readonly type = 'text' step = '0.01' class="form-control" value = '{{number_format($Model->Amount(),2)}}' id='getInvoice_billingPeriodStart' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Total Balance: </label>
                    <div class="col-sm-8">
                       <input readonly type = 'text'  step = '0.01' class="form-control" value = '{{number_format($Model->Balance(),2)}}' id='getInvoice_billingPeriodEnd' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
                <div class = "col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Description: </label>
                    <div class="col-md-10">
                       <input type = 'text' class="form-control" name = 'desc' value = '{{$Model->desc}}' id='getInvoice_desc' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}/>
                    </div>
                  </div>
                </div>
                
              </div> <!-- end row -->

               <div class ="row">
                <div class = "col-sm-3">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Payer: </label>
                    <div class="col-sm-8">
                      <select required class="form-control" name = 'payer' id='getInvoice_payer' {{($Model->status != null && $Model->status != App\Constants::DRAFT) ? "disabled" : "" }}>
                          <option value = ""></option>
                          @foreach($payers as $payer)
                            <option value = "{{$payer->id}}" {{($Model->payer_id == $payer->id) ? "selected" : ""}}>{{$payer->tenantname}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                
                </div>
                
              </div> <!-- end row -->
            </div>
            <div class="row">
        
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#invoiceForm_documentDetails" data-toggle="tab">Document Details</a></li>
              <li><a href="#invoiceForm_paymentDetails" data-toggle="tab"  >Payment Details</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="invoiceForm_documentDetails">                 
                <div class="box">
                  <div class="box-header">
                    
                    <div class="btn-group" style="margin-left:30px">
                      @if(Auth::user()->canAdd('invoice') && $Model->status == App\Constants::DRAFT)
                      <!-- <button type="button" class="btn btn-default" id='getInvoice_newdocumentdetail'><i class="fa fa-plus"></i></button> -->
                      @endif
                    </div>
                  </div>
                </form>
                  @include('partials.invoiceDetailsTable', ['Model' => $Model, 'canAdd' => (Auth::user()->canAdd('invoice') && $Model->status == App\Constants::DRAFT) ? true : false, 'documentItems' => $documentItems ])
                </div>
              </div>

                </form>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="invoiceForm_paymentDetails">                 
                <div class="box">
                  <div class="box-header">
                    
                    <div class="btn-group" style="margin-left:30px">
                      @if(Auth::user()->canAdd('payment') && $Model->Balance() > 0 && $Model->status == App\Constants::INVOICE_UNPAID)
                      <form action = "/invoice/generatepayment/{{$Model->id}}" method = "POST">
                        {!! csrf_field() !!}
                      <input type = 'text' name = 'referencenumber' id = 'getInvoice_newpaymentreferencenumber' placeholder = 'Enter Payment Reference number' class = "form-control" />
                      <input type = 'number' step = '0.01' name = 'amountpaid' id = 'getInvoice_amountpaid' placeholder = 'Payment Amount' class = "form-control" required name = 'amountpaid'/>
                      <input type="submit" class="btn btn-default" id='getInvoice_newpayment' value = "Apply Payment" />
                      </form>
                      @endif
                    </div>
                  </div>
                  @include('partials.paymentDetailsTable', ['Model' => $Model])
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