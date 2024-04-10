@extends('layouts.app')

@section('title', 'accueil')

@section('content')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th>Titre du livre</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emprunts as $emprunt)
                <tr>
                    <td>{{ $emprunt->id }}</td>
                    <td>{{ $emprunt->livre->titre }}</td>
                    <td>{{ $emprunt->date_debut }}</td>
                    <td>{{ $emprunt->date_fin }}</td>
                    <td>
                        @if (!$emprunt->date_fin)
                            <a class="btn btn-success" href="{{ route('restituer', [ 'id_emprunt' => $emprunt->id, 'id_livre' => $emprunt->livre->id ]) }}">Restituer</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
