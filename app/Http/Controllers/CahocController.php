<?php

namespace App\Http\Controllers;

use App\Models\Cahoc;
use Illuminate\Http\Request;

class CahocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ca_hoc = Cahoc::all();
        $data = [
            "cahoc" => $ca_hoc
        ];
        return view('admin.cahoc.qly_cahoc', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cahoc.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_ca_hoc' => 'required|string|max:100',
            'loai_ca_hoc' => 'required|in:0,1',
            'thoi_gian_bat_dau' => 'required|date_format:H:i',
            'thoi_gian_ket_thuc' => 'required|date_format:H:i|after:thoi_gian_bat_dau',
        ], [
            'loai_ca_hoc.in' => 'Loại ca học không hợp lệ.',
            'thoi_gian_bat_dau.date_format' => 'Thời gian bắt đầu không đúng định dạng (HH:mm).',
            'thoi_gian_ket_thuc.date_format' => 'Thời gian kết thúc không đúng định dạng (HH:mm).',
            'thoi_gian_ket_thuc.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
        ]);

        // Tạo một người dùng mới từ dữ liệu request
        $cahoc = new Cahoc([
            'ten_ca_hoc' => $request->input('ten_ca_hoc'),
            'loai_ca_hoc' => $request->input('loai_ca_hoc'),
            'thoi_gian_bat_dau' => $request->input('thoi_gian_bat_dau'),
            'thoi_gian_ket_thuc' => $request->input('thoi_gian_ket_thuc'),
        ]);

        // Lưu người dùng vào cơ sở dữ liệu
        $cahoc->save();

        // Chuyển hướng người dùng về trang xác nhận hoặc trang chính
        return redirect()->route('cahoc')->with('success', 'Ca mới đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ca_hoc = Cahoc::find($id);
        return view('admin.cahoc.edit', [
            'item' => $ca_hoc,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate dữ liệu từ request
        $request->validate([
            'thoi_gian_bat_dau' => 'required|date_format:H:i',
            'thoi_gian_ket_thuc' => 'required|date_format:H:i|after:thoi_gian_bat_dau',
        ], [
            'thoi_gian_bat_dau.date_format' => 'Thời gian bắt đầu không đúng định dạng (HH:mm).',
            'thoi_gian_ket_thuc.date_format' => 'Thời gian kết thúc không đúng định dạng (HH:mm).',
            'thoi_gian_ket_thuc.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
        ]);

        // Sửa người dùng mới từ dữ liệu request
        $cahoc = Cahoc::find($id);
        $cahoc->thoi_gian_bat_dau = $request->input('thoi_gian_bat_dau');
        $cahoc->thoi_gian_ket_thuc = $request->input('thoi_gian_ket_thuc');
        // Lưu người dùng vào cơ sở dữ liệu
        $cahoc->save();

        // Chuyển hướng người dùng về trang xác nhận hoặc trang chính
        return redirect()->route('cahoc')->with('success', 'Ca đã được sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cahoc::where('id_ca_hoc', $id)->delete();
        // Điều hướng trở lại trang trước
        return redirect()->route('cahoc')->with('success', 'Xóa ca thành công!');
    }
}
