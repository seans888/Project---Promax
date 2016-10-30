@extends('layouts.loginLayout')

@section('content')<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}
      <div class="form-group has-feedback">
        @if ($errors->has('username'))
            <span class="help-block">
                <strong style = "color:red;">{{ $errors->first('username') }}</strong>
            </span>
        @endif
        @if ($errors->has('password'))
            <span class="help-block">
                <strong style = "color:red;">{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <select required class="form-control" placeholder="--Please Select--" name = 'company_id'>
        <option value = "">--Please select--</option>
        @foreach($companies as $company)

            <option value = "{{$company->id}}" {!! ( $company->id == old('company_id') ) ? "selected" : "" !!}>{{$company->name}}</option>
        @endforeach
        </select>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input required type="text" class="form-control" placeholder="username" name = 'username' value = "{{old('username')}}">
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
@endsection
