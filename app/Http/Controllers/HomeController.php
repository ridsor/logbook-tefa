<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logbook;

class HomeController extends Controller
{
    function index() {
        $search = request()->get('s');

        $logbook = Logbook::orderByDesc('waktu masuk')->where('nama','like','%'.$search.'%')->get();
        return view('index',[
            'logbook' => $logbook
        ]);
    }
} 
