<?php $__env->startSection('content'); ?>
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Company
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <form action = "" method = "post">
      <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($errors->all() as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
      <?php endif; ?>
      <?php if(session('affirm')): ?>
       <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                <?php echo e(session('affirm')); ?>

              </div>
        
      <?php endif; ?>
        <!-- Default box -->
        <?php echo csrf_field(); ?>

        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="btn-group">
              <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i></button>
              <?php if($cansave): ?>
              <button type="submit" class="btn btn-default"><i class="fa fa-save"></i></button>
              <?php endif; ?>
               <a href = "/company"  class="btn btn-default"><i class="fa fa-list"></i></a>
            </div>
          </div>
          <div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Company ID</label>
                <div class="col-sm-10">
                  <input value="<?php echo e($Company->id); ?>" name='id' id="getCompany_companyID" value='<?php echo e($Company->ID); ?>' type="number" min="1" class="form-control" />
                </div>
                
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Company Name</label>
                <div class="col-sm-10">
                  <input id='getCompany_companyName' name='name' value='<?php echo e($Company->name); ?>' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Company Description</label>
                <div class="col-sm-10">
                  <textarea id = 'getCompany_companyDesc' name = 'desc' class="form-control" rows="3" placeholder="Name, Address, etc..."><?php echo e($Company->desc); ?></textarea>
                </div>
              </div>
              
            </div>
          </div>
          <!-- /.box-body -->
        </dipv>
        <!-- /.box -->
      </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>