<?php

namespace App\Http\Controllers;

use App\Models\Coso;
use App\Models\Toa;
use App\Models\Tang;
use Illuminate\Http\Request;

class TangController extends Controller
{
    public function create_tang($id)
    {
        $toa = Toa::find($id);
        $data = ([
            'toa' => $toa,
        ]);
        return view("admin.cs_toa_tang.add_tang", $data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store_tang(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'ten_tang' => 'required|string|max:255',
            // 'id_toa_nha' => 'required|exists:toa,id_toa_nha'
        ]);
        // Tạo một instance mới của model Tang
        $tang = new Tang();
        $tang->ten_tang = $request->ten_tang;
        $tang->id_toa_nha = $request->id_toa_nha;
        // Lưu thông tin tầng vào database bằng hàm save
        $tang->save();


        // Chuyển hướng người dùng về trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Thêm tầng thành công.');
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
    public function edit_tang(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_tang(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_tang(string $id)
    {
        Tang::where('id_tang', $id)->delete();
        // Trả về phản hồi dưới dạng JSON
        return redirect()->back()->with('success', 'Xóa tầng thành công.');
    }
}
