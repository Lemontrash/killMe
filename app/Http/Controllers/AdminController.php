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
        $response = DB::select('select * from users where id in (select user_id from account_verification_files )');
        return $response;
    }

//    public function getUsersWithPdf(){
//        $response = DB::select('select * from users where id in (select user_id from files where files.amount > 0)');
//        return $response;
//    }

    public function approvePdf($id){
        $file = Files::find($id);
        $file->approved = 'yes';
        $file->save();
        return back();
    }
    public function approveId($id){
        $file = AccountVerificationFiles::find($id);
        $file->id_approved = 'yes';
        $file->save();
        return response()->json('success');
    }
    public function approveSelfie($id){
        $file = AccountVerificationFiles::find($id);
        $file->selfie_approved = 'yes';
        $file->save();
        return response()->json('success');
    }
    public function approveBank($id){
        $file = AccountVerificationFiles::find($id);
        $file->bank_approved = 'yes';
        $file->save();
        return response()->json('success');
    }
    public function approveDod($id){
        $file = AccountVerificationFiles::find($id);
        $file->dod_approved = 'yes';
        $file->save();
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
        $file->save();
        return response()->json('success');
    }
    public function dismissSelfie ($id){
        $file = AccountVerificationFiles::find($id);
        $file->selfie_approved = 'no';
        $file->save();
        return response()->json('success');
    }
    public function dismissBank ($id){
        $file = AccountVerificationFiles::find($id);
        $file->bank_approved = 'no';
        $file->save();
        return response()->json('success');
    }
    public function dismissDod ($id){
        $file = AccountVerificationFiles::find($id);
        $file->dod_approved = 'no';
        $file->save();
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
        return response()->json($messages);
    }

    public function showAccountVerifictionFiles(){
        $files = AccountVerificationFiles::all();
        $users = \GuzzleHttp\json_decode(json_encode($this->getUsersWithFiles()), true);
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


            foreach ( $users as $i => $user){

                $user = json_encode($user);
                $user = \GuzzleHttp\json_decode($user, true);
                if ($user['id'] == $file->user_id){
                    $approved = [
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
                    ];
                    $users[$i]['approved'] = $approved;
                }
            }
        }
        return response()->json($users);
    }

    public function changeUserStatus($id, Request $request){
        $user = User::find($id);
        if ($request->get('status') == true){
            $user->is_approved = 'yes';
        }
        if ($request->get('status') == false){
            $user->is_approved = 'no';
        }
        $user->save();
        return response()->json('success');
    }

    public function showUsersWithPdf(){
        $files = Files::where('amount', '>', 0)->get();
        $users = DB::select('select * from users where id in (select user_id from files )');
        $response['files'] = $files;
        $response['users'] = $users;
//        dd($responce);
        return response()->json($response);
    }
}
