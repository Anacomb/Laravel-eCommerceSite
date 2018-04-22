@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex flex-wrap">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @foreach ($gamepacks as $gamepack)
                    <div class="gamepack card bg-dark">
                        <div style="display: inline-table;">    
                            @foreach ($games[$gamepack->id] as $game)
                                @if ($loop->iteration <= 4)
                                        <img class="card-img-top game-cover" src="{{$game->image}}" alt="Card image cap">
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
        <div class="justify-content-center">
            {{ $gamepacks->links() }}     
        </div>
    </div>
</div>
@endsection
