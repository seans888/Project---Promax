<div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Code</label>
                <div class="col-sm-10">
                  <input required value="{{$Model->code}}" name='code' id="getDocumentItem_code" value='{{$Model->code}}' type="text" min="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <input required id='getDocumentItem_desc' name='desc' value='{{($Model->desc) ? $Model->desc : old("desc")}}' type="text" class="form-control" />                  
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">System Defined</label>
                <div class="col-sm-10">
                  <input type='text' id='getDocumentItem_systemdefined' name='systemdefined' readonly class="form-control" value="{{($Model->systemVariable) ? 'yes': 'no' }}" />               
                </div>
              </div>
              
              <div class = "row">
                <div class = "col-sm-4">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">WTaxable</label>
                    <div class="col-sm-8">
                      <input type='checkbox' id='getDocumentItem_wtaxable' name='wtaxable' {{($Model->wtaxable) ? "checked" : ""}} />               
                    </div>
                  </div>
                </div>
                <div class = "col-sm-4">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">VATable</label>
                    <div class="col-sm-8">
                      <input type='checkbox' id='getDocumentItem_vataxable' name='vataxable' {{($Model->vataxable) ? "checked" : ""}} />               
                    </div>
                  </div>
                </div>
                <div class = "col-sm-4">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Penalizable</label>
                    <div class="col-sm-8">
                      <input type='checkbox' id='getDocumentItem_penalizable' name='penalizable' {{($Model->penalizable) ? "checked" : ""}} />               
                    </div>
                  </div>
                </div>
              </div>
              


              
          </div>