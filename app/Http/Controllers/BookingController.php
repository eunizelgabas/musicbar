<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;

class BookingController extends Controller
{

    public function index(){
        return view('components.review');
    }


   public function submit(){
        return view('components.successBook');
   }
}
