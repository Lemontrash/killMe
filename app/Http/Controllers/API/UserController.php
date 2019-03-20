<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpseclib\Crypt\Random;
use Validator;
class UserController extends Controller
{
    public $successStatus = 200;

    //=================================

    public function store(Request $request){
        $id = Auth::id();
        $file_id =  $request->file('id');
        $file_selfie = $request->file('selfie');
        $file_bank = $request->file('bank') ;
        $file_dod = $request->file('dod') ;

        $name_id = 'id-'.$id.'.'.$file_id->extension();
        $name_selfie = 'selfie-'.$id.'.'.$file_selfie->extension();
        $name_bank = 'bank-'.$id.'.'.$file_bank->extension();
        $name_dod = 'dod-'.$id.'.'.$file_dod->extension();

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
        return response()->json($file, 200);
    }

    public function updatePersonalInfo(Request $request){
        $id             = Auth::id();
        $email          = $request->get('profile_email');
        $firstName      = $request->get('profile_first_name');
        $lastName       = $request->get('profile_last_name');
        $day            = $request->get('profile_date');
        $month          = $request->get('profile_month');
        $year           = $request->get('profile_year');
        $country        = $request->get('profile_country');
        $city           = $request->get('profile_city');
        $date = $month.'-'.$day.'-'.$year;
//        dd($date);
//        dd(Auth::id());
        try{
            $user = User::findorFail(4);
        }catch (\Exception $e){
            return response()->json('error => error', 404);
        }
        $user->email        = $email;
        $user->firstName    = $firstName;
        $user->dateOfBirt   = $date;
        $user->lastName     = $lastName;
        $user->country      = $country;
        $user->city         = $city;
        return response()->json($user, 200);
    }

    public function updateAvatar(Request $request){
        $id = Auth::id();
        $file_avatar =  $request->file('avatar');
        $name_avatar = 'avatar-'.$id.'.'.$file_avatar->extension();
        $path_avatar = Storage::putFileAs(
            'public', $file_avatar, $name_avatar
        );

        User::where('id', 1)->update(['avatar' => $path_avatar]);
        return response()->json(User::find(1));
    }

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
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
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
//            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
//        dd($input['firstName']);
        $user = User::create([
            'email' => $input['email'],
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'mobile' => $input['mobile'],
            'password' => $input['password'],
        ]);

        Auth::login($user);
        $user->api_token = str_random(32);
        $user->save();
        $success['token'] =  $user->api_token;
        return response()->json(['success'=>$success], $this-> successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}