<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ URL::asset('photo/box2.svg') }}" type="image/x-icon"/>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('external-css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">   
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="d-flex">
                        
                        <div class="pl-3 ml-3 pt-2" style=" font-size:1.5rem;">TH-Shop</div>
                        
                    </div>
                </a>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <div class="d-flex">
                                <a class="nav-link" href="{{ route('cart.index') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span>
                                </a>
                            </div>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                              

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                @if(Auth::user()->role == 'Admin')
                                    <a href="{{ route('admin.index') }}" class="dropdown-item">Xem trang admin</a>
                                    @endif


                                    <a href="{{ route('profile.edit',['user'=>Auth::user()->id ]) }}" class="dropdown-item">Chỉnh sửa thông tin</a>
                                    
                                    <a href="{{ route('pass.edit',['user'=>Auth::user()->id ]) }}" class="dropdown-item">Đổi mật khẩu</a>
                                    <a href="{{ route('ViewSearchInsuranceDetail') }}" class="dropdown-item">Lịch sử bảo hành</a>

                                    @if(Auth::user())
                                    <a href="{{ route('order.show',['user'=>Auth::user()->id]) }}" class="dropdown-item">Lịch sử mua hàng</a>
                                    @endif
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <div class="collapse navbar-collapse" id="navbarNav" style="margin-left:12%; font-size:20px;">
    <ul class="navbar-nav">
    <li class="nav-item">
        <strong><a class="nav-link" href="{{ url('/') }}">Trang chủ</a></strong>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('product.index') }}">Sẩn phẩm</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home.introduce') }}">Giới thiệu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home.contact') }}">Liên hệ</a>
      </li>
    
    <form class="form-inline my-2 my-lg-0" style="margin-left:250px ;" action="{{ route('search') }}" method="GET">
    <input class="form-control mr-sm-2 filter2" id="searchProduct" style="width:400px;" name="searchProduct" placeholder="Nhập từ khóa cần tìm" aria-label="searchProduct" >
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
  </form>
    
    </ul>
  </div>
</nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>

    <footer>
        <div class='container-fluid footer'>
            <div class='container p-0 pt-3'>
                <div class='row'>
                    <div class='col-md-4 col-sm-12 pt-3'>
                        <h3>Liên hệ</h3>
                        <p><b>SĐT:</b> 0123456789 <br> <b>Email:</b> support@thshop.com</p>
                    </div>
                    <div class='col-md-4 col-sm-12 pt-3'>
                        <h3>Theo dõi chúng tôi tại</h3>
                        <ul>
                            <li><a href='https://facebook.com/' target='_blank'>
                                <i class="fa fa-instagram"></i></a></li>
                            <li><a href='https://instagram.com/' target='_blank'>
                                <i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href='https://youtube.com/' target='_blank'>
                                <i class="fa fa-youtube"></i></a></li>
                        </ul>

                    </div>
                    <div class='col-md-4 col-sm-12 pt-3'>
                        <h3>Đăng ký nhận tin</h3>
                        <p>Đăng ký để nhận tin mới nhất từ chúng tôi</p>
                        <div class='newsletter-form p-0'>
                            <form action='' method='post' id='newsletter-validate-detail'>
                                @csrf
                                <input type='email' name='email' id='newsletter-footer' class=''
                                    placeholder='Nhập email của bạn'>
                                <button type='submit' id='signup-newsletter-footer' class='button'>Đăng ký</button>
                            </form>
                        </div>
                    </div>
                    <div class='col-12 divider-footer p-0'>
                    </div>
                    <div class='col-md-6 col-sm-12 copyright'>
                        <p>copyright &copy; 2022</p>
                    </div>
                    <div class='col-md-6 col-sm-12 payment'> <img src="{{ asset('photo/cards.png') }}" alt=''>
                    </div>
                    <div class='col-12 p-0 mt-3'>
                    </div>

                </div>
            </div>
        </div>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

@yield('script')
<script>

    $(document).ready(function(){

        filter_data('');

        function filter_data(query='')
        {
            var search=JSON.stringify(query);
            var price =JSON.stringify($('#pricerange').val());
            var brand =JSON.stringify(get_filter('brand'));
            $.ajax({
                url:"{{ route('product.filter') }}",
                method:'GET',
                data:{
                    query:search,
                    price:price,
                   
                    brand:brand,
                    },
                dataType:'json',
                success:function(data)
                {
                    $('#products').html(data.table_data);
                }
            })
        }

        function get_filter(class_name)
        {
            var filter=[];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }

        $(document).on('keyup','#search',function(){
            var query = $(this).val();
            filter_data(query);
        });

        $('.selector').click(function(){
            var query = $('#search').val();
            filter_data(query);
        });

        $(document).on('input','#pricerange',function(){
            var range = $(this).val();
            $('#currentrange').html(range);
        });

        $(document).on('change','#size-dropdown',function(){
            var model = $(this).val();
            document.cookie="laptops_model="+model+";"+"path=/";
            $('#add-to-cart').removeClass('disabled');
        });

    });
    
</script>

</html>

