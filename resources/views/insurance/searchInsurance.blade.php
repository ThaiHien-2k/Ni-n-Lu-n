@extends('layouts.app')

@section ('content')
<div class="container p-0">
@if(Session::has('error'))
  <div class="row">
    <div class="col-12">
      <div id="charge-message" class="alert alert-danger">
        {{ Session::get('error') }}
      </div>
    </div>
  </div>
  @endif
<div style="padding: left right 20px;" class="col-12">
    <center><h3>Lịch sử bảo hành</h3></center>
    <br>
    <form class="form-inline my-2 my-lg-0 " style="margin-left:30% ;" action="{{ route('searchInsuranceDetail') }}" method="GET">
    <center><input class="form-control mr-sm-2 @error('phone') is-invalid @enderror" id="phone" style="width:400px;" name="phone" placeholder="Nhập vào số điện thoại" aria-label="phone" ></center>
   
    <button class="btn btn-success my-2 my-sm-0 " type="submit">Tìm</button>
    

  </form>
  <br>
  @error('phone')
    <div class="alert alert-danger" style="margin-left:30% ; width: 400px; ">{{ $message }}</div>
@enderror
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
</div>  

@endsection