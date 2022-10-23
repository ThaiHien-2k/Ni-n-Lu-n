@extends('layouts.app')

@section ('content')

<div class="container p-0">
  @if(Session::has('success'))
  <div class="row">
    <div class="col-12">
      <div id="charge-message" class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    </div>
  </div>
  @endif
  <!-- GET FIT FROM HOME [S]-->
   
    <!-- GET FIT FROM HOME [E]-->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <a href="{{ route('product.index') }}"><img class="d-block w-100" src="{{ asset('/storage/slides/slideshow_3.jpg') }}" alt="First slide" height="400" width="100%"></a>
    </div>
    <div class="carousel-item">
      <a href="{{ route('product.index') }}"><img class="d-block w-100" src="{{ asset('/storage/slides/1.jpg') }}" alt="Second slide" height="400" width="100%"></a>
    </div>
    <div class="carousel-item">
    <a href="{{ route('product.index') }}"><img class="d-block w-100" src="{{ asset('/storage/slides/2.webp') }}"  height="400" width="100%"></a>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      
<!-- icon -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="collapse navbar-collapse " id="navbarNav" >
<form action="{{ route('searchBrand') }}" method="GET">

    <ul class="navbar-nav" >
    
      <li class="nav-item">
      <button type="submit" name="productBrand" value="ASUS"><img src="{{ asset('/storage/icon/logo-asus-149x40.png') }}"  alt="" style="padding-right:40px;"></button>
      </li>
      <li class="nav-item">
      <button type="submit" name="productBrand" value="ACER"> <img src="{{ asset('/storage/icon/logo-acer-149x40.png') }}" style="margin-right:40px;"></button>
      </li>
    
      <li class="nav-item">
      <button type="submit" name="productBrand" value="DELL"><img src="{{ asset('/storage/icon/logo-dell-149x40.png') }}"   alt="" style="margin-right:40px;"></button>
      </li>
      <li class="nav-item">
      <button type="submit" name="productBrand" value="HP"><img src="{{ asset('/storage/icon/logo-hp-149x40-1.png') }}" alt="" style="margin-right:40px;"></button>
      </li>
      <li class="nav-item">
      <button type="submit" name="productBrand" value="APPLE"><img src="{{ asset('/storage/icon/logo-macbook-149x40.png') }}"   alt="" style="margin-right:40px;"></button>
      </li>
      <li class="nav-item">
      <button type="submit" name="productBrand" value="MSI"><img src="{{ asset('/storage/icon/logo-msi-149x40.png') }}"  style="margin-right:40px;"></button>
      </li>
      
    </ul>
    </form>
  </div>
</nav>
    
    <h2 class="pt-4">Sản phẩm mới nhất</h2>
    <div class="row d-flex justify-content-center">
      @foreach ($products as $product)    
      <div class="col-lg-3 col-md-6 col-sm-6 col-6 pt-3">
        <div class="card">
          <a href="{{ route('product.show',['product'=>$product->id]) }}">
            <div class="card-body ">
              <div class="product-info">
                <div class="info-1"><img src="{{ asset('/storage/'.$product->image) }}" alt=""></div>
                <div class="info-4"><h5>{{ $product->brand }}</h5></div>
                <div class="info-2"><a href="product/{{ $product->id }}"><h4>{{ $product->name }}</h4></a></div>
                <div class="info-3"><h5>{{ number_format($product->price, -3,',') }} vnđ</h5></div>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
<!--  -->
    <h2 class="pt-4">BÁN CHẠY NHẤT</h2>
    <div class="row d-flex justify-content-center">
   
      @foreach ($products as $product)   
      
      <div class="col-lg-3 col-md-6 col-sm-6 col-6 pt-3">
        <div class="card">
          <a href="{{ route('product.show',['product'=>$product->id]) }}">
            <div class="card-body ">
              <div class="product-info">
                <div class="info-1"><img src="{{ asset('/storage/'.$product->image) }}" alt=""></div>
                <div class="info-4"><h5>{{ $product->brand }}</h5></div>
                <div class="info-2"><a href="product/{{ $product->id }}"><h4>{{ $product->name }}</h4></a></div>
                <div class="info-3"><h5>{{ $product->price }} vnđ</h5></div>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
    <!-- ADVANTAGE [S]-->
    <h2 class="pt-4">SHOP CAM KẾT</h2>
    <div class="row m-0 pt-4">
      <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center advantagewrapper">
        <img class="" height="80px" src="{{ asset('photo/delivery2.svg') }}" alt="">
          <h4>FREE SHIP TOÀN QUỐC</h4>
      </div>
      <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center advantagewrapper">
        <img class="" height="80px" src="{{ asset('photo/guarantee.svg') }}" alt="">
          <h4>ĐẢM BẢO HÀNG CHÍNH HÃNG</h4>
      </div>
      <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center advantagewrapper">
        <img class="" height="80px" src="{{ asset('photo/support.svg') }}" alt="">
          <h4>NHÂN VIÊN HỖ TRỢ 24/7</h4>
      </div>
    </div>
    <!-- ADVANTAGE [E]-->

</div>

@endsection