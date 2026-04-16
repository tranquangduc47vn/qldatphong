<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CoSo;
use App\Models\Tang;
use App\Models\Toa;
use App\Models\Phong;
use App\Models\CaHoc;
use App\Models\Booking;
use App\Models\BoMon;

class DatPhongController extends Controller
{
    public function index()
    {
        $co_so = CoSo::all();
        $bo_mon = BoMon::all();
        $ca_hoc = CaHoc::orderBy('id_ca_hoc', 'asc')->get();

        return view('datphong', compact('co_so', 'bo_mon', 'ca_hoc'));
    }

    public function getToaNha($idCoSo)
    {
        $toaNha = Toa::where('id_co_so', $idCoSo)->get();
        return response()->json($toaNha);
    }

    public function getTang($idToaNha)
    {
        $tang = Tang::where('id_toa_nha', $idToaNha)->get();
        return response()->json($tang);
    }

    public function getPhong($idCoSo, $idToaNha, $idTang)
    {
        $phong = Phong::where('id_co_so', $idCoSo)
            ->where('id_toa_nha', $idToaNha)
            ->where('id_tang', $idTang)
            ->get();

        return response()->json($phong);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_co_so' => 'required',
            'id_toa_nha' => 'required',
            'id_tang' => 'required',
            'id_phong' => 'required',
            'ngay_to_chuc' => 'required',
            'id_ca_hoc' => 'required|array|min:1',
            'su_kien' => 'required',
            'so_luong' => 'required',
            'id_bo_mon' => 'required',
        ], [
            'id_co_so.required' => 'Vui lòng chọn cơ sở',
            'id_toa_nha.required' => 'Vui lòng chọn tòa',
            'id_tang.required' => 'Vui lòng chọn tầng',
            'id_phong.required' => 'Vui lòng chọn phòng',
            'ngay_to_chuc.required' => 'Vui lòng chọn ngày tổ chức',
            'id_ca_hoc.required' => 'Vui lòng chọn ít nhất 1 ca học',
            'su_kien.required' => 'Vui lòng nhập tên sự kiện',
            'so_luong.required' => 'Vui lòng nhập số người tham gia',
            'id_bo_mon.required' => 'Vui lòng chọn bộ môn',
        ]);

        $id_user = Auth::user()->id_user;

        foreach ($request->id_ca_hoc as $ca) {
            $booking = new Booking();
            $booking->ngay_dat = now();
            $booking->ngay_to_chuc = $request->ngay_to_chuc;
            $booking->su_kien = $request->su_kien;
            $booking->ghi_chu_admin = null;
            $booking->ly_do_huy = null;
            $booking->so_luong = $request->so_luong;
            $booking->booking_status = 0;
            $booking->id_bo_mon = $request->id_bo_mon;
            $booking->id_user = $id_user;
            $booking->id_phong = $request->id_phong;
            $booking->id_ca_hoc = $ca;

            if ($ca == 1) {
                $booking->thoi_gian_bat_dau = '07:00:00';
            } elseif ($ca == 2) {
                $booking->thoi_gian_bat_dau = '13:00:00';
            } elseif ($ca == 3) {
                $booking->thoi_gian_bat_dau = '18:00:00';
            } else {
                $booking->thoi_gian_bat_dau = '07:00:00';
            }

            $booking->save();
        }

        return redirect()->route('ls')->with('success', 'Đã book phòng thành công. Đang chờ duyệt');
    }
}