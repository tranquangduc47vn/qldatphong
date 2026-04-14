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
        <h1 class="text-uppercase">Thêm Cơ sở</h1>

        <form class="" action="{{route('add_cs')}}" method="POST" enctype="multipart/form-data">
            {{-- Thêm CSRF token cho bảo mật --}}
             @csrf
            <div class="mb-3 w-50">
                <label for="ten-co-so" class="form-label">Tên Cơ sở:</label>
                <input type="text" class="form-control" id="ten-co-so" name="ten" required>
            </div>

            <div class="mb-3 w-50">
                <label for="dia-chi" class="form-label">Địa chỉ:</label>
                <input type="text" class="form-control" id="dia-chi" name="dia_chi" required>
            </div>

            <button type="submit" class="btn btn-success me-1">Thêm Cơ sở</button>
            <a href="{{ route("co_so") }}">
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

