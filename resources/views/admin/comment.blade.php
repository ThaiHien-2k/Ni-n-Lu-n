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
            <h5>QUẢN LÝ BÌNH LUẬN</h5>
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Người Bình Luận</th>
                   <th scope="col">Bình Luận</th>
                   <th scope="col">Sản Phẩm</th>
                   <th scope="col">Ngày Bình Luận</th>
                   <th scope="col">Trạng Thái</th>
                   <th scope="col">Hành Động</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                  <tr>
                  @foreach ($users as $user)
                  @foreach ($products as $product)
                  @if($comment->product_id == $product->id && $comment->user_id == $user->id)
                  

                    <td scope="row">{{ $user->name }}</td>
                   
                    <td scope="row">{{ $comment->body }}</td>
                    
                    <td scope="row">{{ $product->name  }}</td>
                    <td scope="row">{{ $comment->created_at->format('d/m/Y')  }}</td>
                    @if($comment->status == 2)
                    <td scope="row">Chưa Đọc</td>
                    @elseif($comment->status == 1)
                    <td scope="row">Đã Đọc</td>
                    @endif
                    @endif
                    
                    @endforeach
                    @endforeach
                   
                    <td>
                        <a href="{{ route('comment.reply',['id'=>$comment->product_id]) }}" class="btn btn-primary w-100 m-1" style="color:white;">Trả Lời</a>
                        <a href="{{ route('comment.replied',['id'=>$comment->id]) }}" class="btn btn-success w-100 m-1" style="color:white;">Đã Đọc</a>
                        <a href="{{ route('comment.remove',['id'=>$comment->id]) }}" class="btn btn-danger w-100 m-1" style="color:white;">Xóa</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection