<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CoSo;
use App\Models\Tang;
use App\Models\Toa;
use App\Models\LoaiPhong;
use App\Models\Phong;
use App\Models\CaHoc;
use App\Models\Booking;
use App\Models\BoMon;

class DatPhongController extends Controller
{
    public function index()
    {
        $co_so = CoSo::all();
        $loai_phong = LoaiPhong::all();
        $bo_mon = BoMon::all();
        // $ca_hoc = CaHoc::all();
        return view('datphong', compact('co_so', 'loai_phong', 'bo_mon'));
    }

    public function getToaNha($idCoSo)
    {
        // Lấy danh sách tòa nhà dựa trên id của cơ sở
        $toaNha = Toa::where('id_co_so', $idCoSo)->get();

        // Trả về danh sách tòa nhà dưới dạng JSON
        return response()->json($toaNha);
    }

    public function getTang($idToaNha)
    {
        // Lấy danh sách tòa nhà dựa trên id của cơ sở
        $idTang = Tang::where('id_toa_nha', $idToaNha)->get();

        // Trả về danh sách tòa nhà dưới dạng JSON
        return response()->json($idTang);
    }

    public function getPhong($idCoSo, $idToaNha, $idTang, $idLoaiPhong)
    {
        // Lấy danh sách tòa nhà dựa trên id của cơ sở
        $idPhong = Phong::where('id_co_so', $idCoSo)
            ->where('id_toa_nha', $idToaNha)
            ->where('id_tang', $idTang)
            ->where('id_loai_phong', $idLoaiPhong)
            ->get();

        // Trả về danh sách tòa nhà dưới dạng JSON
        return response()->json($idPhong);
    }

    public function getCaHoc() {
        $idCaHoc = CaHoc::where('loai_ca_hoc', 1)->get();
        return response()->json($idCaHoc);
    }

    public function getBuoiHoc() {
        $idBuoiHoc = CaHoc::where('loai_ca_hoc', 2)->get();
        return response()->json($idBuoiHoc);
    }

    public function store(Request $request)
    {
        // kiểm tra lỗi form nếu không nhập dữ liệu
        $errorMessages = [
            'id_co_so.required' => 'Vui lòng chọn cơ sở',
            'id_loai_phong.required' => 'Vui là chọn loại phòng',
            'id_toa_nha.required' => 'Vui là chọn tòa nhà',
            'id_tang.required' => 'Vui là chọn tầng',
            'id_phong.required' => 'Vui lòng chọn phòng',
            'su_kien' => 'Vui lòng nhập tên sự kiệm',
            'ngay_to_chuc' => 'Vui lòng chọn ngày tổ chức',
            'thoi_gian_bat_dau' => 'Vui lòng chọn thời gian bắt đầu',
            'so_luong' => 'Vui lòng nhập số người tham gia',
            'id_ca_hoc' => 'Vui là chọn ca học',

        ];

        $request->validate([
            'id_co_so' => 'required',
            'id_loai_phong' => 'required',
            'id_toa_nha' => 'required',
            'id_tang' => 'required',
            'id_phong' => 'required',
            'su_kien' => 'required',
            'ngay_to_chuc' => 'required',
            'thoi_gian_bat_dau' => 'required',
            'so_luong' => 'required',
            'id_ca_hoc' => 'required',
        ], $errorMessages);


        // Lấy dữ liệu từ form
        $data = $request->all();

        // Chỉ định các trường cần cập nhật
        $fillableData = array_diff_key($data, array_flip(['updated_at'])); // Loại bỏ updated_at từ dữ liệu
        // unset($data['updated_at']);
        // $fillableData = $data;

        // Lưu giá trị updated_at là NULL
        $fillableData['updated_at'] = NULL;

        // Kiểm tra trùng lặp tên phòng
        // $existingPhong = Phong::where('id_co_so', $request->input('id_co_so'))
        //     ->where('id_loai_phong', $request->input('id_loai_phong'))
        //     ->where('id_toa_nha', $request->input('id_toa_nha'))
        //     ->where('id_tang', $request->input('id_tang'))
        //     ->where('ten_phong', $request->input('ten_phong'))
        //     ->first();

        // if ($existingPhong) {
        //     return redirect()->back()->withErrors(['ten_phong' => 'Thông tin phòng đã tồn tại. Vui lòng kiểm tra lại.']);
        // }

        // Lấy id_user từ session
        $id_user = Auth::user()->id_user;

        // tạo đối tượng mới
        $booking = new Booking;
        // lưu thông tin các trường cần cập nhật
        $booking->ngay_dat = now();
        $booking->id_user = $id_user; // Save id_user from session
        $booking->fill($fillableData, ['ngay_dat', 'ngay_to_chuc', 'thoi_gian_bat_dau', 'su_kien', 'so_luong', 'id_phong', 'id_ca_hoc', 'id_bo_mon', 'id_user']);
        $booking->save();

        // hiển thị tên phòng được lưu
        // $ten_phong = $booking->ten_phong;

        return redirect()->route('ls')->with('success', 'Đã book phòng thành công. Đang chờ duyệt');

        $sessionData = $request->session()->all();

        // Dump and die to see the content
        dd($sessionData);
    }
}
