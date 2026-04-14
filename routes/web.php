<?php


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToaController;
use App\Http\Controllers\BookedRoomController;


use App\Http\Controllers\CosoController;
use App\Http\Controllers\CahocController;

use App\Http\Controllers\MailController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TangController;


use App\Http\Controllers\UserController;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LSDatPhongController;
use App\Http\Controllers\DatPhongController;
use App\Http\Controllers\QuanLyPhongHocController;
use App\Http\Controllers\BookingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/k', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('home');
// });

Route::get('', [CalendarController::class, 'home'])->name('home');
Route::get('/get-toa-nha/{id_co_so}', [MenuController::class, 'getToaNha']);
Route::get('/get-tang/{id_toa_nha}', [MenuController::class, 'getTang']);
Route::post('search', [CalendarController::class, 'search'])->name('search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/lsdatphong', [LSDatPhongController::class, 'index'])->name('ls');
    // Route::post('/huy-phong/{id}',[MailController::class,'sendMail'])->name('huyPhong');
    Route::get('/taoLSPhong', [LSDatPhongController::class, 'create'])->name('create');
    Route::post('/huy-phong/{id}', [LSDatPhongController::class, 'update'])->name('huyPhong');
});
require __DIR__ . '/auth.php';

// route admin
Route::get('qlphong', function () {
    return view('admin/qlphong');
});
Route::get('qldatphong', function () {
    return view('admin/qldatphong');
});
Route::get('qlthongtin', function () {
    return view('admin/qlthongtin');
});
Route::get('qlco_so', function () {
    return view('admin/qlco_so');
});
Route::get('qltoa_nha', function () {
    return view('admin/qltoa_nha');
});
Route::get('qlca_hoc', function () {
    return view('admin/qlca_hoc');
});

Route::get('admin/qlthongtin', [UserController::class, 'index'])->name('users.index');
Route::get('/admin/qlthongtin/{id}', [UserController::class, 'delete'])->name('delete');

Route::get('huyAdmin', function () {
    return view('admin/huyAdmin');
});
Route::get('huyUser', function () {
    return view('admin/huyUser');
});
//



//ROUTE CA_HOC
route::prefix('admin/qlca_hoc')->group(function () {
    Route::get('', [CahocController::class, 'index'])->name('cahoc');
    Route::get('/create', [CahocController::class, 'create'])->name('create_cahoc');
    Route::post('qlca_hoc', [CahocController::class, 'store'])->name('add_cahoc');
    Route::get('/{id}/edit', [CahocController::class, 'edit'])->name('edit_cahoc');
    Route::post('/{id}', [CahocController::class, 'update'])->name('update_cahoc');
    Route::delete('/{id}', [CahocController::class, 'destroy'])->name('del_cahoc');
})->middleware(['admin', 'auth']);;

//ROUTE COSO_TOA_TANG
route::prefix('admin/qlco_so')->group(function () {
    Route::get('', [CosoController::class, 'index'])->name('co_so');
    Route::get('/create', [CosoController::class, 'create_cs'])->name('create_cs');
    Route::post('qlco_so', [CosoController::class, 'store_cs'])->name('add_cs');
    Route::get('/{id}/edit', [CosoController::class, 'edit_cs'])->name('edit_cs');
    Route::post('/{id}', [CosoController::class, 'update_cs'])->name('update_cs');
    Route::delete('/{id}', [CosoController::class, 'destroy_cs'])->name('del_cs');
})->middleware(['admin', 'auth']);;

route::prefix('admin/qltoa_nha')->group(function () {
    Route::get('', [ToaController::class, 'index'])->name('qltoa_nha');
    Route::get('/add', [ToaController::class, 'create_toa'])->name('create_tt');
    Route::post('qltoa_nha', [ToaController::class, 'store_toa'])->name('add_tt');
    Route::get('/{id}/edit', [ToaController::class, 'edit_toa'])->name('edit_tt');
    Route::post('/{id}', [ToaController::class, 'update_toa'])->name('update_tt');
    Route::delete('/{id}', [ToaController::class, 'destroy_toa'])->name('del_tt');
})->middleware(['admin', 'auth']);;
route::prefix('admin/qltoa_nha')->group(
    function () {

        Route::get('/add_tang/{id}', [TangController::class, 'create_tang'])->name('create_tang');
        Route::post('', [TangController::class, 'store_tang'])->name('add_tang');
        Route::delete('/xoa-tang/{id}', [TangController::class, 'destroy_tang'])->name('destroy_tang');
    }
)->middleware(['admin', 'auth']);;

Route::prefix('admin')->group(function () {
    Route::resource('qldatphong', (BookedRoomController::class));
    Route::get('admin/phong-da-xu-ly', [BookedRoomController::class, 'progressedRoom'])->name('qldatphong.progressed');
    Route::get('admin/qldatphong/accept/{id_booking}', [BookedRoomController::class, 'acceptRoom'])->name('admin.accept');
})->middleware(['admin', 'auth']);

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login-google');

Route::get('/auth/google/callback', [AuthenticatedSessionController::class, 'googleCallback']);

// Quản lý phòng học
Route::prefix('admin/quanlyphonghoc')->group(function () {
    Route::get('/get-toa-nha/{id_co_so}', [QuanLyPhongHocController::class, 'getToaNha']);
    Route::get('/get-tang/{id_toa_nha}', [QuanLyPhongHocController::class, 'getTang']);
    Route::get('/', [QuanLyPhongHocController::class, 'index'])->name('quanlyphonghoc.index');
    Route::get('/create', [QuanLyPhongHocController::class, 'show'])->name('quanlyphonghoc.show');
    Route::post('/create', [QuanLyPhongHocController::class, 'store'])->name('quanlyphonghoc.store');
    Route::delete('/delete/{id_phong}', [QuanLyPhongHocController::class, 'delete'])->name('quanlyphonghoc.delete');
    Route::get('/edit/{id_phong}', [QuanLyPhongHocController::class, 'edit'])->name('quanlyphonghoc.edit');
    Route::put('/update/{id_phong}', [QuanLyPhongHocController::class, 'update'])->name('quanlyphonghoc.update');
});

// đặt phòng
Route::prefix('datphong')->middleware('auth')->group(function () {
    Route::get('/get-toa-nha/{id_co_so}', [DatPhongController::class, 'getToaNha']);
    Route::get('/get-tang/{id_toa_nha}', [DatPhongController::class, 'getTang']);
    Route::get('/get-phong/{idCoSo}/{idToaNha}/{idTang}/{idLoaiPhong}', [DatPhongController::class, 'getPhong']);
    Route::get('/get-ca-hoc/{idLoaiPhong}', [DatPhongController::class, 'getCaHoc']);
    Route::get('/get-buoi-hoc/{idLoaiPhong}', [DatPhongController::class, 'getBuoiHoc']);
    Route::get('/', [DatPhongController::class, 'index'])->name('datphong.index');
    Route::post('/create', [DatPhongController::class, 'store'])->name('datphong.create');
});

Route::post('/booking',[BookingController::class,'storeBooking'])->name('booking');
