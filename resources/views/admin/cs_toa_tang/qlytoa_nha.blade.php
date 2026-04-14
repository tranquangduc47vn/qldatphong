@extends("admin/layout")
@section("noidung")
    <style>
        .right {
            right: 0px;
        }

        .center-div {
            /* Thiết lập kích thước và các thuộc tính khác cho div */
            width: 30%;
            min-height: 50%;
            /* text-align: center; */
            /* Sử dụng các lớp của Bootstrap để căn giữa */
            /* display: flex; */
            left: 35%;
            top: 15%;
            box-shadow: 0px 5px 15px 2px rgb(158, 157, 157);
            border-radius: 5px;
            /* align-items: center; */
            /* justify-content: center; */
            position: absolute;
            display: none;
        }
    </style>

    <body>
        <div class="container mt-5">
            <div class="d-flex justify-content-between my-3">
                <h1 class=" name-title">QUẢN LÝ TÒA NHÀ</h1>
                <a class="btn btn-success mb-3" href="{{ route("create_tt") }}"><i class="text-white bi bi-plus-circle"></i> Thêm
                    tòa</a>
            </div>
            @if (session("success"))
                <div class="alert alert-success">{{ session("success") }}</div>
            @endif
            <div class=" position-relative" id="toa">
                @foreach ($toas as $toa)
                    <h3>Tòa nhà {{ $toa->ten_toa_nha }}</h3>
                    <table class="table table-bordered border-primary text-center ">
                        <thead>
                            <tr>
                                <th scope="col">ID TÒA</th>
                                <th scope="col">TÊN TÒA NHÀ</th>
                                <th scope="col">TÊN CƠ SỞ</th>
                                <th scope="col">TẦNG</th>
                                <th scope="col">CHỨC NĂNG</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($tangs as $item)
                                @if ($item->id_toa_nha === $toa->id_toa_nha)
                                    <tr>
                                        <td class="">
                                            <p class="">{{ $item->toa->id_toa_nha }}</p>
                                        </td>
                                        <td class="">
                                            <p class="">{{ $item->toa->ten_toa_nha }}</p>
                                        </td>
                                        <td class="">
                                            <p class="">{{ $item->toa->co_so->ten_co_so }}</p>
                                        </td>
                                        <td class="w-25">

                                            <button class="btn btn-primary" onclick="hien_tang({{ $toa->id_toa_nha }})">Danh
                                                sách tầng</button>

                                        </td>

                                        <div class="center-div bg-light p-3" id="toa_{{ $toa->id_toa_nha }}">
                                            <h4 class="mb-5 text-center text-primary">TẦNG CỦA TÒA
                                                {{ $item->toa->ten_toa_nha }}</h4>
                                            @foreach ($tangs as $tangItem)
                                                @if ($tangItem->id_toa_nha === $item->toa->id_toa_nha)
                                                    <ul>
                                                        <li class="row">
                                                            <div class="col">
                                                                {{ $tangItem->ten_tang }}
                                                            </div>
                                                            <div class="col">

                                                                <form
                                                                    action="{{ route("destroy_tang", ["id" => $tangItem->id_tang]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <button class="btn btn-danger" type="submit">Xóa
                                                                        tầng</button>
                                                                </form>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                @endif
                                            @endforeach
                                            <div class="d-flex justify-content-center">
                                                <a class="list-unstyled"
                                                    href="{{ route("create_tang", ["id" => $toa->id_toa_nha]) }}">
                                                    <button class="btn-success btn me-3"><i class="text-white bi bi-plus-circle"></i>
                                                        Thêm tầng</button>
                                                </a>
                                                <button class="btn-primary btn"
                                                    onclick="hien_tang({{ $toa->id_toa_nha }})"><i
                                                        class="text-white bi bi-box-arrow-right"></i> Quay lại</button>
                                            </div>
                                        </div>


                                        <td class="">
                                            <div class="nut d-flex justify-content-center ">
                                                <a href="{{ route("edit_tt", ["id" => $toa->id_toa_nha]) }}">
                                                    <button class="btn btn-primary"><i class="text-white bi bi-pencil-square"></i>
                                                        Sửa</button>
                                                </a>

                                                <form action="{{ route("del_tt", ["id" => $toa->id_toa_nha]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="text-white bi bi-trash3"></i> Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @break
                            @endif
                        @endforeach

                    </tbody>
                </table>
            @endforeach
        </div>
        <br>
        <script>
            function hien_tang(toaId) {
                var element = document.getElementById("toa_" + toaId);
                if (element.style.display === "none" || element.style.display === "") {
                    element.style.display = "block";
                } else {
                    element.style.display = "none";
                }
            }

            function xoaTang(idTang) {
                if (confirm("Bạn có chắc chắn muốn xóa tầng này không?")) {
                    // Sử dụng AJAX để gửi yêu cầu xóa tầng
                    jQuery.ajax({
                        url: '/xoa-tang/' + idTang,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            // Xử lý khi xóa thành công (có thể ẩn phần tử trên giao diện)
                            console.log('Xóa thành công');
                        },
                        error: function(data) {
                            // Xử lý khi có lỗi xảy ra
                            console.log('Có lỗi xảy ra khi xóa');
                        }
                    });
                }
            }
        </script>
    @endsection
