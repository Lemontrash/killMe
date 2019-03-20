<?php

namespace App\Http\Controllers;

use App\Business;
use App\Individual;
use App\User;
use Illuminate\Http\Request;

class Test extends Controller
{
    public function test(){
        $ind = Business::all();
        dd($ind);
        return view('test', [$ind => 'ind']);
    }
}
