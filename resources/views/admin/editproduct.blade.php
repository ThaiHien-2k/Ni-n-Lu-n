@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">
    <h5>Chỉnh sửa sản phẩm</h5>
    <hr>

    <form method="POST" action="{{ route('product.edit',['id'=>$product->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row ">

            <div class="col-12">
                <label for="name" class="">{{ __('Tên sản phẩm') }}</label>
                <div class="form-group">
                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $product->name}}" required autocomplete="name" autofocus>
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
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $product->price  }}" required autocomplete="price" autofocus>
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
                        <select name="brand" id="addproductbrand" class="form-control" value="{{ old('brand') ?? $product->brand  }}">
                            <option selected="true" value="" disabled hidden>Chọn thương hiệu sản phẩm</option>
                            <option value="ASUS">ASUS</option>
                            <option value="DELL">DELL</option>
                            <option value="MSI">MSI</option>
                            <option value="APPLE">APPLE</option>
                            <option value="ACER">ACER</option>
                            <option value="HP">HP</option>
                        </select>
                    </div>
                </div>
            </div>

         
            <div class="col-12">
                <div class="form-group">
                    <label for="config" class="">{{ __('cấu hình') }}</label>
                    <textarea name="config"  id="config" class="form-control @error('config') is-invalid @enderror" value=""  rows="10" required autocomplete="name" autofocus>{{ old('config') ?? $product->config }}</textarea>
                    @error('config')

                    <div style="color:red; font-weight:bold; font-size:0.7rem;">{{ $message }}</div>

                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="insurance" class="">{{ __('Bảo hành') }}</label>
                    <div>
                        <input id="insurance" type="text" placeholder="Nhập số tháng" class="form-control @error('insurance') is-invalid @enderror" name="insurance" value="{{ old('insurance') ?? $product->insurance }}" required autocomplete="insurance" autofocus>
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
                    <br>
                    <img class="col-2" id="image" style="height:100px; weight:100px; margin-left:5%;" src="{{ asset('/storage/'.(old('image') ?? $product->image)) }}"  class="form-control @error('image') is-invalid @enderror" alt="">
                    <br>
                    <br>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')

                    <div style="color:red; font-weight:bold; font-size:0.7rem;">{{ $message }}</div>

                    @enderror
                </div>
            </div>
            


        </div>
        
        <button type="submit" class="btn btn-success w-100">Chỉnh sửa</button>
    
    </form>

</div>
    
@endsection