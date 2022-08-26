@extends('font-end.master')
@section('title')
    Checkout Page
@endsection
@section('main-content')
{{ Form::open(['route'=>'submitOrder','method'=>'POST']) }}
<section class="checkout-wrapper section">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-8">
    <div class="checkout-steps-form-style-1">
    <ul id="accordionExample">
    <li>
    <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
    <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
    <div class="row">
    <div class="col-md-12">
    <div class="single-form form-default">
    <label>User Name</label>
    <div class="row">
    <div class="col-md-6 form-input form">
    <input name="first_name" required maxlength="30" type="text" value="{{ Session::get('customerFirstName') }}">
    </div>
    <div class="col-md-6 form-input form">
        <input name="last_name" maxlength="30" required type="text" value="{{ $customerInfo->last_name }}">
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="single-form form-default">
    <label>Email Address (optional)</label>
    <div class="form-input form">
    <input name="email" type="email" value="{{ $customerInfo->email }}">
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="single-form form-default">
    <label>Phone Number</label>
    <div class="form-input form">
    <input name="phone_number" required type="tel" maxlength="11"  minlength="11" value="{{ $customerInfo->phone_number }}">
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="single-form form-default">
    <label>District</label>
    <div class="form-input form">
    <input name="district" required maxlength="30" type="text" placeholder="Input your district name">
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="single-form form-default">
    <label>Upozilla/Area (optional)</label>
    <div class="form-input form">
    <input name="upozilla"  maxlength="30" type="text" placeholder="Input your Upozilla or Area name">
    </div>
    </div>
    </div>

    <div class="col-md-12">
    <div class="single-form form-default">
    <label>Extranal Info (optional)</label>
    <div class="form-input form">
    <textarea name="description" maxlength="250" id="" cols="30" rows="10" placeholder="Importent note here"></textarea>
    </div>
    </div>
    </div>
    
    
 
    </div>
    </section>
    </li> 
    </ul>



    </div>
    </div>
    <div class="col-lg-4">
    <div class="checkout-sidebar">
     
    <div class="checkout-sidebar-price-table ">
    <h5 class="title">Pricing Table</h5>
    <div class="sub-total-price">

    <div class="total-price">
    <p class="value">Subtotal Price:</p>
    <p class="price">{{ Cart::getSubTotal() }}\-</p>
    </div>
    <div class="total-price">
    <p class="value">Advance:</p>
    <p class="price"> <span>(-)</span> {{ $advance = Session::get('advance_amount') }}\-</p>
    </div>
      <input type="hidden" value="{{ $afterAdvanceTotal = Cart::getSubTotal()-$advance  }}">
    <div class="total-price shipping">
    <p class="value">Shipping:</p>
    <p class="price">{{ $shipping= 120+($afterAdvanceTotal*0.01) }}\-</p>
    </div>
     
    </div>
    <div class="total-payable">
    <div class="payable-price">
    <p class="value">You Pay:</p>
    <p class="price"> <span>(=)</span> {{ $afterAdvanceTotal + $shipping }}\-</p>
    </div>
    </div>
    <div class="price-table-btn button">
    
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Advance
          </button>
          <button type="submit" class="btn btn-alt">Order</button> 
    </div>
    </div>
      
    </div>
    </div>
    </div>
    </div>
    </section>
{{ Form::close() }}
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Advance an Amount</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{ Form::open(['route'=>'advancePayment','method'=>'POST']) }}
              <div class="form-group">
                <label for="formGroupExampleInput">Deu Amount</label>
                <input name="deu_amount" disabled readonly type="" class="form-control" id="formGroupExampleInput" placeholder="{{ Cart::getSubTotal() }}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Advance Amount</label>
                <input name="advance_amount" required max="{{ Cart::getSubTotal() }}" type="number" class="form-control" id="formGroupExampleInput" placeholder="">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">PayWith</label>
                 <select required name="pay_with" id="" class="form-control">
                    <option value="bkash">Bkash</option>
                    <option value="nagad">Nagad</option>
                    <option value="rocket">Rocket</option>
                    <option value="d_card">Debit Card</option>
                    <option value="c_card">Credit Card</option>
                 </select>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Transition Id</label>
                <input type="text" required maxlength="30" name="transition_id" class="form-control" id="formGroupExampleInput" placeholder="">
              </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Advance</button>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
@endsection