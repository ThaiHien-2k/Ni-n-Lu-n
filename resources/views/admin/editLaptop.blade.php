@extends('layouts.admin')

@section ('content')

<div class="col-8 col-md-8 col-sm-8 col-lg-8">

    <h5>Chỉnh sửa serial</h5>
    <hr>
    @foreach($laptops as $laptop)
    <form method="POST" action="{{ route('laptop.serialEdit',['id'=>$laptop->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row ">
      
            <div class="col-12">
                <label for="serial" class="">{{ __('Serial') }}</label>
                <div class="form-group">
                    <div>
                        <input id="serial" type="text" class="form-control @error('serial') is-invalid @enderror" name="serial" value="{{ old('serial') ?? $laptop->serial}}" required autocomplete="serial" autofocus>
                        @error('model')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <label for="dateInsurance" class="">{{ __('Ngày bắt đầu bảo hành') }}</label>
                <div class="form-group">
                    <div>
                        
                        <input id="dateInsurance" type="date" class="form-control @error('dateInsurance') is-invalid @enderror" name="dateInsurance" value="{{ old('dateInsurance') ?? $laptop->dateInsurance}}" required autocomplete="dateInsurance" autofocus>
                        @error('dateInsurance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <label for="">Ngày bắt đầu bảo hành cũ:</label>
                    <h5><strong>{{  date('d/m/Y', strtotime($laptop->dateInsurance))}}</strong></h5>
                    </div>
                </div>
            </div>

        </div>
        
        <button type="submit" class="btn btn-primary ">Chỉnh sửa</button>
    
    </form>
@endforeach
</div>
    
@endsection