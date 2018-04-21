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
        	"name" => "Dark Souls",
        	"slug" =>"dark-souls-pack"
        ]);

        Gamepack::Create([
        	"name" => "Warcraft",
        	"slug" =>"warcraft-pack"
        ]);

        Gamepack::Create([
        	"name" => "Stratégie",
        	"slug" =>"strategy-pack"
        ]);

        Gamepack::Create([
        	"name" => "Action",
        	"slug" =>"action-pack"
        ]);
    }
}
