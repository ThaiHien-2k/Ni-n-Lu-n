@extends('layouts.app')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-7 mx-auto">
            
            
            <form action="{{ route('checkout') }}" method="POST" id="checkout-form">
                @csrf
                <div class="row ">
                    
                    <div class="col-12" style='text-align:center;'>
                        <h2>Thông tin giao hàng</h2>
                        <hr>
                    </div>

                    <div class="col-12">
                        <label for="name" class="">{{ __('Họ và tên') }}</label>
                        <div class="form-group">
                            <div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name ??'' }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="phonenumber" class="">{{ __('Số điện thoại') }}</label>
                        <div class="form-group">
                            <div>
                                <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') ?? $user->profile->phonenumber ??'' }}" required autocomplete="phonenumber" autofocus>
                                @error('phonenumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                  

                    <div class="col-12">
                        <label for="address" class="">{{ __('Địa chỉ') }}</label>
                        <div class="form-group">
                            <div>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $user->profile->address ??'' }}" required autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
              
                    <div class="col-12">
                        <label for="payment" class="">{{ __('Phương thức thanh toán') }}</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="payment" value="Giao Hàng Nhận Tiền" checked>
                                <label class="form-check-label" for="payment">Giao Hàng Nhận Tiền</label><br>
                            </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="payment" value="ATM">
                                <label class="form-check-label" for="payment">ATM</label><br>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="payment" value="Ví Điện tử" >
                                <label class="form-check-label" for="payment">Ví Điện tử</label>    
                        </div>
                        </div>
                    </div>
                
                <button type="submit" class="button-primary w-100">Thanh toán</button>
            
            </form>
        </div>
    </div>
</div>

@endsection