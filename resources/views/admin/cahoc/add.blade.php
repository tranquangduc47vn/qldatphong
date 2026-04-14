<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Cơ sở</title>
    <!-- Link tới Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-uppercase">Thêm Ca</h1>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{ route("add_cahoc") }}" method="POST" enctype="multipart/form-data">
            {{-- Thêm CSRF token cho bảo mật --}}
            @csrf
            <div class="mb-3 w-50">
                <label for="ten_ca_hoc" class="form-label">Tên Ca :</label>
                <input type="text" class="form-control" id="ten_ca_hoc" name="ten_ca_hoc" required>
            </div>
            <div class="mb-3 w-50">
                <label for="loai_ca_hoc" class="form-label">Loại:</label>
                {{-- <input type="text" class="form-control" id="loai_ca_hoc" name="loai_ca_hoc" required> --}}
                <select name="loai_ca_hoc" id="loai_ca_hoc" class="form-control">
                    <option value="0">Buổi</option>
                    <option value="1">Ca</option>
                </select>
            </div>
            <div class="mb-3 w-50">
                <label for="thoi_gian_bat_dau" class="form-label">Thời gian bắt đầu :</label>
                {{-- <input type="text" class="form-control" id="thoi_gian_bat_dau" name="thoi_gian_bat_dau" required> --}}
                <input type="time" id="thoi_gian_bat_dau" name="thoi_gian_bat_dau" class="form-control">

            </div>
            <div class="mb-3 w-50">
                <label for="thoi_gian_ket_thuc" class="form-label">Thời gian kết thúc :</label>
                {{-- <input type="text" class="form-control" id="thoi_gian_ket_thuc" name="thoi_gian_ket_thuc" required> --}}
                <input type="time" id="thoi_gian_ket_thuc" name="thoi_gian_ket_thuc" class="form-control">

            </div>


            <button type="submit" class="btn btn-success me-1">Thêm Ca</button>
            <a href="{{ route("cahoc") }}">
                <button class="btn btn-primary position-absolute" type="button"><i class="bi bi-plus-circle"></i>
                    Quay lại
                </button>
            </a>
        </form>
    </div>
    <!-- Script Bootstrap JS (nếu cần) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
