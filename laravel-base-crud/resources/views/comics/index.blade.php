@extends('layouts.app')

@section('main_content')
    <section>
        <div class="container">
            <h1>Lista Fumetti</h1>
            <div class="row">
                
                @foreach ($comics as $comic)
                <div class="col-3">
                    
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $comic->image }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->name }}</h5>

                            @if( $comic->description )
                            <p class="card-text">{{ $comic->description }}</p>
                            @endif
                            <p class="card-text">{{ $comic->price }}£</p>
                            @if ( $comic->author )
                            <p class="card-text">{{ $comic->author }}</p>    
                            @endif
                            <a href="{{ route('comics.show', [
                                'comic' => $comic->id
                                ]) }}" class="btn btn-primary">
                                    Go somewhere
                            </a>

                            <a href="{{ route('comics.edit', [
                            'comic' => $comic->id
                            ]) }}" class="btn btn-secondary">
                                Modifica prodotto
                            </a>

                            <form action="{{ route('comics.destroy', [
                            'comic' => $comic->id
                            ] ) }}" method="post">

                                @csrf
                                @method('delete')

                                <input type="submit" value="Cancella" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                    
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection