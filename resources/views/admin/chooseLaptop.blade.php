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
            <h5>Chọn máy</h5>
        </div>
        <div class="card-body">
        <form class="form-inline my-2 my-lg-0"  action="{{ route('searchSerial') }}" method="GET">
    <input class="form-control mr-sm-2 filter2" id="searchSerial" style="width:90%;" name="searchSerial" placeholder="Nhập số điện thoại" aria-label="searchSerial" >
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
  </form>
        
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Số serial</th>
                    
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
                    <td>{{ $order->phonenumber }}</td>
                    <td>{{ $laptop->serial }}</td>
                  
                    <td>{{ $item['item']['name'] }}</td>
                    <td>{{ $laptop->model }}</td>
                   
                    <td><a href="{{ route('insurance.addForm',['id'=>$laptop->serial]) }}" class="btn btn-success w-100 m-1" style="color:white;">Chọn</a>
                    </td>
                    
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