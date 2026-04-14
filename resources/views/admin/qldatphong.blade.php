@extends('admin/layout')
@section('noidung')
    <main>
        <div class="timetable">
            <div class="name-title">Danh sách đặt phòng</div>
            <br>
            <table>
                <thead>
                    <tr>
                        <th class="title-name">STT </th>
                        <th class="title-name" width="100px">Ngày</th>
                        <th class="title-name">Tên</th>
                        <th class="title-name">Bộ Môn</th>
                        <th class="title-name">Cơ Sở</th>
                        <th class="title-name">Tòa</th>
                        <th class="title-name">Loại phòng</th>
                        <th class="title-name">Ca/Buổi</th>
                        <th class="title-name">Mã phòng</th>
                        <th class="title-name">Sự kiện</th>
                        <th class="title-name">Trạng thái</th>
                        {{-- <th class="title-name">Lý do hủy</th>
                            <th class="title-name">Ghi chú</th> --}}
                        <th class="title-name">Action</th>
                    </tr>

                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($bookedRoom as $r)
                        <tr>
                            <th> {{ $stt }} </th>
                            <th> {{ date('d-m-Y', strtotime($r->ngay_to_chuc)) }} </th>
                            <th> {{ $r->name }} </th>
                            <th> {{ $r->ten_bo_mon }} </th>
                            <th> {{ $r->ten_co_so }} </th>
                            <th> {{ $r->ten_toa_nha }} </th>
                            <th> {{ $r->ten_loai_phong }} </th>
                            <th> {{ $r->ten_ca_hoc }} </th>
                            <th>
                                @if ($r->id_loai_phong == 1)
                                    {{ $r->ten_toa_nha . $r->ten_tang . $r->ten_phong }}
                                @else
                                    {{ $r->ten_phong }}
                                @endif
                            </th>
                            <th> {{ $r->su_kien }} </th>
                            <th>
                                @if ($r->booking_status == 0)
                                    {{ 'Đang chờ duyệt' }}
                                @elseif($r->booking_status == 1)
                                    {{ 'Đã duyệt' }}
                                @else
                                    {{ 'Không duyệt' }}
                                @endif
                            </th>
                            {{-- <th> {{ $r->ly_do_huy }} </th>
                                <th> {{ $r->ghi_chu_admin }} </th> --}}
                            <th>
                                @if ($r->booking_status == 0)
                                    <div class="dropdown">
                                        <div class="dropdown-content">
                                            <a href="{{ route('admin.accept', ['id_booking' => $r->id_booking]) }}">
                                                <button class="btn btn-success mb-3">
                                                    Duyệt
                                                </button>
                                            </a>

                                            {{-- <a href="{{ route('qldatphong.edit', ['qldatphong' => $r->id_booking]) }}"> --}}
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#staticReasonNoAccept-{{ $r->id_booking }}">
                                                Không
                                            </button>
                                            {{-- </a> --}}
                                        </div>
                                    </div>
                                @elseif($r->booking_status == 1)
                                    {{ 'Đã duyệt' }}
                                @else
                                    {{ 'Không duyệt' }}
                                @endif
                            </th>
                        </tr>
                        @php
                            $stt++;
                        @endphp

                        @include('admin.huyAdmin')
                    @endforeach
                    <!-- Thêm các hàng dữ liệu khác -->
                    </tbody>
            </table>
        </div>
    </main>
    <br>
    <hr>
@endsection
