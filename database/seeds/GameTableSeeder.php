<?php

use Illuminate\Database\Seeder;
use App\Game;


class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Creates a "Game" object for each game found with the search
    	$games = IGDB::searchFranchises('dark souls')[1];
        foreach ($games->games as $k) {
        	$game = IGDB::getGame($k);
            Game::create([
	            'name' => $game->name,
	            'description' => $game->summary,
	            'genre' => IGDB::getGenre($game->genres[0])->name,
	            'release_date' => $game->release_dates[0]->human,
	            'image' => 'https:'.$game->cover->url,
	            'gamepack_id' => 1,
        	]);
        }        

    	$games = IGDB::searchFranchises('red alert')[0];
        foreach ($games->games as $k) {
        	$game = IGDB::getGame($k);
            Game::create([
	            'name' => $game->name,
	            'description' => $game->summary,
	            'genre' => IGDB::getGenre($game->genres[0])->name,
	            'release_date' => $game->release_dates[0]->human,
	            'image' => 'https:'.$game->cover->url,
	            'gamepack_id' => 1,
        	]);
        }        

/*    	$games = IGDB::getGenre(10);
        foreach ($games->games as $k) {
        	$game = IGDB::getGame($k);
            Game::create([
	            'name' => $game->name,
	            'description' => $game->summary,
	            'genre' => IGDB::getGenre($game->genres[0])->name,
	            'release_date' => $game->release_dates[0]->human,
	            'image' => 'https:'.$game->cover->url,
	            'gamepack_id' => 1,
        	]);*/
        //}          
    }
}
