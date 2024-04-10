@extends('layouts.app')

@section('title', "Connexion")

@section('content')

    <div class="container">
        <form action="/connexion" method="post">
            @csrf
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
            <button>Login</button>
        </form>
    </div>

@endsection
