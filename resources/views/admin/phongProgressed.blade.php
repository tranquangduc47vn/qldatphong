@extends('admin/layout')
@section('noidung')
        <main>
            <div class="timetable">
                <div class="name-title">Phòng đã duyệt</div>
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
                        </tr>

                        @if ($acceptedRoom->isEmpty())
                            <tr>
                                <th colspan="10">
                                    {{ 'Không có phòng đã duyệt' }}
                                </th>
                            </tr>
                        @else
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($acceptedRoom as $r)
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
                                            {{ $r->ten_toa_nha.$r->ten_tang.$r->ten_phong }}
                                        @else
                                            {{ $r->ten_phong }}
                                        @endif
                                    </th>
                                    <th> {{ $r->su_kien }} </th>
                                </tr>
                                @php
                                    $stt++
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="timetable mt-5">
                <div class="name-title">Phòng không duyệt</div>
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
                            <th class="title-name">Ghi chú</th>
                        </tr>

                        @if ($notAcceptedRoom->isEmpty())
                            <tr>
                                <th colspan="12">
                                    {{ 'Không có phòng không duyệt' }}
                                </th>
                            </tr>
                        @else
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($notAcceptedRoom as $r)
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
                                            {{ $r->ten_toa_nha.$r->ten_tang.$r->ten_phong }}
                                        @else
                                            {{ $r->ten_phong }}
                                        @endif
                                    </th>
                                    <th> {{ $r->su_kien }} </th>
                                    <th> {{ $r->ghi_chu_admin }} </th>
                                </tr>
                                @php
                                    $stt++
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="timetable mt-5">
                <div class="name-title">Phòng đã hủy</div>
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
                            <th class="title-name">Lý do hủy</th>
                        </tr>

                        @if ($canceledRoom->isEmpty())
                            <tr>
                                <th colspan="12">
                                    {{ 'Không có phòng đã hủy' }}
                                </th>
                            </tr>
                        @else
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($canceledRoom as $r)
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
                                            {{ $r->ten_toa_nha.$r->ten_tang.$r->ten_phong }}
                                        @else
                                            {{ $r->ten_phong }}
                                        @endif
                                    </th>
                                    <th> {{ $r->su_kien }} </th>
                                    <th> {{ $r->ly_do_huy }} </th>
                                </tr>
                                @php
                                    $stt++
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </main>
        <br>
        <hr>
       @endsection