@extends('layouts.app')

@section ('content')



<div class="container p-0">
  <div class="row">
<div class="col-lg-9 col-md-9 col-sm-8 col-7 pr-4">
      <h3>Sản phẩm tìm kiếm</h3>
      
      <div class="row d-flex justify-content-start" id="">
      @if($products->isNotEmpty())
@foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-12 pt-3">
                        <div class="card">
                            <a href="product/'.$product->id.'">
                                <div class="card-body ">
                                    <div class="product-info">
                                    
                                    <div class="info-1"><img src="{{asset('/storage/'.$product->image)}}" alt=""></div>
                                    <div class="info-2"><h4>{{$product->name}}</h4></div>
                                    <div class="info-4"><h5>{{$product->brand}}</h5></div>
                                    
                                    <div class="info-3"><h5>{{$product->price}} vnđ</h5></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    
               
            @endforeach
            @else 
        
             
                <div class="col-lg-4 col-md-6 col-sm-6 pt-3">
                    <h4>Không có sản phẩm</h4>
                </div>
                
                @endif
                </div>

</div>
</div>

</div>

@endsection