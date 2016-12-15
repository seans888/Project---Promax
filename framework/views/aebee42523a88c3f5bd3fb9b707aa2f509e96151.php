<?php $__env->startSection('content'); ?>
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo e(UCFirst($title)); ?>

      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

    
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
       <?php if(session('info')): ?>
       <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                <?php echo e(session('info')); ?>

              </div>
        
      <?php endif; ?>
        <div class="box box-primary">
          <div class="box-header with-border"> 
            <form action = "" method = "post" id = "<?php echo e($formID); ?>" class="mjform">
            <div class="btn-group">
              
            
                     <!-- Default box -->
              <?php echo csrf_field(); ?>

              <?php
              $navigator = $Model;

              ?>
              <a href = "<?php echo e(URL::previous()); ?>"  class="btn btn-default" ><i class="fa fa-hand-o-left"></i></a>
              <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i></button>
              <?php if($canadd): ?> 
              <a href = "<?php echo e($create); ?>"  class="btn btn-default" id="<?php echo e($ModelIDnew); ?>"><i class="fa fa-plus"></i></a>
              <?php endif; ?>
              <?php if($cansave): ?>
              <button type="submit" class="btn btn-default" ><i class="fa fa-save"></i></button>
              <?php endif; ?>
              <?php if($candelete): ?>
              <button type="button" class="btn btn-default" id="<?php echo e($ModelIDdelete); ?>"><i class="fa fa-trash"></i></button>
              <?php endif; ?>
              <a href = "/<?php echo e($ModelURIlistview); ?>"  class="btn btn-default"><i class="fa fa-list"></i></a>
              <?php foreach($actions as $customButtons): ?>
              <?php echo $customButtons; ?>

              <?php endforeach; ?>
            </div>
          </div>
          <?php echo $__env->make($formViewPartial, ['Model' => $Model], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <!-- /.box-body -->
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>