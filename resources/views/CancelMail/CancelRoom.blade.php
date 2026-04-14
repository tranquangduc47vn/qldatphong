@component('mail::message')
    Chúng tôi đã hủy phòng của anh/chị
    @auth
        <i>{{ Auth::user()->name }}</i>
    @endauth
    <hr>
    Anh/Chị đã hủy phòng với lí do: <i>{{ $liDo }}</i>
    <br>
    <hr>
    <strong>Hãy bấm vào đây để quay lại đặt phòng</strong>
    @component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
        Đặt phòng
    @endcomponent
@endcomponent

