@extends('layouts.admin')

@section ('content')
<div class="col-8 col-md-8 col-sm-8 col-lg-8">
@foreach($products as $product)
     @foreach($configs as $config)
     <div class="card">
     <div class="card-header">
     <div class="row" >
     <div class="col-12 ">
                <h5>Chi tiết máy tính</h5>
                <hr>
                <div class="row" >
                     <div class=" col-12" >
                                <img src="{{ asset('/storage/'.$product->image) }}" alt="" style="width:200px;" >
                            </div></div>
                            <hr>
                <div class="row" style="">
                    <div class="">
                   
                    <strong>Tên máy:&nbsp; &nbsp; <a href="" style=" color:blue;"></strong>{{ $product->name }}</a><br>
                    <strong>Thương hiệu: &nbsp; &nbsp;</strong>{{ $product->brand }}<br>
                    <strong>Giá: &nbsp; &nbsp;</strong>{{ number_format($product->price, -3,',') }}đ<br>
                   
                  
                    
        
                    </div>
                    
          
</form>
         
                    </div>
                </div>
     <div class="card-body">
        <hr>
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

@break
@endforeach
@endforeach
</div>
</div>


@endsection