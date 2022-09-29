@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">
  @if(Session::has('success'))
  <div class="row">
    <div class="col-8">
      <div id="charge-message" class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    </div>
  </div>
  @endif
    <div class="card">
        <div class="card-header">
            <h5>QUẢN LÝ SẢN PHẨM</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.addform') }}" class="btn btn-success mb-4" style="color:white; width:150px;">Thêm sản phẩm</a>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm </th>
                    <th scope="col">Thương hiệu</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                  <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td><img style="height:100px;" src="{{ asset('/storage/'.$product->image) }}" alt=""></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->price }} vnđ</td>
        
                    <td>
                        <a href="{{ route('product.editform',['id'=>$product->id]) }}" class="btn btn-primary w-100 m-1" style="color:white;">Chỉnh sửa</a>
                        <a href="{{ route('product.remove',['id'=>$product->id]) }}" class="btn btn-danger w-100 m-1" style="color:white;">Xóa</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection