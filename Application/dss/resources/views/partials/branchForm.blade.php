<div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
            
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  
                    <input type = 'hidden' name = 'id' value = '{{$Model->id}}' id='getbranch_id'/>
                    <input required value="{{$Model->name}}" name='name' id="getbranch_name" type="text" min="1" class="form-control"  />
                   
                  
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Project description</label>
                 <div class="col-sm-10">
                  <input required id='getbranch_desc' name='desc' value='{{($Model->desc) ? $Model->desc : old("desc")}}' type="text" class="form-control"/>
                </div>
              </div>
              
      <div class="row">
        
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#branchForm_tenants" data-toggle="tab">Tenants</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="branchForm_tenants">                 
                <div class="box">
                  <div class="box-header">
                    
                    <div class="btn-group" style="margin-left:30px">
                      <button type="button" class="btn btn-default" id='branchForm_newtenant'><i class="fa fa-plus"></i></button>
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

 