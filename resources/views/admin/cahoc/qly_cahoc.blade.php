@extends("admin/layout")
@section("noidung")
    <main>
        <div class="container my-5">
            <div class="d-flex justify-content-between my-3">
                <h1 class=" name-title">QUẢN LÝ CA HỌC</h1>
                <a href="{{ route("create_cahoc") }}">
                    <button class="btn btn-success" type="button"><i class="text-white bi bi-plus-circle"></i>
                        Thêm ca học
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
                                <th class="title-name">ID CA</th>
                                <th class="title-name">TÊN CA</th>
                                <th class="title-name">LOẠI</th>
                                <th class="title-name">THỜI GIAN BẮT ĐẦU</th>
                                <th class="title-name">THỜI GIAN KẾT THÚC</th>
                                <th class="title-name">CHỨC NĂNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cahoc as $item)
                                <tr>
                                    <td>{{ $item->id_ca_hoc }}</td>
                                    <td>{{ $item->ten_ca_hoc }}</td>
                                    <td>
                                        @if ($item->loai_ca_hoc === 1)
                                            Ca
                                        @else
                                            Buổi
                                        @endif


                                    </td>
                                    <td>{{ $item->thoi_gian_bat_dau }}</td>
                                    <td>{{ $item->thoi_gian_ket_thuc }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route("edit_cahoc", [$item->id_ca_hoc]) }}">
                                            <button class="btn btn-primary me-1"><i class="text-white bi bi-pencil-square"></i>
                                                Sửa</button>
                                        </a>
                                        <form action="{{ route("del_cahoc", ["id" => $item->id_ca_hoc]) }}" method="POST">
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
    <br>
@endsection
