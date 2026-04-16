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
                            <th class="mau-da" colspan="3">{{ $item['Thu'] }}</th>
                        @endforeach
                    </tr>

                    <tr class="head">
                        <th class="mau-xanhla">Ngày</th>
                        @foreach ($calendar as $day)
                            <th class="mau-da" colspan="3">{{ $day['day'] }}</th>
                        @endforeach
                    </tr>

                    <tr class="ca">
                        <th class="mau-xanhla">Ca</th>
                        @foreach ($calendar as $day)
                            <th class="mau-da">Sáng</th>
                            <th class="mau-da">Chiều</th>
                            <th class="mau-da">Tối</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($phong as $item)
                        <tr class="ca">
                            <th class="mau-xanhla">{{ $item->ten_phong }}</th>

                            @foreach ($calendar as $time)
                                @php
                                    for ($i = 1; $i <= 3; $i++) {
                                        $booking = Booking::where('ngay_to_chuc', $time['time'])
                                            ->where('id_phong', $item->id_phong)
                                            ->where('id_ca_hoc', $i)
                                            ->first();

                                        if ($booking) {
                                            if ($booking->booking_status == 0) {
                                                $color = 'circle button-blue';
                                            } elseif ($booking->booking_status == 1) {
                                                $color = 'circle button-red';
                                            } else {
                                                $color = 'circle button-white';
                                            }
                                        } else {
                                            $color = 'circle button-white';
                                        }

                                        echo '<th><button class="' . $color . '"></button></th>';
                                    }
                                @endphp
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
            {{ $phong->links() }}
        </div>
    </main>
@endsection
