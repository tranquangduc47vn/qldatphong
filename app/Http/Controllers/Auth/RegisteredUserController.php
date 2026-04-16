<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255','ends_with:@gmail.com', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'so_dien_thoai' => ['required','max:13','min:10','unique:'.User::class],
            ],
            [
                'required' => 'Trường :attribute không được để trống',
                'email' => 'Trường :attribute không đúng định dạng email',
                'unique' => ':attribute đã tồn tại',
                'max' => ':attribute không được quá :max ký tự',
                'min' => ':attribute không được ít hơn :min ký tự',
                'confirmed' => ':attribute không trùng khớp',
                'ends_with' => 'Bạn cần email giảng viên để có thể đăng ký'
            ],
            [
                'name' => 'Họ tên',
                'email' => 'Địa chỉ email',
                'password' => 'Mật khẩu',
                'so_dien_thoai' => 'Số điện thoại'
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'so_dien_thoai' => $request->so_dien_thoai,
            'role'=>0,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
