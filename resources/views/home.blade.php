@php
    use App\models\Booking;
    use App\models\cahoc;
    use App\models\coso;
    use App\models\toa;
    use App\models\tang;
@endphp
@extends('app')

@section('menu')
    @include('menu')
@endsection

@section('noidung')
    <main>
        <div class="timetable">
            <table>
                <thead>
                    <tr class="head">
                        <th class="mau-xanhla">Thứ</th>
                        @foreach ($calendar as $item)
                            <th class="mau-da" colspan="6">{{ $item['Thu'] }}</th>
                        @endforeach
                    </tr>
                    <tr class="head">
                        <th class="mau-xanhla">Ngày 555</th>
                        @foreach ($calendar as $day)
                            <th class="mau-da" colspan="6">
                                {{ $day['day'] }}
                            </th>
                        @endforeach
                    </tr>
                    @if ($phong->isNotEmpty() && $phong[0]->id_loai_phong == 1)
                        <tr class="ca">
                            <th class="mau-xanhla">Ca</th>
                            @php
                                for ($i = 0; $i < 7; $i++) {
                                    echo '  <th class="mau-da">1</th>
                                        <th class="mau-da">2</th>
                                        <th class="mau-da">3</th>
                                        <th class="mau-da">4</th>
                                        <th class="mau-da">5</th>
                                        <th class="mau-da">6</th>';
                                }
                            @endphp
                        </tr>
                    @else
                        <tr class="ca">
                            <th class="mau-xanhla">Ca</th>
                            @php
                                for ($i = 0; $i < 7; $i++) {
                                    echo '  <th colspan="3" class="mau-da">Sáng</th>
                                        <th colspan="3" class="mau-da">Chiều</th>';
                                }
                            @endphp
                        </tr>
                    @endif

                    <!-- button tròn -->
                    @foreach ($phong as $item)
                        @if ($item->id_loai_phong == 1)
                            <tr class="ca">
                                <th class="mau-xanhla">{{ $item->ten_toa_nha . $item->ten_tang . $item->ten_phong }}</th>
                                @foreach ($calendar as $time)
                                    @php
                                        for ($i = 1; $i <= 6; $i++) {
                                            $booking = Booking::where('ngay_to_chuc', $time['time'])
                                                ->where('id_phong', $item->id_phong)
                                                ->where('id_ca_hoc', $i)
                                                ->first();
                                            $caHoc = cahoc::find($i);
                                            if ($booking) {
                                                if ($booking->booking_status == 0) {
                                                    // $color = 'circle button-blue';
                                                    echo '<th class=""><button class="circle button-blue"></button></th>';
                                                }
                                                if ($booking->booking_status == 1) {
                                                    // $color = 'circle button-red';
                                                    echo '<th class=""><button class="circle button-red"></button></th>';
                                                }
                                            } else {
                                                // $color = 'circle button-white';
                                                echo '<th class=""><button class="circle button-white"></button></th>';
                                            }
                                        }
                                    @endphp
                                @endforeach
                            </tr>
                        @else
                            <tr class="ca">
                                <th class="mau-xanhla">{{ $item->ten_phong }}</th>
                                @foreach ($calendar as $time)
                                    @php
                                        for ($i = 7; $i <= 8; $i++) {
                                            $booking = Booking::where('ngay_to_chuc', $time['time'])
                                                ->where('id_phong', $item->id_phong)
                                                ->where('id_ca_hoc', $i)
                                                ->first();
                                            if ($booking) {
                                                if ($booking->booking_status == 0) {
                                                    $color = 'circle button-blue';
                                                }
                                                if ($booking->booking_status == 1) {
                                                    $color = 'circle button-red';
                                                }
                                            } else {
                                                $color = 'circle button-white';
                                            }
                                            echo '<th colspan="3" class=""><button class="' . $color . '"></button></th>';
                                        }
                                    @endphp
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                </thead>

            </table>
            <br>
            {{ $phong->links() }}
        </div>
        

    </main>
@endsection
