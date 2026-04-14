<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style2.css">
    <link rel="stylesheet" href="/css/footer.css">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>
        h1 {
            font-size: 16px;
        }

        th {
            font-weight: 500;
        }

        textarea {
            width: 80%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            font-size: 16px;
            resize: none;
        }

        .lydo {
            border: none;
            margin-left: 550px;
            width: 90px;
            text-align: center;
            text-transform: capitalize;
            height: auto;
            background-color: #DDDDDD;
            border-radius: 5px;
            box-shadow: 2px 2px #F5F5F5;
            -webkit-transition: background-color 2s ease-out;
            -moz-transition: background-color 2s ease-out;
            -o-transition: background-color 2s ease-out;
            transition: background-color 2s ease-out
        }

        .lydo:hover {
            transition: cubic-bezier(0.6, 0.04, 0.98, 0.335);
            background-color: #9c9494;
        }

        /* css qlphong */
        .title-admin {
            button {
                font-size: 10px;
            }

            /* end */

            /* css qlthongtin */
            .tttk>h1 {
                font-size: 16px;
            }

            th {
                font-weight: 500;
            }
        }
    </style>
</head>

<body>
    <div class="contain">
        <nav>
            <div class="logo"><img src="/bookPhong/img/logo-fpt.png" alt=""></div>
            <ul class="menu">
                <li><a href="{{ route('quanlyphonghoc.index') }}">QUẢN LÝ PHÒNG</a></li>
                <li><a href="qlthongtin">QUẢN LÝ THÔNG TIN</a></li>
                <li><a href="qlco_so">QUẢN LÝ CƠ SỞ</a></li>
                <li><a href="qltoa_nha">QUẢN LÝ TÒA NHÀ</a></li>
                <li><a href="qlca_hoc">QUẢN LÝ CA HỌC</a></li>
                <li><a href="{{ route('qldatphong.index') }}">PHÒNG CHƯA XỬ LÝ</a></li>
                <li><a href="{{ route('qldatphong.progressed') }}">PHÒNG ĐÃ XỬ LÝ</a></li>
            </ul>
            {{-- <a class="button-dangnhap" href="/login">Đăng nhập</a> --}}
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
                    <button class="button-dangnhap" type="submit"
                     {{-- href="{{ route('logout') }}"
                    onlick="event.preventDefault();document.getElementById('logout-form').submit();" --}}
                    >
                    Đăng xuất
                </button>
                </form>
            @endguest
        </nav>
        <br>
        @yield('noidung')
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
    </div>
</body>

</html>
