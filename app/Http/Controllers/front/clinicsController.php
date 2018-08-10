<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use App\Clinic;
use Illuminate\Http\Request;

class clinicsController extends Controller
{
    public function index()
    {
        $clinics = Clinic::all();
        return view('front.pages.clinics',compact('clinics'));
    }

}
