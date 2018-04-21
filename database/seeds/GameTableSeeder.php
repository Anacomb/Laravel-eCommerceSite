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

	const MAX_GAMES = 5;

    public function run()
    {

    	//Creates a "Game" object for each game found with the search
    	$games = IGDB::searchGames('Dark Souls');
        foreach ($games as $game) {
        	$onPc = false;
        	foreach($game->platforms as $p)
        	{
        		$platform = IGDB::getPlatform($p);
        		if($platform->name == "PC (Microsoft Windows)")
        			$onPc = true;
        	}
        	if($onPc)
        	{
        		Game::create([
		            'name' => $game->name,
		            'description' => $game->summary,
		            'genre' => IGDB::getGenre($game->genres[0])->name,
		            'release_date' => $game->release_dates[0]->human,
		            'image' => 'https:'. str_replace('thumb', '1080p', $game->cover->url), //choose the cover definition
		            'gamepack_id' => 1,
	        	]);
        	}
        }        

    	$games = IGDB::searchFranchises('Warcraft', ['*'], $limit = self::MAX_GAMES, $offset = 0, $order = "release_dates.date:desc")[0];
        foreach ($games->games as $k) {
        	$game = IGDB::getGame($k);
    		Game::create([
	            'name' => $game->name,
	            'description' => $game->summary,
	            'genre' => IGDB::getGenre($game->genres[0])->name,
	            'release_date' => $game->release_dates[0]->human,
	            'image' => 'https:'. str_replace('thumb', '1080p', $game->cover->url), //choose the cover definition
	            'gamepack_id' => 2,
        	]);           
        }        

    	$games = IGDB::searchGenres('strategy')[0];
    	$i = 0;
        foreach ($games->games as $k) {
        	$game = IGDB::getGame($k);
        	if($i < self::MAX_GAMES)
        	{
        		Game::create([
		            'name' => $game->name,
		            'description' => $game->summary,
		            'genre' => IGDB::getGenre($game->genres[0])->name,
		            'release_date' => $game->release_dates[0]->human,
		            'image' => 'https:'. str_replace('thumb', '1080p', $game->cover->url), //choose the cover definition
		            'gamepack_id' => 3,
	        	]);
        	}
        	$i++;            
        }             
    }
}
