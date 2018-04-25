@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="justify-content-center bg-dark details text-center">
            <h1 class="text-light display-1">Pack {{$gamepack->name}}</h1>  
            <br/>    
            <div id="games-carousel" class="carousel slide"  data-ride="carousel">
                <ol class="carousel-indicators carouselPos" >
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
                            <div class="carousel-item active">
                        @else
                            <div class="carousel-item">
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
            
            <h2 class="text-light text-center">Contenu du pack :</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($games[$gamepack->id] as $game)
                    <a href="#" data-toggle="modal" data-target="#packModal{{$loop->iteration}}"><li class="text-light">{{$game->name}}</li></a>
                @endforeach
            </ul>
            <br/>    
            <a href="/" class="btn btn-primary btn-lg"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
            <br/><br/>

        </div>

        <!-- Modal -->
        @foreach ($games[$gamepack->id] as $game)
            <div class="modal fade bd-example-modal-lg noBorder" id="packModal{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="packModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary noBorder">
                    <h5 class="modal-title text-light" id="packModalLabel">{{$game->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body bg-dark text-light text-center">
                    
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
        @endforeach
    </div>
</div>
@endsection
