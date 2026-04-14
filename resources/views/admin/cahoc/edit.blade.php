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
        <h1 class="text-uppercase">SỬA CA HỌC</h1>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger nav-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{ route("update_cahoc", ["id" => $item->id_ca_hoc]) }}" method="POST"
            enctype="multipart/form-data">
            {{-- Thêm CSRF token cho bảo mật --}}
            @csrf
            <div class="mb-3 w-50">
                <label for="id_ca_hoc" class="form-label">ID CA:</label>
                <input type="text" {{ old("id_ca_hoc") }} value="{{ $item->id_ca_hoc }}" class="form-control"
                    id="id_ca_hoc" name="id_ca_hoc" disabled>
            </div>
            <div class="mb-3 w-50">
                <label for="ten_ca_hoc" class="form-label">TÊN CA:</label>
                <input type="text" {{ old("ten_ca_hoc") }} value="{{ $item->ten_ca_hoc }}" class="form-control"
                    id="ten_ca_hoc" name="ten_ca_hoc" disabled>
            </div>
            <div class="mb-3 w-50">
                <label for="thoi_gian_bat_dau" class="form-label">THỜI GIAN BẮT ĐẦU:</label>

                <input type="time" {{ old("thoi_gian_bat_dau") }} value="{{ $item->thoi_gian_bat_dau }}"
                    class="form-control" id="thoi_gian_bat_dau" name="thoi_gian_bat_dau">
            </div>
            <div class="mb-3 w-50">
                <label for="thoi_gian_ket_thuc" class="form-label">THỜI GIAN KẾT THÚC:</label>
                <input type="time" {{ old("thoi_gian_ket_thuc") }} value="{{ $item->thoi_gian_ket_thuc }}"
                    class="form-control" id="thoi_gian_ket_thuc" name="thoi_gian_ket_thuc">
            </div>



            <button type="submit" class="btn btn-success me-1">SỬA CA</button>
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
