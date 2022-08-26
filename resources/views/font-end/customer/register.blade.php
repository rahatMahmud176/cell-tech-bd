@extends('font-end.master')
@section('title')
    Register
@endsection
@section('main-content')
    
 @include('font-end.includes.breadcrumbs')
    
    
    <div class="account-login section">
    <div class="container">
    <div class="row">
    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
    <div class="register-form">
    <div class="title">
    <h3>No Account? Register</h3>
    <p>Registration takes less than a minute but gives you full control over your orders.</p>
    </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
{{ Form::open(['class'=>'row','route'=>'newCustomer','method'=>'POST']) }}
    <div class="col-sm-6">
    <div class="form-group">
    <label for="reg-fn">First Name</label>
    <input name="first_name" maxlength="30" class="form-control" type="text" id="reg-fn" required>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="reg-ln">Last Name</label>
    <input name="last_name" maxlength="30" class="form-control" type="text" id="reg-ln" required>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="reg-email">E-mail Address</label>
    <input name='email' class="form-control" type="email" id="reg-email" required>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="reg-phone">Phone Number</label>
    <input name="phone_number" maxlength="11" minlength="11" class="form-control" type="tel" id="reg-phone" required>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="reg-pass">Password</label>
    <input name="password" maxlength="30" minlength="3" class="form-control" type="password" id="reg-pass" required>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="reg-pass-confirm">Confirm Password</label>
    <input name="password_confirmation" maxlength="30" minlength="3" class="form-control" type="password" id="reg-pass-confirm" required>
    </div>
    </div>
    <div class="button">
    <button class="btn" type="submit">Register</button>
    </div>
    <p class="outer-link">Already have an account? <a href="{{ route('customer-login') }}">Login Now</a>
    </p>
{{ Form::close() }}
    </div>
    </div>
    </div>
    </div>
    </div>
    
    
@endsection