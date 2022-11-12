@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">
    <div class="card">
        <div class="card-header">
            <h5>Danh sách đơn</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($orders as $order)
                <a href="{{ route('admin.showorder',['id'=>$order->id]) }}" class="list-group-item latest-order">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="id" style="width:150px">Mã đơn: {{ $order->id }}</div>
                            <div class="name">Tên khách hàng: {{ $order->name }}</div>
                            <div class="status text ml-auto">Trạng Thái: <p  class="status text-success">{{ $order->status }}</p></div> 
                        </div>
                    </div>
                </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
    
@endsection