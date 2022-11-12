@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">

    <h5>Chỉnh bảo hành</h5>
    <hr>

    <form method="post" action="{{ route('insurance.edit',['id'=>$insurance->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row ">

            <div class="col-12">
                <label for="model" class="">{{ __('Serial') }}</label>
                <div class="form-group">
                    <div>
                        <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('serial') ?? $insurance->serial}}" required autocomplete="serial"readonly autofocus>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="body" class="">{{ __('Lỗi') }}</label>
                <div class="form-group">
                    <div>
                        <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') ?? $insurance->body}}" required autocomplete="body" autofocus>
                        
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label for="nameStaff" class="">{{  __('Nhân viên sửa chữa')}}</label>
                <div class="form-group">
                    <div>
                        <input id="nameStaff" type="text" class="form-control @error('nameStaff') is-invalid @enderror" name="nameStaff" value="{{ old('nameStaff') ?? $insurance->nameStaff}}" required autocomplete="nameStaff" autofocus>
                        
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label for="cost" class="">{{ __('Số tiền') }}</label>
                <div class="form-group">
                    <div>
                        <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" value="{{ old('cost') ?? $insurance->cost}}" required autocomplete="cost" autofocus>
                        
                    </div>
                </div>
            </div>
           
            </div>
           
   
        
        
        <button type="submit" class="btn btn-primary ">Chỉnh sửa</button>
    
    </form>

</div>
    
@endsection