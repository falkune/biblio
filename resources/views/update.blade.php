@extends('layouts.app')

@section('title', 'modification')

@section('content')


    <form action="/update" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" name="id" value="{{ $id }}" hidden>
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

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>


@endsection
