<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\ToaController;
use App\Http\Controllers\CosoController;
use App\Http\Controllers\CahocController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LSDatPhongController;
use App\Http\Controllers\DatPhongController;
use App\Http\Controllers\QuanLyPhongHocController;
use App\Http\Controllers\BookedRoomController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =========================
// Trang người dùng
// =========================
Route::get('/', [CalendarController::class, 'home'])->name('home');
Route::get('/get-toa-nha/{id_co_so}', [MenuController::class, 'getToaNha']);
Route::get('/get-tang/{id_toa_nha}', [MenuController::class, 'getTang']);
Route::post('/search', [CalendarController::class, 'search'])->name('search');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Lịch sử đặt phòng
Route::middleware('auth')->group(function () {
    Route::get('/lsdatphong', [LSDatPhongController::class, 'index'])->name('ls');
    Route::get('/taoLSPhong', [LSDatPhongController::class, 'create'])->name('create');
    Route::post('/huy-phong/{id}', [LSDatPhongController::class, 'update'])->name('huyPhong');
});
//dat phong
Route::prefix('datphong')->middleware('auth')->group(function () {
    Route::get('/', [DatPhongController::class, 'index'])->name('datphong.index');
    Route::post('/create', [DatPhongController::class, 'store'])->name('datphong.store');

    Route::get('/get-toa-nha/{idCoSo}', [DatPhongController::class, 'getToaNha']);
    Route::get('/get-tang/{idToaNha}', [DatPhongController::class, 'getTang']);
    Route::get('/get-phong/{idCoSo}/{idToaNha}/{idTang}', [DatPhongController::class, 'getPhong']);
});

Route::post('/booking', [BookingController::class, 'storeBooking'])->name('booking');

// =========================
// Google Login
// =========================
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login-google');

Route::get('/auth/google/callback', [AuthenticatedSessionController::class, 'googleCallback']);

// =========================
// Route /admin
// Chưa đăng nhập -> /login
// Admin -> /admin/quanlyphonghoc
// User thường -> /
// =========================
Route::get('/admin', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }

    if (Auth::user()->role == 1) {
        return redirect('/admin/quanlyphonghoc');
    }

    return redirect('/');
})->name('admin.entry');

// Auth routes
require __DIR__ . '/auth.php';

// =========================
// Admin routes
// Không đăng nhập sẽ không vào được
// Không phải admin sẽ bị chặn
// =========================
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // Trang view admin tĩnh
    Route::get('/qlphong', function () {
        return view('admin/qlphong');
    });

    Route::get('/qldatphong', function () {
        return view('admin/qldatphong');
    });

    // Route::get('/qlthongtin', function () {
    //     return view('admin/qlthongtin');
    // });
    // Quản lý người dùng
    Route::get('/qlthongtin', [UserController::class, 'index'])->name('users.index');
    Route::get('/qlthongtin/{id}', [UserController::class, 'delete'])->name('delete');

    Route::get('/qlco_so', function () {
        return view('admin/qlco_so');
    });

    Route::get('/qltoa_nha', function () {
        return view('admin/qltoa_nha');
    });

    Route::get('/qlca_hoc', function () {
        return view('admin/qlca_hoc');
    });

    Route::get('/huyAdmin', function () {
        return view('admin/huyAdmin');
    });

    Route::get('/huyUser', function () {
        return view('admin/huyUser');
    });

    // Quản lý người dùng
    Route::get('/qlthongtin/danh-sach', [UserController::class, 'index'])->name('users.index');
    Route::get('/qlthongtin/{id}', [UserController::class, 'delete'])->name('delete');

    // Quản lý ca học
    Route::prefix('qlca_hoc')->group(function () {
        Route::get('/', [CahocController::class, 'index'])->name('cahoc');
        Route::get('/create', [CahocController::class, 'create'])->name('create_cahoc');
        Route::post('/qlca_hoc', [CahocController::class, 'store'])->name('add_cahoc');
        Route::get('/{id}/edit', [CahocController::class, 'edit'])->name('edit_cahoc');
        Route::post('/{id}', [CahocController::class, 'update'])->name('update_cahoc');
        Route::delete('/{id}', [CahocController::class, 'destroy'])->name('del_cahoc');
    });

    // Quản lý cơ sở
    Route::prefix('qlco_so')->group(function () {
        Route::get('/', [CosoController::class, 'index'])->name('co_so');
        Route::get('/create', [CosoController::class, 'create_cs'])->name('create_cs');
        Route::post('/qlco_so', [CosoController::class, 'store_cs'])->name('add_cs');
        Route::get('/{id}/edit', [CosoController::class, 'edit_cs'])->name('edit_cs');
        Route::post('/{id}', [CosoController::class, 'update_cs'])->name('update_cs');
        Route::delete('/{id}', [CosoController::class, 'destroy_cs'])->name('del_cs');
    });

    // Quản lý tòa nhà + tầng
    Route::prefix('qltoa_nha')->group(function () {
        Route::get('/', [ToaController::class, 'index'])->name('qltoa_nha');
        Route::get('/add', [ToaController::class, 'create_toa'])->name('create_tt');
        Route::post('/qltoa_nha', [ToaController::class, 'store_toa'])->name('add_tt');
        Route::get('/{id}/edit', [ToaController::class, 'edit_toa'])->name('edit_tt');
        Route::post('/{id}', [ToaController::class, 'update_toa'])->name('update_tt');
        Route::delete('/{id}', [ToaController::class, 'destroy_toa'])->name('del_tt');

        Route::get('/add_tang/{id}', [TangController::class, 'create_tang'])->name('create_tang');
        Route::post('/', [TangController::class, 'store_tang'])->name('add_tang');
        Route::delete('/xoa-tang/{id}', [TangController::class, 'destroy_tang'])->name('destroy_tang');
    });

    // Quản lý đặt phòng
    Route::resource('qldatphong', BookedRoomController::class);
    Route::get('/phong-da-xu-ly', [BookedRoomController::class, 'progressedRoom'])->name('qldatphong.progressed');
    Route::get('/qldatphong/accept/{id_booking}', [BookedRoomController::class, 'acceptRoom'])->name('admin.accept');

    // Quản lý phòng học
    Route::prefix('quanlyphonghoc')->group(function () {
        Route::get('/get-toa-nha/{id_co_so}', [QuanLyPhongHocController::class, 'getToaNha']);
        Route::get('/get-tang/{id_toa_nha}', [QuanLyPhongHocController::class, 'getTang']);
        Route::get('/', [QuanLyPhongHocController::class, 'index'])->name('quanlyphonghoc.index');
        Route::get('/create', [QuanLyPhongHocController::class, 'show'])->name('quanlyphonghoc.show');
        Route::post('/create', [QuanLyPhongHocController::class, 'store'])->name('quanlyphonghoc.store');
        Route::delete('/delete/{id_phong}', [QuanLyPhongHocController::class, 'delete'])->name('quanlyphonghoc.delete');
        Route::get('/edit/{id_phong}', [QuanLyPhongHocController::class, 'edit'])->name('quanlyphonghoc.edit');
        Route::put('/update/{id_phong}', [QuanLyPhongHocController::class, 'update'])->name('quanlyphonghoc.update');
    });
});