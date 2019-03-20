@extends('forms')


@section('title')
  Registration
@endsection
@yield('headAssetsSection')

@section('pageUniqueStyles')
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="registrationWrapper">
  <h1>Registration</h1>
  <form id="registration" class="formBody" method="POST" action="{{route('register')}}">
    @csrf
    <div class="inputRow">
      <div class="formInner">
        <label for="accountType">Account</label>
        <select class="nice-select-trigger" name="accountType" class="">
          <option value="Individual" selected>Individual</option>
          <option value="Business">Business</option>
        </select>
      </div>
      <div class="formInner">
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Email" required>
        <i class="fas fa-check-circle"></i>
      </div>
    </div>
    <div class="inputRow">
      <div class="formInner">
        <label for="">First Name</label>
        <input type="text" name="firstName" placeholder="First" required>
        <i class="fas fa-check-circle"></i>
      </div>
      <div class="formInner">
        <label for="">Last Name</label>
        <input type="text" name="lastName" placeholder="Last" required>
        <i class="fas fa-check-circle"></i>
      </div>
    </div>
    <div class="inputRow">
      <div class="formInner">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password" minlength="6" maxlength="64" required>
        <i class="fas fa-check-circle"></i>
      </div>
      <div class="formInner">
        <label for="">Phone Number</label>
        <input type="tel" name="phoneNumber" placeholder="Phone Number" id="phoneNumber" required maxlength="15">
        <!-- <i class="fas fa-check-circle"></i> -->
      </div>
    </div>
    <p class="agreement">By clicking on Open Account, I declare I am over 18 years <br> and I agree to AAATrace's <a href="/terms-and-conditions">Terms & Conditions</a></p>
    <button name="submit" type="submit">Sign Up</button>
  </form>
</div>
@endsection
        
