<?php

namespace App\Http\Controllers;

use App\Models\Instock;
use App\Models\Fourniture;
use App\Models\Bonreception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $besoins = Bonreception::all();
        $fours = Fourniture::all();
        $instocks = Instock::all();
        return view('home.index', compact('besoins', 'fours', 'instocks'));
    }
}
