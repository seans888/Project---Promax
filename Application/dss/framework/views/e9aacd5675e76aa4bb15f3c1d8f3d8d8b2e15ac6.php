<div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">W/H Tax & Other Taxes (percent)</label>
                <div class="col-sm-10">
                  <input required value="<?php echo e($wtax->percent); ?>" name='wtax' id="getpercentpricing_wtax" type="number"  step="0.01" class="form-control"  />
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">VAT (percent)</label>
                <div class="col-sm-10">
                  <input required value="<?php echo e($vatax->percent); ?>" name='vatax' id="getpercentpricing_vat" type="number"  step="0.01" class="form-control"  />
                </div>
              </div>
			  <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Penalty (percent)</label>
                <div class="col-sm-10">
                  <input required value="<?php echo e($penalty->percent); ?>" name='penalty' id="getpercentpricing_penalty" type="number"  step="0.01" class="form-control"  />
                </div>
              </div>
              
          </div>