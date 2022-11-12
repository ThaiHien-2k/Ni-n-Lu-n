@extends('layouts.app')

@section ('content')

    @if(Session::has('cart') && $totalQuantity >0)
        <div class="container p-0 filled-cart">
            <div class="mr-2 ml-2">
                <h3>GIỎ HÀNG CỦA BẠN</h3>
                <hr> 
            </div>
           
            <div class="row mr-2 ml-2">
                
                <div class="col-lg-8 col-sm-12 pt-2 pr-4 pl-4">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-12 d-flex p-2 justify-content-between cart-item">
                                <div class="item-image">
                                    <img src="{{ asset('/storage/'.$product['item']['image']) }}" alt="">
                                </div>
                                <div class="item-detail mr-auto d-flex flex-column justify-content-center">
                                    <div class="info-2"><h5>{{ $product['item']['name'] }}</h5> </div> 
                                    <div class="info-3"><h6>Mẫu: {{ $product['model'] }}</h6></div>
                                    <div class="info-3">Giá: {{ number_format($product['price'], -3,',') }}đ</div>
                                    <div class="info-5">
                                        <a href="{{ route('cart.remove',['id'=>key($products)]) }}" class="remove-cart">
                                            <i class="fa fa-trash"></i> 
                                        </a>
                                    </div>
                                </div>

                              
                            </div>
                        @endforeach
                    </div>


                </div>

                <div class="col-lg-4 col-sm-12 p-2 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="cart-checkout">
                                
                                
                                <div class="info-2">
                                    Tổng: {{ number_format($totalPrice, -3,',') }} đ
                                </div>
                                <div class="info-3 pt-3">
                                    <a href="{{ route('checkout.index') }}"><button class="button-primary w-100">Thanh Toán</button></a>
                                </div>
                                <div class="info-4 pt-3">
                                    <a href="{{ route('product.index') }}"><button class="button w-100">Tiếp tục mua hàng</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @else
    <div class="container p-0 ">
        <div class="row">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center empty-cart">
                <div><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                <div><h4><b>Giỏ hàng của bạn trống.</b></h4></div>
                <div><a href="{{ route('product.index') }}">Hãy chọn mua sản phẩm trước :)</a></div>
            </div>
        </div>
    </div>

    @endif
@endsection