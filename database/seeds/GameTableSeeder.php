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

    	$games = IGDB::searchFranchises('Warcraft')[0];
    	$i = 0;
        foreach ($games->games as $k) {
        	$game = IGDB::getGame($k);
        	if($i < self::MAX_GAMES)
        	{
	    		Game::create([
		            'name' => isset($game->name) ? $game->name : '',
		            'description' => isset($game->summary) ? $game->summary : '',
		            'genre' => isset($game->genres) ? IGDB::getGenre($game->genres[0])->name : '',
		            'release_date' => isset($game->release_dates[0]->human) ? $game->release_dates[0]->human : '',
		            'image' => 'https:'. isset($game->cover) ? str_replace('thumb', '1080p', $game->cover->url) : '', //choose the cover definition
		            'gamepack_id' => 2,
	        	]);    
        	}
        	$i++;       
        }        

        $games = null;
    	$games[] = IGDB::searchGames('Civilization VI')[0];
    	$games[] = IGDB::searchGames('XCOM 2')[0];
    	$games[] = IGDB::searchGames('Total War Warhammer 2')[0];
    	$games[] = IGDB::searchGames('StarCraft 2: Wings of Liberty')[0];
    	$games[] = IGDB::searchGames('Aven Colony')[0];

    	$i = 0;
        foreach ($games as $game) {
        	if($i < self::MAX_GAMES)
        	{
	    		Game::create([
		            'name' => isset($game->name) ? $game->name : '',
		            'description' => isset($game->summary) ? $game->summary : '',
		            'genre' => isset($game->genres) ? IGDB::getGenre($game->genres[0])->name : '',
		            'release_date' => isset($game->release_dates[0]->human) ? $game->release_dates[0]->human : '',
		            'image' => isset($game->cover) ? 'https:'. str_replace('thumb', '1080p', $game->cover->url) : '', //choose the cover definition
		            'gamepack_id' => 3,
	        	]);    
        	}
        	$i++;            
        } 

        $games = null;
    	$games[] = IGDB::searchGames('Nier: Automata')[0];
    	$games[] = IGDB::searchGames('Mass Effect: Andromeda')[0];
    	$games[] = IGDB::searchGames('Destiny 2')[0];
    	$games[] = IGDB::searchGames('Tom Clancy\'s Ghost Recon Wildlands')[0];
    	$games[] = IGDB::searchGames('PlayerUnknown\'s Battlegrounds')[0];

    	$i = 0;
        foreach ($games as $game) {
        	if($i < self::MAX_GAMES)
        	{
	    		Game::create([
		            'name' => isset($game->name) ? $game->name : '',
		            'description' => isset($game->summary) ? $game->summary : '',
		            'genre' => isset($game->genres) ? IGDB::getGenre($game->genres[0])->name : '',
		            'release_date' => isset($game->release_dates[0]->human) ? $game->release_dates[0]->human : '',
		            'image' => isset($game->cover) ? 'https:'. str_replace('thumb', '1080p', $game->cover->url) : '', //choose the cover definition
		            'gamepack_id' => 4,
	        	]);    
        	}
        	$i++;            
        }             
    }
}
