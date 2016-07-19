<div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
            
                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                
                <div class="col-sm-10">
                  <input type = 'hidden' name = 'id' value = '<?php echo e($Model->id); ?>' id='getUser_id'/>
                  <input required value="<?php echo e($Model->username); ?>" name='username' id="getUser_username" type="text" min="1" class="form-control"  />
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Whole name</label>
                 <div class="col-sm-10">
                  <input required id='getUser_name' name='name' value='<?php echo e(($Model->name) ? $Model->name : old("name")); ?>' type="text" class="form-control" />
                </div>
              </div>
              

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input required id='getUser_email' name='email' value='<?php echo e(($Model->email) ? $Model->email : old("email")); ?>' type="email" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">UserType</label>
                <div class="col-sm-10">
                  <select required id='getUser_UserType' name='UserType' class="form-control">
                    <option value = "">--Please select--</option>
                    <?php foreach(App\UserType::all() as $UserType): ?>
                    <option value = "<?php echo e($UserType->code); ?>" <?php echo e(($Model->usertype_code) ? (($UserType->code == $Model->usertype_code) ? "selected" : "") : (($UserType->code == old('UserType')) ? "selected" : "")); ?>><?php echo e($UserType->desc); ?></option>
                    <?php endforeach; ?>
                  </select>                  
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                  <select required id='getUser_status' name='status' class="form-control">
                    <option value = "">--Please select--</option>
                    <?php foreach(['active','blocked','pending change password'] as $choice): ?>
                    <option value = "<?php echo e($choice); ?>" <?php echo e(($Model->status) ? (($choice == $Model->status) ? "selected" : "") : (($choice == old('status')) ? "selected" : "")); ?>><?php echo e($choice); ?></option>
                    <?php endforeach; ?>
                  </select>                  
                </div>
              </div>
            </div>
          </div>
