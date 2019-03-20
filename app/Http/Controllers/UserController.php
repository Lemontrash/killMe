<?php

namespace App\Http\Controllers;

use App\AccountVerificationFiles;
use App\Files;
use App\User;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Svg\Tag\Image;

class UserController extends Controller
{
    public function store(Request $request){
//        dd($request);
        $id = Auth::id();
        $file_id =  $request->file('id_picture');
        $file_selfie = $request->file('selfie_picture');
        $file_bank = $request->file('bank_transfer') ;
        $file_dod = $request->file('dod') ;
//        dd($request);
        $name_id = 'id-'.$id.'.png';
        $name_selfie = 'selfie-'.$id.'.png';
        $name_bank = 'bank-'.$id.'.png';
        $name_dod = 'dod-'.$id.'.png';

        $path_id = Storage::putFileAs(
            'public', $file_id, $name_id
        );
        $path_selfie = Storage::putFileAs(
            'public', $file_selfie, $name_selfie
        );
        $path_bank = Storage::putFileAs(
            'public', $file_bank, $name_bank
        );
        $path_dod = Storage::putFileAs(
            'public', $file_dod, $name_dod
        );
        $file = AccountVerificationFiles::create([
            'user_id' => $id,
            'file_id' => $path_id,
            'selfie' => $path_selfie,
            'bank' => $path_bank,
            'dod' => $path_dod,
        ]);
        return back();
    }

    public function changePersonalInfo(Request $request){
//        dd($request);
//        $avatar = $request->file('avatar');
//        $name_avatar = 'ava-'.Auth::id().'.png';
//        dd($request);
//        $path_avatar = Storage::putFileAs(
//            'public', $avatar, $name_avatar
//        );


        $email = $request->get('email');
        $firstName = $request->get('first_name');
        $lastName = $request->get('last_name');
        $month = $request->get('month');
        $date = $request->get('date');
        $year = $request->get('year');
        $country = $request->get('country');
        $city = $request->get('city');

        $fullDate = $date.'-'.$month.'-'.$year;
        $fullDate = \DateTime::createFromFormat('d-M-Y', $fullDate);
//        dd($fullDate);
        $user = User::where('id', Auth::id())->first();
        $user->email = $email;
        $user->firstName = $firstName;
        $user->lastName = $lastName;
        $user->dateOfBirth = $fullDate;
        $user->country = $country;
        $user->city = $city;
//        $user->avatar = $path_avatar;
//        dd($user);
        $user->save();
        return back();
    }

    public function createVerificationFileForPdf(Request $request){
        $beneficiaryName        = $request->get('beneficiary_name');
        $beneficiaryAddress     = $request->get('beneficiary_address');
        $bankName               = $request->get('bank_name');
        $bankAdress             = $request->get('bank_address');
        $iban                   = $request->get('iban');
        $swift                  = $request->get('swift');
        $reference              = $request->get('reference');
        $company                = $request->get('company');
        if (Auth::user()->role == 'business'){
            $company = $request->get('companyName');
        }
        $file = Files::create([
                'user_id' => Auth::id(),
                'beneficiaryName' => $beneficiaryName,
                'beneficiaryAddress' => $beneficiaryAddress,
                'bankName' => $bankName,
                'bankLocation' => $bankAdress,
                'iban' => $iban,
                'swift' => $swift,
                'referenceField' => $reference,
                'company' => $company,
                'amount' => 0,
            ]
        );
        Auth::user()->company = $company;
        Auth::user()->save();
        return redirect('deposit');
    } 

    public function createNewExchange(Request $request){
        $amount = $request->get('amount');
        $file = Files::where('user_id', Auth::id())->first();
        Files::create([
            'user_id' => $file->user_id,
            'beneficiaryName' => $file->beneficiaryName,
            'beneficiaryAddress' => $file->beneficiaryAddress,
            'bankName' => $file->bankName,
            'bankLocation' => $file->bankLocation,
            'swift' => $file->swift,
            'referenceField' => $file->referenceField,
            'company' => $file->company,
            'iban' => $file->iban,
            'amount' => $amount,
        ]);

        return back();
    }

    public function rejectUser($id){
        User::find($id)->company = null;
        User::find($id)->save();
        return back();
    }
    public function approveUser($id, Request $request){
//        dd($request);
        if ($request->get('accept') == 'no'){
            $user =  User::find($id);
            $user->company = null;
            $user->save();
//            dd($user);
        }
        else{
            $user =  User::find($id);
            $user->company = Auth::user()->company;
            $user->save();
        }

        return back();
    }
    public function downloadId($id){
        $file = AccountVerificationFiles::find($id)->first()->file_id;
        return Storage::download($file);
    }
    public function downloadSelfie($id){
        $file = AccountVerificationFiles::find($id)->first()->selfie;
        return Storage::download($file);
    }
    public function downloadBank($id){
        $file = AccountVerificationFiles::find($id)->first()->bank;
        return Storage::download($file);
    }
    public function downloadDod($id){
        $file = AccountVerificationFiles::find($id)->first()->dod;
        return Storage::download($file);
    }
}
