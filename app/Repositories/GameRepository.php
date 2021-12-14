<?php

namespace App\Repositories;

use App\Models\Game;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\User;
use App\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class GameRepository
{
    // in reality this class will utilize Eloquent models to query the DB

    public function getGames(): Collection
    {
        return Game::orderBy('title')->get();
    }

    public function searchGamesByTitle(Request $request)
    {
        $key = trim($request->get('search'));
        $findgames = DB::table('games')->where('title', 'like', "%{$key}%")->get();
        return view('search-results', ['key' => $key, 'games' => $findgames]);
    }

    public function getGameById($id)
    {
        return Game::find($id);
    }

    public function activateDeactivateGame($id){
        $game = Game::find($id);
        $timestamp = date("Y-m-d H:i:s");
        if($game->is_deleted == 0){
            DB::table('games')->where('id',$id)->update(['is_deleted'=>1, 'time_deleted'=>$timestamp]);
        }
        else{
            DB::table('games')->where('id',$id)->update(['is_deleted'=>0, 'time_deleted'=>null]);
        }
    }

    public function updateGame (int $game_id, string $title, int $publisher, array $category, int $release_year, string $description){
        $timestamp = date("Y-m-d H:i:s");
        DB::table('games')->where('id',$game_id)->update(['title'=>$title, 'description'=>$description, 'updated_at'=>$timestamp, 'release_year'=>$release_year,'publisher_id'=>$publisher]);
        DB::table('category_game')->where('game_id',$game_id)->delete();
        foreach($category as $value){
            DB::insert('insert into category_game(game_id,category_id) values (?,?)',[$game_id, $value]);
        }
    }

    public function addGame(string $title, $image = null, int $publisher, array $category, int $release_year, string $description){
        $message;
        $timestamp = date("Y-m-d H:i:s");
        $alreadyExists = Game::firstWhere('title',$title);
        if($alreadyExists == null){
            DB::insert('insert into games (title, image, description, created_at, updated_at, release_year, publisher_id, is_deleted) values (?,?,?,?,?,?,?,?)',
            [$title, $image, $description, $timestamp, $timestamp, $release_year, $publisher, 0]);
            $game = Game::firstWhere('title',$title);
            foreach($category as $value){
                DB::insert('insert into category_game(game_id,category_id) values (?,?)',[$game->id, $value]);
            }
                $message ="Game successfully added to database";
            // return $message;
        }
        else{
            $message = "This game title already exists in the database";
            // return $message;
        }
    }

    public function getPublishers(): Collection
    {
        return Publisher::orderBy('name')->get();
    }

    public function getCategories(): Collection
    {
        return Category::orderBy('name')->get();
    }

    


}
