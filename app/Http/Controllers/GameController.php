<?php

namespace App\Http\Controllers;
use App\Classes\WishlistGame;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function listGames()
    {
        $games = ['Donkey Kong', 'Super Mario 2', 'Tetris'];
        

        $monopoly = new WishListGame("Monopoly","Best Game Ever","http://localhost/images/monopoly.jpg", 19.99);
        $sorry = new WishListGame("Sorry","2nd Best Game Ever","http://localhost/images/sorry.jpg", 29.99); 
        $boardGames = [$monopoly, $sorry];
        return view('games', compact('games','boardGames'));
    }

    public function gameView($id){

        $games = ['Donkey Kong', 'Super Mario 2', 'Tetris'];
        $monopoly = new WishListGame("Monopoly","Best Game Ever","http://localhost/images/monopoly.jpg", 19.99);
        $sorry = new WishListGame("Sorry","2nd Best Game Ever","http://localhost/images/sorry.jpg", 29.99); 
        $wishlist = [$monopoly,$sorry];   
        $id = $wishlist[$id];


     return view('games', compact('games','boardGames')); 
    }
}
