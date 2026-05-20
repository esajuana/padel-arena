<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home() {
        $courts = Court::where('status', 1)->latest()
            ->take(3)
            ->get();

    return view('frontend.home', compact('courts'));
    }

    public function courts()
    {
        $courts = Court::where('status', 1)
            ->latest()
            ->get();

        return view(
            'frontend.courts',
            compact('courts')
        );
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
