@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">
@if(Session::has('success'))
    <div class="row">
      <div class="col-12">
        <div id="charge-message" class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      </div>
    </div>
    @endif
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
                        Ngày đặt hàng<br>
                        Tình trạng
        
                    </div>
                    <div class="col-6">
                        : {{ $id->id }} <br>   
                        : {{ $id->name }} <br>
                        : {{ $id->phonenumber }} <br>  
                        : {{ $id->address }} <br>
                        : {{ $id->payment }} <br>    
                        : {{ date('d-m-Y', strtotime($id->created_at))}} <br>                 
                        : {{ $id->status }} <br>
                        <br><br>
          

                    
                        
                    </div>
                </div>
                <hr>
                <div class="row col-12 ">
                    <form  action="{{ route('changeStatus',['id'=>$id->id]) }}" method="get">
    <div>
        <label for="changeStatus"><h5>Thay đổi trạng thái đơn hàng</h5></label>
        <br>
        <select name="changeStatus" id="colors" style="width:200px;" >
            <option selected="true" value="" disabled hidden>Chọn trạng thái</option>
            <option value="Đã đặt hàng">Đã đặt hàng</option>
            <option value="Đã xác nhận">Đã xác nhận</option>
            <option value="Đang đóng gói">Đang đóng gói</option>
            <option value="Đang giao">Đang giao</option>
            <option value="Đã nhận được hàng">Đã nhận được hàng</option>
            <option value="Hủy">Hủy</option>
    
        </select>
    </div>
    <div>
        <br>
        <button type="submit" class="btn btn-success">Xác nhận </button>
        </form>
    </div>
    </div>
            </div>
            
           
           @endforeach

        </div>
        </div>
        <div class="card-body">
            @foreach($order as $order)
            @foreach ($order->cart->items as $item)
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex order-history mx-auto">
                <div class="row">
                   
                  
                    
                        <div class="col-12 d-flex justify-content-between ">
                           

                        <div class="order-detail mr-auto d-flex flex-column justify-content-center" >
                            <div class="order-image col-4">
                                <img src="{{ asset('/storage/'.$item['item']['image']) }}" alt="">
                            </div>
<br>
                         
                                <div class="detail-1">
                                    <h5>{{ $item['item']['name'] }}</h5>
                                </div>
                                <div class="detail-2">
                                    <h6>Mẫu: {{ $item['model'] }}</h6>
                                </div>
                                
                                <div class="detail-4">
                                    <h6>Giá: {{number_format($item['price'], -3,',')  }}đ</h6>
                                </div>
                               
                               
                                </div>
                               
                                </div>
                                </div>
                               
                               </div>
                        
                            
                            <a href="{{ route('insurance.laptop',['id'=>$order->id,'model'=> $item['model']])}}" class="btn btn-success w-100 m-1" style="color:white;">Thêm serial</a>
  
                            <br><hr>
                        
                          
                    @endforeach  
                   
                </div>            
                </div>            
                
            @endforeach
        </div>
    </div>
</div> 
    
@endsection