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
            <h5>Quản lý laptop</h5>
        </div>
        <div class="card-body">
        <form class="form-inline my-2 my-lg-0"  action="{{ route('searchSerial') }}" method="GET">
    <input class="form-control mr-sm-2 filter2" id="searchSerial" style="width:90%;" name="searchSerial" placeholder="Nhập số điện thoại" aria-label="searchSerial" >
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
  </form>
        
            <table class="table table-striped">
                <thead>
                  <tr>
                    
                    <th scope="col">Số serial</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Ngày kích hoạt bảo hành</th>
                    <th scope="col">Tên máy</th>
                    <th scope="col">Model</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                @foreach($laptops as $laptop)
                @foreach($orders as $order)
                @foreach ($order->cart->items as $item)
                @if($item['model']==$laptop->model)
                @if($laptop->order_id == $order->id )
                <tbody id="laptop-list">
                <tr>
                    
                    <td>{{ $laptop->serial }}</td>
                    <td>{{ $order->phonenumber }}</td>
                    @if($laptop->dateInsurance != null)
                    <td>{{date('d/m/Y', strtotime($laptop->dateInsurance))}}</td>
                    @else
                    <td></td>
                    @endif
                    <td class=" text-break" style="width: 150px;">{{ $item['item']['name'] }}</td>
                    <td>{{ $laptop->model }}</td>
                    <td><a href="{{ route('laptop.edit',['id'=>$laptop->serial]) }}" class="btn btn-success w-100 m-1" style="color:white;">Chỉnh sửa</a>
                    <a href="{{ route('laptop.remove',['id'=>$laptop->serial]) }}" class="btn btn-danger w-100 m-1" style="color:white;">Xóa</a></td>
                    
                    </tr>
                </tbody>
                @break
                @endif
                @endif 
                @endforeach 
                @endforeach 
                @endforeach
              </table>
        </div>
    </div>
</div>
    
@endsection