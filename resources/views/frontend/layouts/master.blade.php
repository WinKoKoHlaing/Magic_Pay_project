<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">

    <!-- font --->
    <link rel="stylesheet" href="{{asset('frontend/fonts/opensans.ttf')}}">
    <!--bootstrap css -->
    <link rel="stylesheet" href="{{asset('bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    <!--datepicker-->
    <link rel="stylesheet" href="{{asset('frontend/datepicker/css/daterangepicker.css')}}">

    @yield('extra_css')
    
</head>
<body>
    <div id="app">
        <div class="header-menu">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="row text-center">
                        <div class="col-2">
                            @if (!request()->is('/'))
                            <a href="#" class="back-btn">
                                <i class="fas fa-angle-left"></i>
                            </a>                                
                            @endif
                        </div>
                        <div class="col-8">
                            <a href="">
                               <h3>@yield('title')</h3>
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="{{url('/notification')}}">
                                <!--notification-icon--> 
                                <i class="fas fa-bell"></i><span class="badge badge-pill badge-danger unread_noti_count">{{$unread_noti_count}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>       
        <div class="bottom-menu">
            <a href="{{url('scan-and-pay')}}" class="scan-tab">
                <div class="inside">
                    <i class="fas fa-qrcode"></i>
                </div>
            </a>
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="row text-center">
                        <div class="col-3">
                            <a href="{{route('home')}}">
                                <i class="fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('wallet')}}">
                                <i class="fas fa-wallet"></i>
                                <p>Wallet</p>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('transaction')}}">
                                <i class="fas fa-exchange-alt"></i>
                                <p>Transcation</p>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('profile')}}">
                                <i class="fas fa-user"></i>
                                <p>Account</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sweet-alert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('frontend/sweetalert/js/sweetalert2.min.js')}}"></script>

    <!-- bootstrap js-->
    <script src="{{asset('bootstrap4/js/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap4/js/jquery.minimized.js')}}"></script>
    <script src="{{asset('bootstrap4/js/bootstrap.bundle.js')}}"></script>

    <!-- jscroll js-->
    <script src="{{asset('frontend/jscroll/jscroll.min.js')}}"></script>

    <!-- datepicker--->
    <script src="{{asset('frontend/datepicker/js/moment.min.js')}}"></script>
    <script src="{{asset('frontend/datepicker/js/daterangepicker.min.js')}}"></script>

    <!-- ajax-token -->
    <script>
        $(document).ready(function(){
            //csrf-token
            let token = document.head.querySelector('meta[name="csrf-token"]');
            if(token){
                $.ajaxSetup({
                    headers : {
                        'X-CSRF_TOKEN' : token.content,
                        'Content-Type' : 'application/json',
                        'Accept' : 'application/json'
                    }
                });
            }
            //back-btn
            $('.back-btn').on('click',function(e){
                e.preventDefault();
                window.history.go(-1);
                return false;
            });
            // sweet-alert2
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            @if(session('create'))
            Toast.fire({
            icon: 'success',
            title: '{{session('create')}}'
            })
            @endif

            @if(session('update'))
            Toast.fire({
            icon: 'success',
            title: '{{session('update')}}'
            })
            @endif
        });
    </script>
    @yield('scripts')
</body>
</html>
