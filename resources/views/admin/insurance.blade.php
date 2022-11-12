@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">
  @if(Session::has('success'))
  <div class="row">
    <div class="col-8">
      <div id="charge-message" class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    </div>
  </div>
  @endif
    <div class="card">
        <div class="card-header">
            <h5>QUẢN LÝ BẢO HÀNH</h5>
        </div>
        <div class="card-body">
        <a href="{{ route('admin.chooseLaptop') }}" class="btn btn-success mb-4" style="color:white; width:150px;">Thêm bảo hành</a>
        <form class="form-inline my-2 my-lg-0"  action="{{ route('searchInsurance') }}" method="GET">
    <input class="form-control mr-sm-2 filter2" id="searchInsurance" style="width:90%;" name="searchInsurance" placeholder="Nhập số điện thoại" aria-label="searchInsurance" >
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
  </form>
            <table class="table table-striped">
                <thead>
                  <tr>
                   
                    <th scope="col">Serial máy</th>
                    <th scope="col">Tên máy</th>
                    <th scope="col">Mẫu</th>   
                    <th scope="col">Số điện thoại</th>
                    
                               
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($insurances as $insurance)
                @foreach($orders as $order)
                @if($insurance->order_id == $order->id)
                @foreach ($order->cart->items as $item)
                  <tr>
                    
                    <td>{{ $insurance->serial }}</td>
                    <td >{{ $item['item']['name'] }}</td>
                    <td>{{ $item['model'] }}</td>
                    <td>{{ $insurance->phone }}</td>
                    
                   
        
                    <td>
                        <a href="{{ route('insurance.detail',['id'=>$insurance->serial])}}" value="" class="btn btn-primary w-100 m-1" style="color:white;">Chi tiết</a>
                        
                    </td>
                  </tr>
                  @break
                  @endforeach 
                  @endif
                  
                  @endforeach 
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection