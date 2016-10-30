<div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
            
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  
                    <input type = 'hidden' name = 'id' value = '{{$Model->id}}' id='getProperty_id'/>
                    <input required value="{{$Model->name}}" name='name' id="getProperty_name" type="text" min="1" class="form-control"  />
                   
                  
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Property description</label>
                 <div class="col-sm-10">
                  <input required id='getProperty_desc' name='desc' value='{{($Model->desc) ? $Model->desc : old("desc")}}' type="text" class="form-control"/>
                </div>
              </div>
              
      <div class="row">
        
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#PropertyForm_tenants" data-toggle="tab">Contracts</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="PropertyForm_tenants">                 
                <div class="box">
                  <div class="box-header">
                    
                    <div class="btn-group" style="margin-left:30px">
                      @if(Auth::user()->canAdd('properties') != null)
                      <button type="button" class="btn btn-default" id='PropertyForm_newtenant'><i class="fa fa-plus"></i></button>
                      @endif
                    </div>
                  </div>
                </form>
                  @include('partials.tenantsTable', ['Model' => $Model])
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

 