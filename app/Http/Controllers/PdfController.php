<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\PDF;
use App\Business;
use App\Files;
use App\Individual;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use FontLib\AdobeFontMetrics;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\FontMetrics;
use phpDocumentor\Reflection\File;

class PdfController extends Controller
{
    public function generate(Request $request){
//        dd($request);
        $firstname          = $request->get('firstName');//!111111111111111
        $secondname         = $request->get('middleName');
        $lastname           = $request->get('lastName');
        $countrytname       = $request->get('countryOfResidence');
        $cityzenship        = $request->get('Citizenship');
        $plasceofbirth      = $request->get('placeOfBirth');
        $address            = $request->get('address');
        $landLine           = $request->get('LandLine');
        $city               = $request->get('city');
        $zip                = $request->get('ZIP');
        $employment         = $request->get('employment');
        $industry           = $request->get('Industry');
        $annualIncome       = $request->get('AnnualIncome');
        $savings            = $request->get('savings');
        $sourceOfFunds      = $request->get('sourceOfFunds');
        $investAnnually     = $request->get('investAnnually');
        $nameOfBank         = $request->get('NameOfBank');
        $TAX                = $request->get('TAX');
        $TAXCountry         = $request->get('TAXCountry');
        $data = [
                'country'           => $countrytname,
                'citizenship'       => $cityzenship,
                'placeOfBirth'    => $plasceofbirth,
                'address'           => $address,
                'landLine'         => $landLine,
                'city'              => $city,
                'zip'               => $zip,
                'employment'        => $employment,
                'industry'          => $industry,
                'annualIncome'     => $annualIncome,
                'savings'           => $savings,
                'sourceOfFunds'   => $sourceOfFunds,
                'investAnnually'   => $investAnnually,
                'nameOfBank'        => $nameOfBank,
                'taxId'            => $TAX,
                'countryTaxes'     => $TAXCountry,
            ];
        $userId = Auth::id();

        $file = Files::create([
            'user_id'            => 1,
//            'firstName'         => Auth::user()->firstName,
//            'secondName'        => $secondname,
//            'lastName'          => Auth::user()->lastName,
            'country'           => $countrytname,
            'citizenship'       => $cityzenship,
            'placeOfBirth'      => $plasceofbirth,
            'address'           => $address,
            'landLine'          => $landLine,
            'city'              => $city,
            'zip'               => $zip,
            'employment'        => $employment,
            'industry'          => $industry,
            'annualIncome'      => $annualIncome,
            'savings'           => $savings,
            'sourceOfFunds'     => $sourceOfFunds,
            'investAnnually'    => $investAnnually,
            'nameOfBank'        => $nameOfBank,
            'taxId'             => $TAX,
            'countryTaxes'      => $TAXCountry,
        ]);

        return response()->json($file);
    }

    public function getPdfFromProfile($id){
        $file = Files::where('id', $id)->first();
        $user = \App\User::where('id', $file->user_id)->first();
        $data = [
            'firstName'                 => $user->firstName,
            'lastName'                  => $user->lastName,
            'beneficiaryName'           => $file->beneficiaryName,
            'beneficiaryAddress'        => $file->beneficiaryAddress,
            'bankName'                  => $file->bankName,
            'bankLocation'              => $file->bankLocation,
            'swift'                     => $file->swift,
            'referenceField'            => $file->referenceField,
            'iban'                      => $file->iban,
            'amount'                      => $file->amount,
        ];
        $pdf = Facade::loadView('pdf.pdf', $data);;
        return $pdf->stream();
    }

    public function show(){
        return view('pdf');
    }
}
