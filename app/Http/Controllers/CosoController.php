<?php

namespace App\Http\Controllers;

use App\Models\Coso;
use App\Models\Toa;
use App\Models\Tang;
use Illuminate\Http\Request;

class CosoController extends Controller
{
    public function index(){
        $coso = Coso::all();
        $data = [
            'cs' => $coso,
        ];
        return view('admin.cs_toa_tang.qlco_so', $data);
    }
    public function create_cs()
    {
        return view('admin.cs_toa_tang.add');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store_cs(Request $request)
    {
        // Validate dữ liệu từ request
        $request->validate([
            'ten' => 'required|string|max:100',
            'dia_chi' => 'required|string|max:255',
        ]);

        // Tạo một người dùng mới từ dữ liệu request
        $co_so = new Coso([
            'ten_co_so' => $request->input('ten'),
            'dia_chi' => $request->input('dia_chi'),
        ]);

        // Lưu người dùng vào cơ sở dữ liệu
        $co_so->save();

        // Chuyển hướng người dùng về trang xác nhận hoặc trang chính
        return redirect()->route('co_so')->with('success', 'Cơ sở đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show_cs(string $id)
    {
        //
    }
    public function edit_cs(string $id)
    {
        $coso = Coso::find($id);
        return view('admin.cs_toa_tang.edit', ['item' => $coso]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_cs(Request $request, string $id)
    {
        // Validate dữ liệu từ request
        $request->validate([
            'ten' => 'required|string|max:100',
            'dia_chi' => 'required|string|max:255',
        ]);

        // Sửa người dùng mới từ dữ liệu request
        $co_so = Coso::find($id);
        $co_so->ten_co_so = $request->input('ten');
        $co_so->dia_chi = $request->input('dia_chi');
        // Lưu người dùng vào cơ sở dữ liệu
        $co_so->save();

        // Chuyển hướng người dùng về trang xác nhận hoặc trang chính
        return redirect()->route('co_so')->with('success', 'Cơ sở đã được sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_cs(string $id)
    {
        Coso::where('id_co_so', $id)->delete();
        // Điều hướng trở lại trang trước
        return redirect()->route('co_so')->with('success', 'Xóa cơ sở thành công!');
    }
}
