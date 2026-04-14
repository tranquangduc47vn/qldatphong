<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" />
    <!-- ap.poly.edu.vn -->
    <!-- <link href="https://ap.poly.edu.vn/theme/student_v2/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" /> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <title>UTE</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Gijgo -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- <script>
        $(document).ready(function () {
            $(".circle").click(function () {
                alert("heleo");
            });
        });
    </script> -->
    <!-- hiện form đặt phòng -->
    <script>


        $(document).ready(function () {

            $(".circle").click(function () {
                $("#form").fadeIn();
            });
            $("#thoat-form").click(function () {
                $("#form").fadeOut();
            });
        });

    </script>
</head>

<body>
    <div class="contain">
        <nav>
            <div class="logo"><img src="{{ asset('img/logo.png') }}"  alt="logo"style="height: 80px; width: auto;"></div>
            <ul class="menu">
                <li><a href="/">TRANG CHỦ</a></li>
                <li><a href="{{ route('ls') }}">LỊCH SỬ ĐẶT PHÒNG</a></li>
                <li><a href="{{ route('datphong.index') }}">ĐẶT PHÒNG</a></li>
            </ul>
            {{-- <input class="button-dangnhap" type="submit" value="Đăng nhập"> --}}
            {{-- <a href="{{route('login')}}" class="button-dangnhap">Đăng nhập</a> --}}
            @guest
                @if (Route::has('login'))
                    <a class="button-dangnhap" href="{{ route('login') }}">Đăng nhập</a>
                @endif
                {{-- @if (Route::has('register'))
                    <a class="button-dangnhap" href="{{ route('register') }}">Đăng ký</a>
                @endif --}}
            @else
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input class="button-dangnhap" type="submit" value="Đăng xuất">
                </form>
            @endguest
        </nav>
        @yield('menu', '')

        @yield('noidung','')


    </div>
    <footer>
        <div id="kt_footer" class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
            <div class="kt-container kt-container--fluid">
                <div class="footer-filter-by-campus row">
                    <div class="column poly-logo"><img id="poly-logo" src="{{ asset('img/LogoUte.png') }}"
                            alt="" width="250">
                        <h6 class="kt-widget1__title"><i class="fas fa-map-marker-alt"></i> <a class="kt-link address">
                                1 Võ Văn Ngân, Phường Thủ Đức, Thành Phố Hồ Chí Minh
                            </a></h6>
                    </div>
                    <div class="column campus-contact-information">
                        <h3 class="contact-title">Thông tin liên hệ</h3>
                        <div class="campus-contact-content"><i class="fas fa-phone-alt"></i> <span>
                                Số điện thoại liên hệ giải đáp ý kiến sinh viên:
                                <a class="kt-link title">(+84 -028) 37225724;</a></span> <span class="break-line"><i
                                    class="fas fa-envelope"></i> <span>Địa chỉ email:</span>
                                <ul>
                        
                                    <li>
                                        
                                        <ul>
                                            <li><a class="kt-link title">hcth@hcmute.edu.vn</a></li>
                                            <li><a class="kt-link title">bmc@hcmute.edu.vn</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </span></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- lịch -->
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap5',
            format: "dd/mm/yyyy",
        });
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap5',
            format: "dd/mm/yyyy",
        });
    </script>
</body>

</html>
