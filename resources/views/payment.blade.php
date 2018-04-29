@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid bg-dark text-light" style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
            <div class="col-md-12  ">
                <h1 class="display-4">Félicitations !</h1>
                <p class="lead">Retrouver vos jeux ci-dessous <i class="fas fa-arrow-down"></i></p>
            </div>
        </div>
        <div class="row">
            @for($i=0;$i<sizeof($lottery);$i++)
                <div class="col-md-4">
                    <div class="card text-white bg-dark text-center border-light" style="margin-bottom:2rem; width: 18rem; height: 30rem; border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;">
                        <img class="card-img-top" style="height:22rem;" src="{{ $lottery[$i]->image }}" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title">{{ $lottery[$i]->name }}</h3>
                            <p class="card-text">{{ $serials[$i] }}</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection