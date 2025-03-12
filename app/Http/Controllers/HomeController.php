<?php

namespace App\Http\Controllers;

use App\Models\Instock;
use App\Models\Fourniture;
use App\Models\Bonreception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $besoins = Bonreception::with(['fournitures.typefour', 'agent.fonction.direction'])->get();
        $fours = Fourniture::with(['instock', 'typefour'])->get();
        $instocks = Instock::all();
        return view('home.index', compact('besoins', 'fours', 'instocks'));
    }
}
