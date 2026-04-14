@extends('admin/layout')
@section('noidung')
    <main style="background-color: #F5F5F9">
        <div class="search"></div>
        @if (session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {!! session('error') !!}
            </div>
        @endif
        <h4 class="p-5">Admin</h4>
        <div class="timetable" style="background-color: white">
            <h4 class="p-5 pb-0">Danh sách phòng</h4>
            <div class="d-flex justify-content-end mb-3" style="margin-right: 5%">
                <a href="{{ route('quanlyphonghoc.show') }}">
                    <button type="button" class="btn btn-primary">Thêm phòng</button>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="">STT </th>
                        <th class="mau-da">CƠ SỞ</th>
                        <th class="mau-xanh">TÒA NHÀ</th>
                        <th class="mau-da">TẦNG</th>
                        <th class="mau-xanh">LOẠI PHÒNG</th>
                        <th class="mau-da">MÃ PHÒNG</th>
                        <th class="mau-da">ACTION</th>
                    </tr>
                    @foreach ($phong as $item)
                        <tr>
                            <th>{{ ($phong->currentPage() - 1) * $phong->perPage() + $loop->iteration }}</th>
                            <th>{{ $item->ten_co_so }}</th>
                            <th>{{ $item->ten_toa_nha }}</th>
                            <th>{{ $item->ten_tang }}</th>
                            <th>{{ $item->ten_loai_phong }}</th>
                            <th>{{ $item->ten_phong }}</th>
                            <th>
                                <a href="{{ route('quanlyphonghoc.edit', $item->id_phong) }}"
                                    class="btn btn-primary text-white btn-sm mr-2  fa-sm w-75 ">
                                    Sửa
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('quanlyphonghoc.delete', $item->id_phong) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-white btn-sm w-75 mb-0 ml-0 mr-0"
                                        onclick="return confirm('Bạn có chắc muốn xóa tin tức &quot;{{ $item->ten_phong }}&quot; này không?');">
                                        Xóa <i class="fas fa-trash-alt fa-sm"></i>
                                    </button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>

            </table>
            <div class="">
                <div>{{ $phong->links() }}</div>
            </div>
        </div>
    </main>
@endsection
