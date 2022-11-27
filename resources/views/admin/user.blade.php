@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">
    <div class="card">
        <div class="card-header">
            <h5>DANH SÁCH TÀI KHOẢN</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                @if($user->role == 'Admin')
             
                    
                    @else
                    <tr>
                    <th scope="row">{{ $user->user_id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phonenumber }}</td>
                    <td>{{ $user->address }}</td>
                   <td><a href="{{ route('user.remove',['id'=>$user->id]) }}" class="btn btn-danger w-100 m-1" style="color:white;">Xóa</a></td> 
                   @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection