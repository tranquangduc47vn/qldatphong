<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->role == 0){
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function googleCallback(LoginRequest $request): RedirectResponse
    {
        $userGoogle = Socialite::driver('google')->user();
        $user = User::where('email', $userGoogle->getEmail())->first();
        dd($user);
        if (!$user) {
            return redirect()->back()->with('msg', 'Bạn chưa có tài khoản vui lòng đăng ký <a href=' . route('register') . '>Tại Đây</a>');
        }
        else {
            dd($request);
            $request->authenticate();

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
