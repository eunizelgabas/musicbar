<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
class BandController extends Controller
{
    public function index(){
        return view('components.band');
    }

    public function dashboard(){
        return view('components.dashboard');
    }

    // public function booking($id, $band)
    // {
    //     return view('booking', [
    //         'band' => $band,
    //         'booking_id' => $id,
    //     ]);
    // }
}
