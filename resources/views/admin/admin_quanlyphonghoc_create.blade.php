@extends('admin/layout')
@section('noidung')
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

        @if ($errors->has('ten_phong'))
            <div class="alert alert-danger text-white">{{ $errors->first('ten_phong') }}</div>
        @endif
        <form action="{{ route('quanlyphonghoc.store') }}" method="post" class="w-50 mx-auto border border-3 p-3">
            @csrf
            <h1 class="text-center">Thêm phòng</h1>
            <div class="mb-3 d-flex justify-content-center">
                <div class="w-50">
                    <label class="form-label text-primary">Cơ sở</label>
                    <select name="id_co_so" id="id_co_so" class="form-select">
                        <option value="" disabled selected>Chọn cơ sở</option>
                        @foreach ($co_so as $cs)
                            <option value="{{ $cs->id_co_so }}">
                                {{ $cs->ten_co_so }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <div class="w-50">
                    <label class="form-label text-primary">Loại phòng</label>
                    <select name="id_loai_phong" id="id_loai_phong" class="form-select" id="">
                        <option value="" disabled selected>Chọn loại phòng</option>
                        @foreach ($loai_phong as $lp)
                            <option value="{{ $lp->id_loai_phong }}">
                                {{ $lp->ten_loai_phong }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <div class="w-50">
                    <label class="form-label text-primary">Tòa nhà</label>
                    <select name="id_toa_nha" id="id_toa_nha" class="form-select">
                        <option value="" disabled selected>Chọn tòa nhà</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <div class="w-50">
                    <label class="form-label text-primary">Tầng</label>
                    <select name="id_tang" id="id_tang" class="form-select">
                        <option value="" disabled selected>Chọn tầng</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <div class="w-50">
                    <label class="form-label text-primary">Mã phòng
                    </label>
                    <input type="text" name="ten_phong" id="ten_phong" class="form-control">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Thêm</button>
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
                    url: '/admin/quanlyphonghoc/get-toa-nha/' +
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
                    url: '/admin/quanlyphonghoc/get-tang/' +
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
    </script>
@endsection
