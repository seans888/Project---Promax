<!DOCTYPE html> <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <title>DSS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome-4.6.3/css/font-awesome.min.css')); ?>">
  
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  <link rel="stylesheet" href="<?php echo e(asset('css/ionicons-2.0.1/css/ionicons.min.css')); ?>">
   
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/skins/_all-skins.min.css')); ?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/all.css')); ?>">


  <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">

  <!-- HTML5 Shim and Respond.js')}} IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo e(Auth::user()->company->name); ?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo e(Auth::user()->company->name); ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"><?php echo e((Auth::user()->employee) ? Auth::user()->employee->name : Auth::user()->name); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="height:100px">
                

                <p>
                  <?php echo e((Auth::user()->employee) ? Auth::user()->employee->name: Auth::user()->name); ?> - <?php echo e(Auth::user()->usertype->desc); ?>

                  <small>Registered since <?php echo e(Auth::user()->created_at->format('M j, Y')); ?></small>
                </p>
              </li>
              
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="./myaccount" class="btn btn-default btn-flat">My Account</a>
                </div>
                <div class="pull-right">
                  <a href="./logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
         User:
        </div>
        <div class="pull-left info">
          <p><?php echo e(Auth::user()->username); ?></p>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
    <?php
    $UserTypeAccessLevelsRaw = Auth::user()->UserType->UserTypeAccessLevel();
    $UserTypeAccessLevels = $UserTypeAccessLevelsRaw->where('enabled', 1)->where('company_id', Auth::user()->company_id)->get();
    $AccessLevels = []; 
    foreach($UserTypeAccessLevels as $UserTypeAccessLevel){
      $AccessLevels[] = $UserTypeAccessLevel->AccessLevel;
    }
    $collectionAccessLevels = collect($AccessLevels);
    ?>

      <ul class="sidebar-menu">
        
      <?php if($collectionAccessLevels->where('process', 'enter')->count() > 0): ?>
        <?php
        $areActiveRoutes = [];
        foreach($collectionAccessLevels->where('process', 'enter') as $AccessLevel){
          $areActiveRoutes[] = $AccessLevel->code;
        }
        ?>
        <li class="<?php echo e(areActiveRoutes($areActiveRoutes)); ?> treeview">
          
          <a href="#">
            <i class="fa fa-pencil"></i> <span>ENTER</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <?php foreach($collectionAccessLevels->where('process', 'enter') as $AccessLevel): ?>
              <li class = "<?php echo e(isActiveRoute($AccessLevel->code)); ?>">
                <a href="<?php echo e($AccessLevel->uri); ?>">
                  <i class="fa <?php echo e($AccessLevel->icon); ?>"></i> 
                  <?php echo e($AccessLevel->uifieldname); ?></a></li>
           <?php endforeach; ?>
            
          </ul>
        </li>
      <?php endif; ?>
      <?php if($collectionAccessLevels->where('process', 'process')->count() > 0): ?>
        <?php $areActiveRoutes = [];
        foreach($collectionAccessLevels->where('process', 'process') as $AccessLevel){
          $areActiveRoutes[] = $AccessLevel->code;
        }
        ?>
        <li class="<?php echo e(areActiveRoutes($areActiveRoutes)); ?> treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>PROCESS</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
             <?php foreach($collectionAccessLevels->where('process', 'process') as $AccessLevel): ?>
              <li class = "<?php echo e(isActiveRoute($AccessLevel->code)); ?>">
                <a href="<?php echo e($AccessLevel->uri); ?>">
                  <i class="fa <?php echo e($AccessLevel->icon); ?>"></i> 
                  <?php echo e($AccessLevel->uifieldname); ?></a></li>
           <?php endforeach; ?>
          </ul>
        </li>
      <?php endif; ?>
      <?php if($collectionAccessLevels->where('process', 'reports')->count() > 0): ?>
        <?php
        $areActiveRoutes = [];
        foreach($collectionAccessLevels->where('process', 'reports') as $AccessLevel){
          $areActiveRoutes[] = $AccessLevel->code;
        }
        ?>
        <li class="<?php echo e(areActiveRoutes($areActiveRoutes)); ?> treeview">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>REPORTS</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
             <?php foreach($collectionAccessLevels->where('process', 'reports') as $AccessLevel): ?>
              <li class = "<?php echo e(isActiveRoute($AccessLevel->code)); ?>">
                <a href="<?php echo e($AccessLevel->uri); ?>" target="_blank" rel=”noopener noreferrer”>
                  <i class="fa <?php echo e($AccessLevel->icon); ?>"></i> 
                  <?php echo e($AccessLevel->uifieldname); ?></a></li>
           <?php endforeach; ?>
          </ul>
        </li>
      <?php endif; ?>
      <?php $areActiveRoutes = [];
        foreach($collectionAccessLevels->where('process', 'maintenance') as $AccessLevel){
          $areActiveRoutes[] = $AccessLevel->code;
        }
        $areActiveRoutes[] = 'myaccount';
        ?>
        <li class="<?php echo e(areActiveRoutes($areActiveRoutes)); ?> treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>MAINTENANCE</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class = "<?php echo e(isActiveRoute('myaccount')); ?>">
                <a href="/myaccount">
                  <i class="fa fa-user"></i> 
                  My Account</a></li>
             <?php foreach($collectionAccessLevels->where('process', 'maintenance') as $AccessLevel): ?>
              <li class = "<?php echo e(isActiveRoute($AccessLevel->code)); ?>">
                <a href="<?php echo e($AccessLevel->uri); ?>">
                  <i class="fa <?php echo e($AccessLevel->icon); ?>"></i> 
                  <?php echo e($AccessLevel->uifieldname); ?></a></li>
              <?php endforeach; ?>
              
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <?php echo $__env->yieldContent('content'); ?>

  <!-- /Content -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="#">Decision Support System</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo e(asset('plugins/jQuery/jQuery-2.2.0.min.js')); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('plugins/select2/select2.full.min.js')); ?>"></script>
<!-- DataTables -->
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>

<!-- SlimScroll -->
<script src="<?php echo e(asset('plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo e(asset('plugins/chartjs/Chart.min.js')); ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('plugins/fastclick/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/app.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
<!-- jQuery Knob -->
<script src="<?php echo e(asset('plugins/knob/jquery.knob.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
</body>
</html>
