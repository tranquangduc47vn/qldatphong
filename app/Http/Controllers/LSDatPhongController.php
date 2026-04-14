<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Toa;
use App\Models\Coso;
use App\Models\Tang;
use App\Models\Phong;
use App\Models\Booking;
use App\Models\Cahoc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LSDatPhongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
        $id_user = Auth::user()->id_user;
        $lsDatPhongs = Booking::where('id_user',$id_user)->orderBy("id_booking","desc")->paginate(5);

        $toas = Toa::all();
        $tangs = Tang::all();
        $coSos = Coso::all();
        $caHocs = Cahoc::all();
        $loaiPhongs = DB::table('loai_phong')->get();
        $phongs = Phong::all();
        $data = ['phongs'=>$phongs,
                'lsDatPhongs'=>$lsDatPhongs,
                'toas'=>$toas,
                'tangs'=>$tangs,
                'coSos'=>$coSos,
                'caHocs'=>$caHocs,
                'loaiPhongs'=>$loaiPhongs,
                ];
        return view("lsdatphong" , $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $user = User::orderBy('id_user', 'DESC')->limit(1)->get('id_user');
        // dd($user[0]['id_user']);
        $id_user = $user[0]['id_user'];
        $startHour = 7;
        $startMinute = 15;
    
        for ($i = 1; $i <= 6; $i++) {
            // Tạo tên ca mới
            $tenca = 'Ca ' . $i;
    
            // Thời gian bắt đầu của ca hiện tại
            $startTime = sprintf("%02d:%02d", $startHour, $startMinute);
    
            // Cộng thêm 2 giờ (120 phút) vào thời gian bắt đầu để lấy thời gian kết thúc của ca hiện tại
            $endHour = $startHour + 2;
            $endMinute = $startMinute;
            $endTime = sprintf("%02d:%02d", $endHour, $endMinute);
    
            // Kiểm tra xem giá trị đã tồn tại trong cơ sở dữ liệu hay chưa
            $existingRecord = DB::table('ca_hoc')->where('ten_ca_hoc', $tenca)->first();
            
            // Nếu giá trị không tồn tại, thêm vào cơ sở dữ liệu
            if (!$existingRecord) {
                DB::table('ca_hoc')->insert([
                    'ten_ca_hoc' => $tenca,
                    'loai_ca_hoc' => rand(0, 1),
                    'thoi_gian_bat_dau' => $startTime,
                    'thoi_gian_ket_thuc' => $endTime,
                ]);
            }
    
            // Cập nhật giờ bắt đầu cho ca tiếp theo (ít nhất 10 phút sau giờ kết thúc của ca trước đó)
            if ($i == 2) {
                // Nếu là ca thứ 2, thì chuyển sang ca thứ 3 (12 giờ)
                $startHour = 12;
                $startMinute = 0;
            } else {
                // Nếu không phải là ca thứ 2, thì chuyển sang ca tiếp theo (ít nhất 10 phút sau giờ kết thúc của ca trước đó)
                $startHour = $endHour;
                $startMinute = $endMinute + 10;
            }
    
            // Nếu số phút vượt quá 60, chuyển sang giờ tiếp theo và giảm đi 60 phút
            if ($startMinute >= 60) {
                $startHour += 1;
                $startMinute -= 60;
            }
        }

        //tang
        for ($i = 1; $i <= 11; $i++) {
            // Tạo tên tầng mới
            $tenTang = $i;

            // Kiểm tra xem giá trị đã tồn tại trong cơ sở dữ liệu hay chưa
            $existingRecord = DB::table('tang')->where('ten_tang', $tenTang)->first();

            // Nếu giá trị không tồn tại, thêm vào cơ sở dữ liệu
            if (!$existingRecord) {
                DB::table('tang')->insert([
                    'ten_tang' => $tenTang,
                    'id_toa_nha'=> ranD(1,3),
                ]);
            }
        }
        for ($i = 0; $i < 10; $i++) {
            DB::table('loai_phong')->insert([
                ['ten_loai_phong' => 'Phòng học', 'created_at' => Now(), 'updated_at' => Now()],
                ['ten_loai_phong' => 'Hội trường', 'created_at' => Now(), 'updated_at' => Now()],
                ['ten_loai_phong' => 'Xưởng thực hành', 'created_at' => Now(), 'updated_at' => Now()],
            ]);
            DB::table('co_so')->insert([
                ['ten_co_so'=> 'Cơ sở Nguyễn Kiệm',
                'dia_chi'=> '778/B1 đường Nguyễn Kiệm, Phường 4, Q. Phú Nhuận, Tp. HCM'],
                ['ten_co_so'=> 'Cơ sở CV Phần Mềm Quang Trung, Quận 12, TP.HCM','dia_chi'=> 'Công viên phần mềm Quang Trung, phường Tân Chánh Hiệp, quận 12, TP Hồ Chí Minh'],
            ]);
            DB::table('toa_nha')->insert([
                ['ten_toa_nha' => 'F','id_co_so'=>'2'],
                ['ten_toa_nha' => 'P', 'id_co_so' => '2'],
                ['ten_toa_nha' => 'T', 'id_co_so' => '2'],
            ]);

            DB::table('phong')->insert([
                [
                    'ten_phong' => 'Xưởng thực hành bộ môn CNTT', 
                    'id_loai_phong' => 3, 
                    'id_co_so' => 1, 
                    'id_tang' => 1, 
                    'id_toa_nha' => 1,
                    'created_at' => Now(), 
                    'updated_at' => Now(),
                ],
            ]);
            DB::table('booking')->insert([
                [
                    'ngay_dat' => Now(),
                    'ngay_to_chuc' => Now(),
                    'thoi_gian_bat_dau' => '7:30:00',
                    'su_kien' => 'Event '.'fd',
                    'id_bo_mon' => 1,
                    'id_user' =>$id_user,
                    'id_phong' => '1', 
                    'id_ca_hoc' => 1, 
   
                ],
            ]);
        }
        return redirect()->route('ls');
    }

    /**
     * Store a newly created resource in storage.
     */
   
    public function update(Request $request, string $id)
    {
        //
        $booking = Booking::findOrFail($id);
        $booking->booking_status = 2;
        $booking->ly_do_huy = $request->ly_do_huy;
        $booking->update();
        return redirect()->route('ls')->with('success','Hủy đặt phòng '.$id);
    }

}
