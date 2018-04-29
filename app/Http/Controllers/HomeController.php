<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gamepack;
use App\Game;
use Auth;
use Toast;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public $bannedGames=array();

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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

    public function details($slug)
    {
        $gamepack = Gamepack::where('slug', '=', $slug)->first();
        $games[$gamepack->id] = Game::where('gamepack_id', $gamepack->id)->get();

        Toast::message('message', 'success', 'title');
        
        return view('gamepack', ["gamepack" => $gamepack, "games" => $games]);
    }

    public function addToCart($packId){
        $gamepack = Gamepack::where('id', '=', $packId)->first();

        Cart::add($gamepack->id, $gamepack->name, 1, $gamepack->price, ['size' => 'large'])->associate('Gamepack');

        return redirect('/');

    }

    public function showCart(){
        $gamepacks = Gamepack::all()[0]->paginate(6);
        foreach($gamepacks as $gamepack)
        {
            $games[$gamepack->id] = Game::where('gamepack_id', $gamepack->id)->get();
        }

        return view("cart", ['products' => Cart::content(), 'subtotal' => Cart::subtotal(), 'tax' => Cart::tax(), 'total' => Cart::total(), 'userConnected' => Auth::check(), 'cartIsEmpty' => Cart::count() == 0 ? true : false, "gamepacks" => $gamepacks, "games" => $games, 'bannedGames' => $this->bannedGames]);
    }

    public function removeFromCart($productId){
        Cart::remove($productId);
        return redirect('/cart');
    }

    public function banGame(Request $request){
        $game = $request['getGameInput'];
        $this->bannedGames=explode("|",$request['bannedGames']);
        array_push($this->bannedGames,$game);
        return $this->showCart();
    }

    public function generateRandomSerial(){
        $serial = '';
        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ' .'0123456789');
        shuffle($seed);
        for($i=0;$i<4;$i++){
            foreach (array_rand($seed, 4) as $k)$serial.=$seed[$k];
            if($i<3) $serial.="-";
        }
        return $serial;
    }

    public function proceedPayment(Request $request){
        $lottery = array();
        $serials = array();
        $gamesNotBanned = array();

        $this->bannedGames=explode("|",$request['bannedGames']);
        $products = Cart::content();
        $gamepacks = Gamepack::all()[0]->paginate(6);

        foreach($gamepacks as $gamepack){
            foreach ($products as $product){
                if($gamepack->id == $product->id){
                    $games[$gamepack->id] = Game::where('gamepack_id', $gamepack->id)->get();
                    foreach ($games[$gamepack->id] as $game){
                        if(!in_array($game->id,$this->bannedGames)){
                            array_push($gamesNotBanned, $game);
                        }
                    }
                    shuffle($gamesNotBanned);
                    array_push($lottery,$gamesNotBanned[0]);
                    array_push($serials, $this->generateRandomSerial());
                }
            }
        }
        Cart::destroy();
        return view('payment', ['lottery' => $lottery, 'serials' => $serials]);
    }
}
