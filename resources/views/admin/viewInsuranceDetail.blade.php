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
            <h5>Chi tiết sửa chữa</h5>
        </div>
        <div class="card-body">
        <div class="row col">
        @foreach ($insurances as $insurance)
        <div class="col-12 ">
                <div class="row" style="">
                    <div class="">
                    <strong>Lần sửa thứ: &nbsp; &nbsp;</strong> {{ $time }} <br>
                    <strong>Lỗi: &nbsp; &nbsp;</strong> {{ $insurance->body }} <br>
                    <strong>Nhân viên tiếp nhận:&nbsp; &nbsp;</strong> {{ $insurance->nameStaff }}<br>
                    <strong>Ngày nhận máy:</strong>&nbsp;&nbsp; {{ date('d-m-Y', strtotime($insurance->dateTake)) }} <br>
                    <strong>Ngày trả máy:</strong>&nbsp;&nbsp; {{ date('d-m-Y', strtotime($insurance->dateTake)) }}
                    <br>
                    <strong>Tình trạng: &nbsp; &nbsp;</strong>{{ $insurance->status }}
        
                    </div>
                    
          
</form>
                    
                        
                    </div>
                </div>
                
                <a href="{{ route('insuranceDetail.addDetailForm',['id'=>$insurance->id,'time'=>$time])}}" class="btn btn-success " style="color:white;margin-top :20px;">Thêm</a>&nbsp;&nbsp;
                <a href="" class="btn btn-primary " style="color:white;margin-top :20px;">Giao</a>
                <hr>
        @endforeach
        </div>
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Ngày</th>
                    <th scope="col">Nội dung sửa</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($insuranceDetails as $insuranceDetail)
                  <tr>
                    <th scope="row">{{ date('d-m-Y', strtotime($insuranceDetail->date))}}</th>
                    <td>{{ $insuranceDetail->fix }}</td>
                    <td><img style="height:100px;" src="{{ asset('/storage/'.$insuranceDetail->image) }}" alt=""></td>
                   
                   
        
                    <td>
                        <a href="" class="btn btn-warning w-100 m-1" style="color:white;">Chỉnh sửa</a>
                        <a href="{{ route('insuranceDetail.remove',['id'=>$insuranceDetail->id]) }}" class="btn btn-danger w-100 m-1" style="color:white;">Xóa</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection