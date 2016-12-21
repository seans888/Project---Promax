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

      <form action = "" method = "post" id = "{{$formID}}">
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
        <!-- Default box -->
        {!! csrf_field() !!}
        <?php
        $navigator = $Model;

        ?>
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="btn-group">
              
              <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i></button>
            
              <a href = "{{URL::previous()}}"  class="btn btn-default" ><i class="fa fa-hand-o-left"></i></a>
              @if($canadd)
              <a href = "{{$create}}"  class="btn btn-default" id="{{$ModelIDnew}}"><i class="fa fa-plus"></i></a>
              @endif
              @if($cansave)
              <button type="submit" class="btn btn-default"><i class="fa fa-save"></i></button>
              @endif
              @if($candelete)
              <button type="button" class="btn btn-default" id="{{$ModelIDdelete}}"><i class="fa fa-trash"></i></button>
              @endif
              <a href = "/{{$ModelURIlistview}}"  class="btn btn-default"><i class="fa fa-list"></i></a>

            </div>
          </div>
          @include($formViewPartial, ['Model' => $Model])
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
