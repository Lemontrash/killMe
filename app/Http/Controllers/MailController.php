<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function forgotPassword(Request $request){
        $email = $request->get('email');
        if (User::where('email', $email)->first()){
            $user = User::where('email', $email)->get();
//            dd($user);
            Hash::make(now());
            Mail::send('mails.forgot', ['user' => $user, ], function ($m) use ($user){
                $m->from('coelix@gmail.com', 'coelix');
                $m->to($user[0]->email);
            });
        }else{
            return back();
        }

        return back();
    }
}
