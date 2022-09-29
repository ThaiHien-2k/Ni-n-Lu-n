@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">

    <h5>Thêm mẫu</h5>
    <hr>

    <form method="POST" action="{{ route('admin.addstock')}}" enctype="multipart/form-data">
        @csrf
        <div class="row ">

            <div class="col-12">
                <label for="product" class="">{{ __('Thêm mẫu') }}</label>
                <div class="form-group">
                    <select name="product" id="addproductstock" class="form-control">
                        <option selected="true" value="" disabled hidden>Chọn sản phẩm</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->id.' - '.$product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12">
                <label for="size" class="">{{ __('Mẫu') }}</label>
                <div class="form-group">
                    <div>
                        <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ old('size') }}" required autocomplete="size" autofocus>
                        @error('size')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="quantity" class="">{{ __('Số lượng') }}</label>
                <div class="form-group">
                    <div>
                        <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity')}}" required autocomplete="quantity" autofocus>
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        
        <button type="submit" class="btn btn-success w-100">Thêm mẫu</button>
    
    </form>

</div>
    
@endsection