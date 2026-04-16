@extends('app')

@section('noidung')
    <link rel="stylesheet" href="/css/style2.css">

    <main>
        @if ($errors->has('id_co_so'))
            <div class="alert alert-danger text-white">{{ $errors->first('id_co_so') }}</div>
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

        @if ($errors->has('ngay_to_chuc'))
            <div class="alert alert-danger text-white">{{ $errors->first('ngay_to_chuc') }}</div>
        @endif

        @if ($errors->has('id_ca_hoc'))
            <div class="alert alert-danger text-white">{{ $errors->first('id_ca_hoc') }}</div>
        @endif

        @if ($errors->has('su_kien'))
            <div class="alert alert-danger text-white">{{ $errors->first('su_kien') }}</div>
        @endif

        @if ($errors->has('so_luong'))
            <div class="alert alert-danger text-white">{{ $errors->first('so_luong') }}</div>
        @endif

        @if ($errors->has('id_bo_mon'))
            <div class="alert alert-danger text-white">{{ $errors->first('id_bo_mon') }}</div>
        @endif

        <form action="{{ route('datphong.store') }}" method="post" class="w-75 mx-auto border border-3 p-3">
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
                                    <option value="{{ $item->id_co_so }}">{{ $item->ten_co_so }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Tòa</label>
                            <select name="id_toa_nha" id="id_toa_nha" class="form-select">
                                <option value="" disabled selected>Chọn tòa</option>
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
                            <label class="form-label text-primary">Phòng</label>
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
                                    <option value="{{ $item->id_bo_mon }}">{{ $item->ten_bo_mon }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col mx-auto">
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Ngày tổ chức</label>
                            <input class="form-control" id="ngay_to_chuc" name="ngay_to_chuc" type="date" />
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary d-block mb-2">Ca học</label>
                            <div class="border rounded p-3 bg-light">
                                @foreach ($ca_hoc as $item)
                                    <div class="form-check mb-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="id_ca_hoc[]"
                                            value="{{ $item->id_ca_hoc }}"
                                            id="ca_hoc_{{ $item->id_ca_hoc }}"
                                        >
                                        <label class="form-check-label" for="ca_hoc_{{ $item->id_ca_hoc }}">
                                            {{ $item->ten_ca_hoc }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <small class="text-muted">Có thể chọn nhiều ca cùng lúc</small>
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Tên sự kiện</label>
                            <input type="text" id="su_kien" name="su_kien" class="form-control">
                        </div>
                    </div>

                    <!-- <div class="mb-3 d-flex justify-content-center">
                        <div class="w-75">
                            <label class="form-label text-primary">Số người tham gia</label>
                            <input type="number" id="so_luong" name="so_luong" class="form-control">
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Đặt phòng</button>
            </div>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function resetToa() {
            $('#id_toa_nha').html('<option value="" disabled selected>Chọn tòa</option>');
        }

        function resetTang() {
            $('#id_tang').html('<option value="" disabled selected>Chọn tầng</option>');
        }

        function resetPhong() {
            $('#id_phong').html('<option value="" disabled selected>Chọn phòng</option>');
        }

        function loadToaNha() {
            let idCoSo = $('#id_co_so').val();

            resetToa();
            resetTang();
            resetPhong();

            if (!idCoSo) return;

            $.ajax({
                url: '/datphong/get-toa-nha/' + idCoSo,
                method: 'GET',
                success: function(response) {
                    $.each(response, function(index, toa) {
                        $('#id_toa_nha').append(
                            '<option value="' + toa.id_toa_nha + '">' + toa.ten_toa_nha + '</option>'
                        );
                    });
                }
            });
        }

        function loadTang() {
            let idToa = $('#id_toa_nha').val();

            resetTang();
            resetPhong();

            if (!idToa) return;

            $.ajax({
                url: '/datphong/get-tang/' + idToa,
                method: 'GET',
                success: function(response) {
                    $.each(response, function(index, tang) {
                        $('#id_tang').append(
                            '<option value="' + tang.id_tang + '">' + tang.ten_tang + '</option>'
                        );
                    });
                }
            });
        }

        function loadPhong() {
            let idCoSo = $('#id_co_so').val();
            let idToa = $('#id_toa_nha').val();
            let idTang = $('#id_tang').val();

            resetPhong();

            if (!idCoSo || !idToa || !idTang) return;

            $.ajax({
                url: '/datphong/get-phong/' + idCoSo + '/' + idToa + '/' + idTang,
                method: 'GET',
                success: function(response) {
                    if (response.length === 0) {
                        $('#id_phong').append('<option value="" disabled>Không có phòng</option>');
                        return;
                    }

                    $.each(response, function(index, phong) {
                        $('#id_phong').append(
                            '<option value="' + phong.id_phong + '">' + phong.ten_phong + '</option>'
                        );
                    });
                }
            });
        }

        $(document).ready(function() {
            $('#id_co_so').change(function() {
                loadToaNha();
            });

            $('#id_toa_nha').change(function() {
                loadTang();
            });

            $('#id_tang').change(function() {
                loadPhong();
            });
        });
    </script>
@endsection