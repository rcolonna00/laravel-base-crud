@extends('layouts.app')

@section('main_content')
    <section>
        <div class="container">

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

            <h1>Ciao sono un nuovo prodotto</h1>
            
            <!-- Start Create form -->
            <form action="{{ route('comics.store') }}" method="POST">
                @csrf
                @method('POST')
                
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="author">Autore</label>
                    <input type="text" class="form-control" name="author" id="name">
                </div>

                <div class="form-group">
                    <label for="image">Immagine</label>
                    <input type="text" class="form-control" name="image" id="name">
                </div>

                <div class="form-group">
                    <label for="price">Prezzo</label>
                    <input type="text" class="form-control" name="price" id="name">
                </div>

                <input type="submit" class="btn btn-primary" value="Salva nuovo prodotto">

            </form>
            
            <!-- End Create form -->
        </div>
    </section>
@endsection