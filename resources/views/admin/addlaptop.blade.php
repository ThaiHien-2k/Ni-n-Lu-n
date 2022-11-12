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
            @foreach($orders as $order)
                @foreach ($order->cart->items as $item)
                @if($item['model']==$nameModel)
                @if($loop->count > 1)
            <div class="col-12 ">
                
                <h5>Thêm serial</h5>
                <hr>
                <div class="row" >
                     <div class=" col-12" >
                                <img src="{{ asset('/storage/'.$item['item']['image']) }}" alt="" style="width:200px;" >
                            </div></div>
                            <hr>
                <div class="row">
                <div class="">
                        <strong>Tên máy:</strong> &nbsp; &nbsp;<a href="" style="font: size 30px;color:blue;">{{ $item['item']['name'] }}</a><br>
                        <strong>Tên khách hàng: &nbsp; &nbsp;</strong> {{ $order->name }}<br>
                        <strong>Model máy: &nbsp; &nbsp;</strong> {{ $item['model']  }}<br>
                        <strong>Số điện thoại: &nbsp; &nbsp;</strong> {{ $order->phonenumber }}<br>
                       
                         </div>
               
                             
                   
                <hr>
                
                <div class="card-body">
         <form  action="{{ route('laptop.add',['id'=>$order->id,'model'=> $item['model']]) }}" method="get">
        
    <div>
        <label for=""><strong>Nhập số serial</strong>  </label><br>
        <input type="text" name="serial"><br><br>
        <input type="hidden" name="productName" value="{{$item['item']['name']}}" >
       
        <input type="checkbox" name="dateInsurance" id="dateInsurance">
        <label for="dateInsurance">Xác nhận kích hoạt bảo hành</label>
    </div>
    <div>
        
        <button type="submit" class="btn btn-success">Xác nhận </button>
    </div>
    </div>
     
</form>
        </div>
    </div>
</div> 
@break

@else
<div class="col-12 ">
                
                <h5>Thêm serial</h5>
                <hr>
                <div class="row" >
                     <div class=" col-12" >
                                <img src="{{ asset('/storage/'.$item['item']['image']) }}" alt="" style="width:200px;" >
                            </div></div>
                            <hr>
                            <div class="row">
                    <div class="">
                        <strong>Tên máy:&nbsp; &nbsp;</strong> <a href="" style="font: size 30px;color:blue;">{{ $item['item']['name'] }}</a><br>
                        <strong>Tên khách hàng:&nbsp; &nbsp;</strong> {{ $order->name }}<br>
                        <strong>Model máy:&nbsp; &nbsp;</strong> {{ $item['model']  }}<br>
                        <strong>Số điện thoại:&nbsp; &nbsp;</strong> {{ $order->phonenumber }}<br>
                       
                         </div>
                        
                             
                   
                <hr>
                
                <div class="card-body">
         <form  action="{{ route('laptop.add',['id'=>$order->id,'model'=> $item['model'],'name'=> $item['item']['name']]) }}" method="get">
        
    <div>
        <label for=""><strong>Nhập số serial</strong>  </label><br>
        <input type="text" name="serial"><br><br>
        <input type="hidden" name="productName" value="{{$item['item']['name']}}" >
        <input type="checkbox" name="dateInsurance" id="dateInsurance">
        <label for="dateInsurance">Xác nhận kích hoạt bảo hành</label>
    </div>
    <div>
        
        <button type="submit" class="btn btn-success">Xác nhận </button>
    </div>
    </div>
     
</form>
        </div>
    </div>
</div> 
@endif
                @endif
                
            @endforeach
        @endforeach 
      
        </div>
        </div>

        
    
@endsection