<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\WishlistGame;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class WishlistController extends Controller
{
    public function viewWishlist(){
        $monopoly = new WishListGame("Monopoly","Best Game Ever","http://localhost/images/monopoly.jpg", 19.99);
        $sorry = new WishListGame("Sorry","2nd Best Game Ever","http://localhost/images/sorry.jpg", 29.99); 
        $wishlist = [$monopoly,$sorry];    
        return view('wishlist', ['wishlist'=>$wishlist]);
        
    }

    public function showWishlist($userId = null) {
        $user = null;

        if($userId != null) {
            $user = User::find($userId);
        } else {
            $user = User::find(Auth::user()->id);
        }

        return view('wishlist', [
            'user' => $user
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
