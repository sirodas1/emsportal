@extends('layouts.app')

@section('title', 'Emergency Unit')

@section('content')
<div class="row">
    <span class="text-success h5"><strong>Welcome to GhCare</strong></span>
</div>
<div class="row">
    <span class="text-secondary">A Health Interoperability For National Development</span>
</div>
@if (session()->has('error_message'))
<br>
<div class="row justify-content-center">
    <div class="col-6 bg-danger px-4 py-2">
        <span class="text-light">{{session()->get('error_message')}}</span>
    </div>
</div>
@endif
<div class="row justify-content-start my-5">
    
    <div class="col-md-4 my-2">
        <div class="dashboard-options cursor-pointer w-full py-4 px-4" data-toggle="modal" data-target="#exampleModal">
            <div class="row justify-content-between mx-1">
                <div class="icon d-flex justify-content-center">
                    <i class="fa fa-user-injured"></i>
                </div>
                <div class="option-text h5 pt-2">
                    <strong>Patients</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 my-2">
        <div onclick="window.location.href = '{{route('account.view')}}'" class="dashboard-options cursor-pointer w-full py-4 px-4">
            <div class="row justify-content-between mx-1">
                <div class="icon d-flex justify-content-center">
                    <i class="fa fa-user-tie"></i>
                </div>
                <div class="option-text h5 pt-2">
                    <strong>My Account</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="row justify-content-center mt-5">
                <span class="form-header">Enter Patient's ID</span>
            </div>
            <div class="row justify-content-center">
                <div class="col-9">
                    <form method="GET" action="{{ route('patients.access') }}">
                        @csrf
                
                        <div class="form-group my-4">
                            <div class="col">
                                <div class="row login-input" style="">
                                    <div class="col-1 py-2 px-1">
                                        <img src="/img/id-card@2x.png" class="img img-fluid form-icons" width="50px">
                                    </div>
                                    <div class="col-11 pt-1 px-0">
                                        <input id="national_card_id" type="text" class="form-control input-green" name="national_card_id" value="{{ old('national_card_id') }}" required autocomplete="national_card_id" autofocus placeholder="Enter Ghana National Card ID" onclick="addHash(this)" pattern="GHA-[0-9]{9}-[0-9]" title="must be in this format GHA-XXXXXXXXX-X" >
                                    </div>
                                </div>
                                @error('national_card_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-5 row justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-danger w-100" style="border-radius: 25px;">
                                    {{ __('Check') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection