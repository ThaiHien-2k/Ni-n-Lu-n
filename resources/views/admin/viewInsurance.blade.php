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
        <div class="card-header" >
            <div class="row">
            @foreach ($insurances as $insurance)
            @if($insurance->serial==$serial)
            @foreach($orders as $order)
                @foreach ($order->cart->items as $item)
            <div class="col-12 ">
                <h5>Chi tiết bảo hành</h5>
                <hr>
                <div class="row" >
                     <div class=" col-12" >
                                <img src="{{ asset('/storage/'.$item['item']['image']) }}" alt="" style="width:200px;" >
                            </div></div>
                            <hr>
                <div class="row" style="">
                    <div class="">
                    <strong>Serial:&nbsp; &nbsp; </strong><a href="" style="font-size:25px;">{{ $insurance->serial }}</a><br>
                    <strong>Tên máy:&nbsp; &nbsp; </strong>{{ $item['item']['name'] }}<br>
                    <strong>Số điện thoại: &nbsp; &nbsp;</strong>{{ $insurance->phone }}<br>
                    <strong>Tên khách hàng: &nbsp; &nbsp;</strong>{{ $order->name }}<br>
                    <strong>Số lần sửa: &nbsp; &nbsp;</strong>{{ $count }} lần<br>
                    <strong>Tổng số tiền:&nbsp; &nbsp; </strong>{{ number_format($totalCost, -3,',') }}đ<br>
                    <strong>Tình trạng: &nbsp; &nbsp;</strong>{{ $status }}
        
                    </div>
                    
          
</form>
                    
                        
                    </div>
                </div>
                
                <a href="{{ route('insurance.addForm',['id'=>$insurance->serial])}}" class="btn btn-success " style="color:white;margin-top :20px;">Thêm</a>
                <hr>
                @break
             
            @endforeach @break
        @endforeach @break
        @endif
        
           @endforeach
        </div>
        </div>
        <div class="card-body">
        
        @foreach ($insurances as $insurance)
            @if($insurance->serial==$serial)
           
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex order-history mx-auto">
                <div class="row">
                    
                        <div class="col-12 d-flex justify-content-between ">
                           

                            <div class="order-detail mr-auto d-flex flex-column justify-content-center">
                                <div class="detail-1">
                                    <h5><strong>Lần Sửa:</strong> &nbsp; &nbsp;{{ $loop->iteration}}</h5>
                                </div>
                                <div class="detail-2">
                                    <h6><strong>Lỗi:</strong>&nbsp;&nbsp; {{ $insurance->body }}</h6>
                                </div>
                                <div class="detail-2">
                                    <h6><strong>Nhân viên sửa chữa:</strong>&nbsp;&nbsp; {{ $insurance->nameStaff }}</h6>
                                </div>
                                <div class="detail-4">
                                    <h6><strong>Chi phí:</strong> &nbsp;&nbsp;{{ number_format($insurance->cost, -3,',') }}đ</h6>
                                </div>
                                @if(date('d-m-Y', strtotime($insurance->dateTake))=='01-01-1970')
                                <div class="detail-2">
                                    <h6><strong>Ngày nhận máy:</strong>&nbsp;&nbsp; </h6>
                                </div>
                                @else
                                <div class="detail-2">
                                    <h6><strong>Ngày nhận máy:</strong>&nbsp;&nbsp; {{ date('d-m-Y', strtotime($insurance->dateTake)) }}</h6>
                                </div>
                                @endif
                              
                                <div class="detail-2">
                                    <h6><strong>Ngày trả máy:</strong>&nbsp;&nbsp;  {{ $insurance->dateReturn }}</h6>
                                </div>
                                <div class="detail-2">
                                    <h6><strong>Trạng thái:</strong>&nbsp;&nbsp; {{$insurance->status}}</h6>
                                </div>
                               
                            </div> 
                        </div>
                    
                </div>                      
            </div> <a href="{{ route('insurance.editForm',['id'=>$insurance->id])}}" class="btn btn-success w-100 m-1" style="color:white;">Chỉnh sửa</a>
            <a href="{{ route('insurance.viewDetail',['id'=>$insurance->id,'time'=>$loop->iteration])}}" class="btn btn-primary w-100 m-1" style="color:white;">Chi tiết</a>
            <a href="{{ route('admin.insuranceRemove',['id'=>$insurance->id])}}" class="btn btn-danger w-100 m-1" style="color:white;">Xóa</a>
            <br><hr>
           
            @endif
            @endforeach
        </div>
    </div>
</div> 
    
@endsection