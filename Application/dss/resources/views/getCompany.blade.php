@extends('layouts.app2')

@section('content')
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
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="btn-group">
              <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i></button>
              @if($cansave)
              <button type="submit" class="btn btn-default"><i class="fa fa-save"></i></button>
              @endif
               <a href = "/company"  class="btn btn-default"><i class="fa fa-list"></i></a>
            </div>
          </div>
          <div class="box-body">
            <div class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Company ID</label>
                <div class="col-sm-10">
                  <input value="{{$Company->id}}" name='id' id="getCompany_companyID" value='{{$Company->ID}}' type="number" min="1" class="form-control" />
                </div>
                
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Company Name</label>
                <div class="col-sm-10">
                  <input id='getCompany_companyName' name='name' value='{{$Company->name}}' type="text" class="form-control" />                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Company Description</label>
                <div class="col-sm-10">
                  <textarea id = 'getCompany_companyDesc' name = 'desc' class="form-control" rows="3" placeholder="Name, Address, etc...">{{$Company->desc}}</textarea>
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

@endsection
