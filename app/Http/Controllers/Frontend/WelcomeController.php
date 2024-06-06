<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Service::where('name', 'specials')->first();
        return view('welcome', compact('specials'));
    }
    public function thankyou()
    {
        return view('thankyou');
    }

    public function thankyou2()
    {
        return view('thankyou2');
    }
}
