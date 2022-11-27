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
    <div class="row">
        <div class="col-4 totaluser">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-user"> Số tài khoản</i>
                </div>
                <div class="card-body">
                    <h5>{{ $totaluser }}</h5>
                </div>
            </div>
        </div>
        <div class="col-4 totalorder">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-dropbox"> Tổng số đơn hàng </i> 
                </div>
                <div class="card-body">
                    <h5>{{ $totalorder }} </h5>
                </div>
            </div>
        </div>
        <div class="col-4 totalgross">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-money">Tổng lợi nhuận</i>
                </div>
                <div class="card-body">
                    
                    <h5>{{ number_format($totalgross, -3,',')}}đ</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-sm-12 col-lg-12 latestorder mt-4">
            <div class="card">
                <div class="card-header">
                    Đơn hàng gần nhất
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($latest as $order)
                        <a href="{{ route('admin.showorder',['id'=>$order->id]) }}" class="list-group-item latest-order">
                            <div class="row">
                                <div class="col-12 d-flex">
                                    <div class="id" style="width:150px">Mã đơn: {{ $order->id }}</div>
                                    <div class="name">Tên Khách Hàng: {{ $order->name }}</div>
                                    <div class="status text ml-auto">Trạng Thái: <p  class="status text-success">{{ $order->status }}</p></div> 
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        
        </div>
    </div>
</div>
    
@endsection