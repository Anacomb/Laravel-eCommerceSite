<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gamepack;
use App\Game;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gamepacks = Gamepack::all()[0]->paginate(6);
        foreach($gamepacks as $gamepack)
        {
            $games[$gamepack->id] = Game::where('gamepack_id', $gamepack->id)->get();
        }
        
        return view('home', ["gamepacks" => $gamepacks, "games" => $games]);
    }
}
