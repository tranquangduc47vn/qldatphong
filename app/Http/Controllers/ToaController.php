<?php

namespace App\Http\Controllers;

use App\Models\Coso;
use App\Models\Toa;
use App\Models\Tang;
use Illuminate\Http\Request;

class ToaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coso = Coso::all();
        $toas = Toa::all();
        $tangs = Tang::with('toa.co_so')->get(); // Lấy cả thông tin về tầng và  tòa tương ứng

        $data = [
            'cs' => $coso,
            'toas' => $toas,
            'tangs' => $tangs,
            // 'cttoa_tang'=> $chitiet

        ];
        return view('admin.cs_toa_tang.qlytoa_nha', $data);
    }

    //CONTROLLER TÒA TẦNG


    public function create_toa()
    {
        $co_so = Coso::all();
        $data = ([
            'co_so' => $co_so,
            // 'tang'=> $tang
        ]);
        return view('admin.cs_toa_tang.addtoa_tang', $data);
    }
    public function store_toa(Request $request)
    {
        // Validate form data
        $request->validate([
            'ten_toa_nha' => 'required|string|max:255',
            'id_co_so' => 'required|integer',
            'ten_tang' => 'required|array', // id_tang là một mảng vì có thể chọn nhiều tầng
        ]);

        // Tạo mới đối tượng Toa và lưu thông tin từ form
        $toa = new Toa();
        $toa->ten_toa_nha = $request->ten_toa_nha;
        $toa->id_co_so = $request->id_co_so;
        $toa->save();

        // Lấy ID của tòa vừa được thêm
        $toaId = $toa->id_toa_nha;

        // Lưu các tầng được chọn vào bảng chi tiết tòa
        foreach ($request->ten_tang as $ten_tang) {
            $tang = new Tang();
            $tang->id_toa_nha = $toaId;
            $tang->ten_tang = 'Tầng ' . $ten_tang;
            $tang->save();
        }

        // Redirect về trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Thêm tòa và tầng thành công.');
    }


    /**
     * Display the specified resource.
     */
    public function show_toa(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit_toa($id)
    {
        // Lấy thông tin tòa và các tầng tương ứng từ CSDL
        $toa = Toa::with('tangs')->find($id);
        $coso = Coso::all();
        $data = [
            'toa' => $toa,
            'coso' => $coso,
        ];

        return view('admin.cs_toa_tang.edittoa_tang', $data);
    }

    public function update_toa(Request $request, $id)
    {
        // Validate form data
        $request->validate([
            'ten_toa_nha' => 'required|string|max:255',
            'id_co_so' => 'required|integer',
        ]);

        // Tìm tòa nhà theo ID
        $toa = Toa::find($id);

        // Kiểm tra xem tòa nhà có tồn tại không
        if (!$toa) {
            return redirect()->back()->with('error', 'Không tìm thấy tòa cần sửa.');
        }

        // Cập nhật thông tin của tòa
        $toa->ten_toa_nha = $request->ten_toa_nha;
        $toa->id_co_so = $request->id_co_so;
        $toa->save();

        // Redirect về trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Cập nhật tòa và tầng thành công.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy_toa(string $id)
    {
        Toa::where('id_toa_nha', $id)->delete();
        Tang::where('id_toa_nha', $id)->delete();
        return redirect()->back()->with('success', 'Xóa tòa nhà thành công.');
    }
}
