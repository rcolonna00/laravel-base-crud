@extends('layouts.app')

@section('main_content')

    <div class="container">
    <h1>H1 di prova nuova pagina</h1>
        <div class="row">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ $comic->image }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Titolo {{ $comic->name }}</h5>
                  <p class="card-text">Descrizione: {{ $comic->description }}</p>
                  <p class="card-text">Prezzo: {{ $comic->price }}£</p>
                  <p class="card-text">Autore: {{ $comic->author }}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
    </div>
    

@endsection