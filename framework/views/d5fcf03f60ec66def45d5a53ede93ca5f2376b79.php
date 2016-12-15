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
            <form action = "" method = "post" id = "<?php echo e($formID); ?>">
            <div class="btn-group">
              
            
                     <!-- Default box -->
              <?php echo csrf_field(); ?>

            
              <a href = "<?php echo e(URL::previous()); ?>"  class="btn btn-default" ><i class="fa fa-hand-o-left"></i></a>
              <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i></button>
              
              <?php if($cansave): ?>
              <button type="submit" class="btn btn-default"><i class="fa fa-save"></i></button>
              <?php endif; ?>
             
             

            </div>
          </div>
          <?php echo $__env->make($formViewPartial, ['wtax' => $wtax, 'vatax' => $vatax, 'penalty' => $penalty], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <!-- /.box-body -->
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>