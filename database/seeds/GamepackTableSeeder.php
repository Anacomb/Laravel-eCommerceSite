<?php

use Illuminate\Database\Seeder;
use App\Gamepack;

class GamepackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gamepack::Create([
        	"name" => "Dark Souls Pack",
        	"slug" =>"dark-souls-pack"
        ]);

        Gamepack::Create([
        	"name" => "Zelda Pack",
        	"slug" =>"zelda-pack"
        ]);

        Gamepack::Create([
        	"name" => "Assassin's Creed Pack",
        	"slug" =>"assassins-creed-pack"
        ]);

        Gamepack::Create([
        	"name" => "Tomb Raider Pack",
        	"slug" =>"tomb-raider-pack"
        ]);
    }
}
