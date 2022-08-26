@extends('font-end.master')

@section('title')
   Login
@endsection

@section('main-content')


@include('font-end.includes.breadcrumbs')

    
    <div class="account-login section">
    <div class="container">
    <div class="row">
    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12"> 
{{ Form::open(['class'=>'card login-form','route'=>'customerLogin','method'=>'POST']) }}
    <div class="card-body">
    <div class="title">
    <h3>Login Now</h3>
    <p>You can login using your social media account or email address.</p>
    </div>
     
     
    <div class="form-group input-group">
    <label for="reg-fn">Phone Number</label>
    <input name="phone_number" maxlength="11" minlength="11" class="form-control" type="tel" id="reg-email" required>
    </div>
    <div class="form-group input-group">
    <label for="reg-fn">Password</label>
    <input name="password" class="form-control" type="password" id="reg-pass" required>
    </div>
    <div class="d-flex flex-wrap justify-content-between bottom-content">
    <div class="form-check">
    <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
    <label class="form-check-label">Remember me</label>
    </div>
    <a class="lost-pass" href="account-password-recovery.html">Forgot password?</a>
    </div>
    <div class="button">
    <button class="btn" type="submit">Login</button>
    </div>
    <p class="outer-link">Don't have an account? <a href="{{ route('customer-register') }}">Register here </a>
    </p>
    </div>
{{ Form::close() }}
    </div>
    </div>
    </div>
    </div>
    
    
@endsection