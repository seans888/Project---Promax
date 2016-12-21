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
                        <table class="table table-hover" id="dataTable">
                          <thead>
                          <tr>
                          
                            <th>Ref. No.</th>
                            <th>Status.</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Amount applied to invoice</th>
                            <th>Description</th>
                          </tr>
                          </thead>
                         
                          <?php
                            $details = $Model->Payments;
                          ?>
                          @if($details != null)
                            @foreach($details as $detail)

                            <tr id = "paymentdetail_{{$detail->id}}">
                              <td><a href="/payment/get/{{$detail->ReferenceNumber()}}">{{$detail->ReferenceNumber()}}</a></td>
                              <td>{{$detail->status}}</td>
                              <td>{{$detail->date}}</td>
                              <td>{{$detail->amount}}</td>
                              <td>{{$detail->AmountAppliedForInvoice($Model->id)}}</td>
                              <td>{{$detail->desc}}</td>
                              <td></td>
                            </tr>
                            @endforeach
                          @endif
                         
                        </table>
                      </div>