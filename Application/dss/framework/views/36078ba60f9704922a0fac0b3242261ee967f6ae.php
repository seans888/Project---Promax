<?php $__env->startSection('content'); ?><div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
        <?php echo csrf_field(); ?>

      <div class="form-group has-feedback">
        <?php if($errors->has('username')): ?>
            <span class="help-block">
                <strong style = "color:red;"><?php echo e($errors->first('username')); ?></strong>
            </span>
        <?php endif; ?>
        <?php if($errors->has('password')): ?>
            <span class="help-block">
                <strong style = "color:red;"><?php echo e($errors->first('password')); ?></strong>
            </span>
        <?php endif; ?>

        <select required class="form-control" placeholder="--Please Select--" name = 'company_id'>
        <option value = "">--Please select--</option>
        <?php foreach($companies as $company): ?>

            <option value = "<?php echo e($company->id); ?>" <?php echo ( $company->id == old('company_id') ) ? "selected" : ""; ?>><?php echo e($company->name); ?></option>
        <?php endforeach; ?>
        </select>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input required type="text" class="form-control" placeholder="username" name = 'username' value = "<?php echo e(old('username')); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required type="password" class="form-control" placeholder="Password" name = 'password'>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.loginLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>