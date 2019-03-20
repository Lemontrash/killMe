<?php

namespace App\Http\Controllers;

use App\AccountVerificationFiles;
use App\Files;
use App\Messages;
use App\User;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showFilesQueue(){
        $files = Files::all();
        return view('admin.verificationQueue', ['files' => $files]);
    }

    public function downloadAccountVerificationFiles($id){
        $file = AccountVerificationFiles::find($id);
        $path_id = $file->file_id;
        $path_selfie = $file->selfie;
        $path_bank = $file->bank;
        $path_dod = $file->dod;

        Storage::download($path_bank);
        return array(
            Storage::download($path_id),
            Storage::download($path_selfie),
            Storage::download($path_bank),
            Storage::download($path_dod)
        );
    }

    public function getUsersWithFiles(){
//        $files = AccountVerificationFiles::all();
//        foreach ($files as $file) {
//            $user = User::where('id', $file->user_id)->first();
//            $collection[] = $user;
//        }
//        $i = 0;
//        foreach ($collection as $item) {
//            $response['user-'.$i]['id'] = $item->id;
//            $response['user-'.$i]['email'] = $item->email;
//            $response['user-'.$i]['firstName'] = $item->firstName;
//            $response['user-'.$i]['lastName'] = $item->lastName;
//            $response['user-'.$i]['city'] = $item->city;
//            $response['user-'.$i]['country'] = $item->country;
//            $response['user-'.$i]['phone'] = $item->mobile;
//            $i++;
//        }
        $response = DB::select('select * from users where id in (select user_id from account_verification_files)');
//        $i = 0;

        return $response;
    }

    public function approvePdf($id){
        $file = Files::find($id);
        $file->approved = 'yes';
        $file->save();
        return back();
    }
    public function approveId($id){
        $file = AccountVerificationFiles::find($id);
        $file->id_approved = 'yes';
        $file->save;
        return response()->json('success');
    }
    public function approveSelfie($id){
        $file = AccountVerificationFiles::find($id);
        $file->selfie_approved = 'yes';
        $file->save;
        return response()->json('success');
    }
    public function approveBank($id){
        $file = AccountVerificationFiles::find($id);
        $file->bank_approved = 'yes';
        $file->save;
        return response()->json('success');
    }
    public function approveDod($id){
        $file = AccountVerificationFiles::find($id);
        $file->dod_approved = 'yes';
        $file->save;
        return response()->json('success');
    }


    public function dismissPdf ($id){
        $file = Files::find($id);
        $file->approved = 'no';
        $file->save();
        return back();
    }
    public function dismissId($id){
        $file = AccountVerificationFiles::find($id);
        $file->id_approved = 'no';
        $file->save;
        return response()->json('success');
    }
    public function dismissSelfie ($id){
        $file = AccountVerificationFiles::find($id);
        $file->selfie_approved = 'no';
        $file->save;
        return response()->json('success');
    }
    public function dismissBank ($id){
        $file = AccountVerificationFiles::find($id);
        $file->bank_approved = 'no';
        $file->save;
        return response()->json('success');
    }
    public function dismissDod ($id){
        $file = AccountVerificationFiles::find($id);
        $file->dod_approved = 'no';
        $file->save;
        return response()->json('success');
    }

    public function deletePdf ($id){
        $file = Files::find($id);
        $file->delete();
        return back();
    }

    public function downloadPdf($id){
        $file = Files::find($id);
        $data = [
            'country'           => $file->country,
            'citizenship'       => $file->citizenship,
            'placeOfBirth'      => $file->placeOfBirth,
            'address'           => $file->address,
            'landLine'          => $file->landLine,
            'city'              => $file->city,
            'zip'               => $file->zip,
            'employment'        => $file->employment,
            'industry'          => $file->industry,
            'annualIncome'      => $file->annualIncome,
            'savings'           => $file->savings,
            'sourceOfFunds'     => $file->sourceOfFunds,
            'investAnnually'    => $file->investAnnually,
            'nameOfBank'        => $file->nameOfBank,
            'taxId'             => $file->taxId,
            'countryTaxes'      => $file->countryTaxes,
        ];
        $pdf = Facade::loadView('pdfmaked', $data);

        return $pdf->stream();
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

    public function showMessages(){
        $messages = Messages::all();
        return view('admin.messages', ['messages' => $messages]);
    }

    public function showAccountVerifictionFiles(){
        $files = AccountVerificationFiles::all();
        foreach($files as $file){
            $statusId = false;
            $statusSelfie = false;
            $statusBank = false;
            $statusDod = false;
            if ($file->id_approved == 'yes'){
                $statusId = true;
            }
            if ($file->selfie_approved == 'yes'){
                $statusSelfie = true;
            }
            if ($file->bank_approved == 'yes'){
                $statusBank = true;
            }
            if ($file->dod_approved == 'yes'){
                $statusDod = true;
            }
            $approved[] = ['approved' => [
                'picture' => [
                    'id' => $file->id,
                    'user_id' => $file->user_id,
                    'status' => $statusId,
                ],
                'selfie' => [
                    'id' => $file->id,
                    'user_id' => $file->user_id,
                    'status' => $statusSelfie,
                ],
                'bank' => [
                    'id' => $file->id,
                    'user_id' => $file->user_id,
                    'status' => $statusBank,
                ],
                'dod' => [
                    'id' => $file->id,
                    'user_id' => $file->user_id,
                    'status' => $statusDod,
                ]
            ]
            ];
        }
        $response[] = $approved;
//        foreach ($approved[0]['approved'] as $item) {
////            dd($item[]);
//        }
        return response()->json($response);
    }


}
