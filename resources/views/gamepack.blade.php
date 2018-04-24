@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="justify-content-center bg-dark details">
            <h1 class="text-light display-1">Pack {{$gamepack->name}}</h1>  
            <br/>    
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($games[$gamepack->id] as $game)
                    
                    @if ($loop->iteration == 1)
                            <li data-target="#carousel-example-generic" data-slide-to="{{$loop->iteration-1}}" class="active"></li>
                        @else
                            <li data-target="#carousel-example-generic" data-slide-to="{{$loop->iteration-1}}"></li>
                        @endif
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach ($games[$gamepack->id] as $game)
                        @if ($loop->iteration == 1)
                            <div class="carousel-item active">
                        @else
                            <div class="carousel-item">
                        @endif
                                <img class="carousel-cover" src="{{$game->image}}" alt="{{$game->name}}">
                            </div>
                    @endforeach 
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <i class="fas fa-chevron-right"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <br/>    
            <h2 class="text-light">Contenu du pack :</h2>
            <ul>
                @foreach ($games[$gamepack->id] as $game)
                    <a href="#{{$game->id}}" data-toggle="modal" data-target="#packModal"><li class="text-light">{{$game->name}}</li></a>
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

                <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#packModal">
          WOAHOU
        </button>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg noBorder" id="packModal" tabindex="-1" role="dialog" aria-labelledby="packModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary noBorder">
                <h5 class="modal-title text-light" id="packModalLabel">{{$game->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body bg-dark text-light">
                
                <img class="info" src="{{$game->image}}" alt="Card image cap"><br/>         
                <p> <b>Date de sortie du jeu : </b> {{$game->release_date}}</p><br/>
                <p> <b>Genres associés au jeu : </b>{{$game->genre}}</p><br/>
                <p> <b>Description du jeu : </b>{{$game->description}}</p>
                
              </div>
              <div class="modal-footer bg-primary noBorder">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
