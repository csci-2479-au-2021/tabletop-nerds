<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WishlistService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RemoveFromWishlistRequest;
use App\Http\Requests\AddToWishlistRequest;

class WishlistController extends Controller
{

    private WishlistService $wishlistService;
    
    public function __construct(WishlistService $wishlistService)
    {
        
        $this->wishlistService = $wishlistService;
    }

    public function viewWishlist(){
        $userId = Auth::user()->id;
        $wishlist = $this->wishlistService->getWishlistByUserId($userId);    
        return view('wishlist', ['wishlist'=>$wishlist]);
    }

    public function AddToWishlist(AddToWishlistRequest $request)
    {
        $userId = Auth::user()->id;
        $validatedInput = $request->validated(); 

        $addorUpdateThisGame = $this->wishlistService->addToWishlist(
            $validatedInput['game_id'],
            $userId,
            $validatedInput['on_wishlist']);

        return redirect()->route('wishlist');
    }


    public function RemoveFromWishlist(RemoveFromWishlistRequest  $request)
    {
        $validatedInput = $request->validated();

        $removeThisGame = $this->wishlistService->removeWishlistGame(
            $validatedInput['game_id'],
            $validatedInput['user_id'],
            $validatedInput['on_wishlist']);

        return redirect()->route('wishlist');
    }

    public function toggleWishlist(AddToWishlistRequest $request)
    {
        // $userId = Auth::user()->id;
        $validatedInput = $request->validated(); 

        $addorUpdateThisGame = $this->wishlistService->addToWishlist(
            $validatedInput['game_id'],
            $validatedInput['user_id'],
            $validatedInput['on_wishlist']);

        return response()->json([
            'game_id' => $validatedInput['game_id'],
            'user_id' => $validatedInput['user_id'],
            'on_wishlist' => $validatedInput['on_wishlist'],
        ]);
    }
}
