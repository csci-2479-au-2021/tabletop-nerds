<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        throw new \Exception('break test intentionally');
        return view('index');
    }
}
