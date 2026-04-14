<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index() {
        return view ('home');
    }

    function coso(){
            $coso = DB::table('co_so')->get();
            return view('menu', ['coso'=>$coso]);
    }
    function toa(){
        $toa=DB::table('toa_nha')->get();
        return view('menu',['toa'=>$toa]);
    }
    function tang(){
        $tang=DB::table('tang')->get();
        return view('menu',['tang'=>$tang]);
    }
    
    public function getToaNha($idCoSo)
    {
        // Lấy danh sách tòa nhà dựa trên id của cơ sở
        $toaNha = DB::table('toa_nha')->where('id_co_so', $idCoSo)->get();

        // Trả về danh sách tòa nhà dưới dạng JSON
        return response()->json($toaNha);
    }

    public function getTang($idToaNha)
    {
        // Lấy danh sách tòa nhà dựa trên id của cơ sở
        $idTang = DB::table('tang')->where('id_toa_nha', $idToaNha)->get();

        // Trả về danh sách tòa nhà dưới dạng JSON
        return response()->json($idTang);
    }
}
