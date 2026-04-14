<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = DB::table('users')->where('role', 1)->get();
        return view('admin/qlthongtin', ['users' => $users]);
    }

    public function delete($id_user)
    {
        $user = User::find($id_user);

        if ($user==null) return redirect('admim/qlthongtin');
        $user->delete();
        return redirect('qlthongtin');
    }


}
