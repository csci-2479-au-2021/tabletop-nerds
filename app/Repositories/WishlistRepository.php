<?php

namespace App\Repositories; 
use App\Models\Game;
use Illuminate\Support\Facades\DB;
use App\Models\Wishlist;
use App\Models\GameUser;
use Illuminate\Database\Eloquent\Collection;

class WishlistRepository
{
    public function selectWishlistByUserId($userId)
    {
        
       $gameUserList = DB::table('game_user')->where('user_id',$userId)->get();

       $wishlistList = collect($gameUserList)->where('on_wishlist',1);
       
       $wishlistGames =  array();

       
       foreach($wishlistList as &$game){
            $gameInfo = DB::table('games')->where('id',$game->game_id)->first();
            $wishlistGame = new Wishlist();
            $wishlistGame->game_id = $gameInfo->id;
            $wishlistGame->user_id = $userId;
            $wishlistGame->title= $gameInfo->title;
            $wishlistGame->image = $gameInfo->image;
            $wishlistGame->description= $gameInfo->description;
            array_push($wishlistGames,$wishlistGame);
        }

        return $wishlistGames;
    }

    public function updateRemoveFromWishlist(int $game_id, int $user_id, bool $on_wishlist){
        DB::table('game_user')->where('user_id',$user_id)->where('game_id',$game_id)->update(['on_wishlist'=>$on_wishlist]);

    }


    public function addUpdateToWishlist(int $game_id, int $user_id, bool $on_wishlist){
        $gameAlreadyThere = DB::table('game_user')->where('user_id',$user_id)->where('game_id',$game_id)->first();

        if($gameAlreadyThere != null){
            DB::table('game_user')->where('user_id',$user_id)->where('game_id',$game_id)->update(['on_wishlist'=>$on_wishlist]);
        }   
        
        else{
            DB::insert('insert into game_user (game_id, user_id, on_wishlist) values (?,?,?)',
                [$game_id, $user_id, $on_wishlist]);
        }



    }



}