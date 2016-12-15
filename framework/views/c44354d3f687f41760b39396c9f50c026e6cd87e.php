<?php $__env->startSection('content'); ?>
<?php
$token = csrf_token();
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#account" data-toggle="tab">Account</a></li>
              <li><a href="#accessrights" data-toggle="tab">Access Rights</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="account">
                <form class="form-horizontal" action="/saveAccountDetails" method="post">
                  <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                            <?php foreach($errors->all() as $error): ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                  <?php endif; ?>


                  <?php if((session('affirm'))): ?>
                  <div class="alert alert-info alert-dismissible" >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i></h4>
                    <?php echo e(session('affirm')); ?>

                  </div>
                  <?php endif; ?>
                  <input type="hidden" name="_token" value="<?php echo e($token); ?>">
                  <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">User name</label>

                    <div class="col-sm-10">
                      <input name = 'username' type="text" class="form-control" id="username" placeholder="username" value = "<?php echo e(Auth::user()->username); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input name = 'email' type="email" class="form-control" id="email" placeholder="Email" value = "<?php echo e(Auth::user()->email); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="accounttype" class="col-sm-2 control-label">Account type</label>

                    <div class="col-sm-10">
                      <input readonly name = 'accounttype' type="text" class="form-control" id="email" placeholder="Account Type" value = "<?php echo e(Auth::user()->UserType->desc); ?>">
                    </div>
                  </div>
                  <?php if(Auth::user()->employee_id == NULL): ?>
                  <div class="form-group">
                    <label for="accounttype" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input required name = 'name' type="text" class="form-control" id="email" placeholder="Full Name. if no employee is linked to this account" value = "<?php echo e(Auth::user()->name); ?>" />
                    </div>
                  </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                </form>
                <form class="form-horizontal" action = '/changePassword' method='post'>
                  <input type="hidden" name="_token" value="<?php echo e($token); ?>">
                  <h3>Change password</h3>
                  <div class="form-group">
                    <label for="oldpassword" class="col-sm-2 control-label">Current Password</label>

                    <div class="col-sm-10">
                      <input name = 'oldpassword' type="password" class="form-control" id="oldpassword" placeholder="Type your current password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-10">
                      <input name = 'password' type="password" class="form-control" id="password" placeholder="Type your new password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation" class="col-sm-2 control-label">Retype New Password</label>

                    <div class="col-sm-10">
                      <input name = 'password_confirmation' type="password" class="form-control" id="password_confirmation" placeholder="Type your new password">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </div>
                </form>
              </div>
              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="accessrights">
                <?php echo $__env->make('partials.AccessRightsTable', ['UserType' => Auth::user()->UserType, 'enabled' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>