<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function gamehunt(Request $request)
    {
        $key = trim($request->get('search'));
        $findgames = DB::table('games')->where('name', 'like', "%{$key}%")->get();

        return view('search-results', ['key' => $key, 'games' => $findgames]);
    }
}