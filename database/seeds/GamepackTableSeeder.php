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

        Gamepack::Create([
            "name" => "Need For Speed",
            "slug" =>"need-for-speed-pack"
        ]);

        Gamepack::Create([
            "name" => "The Elder Scrolls",
            "slug" =>"the-elder-scrolls-pack"
        ]);

        Gamepack::Create([
            "name" => "Total War",
            "slug" =>"total-war-pack"
        ]);

        Gamepack::Create([
            "name" => "FPS",
            "slug" =>"fps-pack"
        ]);

        Gamepack::Create([
            "name" => "Hack and Slash",
            "slug" =>"hack-and-slash-pack"
        ]);

        Gamepack::Create([
            "name" => "Combat",
            "slug" =>"combat-pack"
        ]);

        Gamepack::Create([
            "name" => "Gestion",
            "slug" =>"gestion-pack"
        ]);

        Gamepack::Create([
            "name" => "Paradox Interactive",
            "slug" =>"pi-pack"
        ]);

        Gamepack::Create([
            "name" => "Telltale Games",
            "slug" =>"ttg-pack"
        ]);

        Gamepack::Create([
            "name" => "Fallout",
            "slug" =>"fallout-pack"
        ]);

        Gamepack::Create([
            "name" => "Simulation",
            "slug" =>"simulation-pack"
        ]);

        Gamepack::Create([
            "name" => "Call of Duty",
            "slug" =>"cod-pack"
        ]);

        Gamepack::Create([
            "name" => "Tom Clancy's",
            "slug" =>"tom-clancys-pack"
        ]);

        Gamepack::Create([
            "name" => "Assassin's Creed",
            "slug" =>"ac-pack"
        ]);
    }
}
