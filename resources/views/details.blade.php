@extends('layouts.app')


@section("title", "details du livre")


@section('content')

    <div class="container">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('uploads/'. $livre->image) }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $livre->titre }}</h5>
                <p class="card-text">{{ $livre->annee_de_sortie }}</p>
                <p class="card-text">{{ $livre->auteur->prenom }}</p>
                <div class="d-flex justify-content-between">

                    @auth
                        <a href="{{ route('emprunter', ['id' => $livre->id]) }}" class="btn btn-primary">
                            emprunter
                        </a>
                        @if (Auth::user()->type == "admin")
                            <a href="/modifier" class="btn btn-primary">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

@endsection

