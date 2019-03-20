<?php

namespace App\Http\Controllers;

use App\Files;
use App\User;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function showHome(){
        return view('welcome');
    }
    public function showPasswordResetViaEmail(){
        return view('auth.retrieveEmail');
    }
    public function showProfileSettings(){
        return view('profileSettings');
    }
    public function showFaq(){
        return view('profileFAQ');
    }
    public function showUploadFiles(){
        return view('uploadFiles');
    }
    public function showDeposit(){
        $file = Files::where('user_id', Auth::id())->first();
        return view('profileExchange', ['file' => $file]);
    }
    public function showPersonalDataVerify(){
        $users = User::where('role', 'business')->get();
        return view('personalDataVerify', ['users'=>$users]);
    }

    public function showFilesHistory(){
        $rule = Files::where('user_id', Auth::id())->where('amount', '>', 0);
        if (User::find(Auth::id())->role == 'individual'){
            $files = $rule->get();
        }
        elseif (User::find(Auth::id())->role == 'business'){
            $files = $rule->get();
            $individuals = User::where('relation_id', Auth::id())->get();
            foreach ($individuals as $user){
                $fileCollection = Files::where('user_id', Auth::id())->where('amount', '>', 0)->get();

//                dd($fileCollection);
                foreach ($fileCollection as $item) {
                    $files[] = $item;
//                    dd($files);
                }
//                dd($files);
            }
        }
//        dd($files);
        $filesProcessed = $this->showFilesHistoryProcessed();
        $filesPending = $this->showFilesHistoryPending();
        return view('profileFilesHistory', [
            'files' => $files,
            'filesProcessed' => $filesProcessed,
            'filesPending' => $filesPending
        ]);
    }

    public function showFilesHistoryProcessed(){
        $rule = Files::where('user_id', Auth::id())->where('approved', 'yes')->where('amount', '>', 0)->get();
        if (User::find(Auth::id())->role == 'individual'){
            $files = $rule;
        }

        elseif (User::find(Auth::id())->role == 'business'){
            $files = $rule;
//            dd($files);
            $individuals = User::where('relation_id', Auth::id())->get();
            foreach ($individuals as $user){
                $fileCollection = Files::where('user_id', Auth::id())->where('approved', 'yes')->where('amount', '>', 0)->get();
                foreach ($fileCollection as $item) {
                    $files[] = $item;
                }
            }
        }
        return $files;
    }

    public function showFilesHistoryPending(){
        $rule = Files::where('user_id', Auth::id())->where('approved', '-')->where('amount', '>', 0)->get();
        if (User::find(Auth::id())->role == 'individual'){
            $files = $rule;
        }
        elseif (User::find(Auth::id())->role == 'business'){
            $files = $rule;
            $individuals = User::where('relation_id', Auth::id())->get();
            foreach ($individuals as $user){
                $fileCollection = Files::where('user_id', Auth::id())->where('approved', '-')->where('amount', '>', 0)->get();
//                dd($fileCollection);
                foreach ($fileCollection as $item) {
                    $files[] = $item;
                }
            }
        }
        return $files;
    }

    public function logout(){
        if (Auth::check()){
            Auth::logout();
        }
        return redirect('login');
    }
    public function showContactUsForm(){
        return view('profileContactUs');
    }
    public function showAcceptUser(){
        $users = User::where('company', Auth::user()->company)->get();
        return view('acceptUser', ['users' => $users]);
    }

}
