@extends('layouts.app2')

@section('content')
<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{UCFirst($title)}}
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

    
      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      @if(session('affirm'))
       <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                {{session('affirm')}}
              </div>
        
      @endif
       @if(session('info'))
       <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                
                {{session('info')}}
              </div>
        
      @endif
        <div class="box box-primary">
          <div class="box-header with-border"> 
            <form action = "" method = "post" id = "{{$formID}}" class="mjform">
            <div class="btn-group">
              
            
                     <!-- Default box -->
              {!! csrf_field() !!}
              <?php
              $navigator = $Model;

              ?>
              <a href = "{{URL::previous()}}"  class="btn btn-default" ><i class="fa fa-hand-o-left"></i></a>
              <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i></button>
              @if($canadd) 
              <a href = "{{$create}}"  class="btn btn-default" id="{{$ModelIDnew}}"><i class="fa fa-plus"></i></a>
              @endif
              @if($cansave)
              <button type="submit" class="btn btn-default" ><i class="fa fa-save"></i></button>
              @endif
              @if($candelete)
              <button type="button" class="btn btn-default" id="{{$ModelIDdelete}}"><i class="fa fa-trash"></i></button>
              @endif

              <a href = "/{{$ModelURIlistview}}"  class="btn btn-default"><i class="fa fa-list"></i></a>
              <button type="button" class="btn btn-default" onclick="print()"><i class="fa fa-print"></i></button>
              @foreach($actions as $customButtons)
              {!! $customButtons !!}
              @endforeach
            </div>
          </div>
          @include($formViewPartial, ['Model' => $Model])
          <!-- /.box-body -->
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
