<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use App\Services\GameService;
use App\Http\Requests\UserGameReviewPost;
use App\Models\ReviewAndWishlist;

class UserController extends Controller
{
    private UserService $userService;
    private GameService $gameService;

    public function __construct(UserService $userService,GameService $gameService )
    {
        $this->userService = $userService;
        $this->gameService = $gameService;
    }

    public function userInfo()
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;
        $userEmail = Auth::user()->email;

        return view('profile', compact('userId', 'userName', 'userEmail'));
    }

    public function UserGameRating($id){
        $newReview = new ReviewAndWishlist();
        $game = $this->gameService->getGameById($id);
        $newReview->game_id = $id;
        $newReview->title = $game->title;
        return view('SubmitAReview', compact('newReview'));
    }

    public function ViewGameReview(){
        return view('YourReview');
    }

    public function SubmitGameRating(UserGameReviewPost $request){
        $validatedInput = $request->validated();
        $user_id = Auth::user()->id;
        $userReview = $this->userService->submitGameReview(
            $validatedInput['game_id'],
            $user_id,$validatedInput['game_rating'],
            $validatedInput['text_review']);

        return view('YourReview',  compact('userReview'));
    }

    public function makeMeAAdmin(){
        $user_id = Auth::user()->id;
        $makeMeAdmin = $this->userService->makeMeAAdmin($user_id);
        return redirect()->route('AdminView');
    }

}
