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
    <div class="container my-5 ">
        <div class="row justify-content-center ">
            <h2 class="text-center mb-5 text-primary">THÊM TÒA VÀ TẦNG</h2>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Tòa và Tầng</div>

                    <div class="card-body">
                        @if (session("success"))
                            <div class="alert alert-success">{{ session("success") }}</div>
                        @endif

                        <form action="{{ route("add_tt") }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="ten_toa_nha" class="form-label">Tên Tòa Nhà:</label>
                                <input type="text" class="form-control" id="ten_toa_nha" name="ten_toa_nha" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_co_so" class="form-label">Chọn Cơ Sở:</label>
                                <select class="form-select" id="id_co_so" name="id_co_so" required>
                                    <!-- Option sẽ được tạo thông qua dữ liệu từ cơ sở dữ liệu -->
                                    @foreach ($co_so as $item)
                                        <option value="{{ $item->id_co_so }}">{{ $item->ten_co_so }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_tang" class="form-label">Chọn Tầng:</label>

                                @for ($i = 1; $i <= 11; $i++)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $i }}"
                                            id="tang{{ $i }}" name="ten_tang[]">
                                        <label class="form-check-label" for="tang{{ $i }}">
                                            Tầng {{ $i }}
                                        </label>
                                    </div>
                                @endfor


                            </div>

                            <button type="submit" class="btn btn-success">Thêm Tòa</button>
                            <a href="{{route('qltoa_nha')}}" class="btn btn-primary">Quay Lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap JS (nếu cần) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
