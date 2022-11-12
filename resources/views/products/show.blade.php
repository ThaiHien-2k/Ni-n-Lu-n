@extends('layouts.app')

@section ('content')

<div class="container p-0 show">
   <div class="row sixtyvh">
       <div class="col-lg-8 col-sm-12 mb-3 show-picture">
            <img src="{{ asset('/storage/'.$product->image) }}" alt="">
       </div>
       <div class="col-lg-4 col-sm-12  border border-dark" style="padding-top:10px;padding-bottom:10px;">
       <div >
        <h5><strong>{{ $product->name }}</strong></h5>
       
        <h6>Hãng: <h4 style="color:blue; font: size 50px;">&nbsp;&nbsp; {{ $product->brand }}</h4></h6>
       
        <h6>Giá: <br><h4 style="color:red;">&nbsp;&nbsp;{{number_format($product->price, -3,',') }}đ</h4></h6>
        <br>
            <div class="card">
                <div class="card-body">
                    
                    <div class="show-info">
                        
                        <div class="info-2">
                            <select id="size-dropdown">
                                <option selected="true" value="nothing" disabled hidden>Click chọn mẫu</option>
                                @foreach($models as $model)
                                    @if($model->quantity > 0)
                                        <option value="{{ $model->name }}">{{ $model->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="info-3">
                            <p>Vui lòng chọn mẫu trước khi mua!</p>
                        </div>
                        <a href="{{ route('cart.add',['product'=>$product->id]) }}" id="add-to-cart" class="add-to-cart disabled">
                            <div class="info-4">
                                Thêm vào giỏ hàng
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 mb-3 ">
        
       </div>
       
            </div>
        </div>
        </div>
        </div>
       <br>
       <br>
       
      
  <br>
  <hr>
  <br>
       <div class="col-lg-12 col-sm-12 mb-3 " style="">
       <h4><strong><center>Cấu hình</center></strong></h4>
       <br>
        <table class="table table-bordered table-striped">
  
  <tbody>
    <tr>
      <th scope="row">Chip</th>
      <td>{{$configs->chipset}}</td>
     
    </tr>
    <tr>
      <th scope="row">Card</th>
      <td>{{$configs->card}}</td>

    </tr>
    <tr>
      <th scope="row">Bộ nhớ</th>
      <td>{{$configs->memory}}</td>

    </tr> <tr>
      <th scope="row">Ram</th>
      <td>{{$configs->ram}}</td>
    </tr>
    <tr>
      <th scope="row">Pin</th>
      <td>{{$configs->battery}} giờ khi sạc đầy</td>
    </tr>
    <tr>
      <th scope="row">Màn hình</th>
      <td>{{$configs->screen}}</td>
    </tr>
 
    <tr>
      <th scope="row">Hệ điều hành</th>
      <td>{{$configs->operaring}}</td>
    </tr>
    <tr>
      <th scope="row">Công nghệ</th>
      <td>{{$configs->technology}}</td>
    </tr>
    <tr>
      <th scope="row">Cổng</th>
      <td>{{$configs->port}}</td>
    </tr>
    <tr>
      <th scope="row">Bảo hành</th>
      <td>{{ $product->insurance }} tháng</td>
    </tr>
  </tbody>
</table>

</div>
<br>
<hr>
<div class="col-lg-6 col-sm-12 mb-3 " style="margin-left:10%;">
<h4>Bình Luận</h4>
  
  @include('products.comment', ['comments' => $product->comments, 'product_id' => $product->id])

  <hr />
  <h4>Thêm bình luận</h4>
  <form method="product" action="{{ route('comments.store') }}">
      @csrf
      <div class="form-group">
          <textarea class="form-control" name=body></textarea>
          <input type=hidden name=product_id value="{{ $product->id }}" />
      </div>
      <div class="form-group">
          <input type=submit class="btn btn-success" value="Add Comment" />
      </div>
  </form>
     
   
</div>
</div>



@endsection