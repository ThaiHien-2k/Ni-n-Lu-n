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
            @foreach ($laptops as $laptop)
            @if($laptop->serial==$serial)
            @foreach($orders as $order)
                @foreach ($order->cart->items as $item)
            <div class="col-12 ">
                <h5>Thêm bảo hành</h5>
                <hr>
                <div class="row" >
                     <div class=" col-12" >
                                <img src="{{ asset('/storage/'.$item['item']['image']) }}" alt="" style="width:200px;" >
                            </div></div>
                            <hr>
                <div class="row">
                    <div class="">
                        

                        <strong>Serial:&nbsp; &nbsp; </strong><a href="" style="font-size:25px;">{{ $laptop->serial  }}</a><br>
                    <strong>Tên máy:&nbsp; &nbsp; </strong>{{ $item['item']['name'] }}<br>
                    <strong>Số điện thoại: &nbsp; &nbsp;</strong>{{ $laptop->phone }}<br>
                    <strong>Tên khách hàng: &nbsp; &nbsp;</strong>{{ $order->name }}<br>
                    
                    <strong>Tình trạng: &nbsp; &nbsp;</strong>{{ $status }}
        
                    </div>
                
                     

                    
                
                    
                    <form method="POST" action="{{ route('admin.addInsurance',['id'=>$laptop->serial,'status'=>$statuss])}}" enctype="multipart/form-data">
                    <br><br><hr>
        @csrf
        @method('PATCH')
        <div class="row "style="padding-left: 15px;"> 

          
            <div class="col-12">
                <label for="body" class="">{{ __('Lỗi') }}</label>
                <div class="form-group">
                    <div>
                        <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="body" autofocus>
                        
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="nameStaff" class="">{{ __('Nhân viên sửa chữa') }}</label>
                <div class="form-group">
                    <div>
                        <input id="nameStaff" type="text" class="form-control @error('nameStaff') is-invalid @enderror" name="nameStaff" value="{{ old('nameStaff')}}" required autocomplete="nameStaff" autofocus>
                        
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="cost" class="">{{ __('Số tiền') }}</label>
                <div class="form-group">
                    <div>
                        <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" value="{{ old('cost')}}" required autocomplete="cost" autofocus>
                        
                    </div>
                </div>
            </div>

        </div>
        
        <button type="submit" class="btn btn-success " style="margin-left: 15px;">Thêm </button>
    
    </form>
                </div> 
                <hr>
                @break
          
            @endforeach @break
        @endforeach @break
        @endif
        
           @endforeach
        </div>
        </div>
        <div class="card-body">
      

       
        </div>
    </div>
</div> 
    
@endsection