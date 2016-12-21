<div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">UserType Code</label>
                <div class="col-sm-10">
                  <input required value="<?php echo e($Model->code); ?>" name='code' id="getUserType_code" value='<?php echo e($Model->code); ?>' type="text" min="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">UserType Desc</label>
                <div class="col-sm-10">
                  <input required id='getUserType_desc' name='desc' value='<?php echo e(($Model->desc) ? $Model->desc : old("desc")); ?>' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Notes</label>
                <div class="col-sm-10">
                  <Textarea placeholder = "describe the responsibility" id='getUserType_notes' name='notes'  rowspan='3' class="form-control"><?php echo e(($Model->notes) ? $Model->notes : old("notes")); ?></Textarea>                  
                </div>
              </div>

              
            </div>
          </div>