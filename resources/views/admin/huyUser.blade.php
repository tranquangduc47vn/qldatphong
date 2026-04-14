@extends('admin/layout')
@section('noidung')
        <main>
            <div class="search"></div>



            <div class="timetable">
                <div class="lydo" type="submit">lý do hủy</div>
                <br>
                <form>
                    <textarea>Vui lòng nhập lý do</textarea>
                  </form>
                  <button class="btn btn-secondary" style="width: 80%; margin-left: 120px">Xác nhận</button>
            </div>


        </main>
        <br>
        <hr>
        

        @endsection