@extends('layouts.app')

@section('title', "page accueil")

@section('content')
    <div class="books">
        @foreach ($livres as $livre)
            @if ($livre->disponibilite)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('uploads/'. $livre->image) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $livre->titre }}</h5>
                        <p class="card-text">{{ $livre->annee_de_sortie }}</p>
                        <p class="card-text">{{ $livre->auteur->prenom }}</p>
                        <div class="d-flex justify-content-between">
                            @auth
                                @if (Auth::user()->type == "admin")
                                    <a href="{{ route('delete', ['id' => $livre->id]) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                @endif
                            @endauth
                            <a href="{{ route('details', ['id' => $livre->id]) }}" class="btn btn-primary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            @auth
                                @if (Auth::user()->type == "admin")
                                    <a href="{{ route('update-form', ['id' =>  $livre->id]) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
