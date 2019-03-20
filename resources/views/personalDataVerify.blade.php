@extends('forms')


@section('title')
  Personal Data Verification
@endsection
@yield('headAssetsSection')

@section('pageUniqueStyles')
    <link href="{{ asset('css/formpage.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="registrationWrapper">
  <h1>Verification</h1>
  <form id="registration" class="formBody" method="POST" action="{{route('pdfVerificationFiles')}}">
      @csrf
    <div class="inputRow">
      <div class="formInner">
        <label for="beneficiary_name">Beneficiary Name</label>
        <input type="text" name="beneficiary_name" placeholder="Beneficiary Name" required>
        <i class="fas fa-check-circle"></i>
      </div>
      <div class="formInner">
        <label for="beneficiary_address">Beficiary Address</label>
        <input type="text" name="beneficiary_address" placeholder="Beficiary Address" required>
        <i class="fas fa-check-circle"></i>
      </div>
    </div>
    
    <div class="inputRow">
      <div class="formInner">
        <label for="bank_name">Bank Name</label>
        <input type="text" name="bank_name" placeholder="Bank Name" required>
        <i class="fas fa-check-circle"></i>
      </div>
      <div class="formInner">
        <label for="bank_address">Bank Address</label>
        <input type="text" name="bank_address" placeholder="Bank Address" required>
        <i class="fas fa-check-circle"></i>
      </div>
    </div>

    <div class="inputRow">
      <div class="formInner">
        <label for="iban">IBAN</label>
        <input type="text" name="iban" placeholder="IBAN" required>
        <i class="fas fa-check-circle"></i>
      </div>
      <div class="formInner">
        <label for="swift">Swift</label>
        <input type="text" name="swift" placeholder="Swift" required>
        <i class="fas fa-check-circle"></i>
      </div>
    </div>

    <div class="inputRow">
      <div class="formInner">
        <label for="reference">Reference</label>
        <input type="text" name="reference" placeholder="Reference" required>
        <i class="fas fa-check-circle"></i>
      </div>
      @if(\Illuminate\Support\Facades\Auth::user()->role == 'business')
        <div class="formInner">
          <label for="reference">Company Name</label>
          <input type="text" name="companyName" placeholder="Company Name" required>
          <i class="fas fa-check-circle"></i>
        </div>
        @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'individual')
        <div class="formInner search-select-formInner">
          <select name="company" id="company" class="select2-trigger blue-search-select">
            @foreach($users as $user)
              <option value="{{$user->company}}">{{$user->company}}</option>

            @endforeach

          </select>
        </div>
      @endif

    </div>

    <button name="submit" type="submit">Continue</button>
  </form>
</div>
@endsection