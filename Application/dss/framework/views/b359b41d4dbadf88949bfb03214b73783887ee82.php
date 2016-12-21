<?php $__env->startSection('content'); ?>
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo e(ucfirst($title)); ?>

      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <form class="form-horizontal">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo e($header); ?></h3>
              <?php if($canAdd): ?>
              <a href="<?php echo e($create); ?>" style="margin-left:20px;">Add</a>
              <?php endif; ?>
              
            </div>
            <!-- /.box-header -->
            <?php
            $data['Model'] = $Model;
            $data['mode'] = "";
            ?>
             <?php echo $__env->make($tablePartialView, $data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>