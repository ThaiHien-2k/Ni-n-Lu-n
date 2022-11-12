@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">
    <h5>THÊM SẢM PHẨM</h5>
    <hr>

    <form method="POST" action="{{ route('product.create') }}" enctype="multipart/form-data">
        @csrf
        <div class="row ">

            <div class="col-12">
                <label for="name" class="">{{ __('Tên sản phẩm') }}</label>
                <div class="form-group">
                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="price" class="">{{ __('Giá') }}</label>
                <div class="form-group">
                    <div>
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price')  }}" required autocomplete="price" autofocus>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="brand" class="">{{ __('Thương hiệu') }}</label>
                <div class="form-group">
                    <div>
                        <select name="brand" id="addproductbrand" class="form-control">
                            <option selected="true" value="" disabled hidden>Chọn thương hiệu sản phẩm</option>
                            <option value="ASUS">ASUS</option>
                            <option value="DELL">DELL</option>
                            <option value="MSI">MSI</option>
                            <option value="APPLE">APPLE</option>
                            <option value="ACER">ACER</option>
                            <option value="ACER">HP</option>
                        </select>
                    </div>
                </div>
            </div>

         
            <div class="col-12">
                <div class="form-group">
                    <label class="">Cấu hình</label>
                    <hr>
                    <input id="card" type="text" placeholder="Nhập vào card máy" class="form-control @error('card') is-invalid @enderror" 
                    name="card" value="{{ old('card') }}" required >
                    <br>
                    <input id="chipset" type="text" placeholder="Nhập vào chip máy" class="form-control @error('chipset') is-invalid @enderror" 
                    name="chipset" value="{{ old('chipset') }}" required >
                    <br>
                    <input id="operaring" type="text" placeholder="Nhập vào hệ điều hành máy" class="form-control @error('operaring') is-invalid @enderror" 
                    name="operaring" value="{{ old('operaring') }}" required >
                    <br>
                    <input id="ram" type="text" placeholder="Nhập vào số ram của máy" class="form-control @error('ram') is-invalid @enderror" 
                    name="ram" value="{{ old('ram') }}" required >
                    <br>
                    <input id="memory" type="text" placeholder="Nhập vào bộ nhớ máy" class="form-control @error('memory') is-invalid @enderror" 
                    name="memory" value="{{ old('memory') }}" required >
                    <br>
                    <input id="battery" type="text" placeholder="Nhập vào dung lượng pin máy" class="form-control @error('battery') is-invalid @enderror" 
                    name="battery" value="{{ old('battery') }}" required >
                    <br>
                    <input id="port" type="text" placeholder="Nhập vào các cổng của máy" class="form-control @error('port') is-invalid @enderror" 
                    name="port" value="{{ old('port') }}" required >
                    <br>
                    <input id="screen" type="text" placeholder="Nhập vào màn hình máy" class="form-control @error('screen') is-invalid @enderror" 
                    name="screen" value="{{ old('screen') }}" required >
                    <br>
                    <input id="technology" type="text" placeholder="Nhập vào các công nghệ của máy" class="form-control @error('technology') is-invalid @enderror" 
                    name="technology" value="{{ old('technology') }}" required >
                </div>
                <hr>
            </div>
          
            <div class="col-12">
                <div class="form-group">
                    <label for="insurance" class="">Bảo hành</label>
                    <div>
                        <input id="insurance" type="text" placeholder="Nhập số tháng" class="form-control @error('insurance') is-invalid @enderror" name="insurance" value="{{ old('insurance') }}" required autocomplete="insurance" autofocus>
                        @error('insurance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
         

            <div class="col-12">
                <div class="form-group">
                    <label for="image" class="">Ảnh sản phẩm</label>
                    <input type="file" class="form-control" id="image" name="image">
                    
                    @error('image')

                    <div style="color:red; font-weight:bold; font-size:0.7rem;">{{ $message }}</div>

                    @enderror
                </div>
            </div>
            


        </div>
        
        <button type="submit" class="btn btn-success w-100">Thêm sản phẩm</button>
    
    </form>

</div>
    
@endsection