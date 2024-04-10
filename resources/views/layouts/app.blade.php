<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        @section('sidebar')
            <nav class="navbar navbar-expand-lg bg-body-tertiary w-100">
                <div class="container-fluid">
                <a class="navbar-brand" href="/">BIBLIO</a>

                @guest
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" href="/connexion">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/inscription">Inscription</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex justify-content-end">
                            <li class="nav-item">
                                <a href="{{ route('accueil', [ 'id' => Auth::user()->id ]) }}" class="btn btn-light">{{ Auth::user()->prenom }}</a>
                            </li>
                            @if (Auth::user()->type == "admin")
                                <li class="nav-item">
                                    <a class="nav-link" href="/ajout-livre">Ajouter Livre</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="btn btn-danger">Deconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest

            </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
