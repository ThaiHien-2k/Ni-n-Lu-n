@extends('layouts.app')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8" style="margin-left:15%;" >
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
                    <strong>Ngày trả máy:</strong>&nbsp;&nbsp; {{ date('d-m-Y', strtotime($insurance->dateReturn)) }}
                    <br>
                    <strong>Tình trạng: &nbsp; &nbsp;</strong>{{ $insurance->status }}
        
                    </div>
                    
          
</form>
                    
                        
                    </div>
                </div>
                
               
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
             
                  </tr>
                </thead>
                <tbody>
                @if($insurance->status=='Đã giao')
                @foreach ($insuranceDetails as $insuranceDetail)
                  <tr>
                    <th scope="row">{{ date('d-m-Y', strtotime($insuranceDetail->date))}}</th>
                    <td>{{ $insuranceDetail->fix }}</td>
                    <td><img style="height:100px;" src="{{ asset('/storage/'.$insuranceDetail->image) }}" alt=""></td>
                   
                   
        
                   
                  </tr>
                @endforeach
                <tr>
                    <th>{{ date('d-m-Y', strtotime($insurance->dateReturn)) }}</th>
                    <th>Giao máy</th>
                    <th></th>
                </tr>
                @else
                @foreach ($insuranceDetails as $insuranceDetail)
                  <tr>
                    <th scope="row">{{ date('d-m-Y', strtotime($insuranceDetail->date))}}</th>
                    <td>{{ $insuranceDetail->fix }}</td>
                    <td><img style="height:100px;" src="{{ asset('/storage/'.$insuranceDetail->image) }}" alt=""></td>
                   
                   
        
                   
                  </tr>
                @endforeach
              
                @endif
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection