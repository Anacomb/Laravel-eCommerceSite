@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="justify-content-center bg-dark details">
            <h1 class="text-light display-1">Pack {{$gamepack->name}}</h1>  
            <br/>    
            <div id="games-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($games[$gamepack->id] as $game)
                    
                    @if ($loop->iteration == 1)
                            <li data-target="#games-carousel" data-slide-to="{{$loop->iteration-1}}" class="active"></li>
                        @else
                            <li data-target="#games-carousel" data-slide-to="{{$loop->iteration-1}}"></li>
                        @endif
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach ($games[$gamepack->id] as $game)
                        @if ($loop->iteration == 1)
                            <div class="d-block w-100 active">
                        @else
                            <div class="d-block w-100">
                        @endif
                                <img class="carousel-cover" src="{{$game->image}}" alt="{{$game->name}}">
                            </div>
                    @endforeach 
                </div>
                  <a class="carousel-control-prev" href="#games-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#games-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
            </div>
            <br/>    
            {{request()->fullPath()}}
            <h2 class="text-light">Contenu du pack :</h2>
            <ul>
                @foreach ($games[$gamepack->id] as $game)
                    <li class="text-light">{{$game->name}}</li>
                @endforeach
            </ul>
            <br/>    
            <a href="/" class="btn btn-primary btn-lg"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
            @if(Session::has('toasts'))
                @foreach(Session::get('toasts') as $toast)
                    <div class="alert alert-{{ $toast['level'] }}">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      
                      {{ $toast['message'] }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
