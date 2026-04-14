<?php

namespace App\Http\Controllers;

use App\Models\Coso;
use App\Models\Toa;
use App\Models\Tang;
use Illuminate\Http\Request;
use App\Mail\ApproveRoom;
use App\Models\Booking;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coso = Coso::all();
        $toas = Toa::all();
        $tangs = Tang::with('toa.co_so')->get(); // Lấy cả thông tin về tầng và  tòa tương ứng
        $bookedRoom = Booking::join('phong', 'booking.id_phong', '=', 'phong.id_phong')
                        -> join('co_so', 'phong.id_co_so', '=', 'co_so.id_co_so')
                        -> join('toa_nha', 'phong.id_toa_nha', '=', 'toa_nha.id_toa_nha')
                        -> join('tang', 'phong.id_tang', '=', 'tang.id_tang')
                        -> join('loai_phong', 'phong.id_loai_phong', 'loai_phong.id_loai_phong')
                        -> join('ca_hoc', 'booking.id_ca_hoc', '=', 'ca_hoc.id_ca_hoc')
                        -> join('users', 'booking.id_user', '=', 'users.id_user')
                        -> join('bo_mon', 'booking.id_bo_mon', '=', 'bo_mon.id_bo_mon')
                        -> orderBy('booking.created_at', 'desc')
                        -> get();

        $data = [
            'cs' => $coso,
            'toas' => $toas,
            'tangs' => $tangs,
            // 'cttoa_tang'=> $chitiet
            'bookedRoom' => $bookedRoom,
        ];
        return view('admin.cs_toa_tang.qlycoso-toa-tang', $data);
    }
}
