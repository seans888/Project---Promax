<div class="box-body">
            <div class="form-horizontal">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Unit Number: </label>
                <div class="col-sm-10">

                   <input required  type = 'text' class="form-control" name = 'unitCode' value = '{{$Model->unitCode}}' id='getUnits_unitCode'/>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Property: </label>
                <div class="col-sm-10">

                   <select name = 'property' class = "form-control" class = "col-sm-8" required>
					<option value = "">--Please Select--</option>
                    @foreach($properties as $property)
                      @if($Model->property_id != null)
                        @if($Model->property_id == $property->id)
                          <option selected value = "{{$property->id}}">{{$property->name}}</option>
                        @else
                          <option value = "{{$property->id}}">{{$property->name}}</option>
                        @endif
                      @else
                        @if(isset($_GET['property']) && $_GET['property'] == $property->name)
                          <option selected value = "{{$property->id}}">{{$property->name}}</option>
                        @else
                          <option value = "{{$property->id}}">{{$property->name}}</option>
                        @endif
                      @endif
                    @endforeach
                   </select>

                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Unit type: </label>
                <div class="col-sm-10">

                   <select name = 'unittype' class = "form-control" class = "col-sm-8" required>
					<option value = "">--Please Select--</option>
                    @foreach($Unittypes as $unittype)
                        <option {{($Model->unittype_unittype == $unittype->unittype) ? "selected" : ""}} value = "{{$unittype->unittype}}">{{$unittype->unittype}}</option>
                    @endforeach
                   </select>

                </div>
              </div>

              

            </div>
          </div>
         
              
      

 