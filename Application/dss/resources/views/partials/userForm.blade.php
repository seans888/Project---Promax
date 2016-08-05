<div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
            
                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                
                <div class="col-sm-10">
                  <input type = 'hidden' name = 'id' value = '{{$Model->id}}' id='getUser_id'/>
                  <input required value="{{$Model->username}}" name='username' id="getUser_username" type="text" min="1" class="form-control"  />
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Whole name</label>
                 <div class="col-sm-10">
                  <input required id='getUser_name' name='name' value='{{($Model->name) ? $Model->name : old("name")}}' type="text" class="form-control" />
                </div>
              </div>
              

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input required id='getUser_email' name='email' value='{{($Model->email) ? $Model->email : old("email")}}' type="email" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">UserType</label>
                <div class="col-sm-10">
                  <select required id='getUser_UserType' name='UserType' class="form-control">
                    <option value = "">--Please select--</option>
                    @foreach(App\UserType::all() as $UserType)
                    <option value = "{{$UserType->code}}" {{ ($Model->usertype_code) ? (($UserType->code == $Model->usertype_code) ? "selected" : "") : (($UserType->code == old('UserType')) ? "selected" : "")  }}>{{$UserType->desc}}</option>
                    @endforeach
                  </select>                  
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                  <select required id='getUser_status' name='status' class="form-control">
                    <option value = "">--Please select--</option>
                    @foreach(['active','blocked','pending change password'] as $choice)
                    <option value = "{{$choice}}" {{ ($Model->status) ? (($choice == $Model->status) ? "selected" : "") : (($choice == old('status')) ? "selected" : "")  }}>{{$choice}}</option>
                    @endforeach
                  </select>                  
                </div>
              </div>
            </div>
          </div>
