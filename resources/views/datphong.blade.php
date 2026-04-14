@extends('app')
@section('noidung')
    <link rel="stylesheet" href="/css/style2.css">

    <main>
        @if ($errors->has('id_co_so'))
            <div class="alert alert-danger text-white">{{ $errors->first('id_co_so') }}</div>
        @endif

        @if ($errors->has('id_loai_phong'))
            <div class="alert alert-danger text-white">{{ $errors->first('id_loai_phong') }}</div>
        @endif

        @if ($errors->has('id_toa_nha'))
            <div class="alert alert-danger text-white">{{ $errors->first('id_toa_nha') }}</div>
        @endif

        @if ($errors->has('id_tang'))
            <div class="alert alert-danger text-white">{{ $errors->first('id_tang') }}</div>
        @endif

        @if ($errors->has('id_phong'))
            <div class="alert alert-danger text-white">{{ $errors->first('id_phong') }}</div>
        @endif

        @if ($errors->has('su_kien'))
            <div class="alert alert-danger text-white">{{ $errors->first('su_kien') }}</div>
        @endif
        @if ($errors->has('ngay_to_chuc'))
            <div class="alert alert-danger text-white">{{ $errors->first('ngay_to_chuc') }}</div>
        @endif
        @if ($errors->has('thoi_gian_bat_dau'))
            <div class="alert alert-danger text-white">{{ $errors->first('thoi_gian_bat_dau') }}</div>
        @endif
        @if ($errors->has('id_ca_hoc'))
            <div class="alert alert-danger text-white">{{ $errors->first('id_ca_hoc') }}</div>
        @endif
        @if ($errors->has('so_luong'))
            <div class="alert alert-danger text-white">{{ $errors->first('so_luong') }}</div>
        @endif

        <form action="{{ route('datphong.create') }}" method="post" class="w-75 mx-auto border border-3 p-3">
            @csrf
            <h1 class="text-center">Booking phòng</h1>
            <div class="row">
                <div class="col mx-auto">
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Cơ sở</label>
                            <select name="id_co_so" id="id_co_so" class="form-select">
                                <option value="" disabled selected>Chọn cơ sở</option>
                                @foreach ($co_so as $item)
                                    <option value="{{ $item->id_co_so }}">
                                        {{ $item->ten_co_so }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Tòa nhà</label>
                            <select name="id_toa_nha" id="id_toa_nha" class="form-select">
                                <option value="" disabled selected>Chọn tòa nhà</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Tầng</label>
                            <select name="id_tang" id="id_tang" class="form-select">
                                <option value="" disabled selected>Chọn tầng</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Loại phòng</label>
                            <select name="id_loai_phong" id="id_loai_phong" class="form-select">
                                <option value="" disabled selected>Chọn loại phòng</option>
                                @foreach ($loai_phong as $item)
                                    <option value="{{ $item->id_loai_phong }}">
                                        {{ $item->ten_loai_phong }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Mã phòng
                            </label>
                            <select name="id_phong" id="id_phong" class="form-select">
                                <option value="" disabled selected>Chọn phòng</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Bộ môn</label>
                            <select name="id_bo_mon" id="id_bo_mon" class="form-select">
                                <option value="" disabled selected>Chọn bộ môn</option>
                                @foreach ($bo_mon as $item)
                                    <option value="{{ $item->id_bo_mon }}">
                                        {{ $item->ten_bo_mon }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col mx-auto">
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Tên sự kiện</label>
                            <input type="text" id="su_kien" name="su_kien" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Ngày tổ chức</label>
                            <div class="input-group">
                                <input class="form-control" id="ngay_to_chuc" name="ngay_to_chuc" type="date"
                                    onchange="formatDate()" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Thời gian bắt đầu</label>
                            <div class="input-group">
                                <input class="form-control" type="time" id="thoi_gian_bat_dau" name="thoi_gian_bat_dau">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Ca học</label>
                            <select name="id_ca_hoc" id="id_ca_hoc" class="form-select">
                                <option value="" disabled selected>Chọn ca học</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Dự kiến số người tham gia</label>
                            <input type="number" id="so_luong" name="so_luong" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Đặt phòng</button>
            </div>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        // {{-- get tòa nhà --}}
        $(document).ready(function() {
            // Thêm sự kiện chọn vào trường select đầu tiên
            $('#id_co_so').change(function() {
                // Lấy giá trị của option được chọn
                var selectedCoSoId = $(this).val();

                // Gửi yêu cầu Ajax để lấy danh sách tòa nhà liên quan đến cơ sở đã chọn
                $.ajax({
                    url: '/datphong/get-toa-nha/' +
                        selectedCoSoId, // Đặt URL của endpoint để lấy danh sách tòa nhà
                    method: 'GET',
                    success: function(response) {
                        // Xóa các tùy chọn hiện tại trong trường select tòa nhà
                        $('#id_toa_nha').empty();

                        // Thêm mặc định và sau đó thêm các tùy chọn mới từ response vào trường select tòa nhà
                        $('#id_toa_nha').append(
                            '<option value="" disabled selected>Chọn tòa nhà</option>');
                        $.each(response, function(index, toaNha) {
                            $('#id_toa_nha').append('<option value="' + toaNha
                                .id_toa_nha + '">' + toaNha.ten_toa_nha +
                                '</option>');
                        });
                    }
                });
            });
        });


        // {{-- get tầng --}}
        $(document).ready(function() {
            // Thêm sự kiện chọn vào trường select đầu tiên
            $('#id_toa_nha').change(function() {
                // Lấy giá trị của option được chọn
                var selectedCoSoId = $(this).val();

                // Gửi yêu cầu Ajax để lấy danh sách tòa nhà liên quan đến cơ sở đã chọn
                $.ajax({
                    url: '/datphong/get-tang/' +
                        selectedCoSoId, // Đặt URL của endpoint để lấy danh sách tòa nhà
                    method: 'GET',
                    success: function(response) {
                        // Xóa các tùy chọn hiện tại trong trường select tòa nhà
                        $('#id_tang').empty();

                        // Thêm mặc định và sau đó thêm các tùy chọn mới từ response vào trường select tòa nhà
                        $('#id_tang').append(
                            '<option value="" disabled selected>Chọn tầng</option>');
                        $.each(response, function(index, tang) {
                            $('#id_tang').append('<option value="' + tang.id_tang +
                                '">' + tang.ten_tang + '</option>');
                        });
                    }
                });
            });
        });

        // get phòng
        $(document).ready(function() {
            // Thêm sự kiện chọn vào trường select đầu tiên
            $('#id_loai_phong').change(function() {
                var selectedCoSoId = $('#id_co_so').val();
                var selectedToaNhaId = $('#id_toa_nha').val();
                var selectedTangId = $('#id_tang').val();
                var selectedLoaiPhongId = $(this).val();

                // Gửi yêu cầu Ajax để lấy danh sách tòa nhà liên quan đến cơ sở đã chọn
                $.ajax({
                    url: '/datphong/get-phong/' +
                        selectedCoSoId + '/' +
                        selectedToaNhaId + '/' +
                        selectedTangId + '/' +
                        selectedLoaiPhongId,
                    method: 'GET',
                    success: function(response) {
                        // Xóa các tùy chọn hiện tại trong trường select tòa nhà
                        $('#id_phong').empty();

                        // Thêm mặc định và sau đó thêm các tùy chọn mới từ response vào trường select tòa nhà
                        $('#id_phong').append(
                            '<option value="" disabled selected>Chọn phòng</option>');
                        $.each(response, function(index, phong) {
                            $('#id_phong').append('<option value="' + phong.id_phong +
                                '">' + phong.ten_phong + '</option>');
                        });
                    }
                });
            });
        });

        // {{-- get ca học --}}
        $(document).ready(function() {
            // Thêm sự kiện chọn vào trường select đầu tiên
            $('#id_loai_phong').change(function() {
                // Lấy giá trị của option được chọn
                var selectedLoaiPhongId = $(this).val();

                if (selectedLoaiPhongId == 1) {
                    $.ajax({
                        url: '/datphong/get-ca-hoc/' +
                            selectedLoaiPhongId, // Đặt URL của endpoint để lấy danh sách tòa nhà
                        method: 'GET',
                        success: function(response) {
                            // Xóa các tùy chọn hiện tại trong trường select tòa nhà
                            $('#id_ca_hoc').empty();

                            // Thêm mặc định và sau đó thêm các tùy chọn mới từ response vào trường select tòa nhà
                            $('#id_ca_hoc').append(
                                '<option value="" disabled selected>Chọn ca học</option>');
                            $.each(response, function(index, caHoc) {
                                $('#id_ca_hoc').append('<option value="' + caHoc
                                    .id_ca_hoc + '">' + caHoc.ten_ca_hoc +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $.ajax({
                        url: '/datphong/get-buoi-hoc/' +
                            selectedLoaiPhongId, // Đặt URL của endpoint để lấy danh sách tòa nhà
                        method: 'GET',
                        success: function(response) {
                            // Xóa các tùy chọn hiện tại trong trường select tòa nhà
                            $('#id_ca_hoc').empty();

                            // Thêm mặc định và sau đó thêm các tùy chọn mới từ response vào trường select tòa nhà
                            $('#id_ca_hoc').append(
                                '<option value="" disabled selected>Chọn ca học</option>');
                            $.each(response, function(index, caHoc) {
                                $('#id_ca_hoc').append('<option value="' + caHoc
                                    .id_ca_hoc + '">' + caHoc.ten_ca_hoc +
                                    '</option>');
                            });
                        }
                    });
                }

                // Gửi yêu cầu Ajax để lấy danh sách tòa nhà liên quan đến cơ sở đã chọn
                // $.ajax({
                //     url: '/datphong/get-ca-hoc/' +
                //         selectedLoaiPhongId, // Đặt URL của endpoint để lấy danh sách tòa nhà
                //     method: 'GET',
                //     success: function(response) {
                //         // Xóa các tùy chọn hiện tại trong trường select tòa nhà
                //         $('#id_ca_hoc').empty();

                //         // Thêm mặc định và sau đó thêm các tùy chọn mới từ response vào trường select tòa nhà
                //         $('#id_ca_hoc').append(
                //             '<option value="" disabled selected>Chọn ca học</option>');
                //         $.each(response, function(index, caHoc) {
                //             $('#id_ca_hoc').append('<option value="' + caHoc
                //                 .id_ca_hoc + '">' + caHoc.ten_ca_hoc +
                //                 '</option>');
                //         });
                //     }
                // });
            });
        });
    </script>

    <!-- Include Date Range Picker -->
    {{-- <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" /> --}}

    <script>
        // $(document).ready(function() {
        //     var date_input = $('input[name="ngay_to_chuc"]'); //our date input has the name "date"
        //     var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        //     date_input.datepicker({
        //         format: 'dd/mm/yyyy',
        //         container: container,
        //         todayHighlight: true,
        //         autoclose: true,
        //     })
        // })
    </script>
@endsection
