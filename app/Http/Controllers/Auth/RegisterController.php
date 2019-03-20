<?php

namespace App\Http\Controllers\Auth;

use App\Business;
use App\Files;
use App\Individual;
//use App\User;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
//            'secondName' => ['required', 'string', 'max:255'],
//            'telephone' => ['required', 'string'],
//            'email' => ['required', 'string', 'email', 'max:255'],
//            'password1' => ['required', 'string', 'min:6',],
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if ($data['accountType'] == 'Individual'){
            $user = Individual::create([
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'mobile' => $data['phoneNumber'],
                'role' => $data['accountType'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
        if ($data['accountType'] == 'Business'){
            $user =  Business::create([
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'mobile' => $data['phoneNumber'],
                'role' => 'business',
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

        }
        //7055555
//        $file = Files::create([
//            'user_id'            => $user->id,
////            'firstName'         => Auth::user()->firstName,
////            'secondName'        => $secondname,
////            'lastName'          => Auth::user()->lastName,
//            'country'           => 'country',
//            'citizenship'       => 'citizenship' ,
//            'placeOfBirth'      => 'placeOfBirth',
//            'address'           => 'address'  ,
//            'landLine'          => 'landLine' ,
//            'city'              => 'city' ,
//            'zip'               => 'zip',
//            'employment'        => 'employment',
//            'industry'          => 'industry'  ,
//            'annualIncome'      => 'annualIncome',
//            'savings'           => 'savings' ,
//            'sourceOfFunds'     => 'sourceOfFunds',
//            'investAnnually'    => 'investAnnually',
//            'nameOfBank'        => 'nameOfBank',
//            'taxId'             => 'taxId',
//            'countryTaxes'      => 'countryTaxes',
//            'approved'          => 'yes'
//        ]);

        return $user;

    }
}
