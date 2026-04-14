@extends('app')
@section('noidung')
    <link rel="stylesheet" href="/css/style2.css">
    <div class="contain">
        <div class="container">
            @if(session('success'))
            <div id="alert" class="w-50">
                <div  class="alert alert-success alert-dismissible fade show " role="alert">
                    <p class="m-0"><strong>Thành công!</strong> {{session('success')}}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <script>
                var alert = document.getElementById('alert');
                setTimeout(() => {
                    alert.remove();
                }, 8000);
            </script>
            @endif   
    </div>
        <div class="timetable">
            <table>
                <thead>
                    <tr>
                        <th class="">Thời gian </th>
                        <th class="mau-da">Cơ sở</th>
                        <th class="mau-xanh">Tòa</th>
                        <th class="mau-da">Tầng</th>
                        <th class="mau-xanh">Loại phòng</th>
                        <th class="mau-da">Ngày đặt</th>
                        <th class="mau-xanh">Ca/Buổi</th>
                        <th class="mau-da">Phòng</th>
                        <th class="mau-da">Status</th>
                        <th class="mau-da">Lý do hủy</th>
                        <th class="mau-da">Ghi chú</th>
                        <th class="mau-da">Sự kiện</th>
                        <th class="mau-da">Action</th>
                    </tr>
                    @forelse ($lsDatPhongs as $lsDatPhong)
                        <tr >
                            <th>{{ $lsDatPhong->ngay_to_chuc }},{{ $lsDatPhong->thoi_gian_bat_dau }}</th>
                            <th>
                                @foreach ($phongs as $phong)
                                    @if ($lsDatPhong->id_phong == $phong->id_phong)
                                        @foreach ($coSos as $coSo)
                                            @if ($coSo->id_co_so == $phong->id_co_so)
                                                {{$coSo->ten_co_so}}
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </th>
                            <th>
                                @foreach ($phongs as $phong)
                                    @if ($lsDatPhong->id_phong == $phong->id_phong)
                                        @foreach ($toas as $toa)
                                            @if ($toa->id_toa_nha == $phong->id_toa_nha)
                                                {{ $toa->ten_toa_nha }}
                                            @endif
                                        @endforeach    
                                    @endif
                                @endforeach    
                            </th>
                            <th>
                                @foreach ($phongs as $phong)
                                @if ($lsDatPhong->id_phong == $phong->id_phong)
                                    @foreach ($tangs as $tang)
                                        @if ($tang->id_tang == $phong->id_tang)
                                            {{ $tang->ten_tang }}
                                        @endif
                                    @endforeach    
                                @endif
                                @endforeach 
                            </th>
                            <th>
                                @foreach ($phongs as $phong)
                                @if ($lsDatPhong->id_phong == $phong->id_phong)
                                    @foreach ($loaiPhongs as $loaiPhong)
                                        @if ($loaiPhong->id_loai_phong == $phong->id_loai_phong)
                                            {{ $loaiPhong->ten_loai_phong }}
                                        @endif
                                    @endforeach    
                                @endif
                                @endforeach 
                            </th>
                            <th>{{ $lsDatPhong->ngay_dat }}</th>
                            <th>
                                @foreach ($caHocs as $caHoc)
                                    @if ($caHoc->id_ca_hoc == $lsDatPhong->id_ca_hoc)
                                        {{ $caHoc->ten_ca_hoc}}
                                    @endif
                                @endforeach
                            </th>
                            <th>
                                @foreach ($phongs as $phong)
                                    @if ($lsDatPhong->id_phong == $phong->id_phong)
                                        {{ $phong->ten_phong}}
                                    @endif
                                @endforeach
                            </th>
                            <th>
                                @if ($lsDatPhong->booking_status == 0)
                                    {{ 'Chờ duyệt' }}
                                @elseif($lsDatPhong->booking_status == 1)
                                    {{ 'Đã duyệt' }}
                                @elseif($lsDatPhong->booking_status == 2)
                                    {{ 'Đã hủy' }}
                                @elseif($lsDatPhong->booking_status == 3)
                                    {{ 'Không duyệt' }}
                                @endif
                            </th>
                            <th>{{ $lsDatPhong->ly_do_huy}}</th>
                            <th>{{ $lsDatPhong->ghi_chu_admin}}</th>
                            <th>{{ $lsDatPhong->su_kien }}</th>
                            <th>
                                <div class="dropdown">
                                    <div class="dropdown-content">
                                        {{-- <a href="javascript:void(0)" class="btn d-none m-0 p-0" id="datPhong">Đặt lại</a> --}}
                                        {{-- <button type="button" class="btn m-0 p-0 {{$lsDatPhong->booking_status == 0 ? 'text-primary' : 'disabled'}}" data-bs-toggle="modal"
                                            data-bs-target="#staticReasonCancel-{{ $lsDatPhong->id_booking }}">
                                            Hủy phòng
                                        </button> --}}
                                        @if ($lsDatPhong->booking_status == 0)
                                            <button type="button" class="btn m-0 p-0 text-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticReasonCancel-{{ $lsDatPhong->id_booking }}">
                                                Hủy phòng
                                            </button>
                                        @elseif($lsDatPhong->booking_status == 1)
                                            <button type="button" class="btn m-0 p-0 text-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticReasonCancel-{{ $lsDatPhong->id_booking }}">
                                                Hủy phòng
                                            </button>
                                        @elseif($lsDatPhong->booking_status == 2)
                                            {{ 'Đã hủy' }}
                                        @elseif($lsDatPhong->booking_status == 3)
                                            {{ 'Không duyệt' }}
                                        @endif
                                        {{-- <a href="{{ route('huyPhong') }}"></a> --}}
                                    </div>
                                </div>
                            </th>
                        </tr>
                        {{-- modal --}}
                        <div class="modal fade" id="staticReasonCancel-{{ $lsDatPhong->id_booking }}" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticReasonCancelLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        {{-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> --}}
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-title">
                                                <h2 class="fs-5 fw-bold mt-3 mb-2 text-center text-uppercase">Lí do hủy</h2>
                                                <hr>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('huyPhong', ['id' => $lsDatPhong->id_booking ]) }}" method="post">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="liDoHuy" class="form-label">Vui lòng nhập lí do bạn
                                                            muốn hủy phòng </label>
                                                        <input type="text" name="ly_do_huy" class="form-control valid"
                                                            id="liDoHuy" required>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please select a valid state.
                                                    </div>
                                                    <div class="float-end">
                                                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Hủy</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    @empty
        <tr>
            <td colspan="13">Lịch sử đặt phòng trống</td>
        </tr>
        @endforelse

        <!-- Thêm các hàng dữ liệu khác -->
        </tbody>
        <tr>
            <td colspan = "13">
                <div class="p-0 ">
                    {{ $lsDatPhongs->links('pagination::bootstrap-5') }}
                </div>
            </td>
        </tr>
        </table>

    </div>
    </main>
    <br>
    <hr>
@endsection
