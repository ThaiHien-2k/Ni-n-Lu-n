@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">
    <div class="card">
        <div class="card-header">
            <div class="row">
            @foreach ($ids as $id)
            <div class="col-12 ">
                <h5>Chi tiết đơn hàng</h5>
                <hr>
                <div class="row">
                    <div class="col-6">
                        Mã đơn<br>
                        Tên khách hàng <br>
                        Số điện thoại <br>
                        Địa chỉ giao hàng<br>
                        Phương thức thanh toán <br>
                        Tình trạng
        
                    </div>
                    <div class="col-6">
                        : {{ $id->id }} <br>   
                        : {{ $id->name }} <br>
                        : {{ $id->phonenumber }} <br>  
                        : {{ $id->address }} <br>
                        : {{ $id->payment }} <br>                     
                        : {{ $id->status }} <br>
                        <button type="button" class="btn btn-success"><a href="{{ route('home.index') }}" style="color: unset;">Chỉnh sửa trạng thái</a></button></div>
                    </div>
                </div>
                
            </div>
            
           @endforeach
        </div>
        </div>
        <div class="card-body">
            @foreach($order as $order)
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex order-history mx-auto">
                <div class="row">
                    @foreach ($order->cart->items as $item)
                        <div class="col-12 d-flex justify-content-between ">
                            <div class="order-image">
                                <img src="{{ asset('/storage/'.$item['item']['image']) }}" alt="">
                            </div>

                            <div class="order-detail mr-auto d-flex flex-column justify-content-center">
                                <div class="detail-1">
                                    <h5>{{ $item['item']['name'] }}</h5>
                                </div>
                                <div class="detail-2">
                                    <h6>Mẫu: {{ $item['model'] }}</h6>
                                </div>
                                
                                <div class="detail-4">
                                    <h6>{{ $item['price'] }} vnđ</h6>
                                </div>
                            </div> 
                        </div>
                    @endforeach
                </div>                      
            </div>
            @endforeach
        </div>
    </div>
</div> 
    
@endsection