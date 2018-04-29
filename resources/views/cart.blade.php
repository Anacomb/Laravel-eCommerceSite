@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid bg-dark" style="box-shadow: 2px 2px 4px 0px white;border-radius: 30px ">
        <div class="container">
            <h1 class="display-4 text-light"><i class="fas fa-shopping-basket"></i> Mon Panier :</h1>
            <br>
            <h4 class="text-light"><i class="far fa-money-bill-alt"></i> Jeton de bannissement : X{{ sizeof($bannedGames)-1 < 0 ? sizeof($products) : sizeof($products)-(sizeof($bannedGames)-1)}} <a class="btn btn-outline-info " href="{{ url('/cart') }}"><i class="fas fa-sync-alt"></i></a></h4>
            <br>



            <table class="table table-dark">
                <thead>
                    <tr>
                        <th style="min-width: 250px;"><i class="fas fa-tag"></i> Nom de l'article</th>
                        <th style="min-width: 200px;"><i class="fas fa-weight"></i> Quantité</th>
                        <th style="min-width: 150px;"><i class="fas fa-euro-sign"></i> Prix</th>
                        <th><i class="fas fa-toggle-on"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ $product->price * $product->qty }}€</td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('cart-delete', ['productId' => $product->rowId])}}"><i class="fas fa-trash-alt"></i>  Supprimer</a>
                                <br><br>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multicollapse{{ $product->id }}" aria-expanded="false"><i class="fas fa-info-circle"></i> Détails</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="collapse aria-expanded multicollapse{{ $product->id }}">
                                    <div class="card card-body bg-dark">
                                        <h6>Retirer un jeu du tirage :</h6>
                                        <div class="input-group">
                                            <form method="GET" action="{{ route('cart-banGame') }}">
                                                <select class="custom-select" name="getGameInput">
                                                    <option selected>Choisissez un jeu à retirer du tirage <i class="fas fa-arrow-down"></i></option>
                                                    @foreach($gamepacks as $gamepack)
                                                        @if($gamepack->id == $product->id)
                                                            @foreach ($games[$gamepack->id] as $game)
                                                                @if (!in_array($game->id,$bannedGames) && sizeof($bannedGames)<=sizeof($products)))
                                                                        <option name="{{ $game->id }}" value="{{ $game->id }}">{{ $game->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="bannedGames" value="{{ implode("|",$bannedGames) }}"/>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Valider</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="collapse aria-expanded multicollapse{{ $product->id }}">
                                    <div class="card card-body bg-dark">
                                        @foreach($gamepacks as $gamepack)
                                            @if($gamepack->id == $product->id)
                                                @foreach ($games[$gamepack->id] as $game)
                                                    @if(!in_array($game->id,$bannedGames))
                                                        {{ $game->name }}<br>
                                                    @else
                                                        <strike>{{ $game->name }}</strike><br>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    <tr class="bg-dark"><td></td><td></td><td></td><td></td></tr>
                    <tr>
                        <td>Sous-Total :</td>
                        <td></td>
                        <td></td>
                        <td>{{ $subtotal }}€</td>
                    </tr>
                    <tr>
                        <td>TVA :</td>
                        <td></td>
                        <td></td>
                        <td>{{ $tax }}€</td>
                    </tr>
                    <tr class="bg-primary">
                        <td>Total :</td>
                        <td></td>
                        <td></td>
                        <td>{{ $total }}€</td>
                    </tr>
                    <tr><td></td><td></td><td></td><td></td></tr>
                    <tr>
                        <td><a class="text-light"  href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Retour</a></td>
                        <td></td>
                        <td></td>
                        <td>
                            @if($cartIsEmpty)
                                <a class="btn btn-primary" href="{{ route('home') }}">Panier vide <i class="fas fa-arrow-right"></i> Commencer vos achats</a>
                            @elseif($userConnected)
                                <form method="GET" action="{{ route('payment-proceedPayment') }}">

                                    <input type="hidden" name="bannedGames" value="{{ implode("|",$bannedGames) }}"/>
                                    <button class="btn btn-success" type="submit">Valider</button>
                                </form>
                            @else
                                <a class="btn btn-info" href="{{ route('login') }}">Se connecter pour continuer</a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
