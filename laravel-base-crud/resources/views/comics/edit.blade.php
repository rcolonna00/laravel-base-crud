@extends('layouts.app')

@section('main_content')
    <section>
        <div class="container">
            <h1>Modifica Prodotto: {{ $comic->name }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Create Post Form -->
            
            <!-- Start Edit form -->
            <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
                
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $comic->name }}">
                </div>

                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $comic->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="author">Autore</label>
                    <input type="text" class="form-control" name="author" id="name" value="{{ $comic->author }}">
                </div>

                <div class="form-group">
                    <label for="image">Immagine</label>
                    <input type="text" class="form-control" name="image" id="name" value="{{ $comic->image }}">
                    <img style="max-height: 100px" src="{{ $comic->image }}" alt="">
                </div>

                <div class="form-group">
                    <label for="price">Prezzo</label>
                    <input type="text" class="form-control" name="price" id="name" value="{{ $comic->price }}">
                </div>

                <input type="submit" class="btn btn-primary" value="Salva nuovo prodotto">

            </form>
            <!-- End Edit form -->

        </div>
    </section>
@endsection