<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tòa tầng</title>
    <!-- Link tới Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h2 class="text-center mb-5 text-primary">SỬA TÒA</h2>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa Tòa và Tầng</div>

                    <div class="card-body">
                        @if (session("success"))
                            <div class="alert alert-success">{{ session("success") }}</div>
                        @endif

                        <!-- Form để chỉnh sửa thông tin của tòa và các tầng -->
                        <form action="{{ route("update_tt", ["id" => $toa->id_toa_nha]) }}" method="post">
                            @csrf
                            <!-- Trường nhập tên tòa nhà -->
                            <div class="mb-3">
                                <label for="ten_toa_nha" class="form-label">Tên Tòa Nhà:</label>
                                <input type="text" class="form-control" id="ten_toa_nha" name="ten_toa_nha"
                                    value="{{ $toa->ten_toa_nha }}" required>
                            </div>

                            <!-- Trường chọn cơ sở -->
                            <div class="mb-3">
                                <label for="id_co_so" class="form-label">Chọn Cơ Sở:</label>
                                <select class="form-select" id="id_co_so" name="id_co_so" required>
                                    @foreach ($coso as $cs)
                                        <option value="{{ $cs->id_co_so }}"
                                            {{ $toa->id_co_so == $cs->id_co_so ? "selected" : "" }}>
                                            {{ $cs->ten_co_so }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Nút Submit để cập nhật thông tin -->
                            <button type="submit" class="btn btn-success">Cập Nhật</button>
                            <a href="{{route('qltoa_nha')}}" class="btn btn-primary">Quay lại
                            </a>
                        </form>

                        <!-- Hiển thị thông báo thành công hoặc lỗi nếu có -->
                        @if (session("error"))
                            <div class="alert alert-danger mt-3">{{ session("error") }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
