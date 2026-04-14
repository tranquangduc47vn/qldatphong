<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tầng</title>
    <!-- Link tới Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-uppercase">Thêm Tầng</h1>

        @if (session("success"))
            <div class="alert alert-success">{{ session("success") }}</div>
        @endif
        <form class="" action="{{ route("add_tang") }}" method="POST" enctype="multipart/form-data">
            {{-- Thêm CSRF token cho bảo mật --}}
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger p-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3  form-group">
                <label for="ten-co-so" class="form-label">Tên Tầng:</label>
                <input type="text" class="form-control" id="ten-tang" name="ten_tang" required>
            </div>

            <div class="form-group mb-4">
                <label for="id_toa_nha">Tòa Nhà</label>
                <input type="text" class="form-control" id="tem_toa_nha" name="ten_toa_nha" value="{{$toa->ten_toa_nha}}"  readonly>
                <input type="hidden" name="id_toa_nha" value="{{ $toa->id_toa_nha }}">
            </div>



            <button type="submit" class="btn btn-success me-1">Thêm tầng</button>
            <a href="{{ route("qltoa_nha") }}">
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
