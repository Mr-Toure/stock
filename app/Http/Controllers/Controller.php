<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generateUniqueCode($length, $name)
    {

        $uniqueKey=strtoupper(substr(sha1(microtime()), rand(0, 5), 6));
        $uniqueKey  = $name.'-'.implode("-", str_split($uniqueKey, 3));
        return $uniqueKey;

    }

    protected function logout()
    {
        Session::flush();
        
        Auth::logout();
        return redirect('/connexion');
    }

}
