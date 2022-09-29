@extends('layouts.app')

@section ('content')

<div class="container p-0">
  <div class="row">

    <div class="col-lg-3 col-md-3 col-sm-4 col-5 pl-4 filter">
      <div class="fixedfilter">

        <h3><i class="fa fa-filter"></i> Bộ lọc </h3>
        <input class="mt-3" type="text" id="search" placeholder="Nhập tên sản phẩm" style="width:100%;">

        
       

        <div class="filterbrand card">
          <div class="card-body">
            <h5 class="card-title">Thương hiệu</h5>
         
              <input type="checkbox" id="ASUS" class="brand selector" name="brand" value="ASUS" > <label for="ASUS">ASUS</label>
              <br>
              <input type="checkbox" id="DELL" class="brand selector" name="brand" value="DELL" > <label for="DELL">DELL</label>
              <br>
              <input type="checkbox" id="APPLE" class="brand selector" name="brand" value="APPLE" > <label for="APPLE">APPLE</label>
              <br>
              <input type="checkbox" id="MSI" class="brand selector" name="brand" value="MSI" > <label for="MSI">MSI</label>
              <br>
              <input type="checkbox" id="HP" class="brand selector" name="brand" value="HP" > <label for="HP">HP</label>
              <br>
              <input type="checkbox" id="ACER" class="brand selector" name="brand" value="ACER" > <label for="ACER">ACER</label>
              
              
          
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-8 col-7 pr-4">
      <h3>Sản phẩm</h3>
      
      <div class="row d-flex justify-content-start" id="products">
        
      </div>

    </div>

  </div>
</div>



@endsection