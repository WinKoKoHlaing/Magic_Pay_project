<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">
    <!-- ajax-csrf-token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('title')</title>
    <!-- css_link -->
    <link href="{{asset('backend/css/main.css')}}" rel="stylesheet">

    <!--data-table-->
    <link rel="stylesheet" href="{{asset('backend/datatable/css/jquery-datatables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/datatable/css/jquery-datatables.bootstrap4.min.css')}}">

    <!-- custom-css -->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">

    <!-- extra-css -->
    @yield('extra_css')
</head>



<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        <!-- header -->
        @include('backend.layouts.header')

        <div class="app-main">
                <!-- side-bar -->
                @include('backend.layouts.sidebar')

                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <!-- content-->
                        @yield('content')
                    </div>
                    <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-left">
                                    <span>Copyrighted @ {{date('Y')}}. All right reserved by Magic Pay.</span>
                                </div>
                                <div class="app-footer-right">
                                    <span>Developed by Win Ko Ko Hlaing.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>

    <!-- template-js -->
    <script type="text/javascript" src="{{asset('backend/js/main.js')}}"></script>
    <!-- datatable-js -->
    <script src="{{asset('backend/datatable/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('backend/datatable/jquery-datatables.js')}}"></script>
    <script src="{{asset('backend/datatable/jquery-datatables.bootstrap4.js')}}"></script>
    <!-- js-validator -->
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <!-- sweet-alert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('frontend/sweetalert/js/sweetalert2.min.js')}}"></script>
    

    <script>
        $(document).ready(function(){
            //csrf-token
            let token = document.head.querySelector('meta[name="csrf-token"]');
            if(token){
                $.ajaxSetup({
                    headers : {
                        'X-CSRF_TOKEN' : token.content
                    }
                });
            }
            // redirect-back
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

            @if(session('dele'))
            Toast.fire({
            icon: 'success',
            title: '{{session('dele')}}'
            })
            @endif
        });
    </script>

    @yield('scripts')

</body>
</html>
