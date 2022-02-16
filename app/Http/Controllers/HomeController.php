<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Route;

class HomeController extends Controller
{
    //
    public function getHome(){
        return view('home');
    }
}
