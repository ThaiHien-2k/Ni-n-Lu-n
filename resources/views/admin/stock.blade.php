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
            <h5>Quản lý kho</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.addstockform') }}" class="btn btn-success mb-2" style="color:white; width:150px;">Thêm mẫu</a>
            <select name="product-list" id="product-list" class="w-100 p-2 mb-2">
                <option selected="true" value="" disabled hidden>Chọn sản phẩm</option>
                @foreach ($product_id as $id)
                <option value="{{ $id->id }}">{{ $id->id." - ".$id->name }}</option>
                @endforeach
                
            </select>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Mẫu</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody id="stock-list">

                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection