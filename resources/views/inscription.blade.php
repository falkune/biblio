@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
    <div>
        <h1>inscription</h1>
        <form action="/inscription" method="post">
            @csrf
            {{-- nom --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nom" aria-describedby="emailHelp">
                <span class="text-danger">
                    @error('nom')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            {{-- prenom --}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="prenom" aria-describedby="emailHelp">
                <span>
                    @error('prenom')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            {{-- email --}}
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
              <span>
                @error('email')
                    {{ $message }}
                @enderror
            </span>
            </div>
            {{-- password --}}
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              <span>
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
