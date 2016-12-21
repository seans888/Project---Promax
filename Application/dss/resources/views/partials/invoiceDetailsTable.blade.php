<style>
.fixedwidth {
  width: auto;
}
</style>

  @if(session('affirm2'))
   <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            
            {{session('affirm2')}}
          </div>
    
  @endif
<div class="box-body table-responsive">
  
                        <table class="table table-hover">
                          <thead>
                          <tr>
                          
                            <th>Document Item</th>
                            <th>Notes</th>
                            <th>Amount</th>
                            
                            <th></th>
                          </tr>
                          </thead>
                         
                          <?php
                            $details = $Model->InvoiceDetails;
                          ?>
                          @if($canAdd)
                          <tr>
                            <td>
                              <select class = 'form-control' id="invoicedetail_document">
                                <option value = "">--Select a document--</option>
                                @foreach($documentItems as $document)
                                <option value = "{{$document->code}}">{{$document->code}}</option>
                                @endforeach
                              </select>
                            </td>
                            <td><input type = 'text' class = 'form-control' id="invoicedetail_note"/></td>
                            <td><input type = 'number' step='0.01' class = 'form-control' id = "invoicedetail_amount"/></td>
                            <td><button type="button" class="btn btn-default" id='invoicedetail_save' onclick="invoicedetailSave('{{$Model->id}}')"><i class="fa fa-save"></i></button>
                                   </td>
                          </tr>       
                          @endif                   
                          @foreach($details as $detail)

                          <tr id = "invoicedetail_{{$detail->id}}">
                            <td>{{$detail->documentItem_code}}</td>
                            <td>{{$detail->note}}</td>
                            <td>{{number_format($detail->amount,2)}}</td>
                            <td>
                              @if($Model->status == App\Constants::DRAFT && Auth::user()->canDelete('invoice'))
                              <button type="button" class="btn btn-default" id='invoicedetail_delete' onclick="invoicedetailDelete('{{$detail->id}}','{{$Model->id}}')"><i class="fa fa-trash"></i></button>
                              @endif
                            </td>
                          </tr>
                          @endforeach
                         
                          <tr style="border-top-style: solid">
                            <td><b>Total Amount</b></td>
                            <td></td>
                            <td><b>{{number_format($Model->Amount(),2)}}</b></td>
                            <td>
                            </td>
                          </tr>
                        </table>
                      </div>