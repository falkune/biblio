@extends('layouts.app')

@section('title', "lien expiré")

@section('content')
    <p>{{ session('invalide') }}</p>
    <form action="{{ route('get.new.link') }}" method="post">
        @csrf
        <input type="email" name="email">

        <button>Send Email</button>
    </form>
@endsection
