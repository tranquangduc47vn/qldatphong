<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\booking;
use App\Models\Phong;
use App\Models\Coso;
use App\Models\Tang;
use App\Models\Toa;
use App\Models\LoaiPhong;
use App\Models\BoMon;

class CalendarController extends Controller
{
    // public function home(Request $request)
    // {
    //     // Lấy ngày hiện tại
    //     $currentDate = Carbon::now();

    //     // Tính ngày đầu tiên của tuần hiện tại
    //     $firstDayOfWeek = $currentDate->startOfWeek();

    //     // Tạo mảng chứa các ngày trong tuần
    //     $calendar = [];

    //     // Lặp qua từng ngày trong tuần
    //     for ($day = 0; $day < 7; $day++) {
    //         $date = $firstDayOfWeek->copy()->addDays($day);

    //         // Thêm thông tin về ngày vào mảng lịch
    //         $calendar[] = [
    //             'date' => $date->toDateString(),
    //             'day' => $date->day,
    //             'time' =>  date('Y-m-d',strtotime($date))
    //         ];
            
    //     }

    //     $coSo = Coso::all();
    //     $toa = Toa::all();
    //     $tang = Tang::all();
    //     $loaiPhong = LoaiPhong::all();
    
    //     $phong = Phong::select('phong.*','toa_nha.ten_toa_nha','loai_phong.ten_loai_phong','tang.ten_tang','co_so.ten_co_so')
    //     ->join('loai_phong','loai_phong.id_loai_phong','phong.id_loai_phong')
    //     ->join('toa_nha','toa_nha.id_toa_nha','phong.id_toa_nha')
    //     ->join('tang','tang.id_tang','phong.id_tang')
    //     ->join('co_so','co_so.id_co_so','phong.id_co_so')
    //     ->paginate(30)->withQueryString();
    //     // dd($coSo);

    //     return view('home', compact('calendar','phong','coSo','toa','tang','loaiPhong'));
    // }

    public function home(Request $request){
        $currentDate = Carbon::now();
        

        // Tính ngày đầu tiên của tuần hiện tại
        $DayOfWeek = Carbon::now();
        $map = [
            0 => "Chủ nhật",
            1 => "Thứ Hai",
            2 => "Thứ Ba",
            3 => "Thứ Tư",
            4 => "Thứ Năm",
            5 => "Thứ Sáu",
            6 => "Thứ Bảy"
        ];
        // dd($firstDayOfWeek);

        // Tạo mảng chứa các ngày trong tuần
        $calendar = [];
        $coSo = Coso::all();
        $toa = Toa::all();
        $tang = Tang::all();
        $loaiPhong = LoaiPhong::all();
        $boMon = BoMon::all();
        // Lặp qua từng ngày trong tuần
        for ($day = 0; $day < 7; $day++) {
            $date = $DayOfWeek->copy()->addDays($day);
            $Thu = $map[$date->dayOfWeek];

            // Thêm thông tin về ngày vào mảng lịch
            $calendar[] = [
                'date' => $date->toDateString(),
                'day' => $date->day,
                'Thu' => $Thu,
                'time' =>  date('Y-m-d',strtotime($date))
            ];
            
        }
        // dd($request);
        $phong = Phong::select('phong.*','toa_nha.ten_toa_nha','loai_phong.ten_loai_phong','tang.ten_tang','co_so.ten_co_so')
        ->join('loai_phong','loai_phong.id_loai_phong','phong.id_loai_phong')
        ->join('toa_nha','toa_nha.id_toa_nha','phong.id_toa_nha')
        ->join('tang','tang.id_tang','phong.id_tang')
        ->join('co_so','co_so.id_co_so','phong.id_co_so');
        if(!empty($request->coSo)){
            $phong->where('phong.id_co_so',$request->coSo);
        }
        if(!empty($request->tang)){
            $phong->where('phong.id_tang',$request->tang);
        }
        if(!empty($request->loaiPhong)){
            $phong->where('phong.id_loai_phong',$request->loaiPhong);
        }
        if(!empty($request->toa)){
            $phong->where('phong.id_toa_nha',$request->toa);
        }
        
        $phong = $phong->paginate(25)->withQueryString();
        // dd($phong);
        return view('home', compact('calendar','phong','coSo','toa','tang','loaiPhong','boMon'));
    }
}
