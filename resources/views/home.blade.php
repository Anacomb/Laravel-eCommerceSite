@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex flex-wrap">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @php 
                    //var_dump(IGDB::searchGames('Dark Souls', ['*'], $limit = 1, $offset = 0, $order = 'name')); 
                @endphp

                @foreach ($gamepacks as $gamepack)
                    <div class="card bg-dark" style="padding:10px; width: 322px; height: 100%; margin: 20px;">
                        <div style="display: inline-table;">    
                            @foreach ($games[$gamepack->id] as $game)
                                @if ($loop->iteration <= 4)
                                        <img class="card-img-top" src="{{$game->image}}" alt="Card image cap" style="width:150px; height:200px;">
                                @endif
                            @endforeach 
                        </div>  
                        <div class="card-body">
                            <h2 class="card-title text-light text-center">Pack {{$gamepack->name}}</h2>
                        </div>
                        <a class="btn btn-primary" href="./packs/{{$gamepack->slug}}" role="button">Plus d'informations</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
