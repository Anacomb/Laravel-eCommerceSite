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

        $games = null;
        $games[] = IGDB::searchGames('Need For Speed : Payback')[0];
        $games[] = IGDB::searchGames('Need For Speed')[0];
        $games[] = IGDB::searchGames('Need For Speed : No Limits')[0];
        $games[] = IGDB::searchGames('Need For Speed : Rivals')[0];
        $games[] = IGDB::searchGames('Need For Speed : Most Wanted')[0];

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
                    'gamepack_id' => 5,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('The Elder Scrolls V : Skyrim')[0];
        $games[] = IGDB::searchGames('The Elder Scrolls IV : Oblivion')[0];
        $games[] = IGDB::searchGames('The Elder Scrolls III : Morrowind')[0];
        $games[] = IGDB::searchGames('The Elder Scrolls : Legends')[0];
        $games[] = IGDB::searchGames('The Elder Scrolls Online : Morrowind')[0];

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
                    'gamepack_id' => 6,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Total War : Rome II')[0];
        $games[] = IGDB::searchGames('Empire : Total War ')[0];
        $games[] = IGDB::searchGames('Napoleon : Total War')[0];
        $games[] = IGDB::searchGames('Total War : Warhammer 2')[0];
        $games[] = IGDB::searchGames('Total War : Attila')[0];

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
                    'gamepack_id' => 7,
                ]);    
            }
            $i++;            
        }

         $games = null;
        $games[] = IGDB::searchGames('Wolfenstein II')[0];
        $games[] = IGDB::searchGames('Call of Duty : WWII ')[0];
        $games[] = IGDB::searchGames('Far Cry 5')[0];
        $games[] = IGDB::searchGames('Battlefield 1')[0];
        $games[] = IGDB::searchGames('Titanfall 2')[0];

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
                    'gamepack_id' => 8,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Titan Quest')[0];
        $games[] = IGDB::searchGames('Diablo II ')[0];
        $games[] = IGDB::searchGames('Torchlight II')[0];
        $games[] = IGDB::searchGames('Grim Dawn')[0];
        $games[] = IGDB::searchGames('Victor Vran')[0];

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
                    'gamepack_id' => 9,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Street Fighter V')[0];
        $games[] = IGDB::searchGames('Mortal Kombat X ')[0];
        $games[] = IGDB::searchGames('Tekken 7')[0];
        $games[] = IGDB::searchGames('WWE 2K17')[0];
        $games[] = IGDB::searchGames('Dragon Ball FighterZ')[0];

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
                    'gamepack_id' => 10,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Surviving Mars')[0];
        $games[] = IGDB::searchGames('Cities Skylines ')[0];
        $games[] = IGDB::searchGames('Planet Coaster')[0];
        $games[] = IGDB::searchGames('Northgard')[0];
        $games[] = IGDB::searchGames('Overcooked')[0];

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
                    'gamepack_id' => 11,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Stellaris')[0];
        $games[] = IGDB::searchGames('Hearts of Iron IV')[0];
        $games[] = IGDB::searchGames('Crusader Kings II')[0];
        $games[] = IGDB::searchGames('Steel Division: Normandy 44')[0];
        $games[] = IGDB::searchGames('Europa Universalis IV')[0];

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
                    'gamepack_id' => 12,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Minecraft : Story Mode')[0];
        $games[] = IGDB::searchGames('Batman : The Telltale Series')[0];
        $games[] = IGDB::searchGames('The Walking Dead : A New Frontier')[0];
        $games[] = IGDB::searchGames('Tales from the Borderlands')[0];
        $games[] = IGDB::searchGames('Game of Thrones: A Telltale Games Series')[0];

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
                    'gamepack_id' => 13,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Fallout 4')[0];
        $games[] = IGDB::searchGames('Fallout 3')[0];
        $games[] = IGDB::searchGames('Fallout : New Vegas')[0];
        $games[] = IGDB::searchGames('Fallout 2')[0];
        $games[] = IGDB::searchGames('Fallout')[0];

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
                    'gamepack_id' => 14,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Kerbal Space Program ')[0];
        $games[] = IGDB::searchGames('Farming Simulator 2017')[0];
        $games[] = IGDB::searchGames('Euro Truck Simulator 2')[0];
        $games[] = IGDB::searchGames('Goat Simulator')[0];
        $games[] = IGDB::searchGames('The Sims 4')[0];

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
                    'gamepack_id' => 15,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Call of Duty : WWII')[0];
        $games[] = IGDB::searchGames('Call of Duty : Infinite Warfare')[0];
        $games[] = IGDB::searchGames('Call of Duty : Modern Warfare II')[0];
        $games[] = IGDB::searchGames('Call of Duty : Black Ops')[0];
        $games[] = IGDB::searchGames('Call of Duty : World at War')[0];

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
                    'gamepack_id' => 16,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Tom Clancy\'s Ghost Recon Wildlands')[0];
        $games[] = IGDB::searchGames('Tom Clancy\'s : The Division')[0];
        $games[] = IGDB::searchGames('Tom Clancy\'s : Rainbow Six Siege')[0];
        $games[] = IGDB::searchGames('Tom Clancy\'s Ghost Recon : Future Soldier')[0];
        $games[] = IGDB::searchGames('Tom Clancy\'s Splinter Cell : Blacklist')[0];

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
                    'gamepack_id' => 17,
                ]);    
            }
            $i++;            
        }

        $games = null;
        $games[] = IGDB::searchGames('Assassin\'s Creed : Origins')[0];
        $games[] = IGDB::searchGames('Assassin\'s Creed : Syndicate')[0];
        $games[] = IGDB::searchGames('Assassin\'s Creed : Black Flag')[0];
        $games[] = IGDB::searchGames('Assassin\'s Creed : Unity')[0];
        $games[] = IGDB::searchGames('Assassin\'s Creed Rogue')[0];

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
                    'gamepack_id' => 18,
                ]);    
            }
            $i++;            
        }


    }
}
