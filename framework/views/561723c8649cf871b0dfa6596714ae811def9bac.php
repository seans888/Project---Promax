<div class="box-body">
            <div class="form-horizontal">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Unit Number: </label>
                <div class="col-sm-10">

                   <input required  type = 'text' class="form-control" name = 'unitCode' value = '<?php echo e($Model->unitCode); ?>' id='getUnits_unitCode'/>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Property: </label>
                <div class="col-sm-10">

                   <select name = 'property' class = "form-control" class = "col-sm-8" required>
					<option value = "">--Please Select--</option>
                    <?php foreach($properties as $property): ?>
                      <?php if($Model->property_id != null): ?>
                        <?php if($Model->property_id == $property->id): ?>
                          <option selected value = "<?php echo e($property->id); ?>"><?php echo e($property->name); ?></option>
                        <?php else: ?>
                          <option value = "<?php echo e($property->id); ?>"><?php echo e($property->name); ?></option>
                        <?php endif; ?>
                      <?php else: ?>
                        <?php if(isset($_GET['property']) && $_GET['property'] == $property->name): ?>
                          <option selected value = "<?php echo e($property->id); ?>"><?php echo e($property->name); ?></option>
                        <?php else: ?>
                          <option value = "<?php echo e($property->id); ?>"><?php echo e($property->name); ?></option>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                   </select>

                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Unit type: </label>
                <div class="col-sm-10">

                   <select name = 'unittype' class = "form-control" class = "col-sm-8" required>
					<option value = "">--Please Select--</option>
                    <?php foreach($Unittypes as $unittype): ?>
                        <option <?php echo e(($Model->unittype_unittype == $unittype->unittype) ? "selected" : ""); ?> value = "<?php echo e($unittype->unittype); ?>"><?php echo e($unittype->unittype); ?></option>
                    <?php endforeach; ?>
                   </select>

                </div>
              </div>

              

            </div>
          </div>
         
              
      

 