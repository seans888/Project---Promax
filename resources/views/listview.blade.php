@extends('layouts.app2')

@section('content')
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ucfirst($title)}}
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <form class="form-horizontal">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$header}}</h3>
              @if($canAdd)
              <a href="{{$create}}" style="margin-left:20px;">Add</a>
              @endif
              
            </div>
            <!-- /.box-header -->
            <?php
            $data['Model'] = $Model;
            $data['mode'] = "";
            ?>
             @include($tablePartialView, $data)            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

@endsection
