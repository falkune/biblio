@extends('layouts.app')


@section('title', "Ajouter un livre")

@section('content')

    <div class="container">
        <h1>Ajouter un livre</h1>

        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <form action="/ajout-livre" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Titre --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="titre" aria-describedby="emailHelp">
            </div>
            {{-- Annee --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Annee</label>
                <input type="date" class="form-control" id="exampleInputEmail1" name="date" aria-describedby="emailHelp">
            </div>
            {{-- image --}}
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Photo couverture</label>
              <input type="file" class="form-control" id="exampleInputEmail1" name="photo" aria-describedby="emailHelp">
            </div>
            {{-- auteur --}}
            <div class="mb-3">
                <select class="form-select form-select-lg mb-3" name="auteur" aria-label="Large select example">
                    <option selected>Selectionnez l'auteur</option>
                    @foreach ($auteurs as $auteur)
                        <option value="{{ $auteur->id }}">{{ $auteur->prenom }} {{ $auteur->nom }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

@endsection
