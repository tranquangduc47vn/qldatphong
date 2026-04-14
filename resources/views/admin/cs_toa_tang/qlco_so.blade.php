@extends("admin/layout")
@section("noidung")
    <main>
        <div class="container my-5">
            <div class="d-flex justify-content-between my-3">
                <h1 class=" name-title">QUẢN LÝ CƠ SỞ</h1>
                <a href="{{ route("create_cs") }}">
                    <button class="btn btn-success" type="button"><i class="text-white bi bi-plus-circle"></i>
                        Thêm cơ sở
                    </button>
                </a>
            </div>
            @if (session("success"))
                <div class="alert alert-success">{{ session("success") }}</div>
            @endif


            <div class="tab-content">
                <div class="tab-pane fade show active" id="cs" role="tabpanel" aria-labelledby="cs-tab">
                    <table class="table-bordered text-center">
                        <thead>
                            <tr>
                                <th class="title-name">ID CƠ SỞ</th>
                                <th class="title-name">TÊN CƠ SỞ</th>
                                <th class="title-name">ĐỊA CHỈ</th>
                                <th class="title-name">CHỨC NĂNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cs as $item)
                                <tr>
                                    <td>{{ $item->id_co_so }}</td>
                                    <td>{{ $item->ten_co_so }}</td>
                                    <td>{{ $item->dia_chi }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route("edit_cs", [$item->id_co_so]) }}">
                                            <button class="btn btn-primary me-1"><i class=" text-white bi bi-pencil-square"></i>
                                                Sửa</button>
                                        </a>
                                        <form action="{{ route("del_cs", ["id" => $item->id_co_so]) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger"><i class="text-white bi bi-trash3"></i>
                                                Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
@endsection
