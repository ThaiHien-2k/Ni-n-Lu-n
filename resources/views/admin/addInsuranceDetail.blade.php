@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">
    <h5>THÊM CHI TIẾT BẢO HÀNH</h5>
    <hr>

    <form method="POST" action="{{ route('insuranceDetail.create') }}" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <input type="hidden" id="id" name="id"  value="{{$id}}">
            <input type="hidden" id="time" name="time"  value="{{$time}}">

            <div class="col-12">
                <label for="date" class="">{{ __('Ngày') }}</label>
                <div class="form-group">
                    <div>
                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="fix" class="">{{ __('Nội dung sửa') }}</label>
                <div class="form-group">
                    <div>
                        <input id="fix" type="text" class="form-control @error('fix') is-invalid @enderror" name="fix" value="{{ old('fix')  }}" required autocomplete="fix" autofocus>
                        @error('fix')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

         

         

            <div class="col-12">
                <div class="form-group">
                    <label for="image" class="">Ảnh trạng thái</label>
                    <input type="file" class="form-control" id="image" name="image">
                    
                    @error('image')

                    <div style="color:red; font-weight:bold; font-size:0.7rem;">{{ $message }}</div>

                    @enderror
                </div>
            </div>
            


        </div>
        
        <button type="submit" class="btn btn-success w-100">Thêm</button>
    
    </form>

</div>
    
@endsection