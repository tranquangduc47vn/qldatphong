<?php

namespace App\Http\Controllers;

use App\Mail\CancelRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    function sendMail(Request $request, string $id)
    {
        $liDo = $request->liDo;
        $userMails = User::where('role', 1)->get('email');
        foreach ($userMails as $userMail) {
            Mail::to($userMail->email)->send(new CancelRoom($liDo));
        }
        return redirect()->route('ls')->with('success', 'Hủy thành công.');
    }
}
