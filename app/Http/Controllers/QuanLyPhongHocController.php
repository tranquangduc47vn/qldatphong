<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoSo;
use App\Models\Tang;
use App\Models\Toa;
use App\Models\LoaiPhong;
use App\Models\Phong;

class QuanLyPhongHocController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $phong = Phong::select('phong.*', 'co_so.ten_co_so', 'toa_nha.ten_toa_nha', 'tang.ten_tang', 'loai_phong.ten_loai_phong')
            ->join('co_so', 'phong.id_co_so', '=', 'co_so.id_co_so')
            ->join('toa_nha', 'phong.id_toa_nha', '=', 'toa_nha.id_toa_nha')
            ->join('tang', 'phong.id_tang', '=', 'tang.id_tang')
            ->join('loai_phong', 'phong.id_loai_phong', '=', 'loai_phong.id_loai_phong')
            ->paginate($perPage);

        return view('admin.admin_quanlyphonghoc', compact('phong'));
    }

    public function show()
    {
        $co_so = CoSo::all();
        $loai_phong = LoaiPhong::all();
        return view('admin.admin_quanlyphonghoc_create', compact('co_so', 'loai_phong'));
    }

    public function store(Request $request)
    {
        // kiểm tra lỗi form nếu không nhập dữ liệu
        $errorMessages = [
            'id_co_so.required' => 'Vui lòng chọn cơ sở',
            'id_loai_phong.required' => 'Vui là chọn loại phòng',
            'id_toa_nha.required' => 'Vui là chọn tòa nhà',
            'id_tang.required' => 'Vui là chọn tầng',
            'ten_phong.required' => 'Vui lòng nhập mã phòng muốn thêm',
        ];

        $request->validate([
            'id_co_so' => 'required',
            'id_loai_phong' => 'required',
            'id_toa_nha' => 'required',
            'id_tang' => 'required',
            'ten_phong' => 'required',
        ], $errorMessages);

        // Lấy dữ liệu từ form
        $data = $request->all();

        // Chỉ định các trường cần cập nhật
        $fillableData = array_diff_key($data, array_flip(['updated_at'])); // Loại bỏ updated_at từ dữ liệu

        // Lưu giá trị updated_at là NULL
        $fillableData['updated_at'] = null;

        // Kiểm tra trùng lặp tên phòng
        $existingPhong = Phong::where('id_co_so', $request->input('id_co_so'))
            ->where('id_loai_phong', $request->input('id_loai_phong'))
            ->where('id_toa_nha', $request->input('id_toa_nha'))
            ->where('id_tang', $request->input('id_tang'))
            ->where('ten_phong', $request->input('ten_phong'))
            ->first();

        if ($existingPhong) {
            return redirect()->back()->withErrors(['ten_phong' => 'Thông tin phòng đã tồn tại. Vui lòng kiểm tra lại.']);
        }

        // tạo đối tượng với
        $phong = new Phong;
        // lưu thông tin các trường cần cập nhật
        $phong->fill($fillableData, ['id_co_so', 'id_loai_phong', 'id_toa_nha', 'id_tang', 'ten_phong']);
        $phong->save();

        // hiển thị tên phòng được lưu
        $ten_phong = $phong->ten_phong;

        return redirect()->route('quanlyphonghoc.index')->with('success', 'Thêm phòng "' . $ten_phong . '" thành công');
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

    public function edit($id_phong)
    {
        $phong = Phong::select('phong.*', 'co_so.ten_co_so', 'toa_nha.ten_toa_nha', 'tang.ten_tang', 'loai_phong.ten_loai_phong')
            ->join('co_so', 'phong.id_co_so', '=', 'co_so.id_co_so')
            ->join('toa_nha', 'phong.id_toa_nha', '=', 'toa_nha.id_toa_nha')
            ->join('tang', 'phong.id_tang', '=', 'tang.id_tang')
            ->join('loai_phong', 'phong.id_loai_phong', '=', 'loai_phong.id_loai_phong')
            ->where('phong.id_phong', $id_phong)
            ->first();

        return view('admin.admin_quanlyphonghoc_edit', compact('phong'));
    }

    public function update(Request $request, $id_phong)
    {
        $errorMessages = [
            'ten_phong.required' => 'Vui lòng nhập "Mã phòng".',
        ];

        // Kiểm tra và xác thực dữ liệu từ form
        $request->validate([
            'ten_phong' => 'required',
        ], $errorMessages);

        // Kiểm tra trùng lặp các trường dữ liệu trong cơ sở dữ liệu
        $existingPhong = Phong::where('id_co_so', $request->input('id_co_so'))
            ->where('id_loai_phong', $request->input('id_loai_phong'))
            ->where('id_toa_nha', $request->input('id_toa_nha'))
            ->where('id_tang', $request->input('id_tang'))
            ->where('ten_phong', $request->input('ten_phong'))
            ->where('id_phong', '<>',  $id_phong)
            ->first();

        if ($existingPhong) {
            return redirect()->back()->withErrors(['ten_phong' => 'Thông tin phòng đã tồn tại. Vui lòng kiểm tra lại.']);
        }

        // Cập nhật các trường dữ liệu
        $phong = Phong::findOrFail($id_phong);
        $ten_phong_cu = $phong->ten_phong; // Lưu lại tên phòng cũ trước khi cập nhật
        $phong->ten_phong = $request->input('ten_phong');

        // Lưu tin tức được chỉnh sửa vào cơ sở dữ liệu
        $phong->save();

        // Tạo thông báo success với tên phòng cũ và mới
        $successMessage = 'Tên phòng "' . $ten_phong_cu . '" đã được cập nhật thành "' . $phong->ten_phong . '" thành công.';

        return redirect()->route('quanlyphonghoc.index')->with('success', $successMessage);
    }

    public function delete(Phong $phong, $id_phong)
    {
        $phong = Phong::where('id_phong', $id_phong)->first();
        if ($phong) {
            $ten_phong = $phong->ten_phong;
            $phong->delete();
            return back()->with('success', 'Phòng "' . $ten_phong . '" đã được xóa thành công!');
        } else {
            return back()->with('error', 'Không tìm thấy phòng cần xóa.');
        }
    }
}
