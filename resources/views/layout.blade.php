<!doctype html>
<html lang="tr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @stack('css')
    <title>@yield('title')</title>
</head>
<body>

@if (session()->has('success'))
    <div class="container-fluid p-0">
        <div class="alert alert-success rounded-0 text-center" role="alert">
            <b>{{ session('success') }}</b>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="container-fluid p-0">
        <div class="alert alert-danger rounded-0 text-center" role="alert">
            <b>Hata!</b> {{ session('error') }}
        </div>
    </div>
@endif

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::user()->role == '1')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        İşlemler
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('home.Index')  }}"><i class="fa fa-list"></i> Listem</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('home.Add')  }}"><i class="fa fa-plus"></i> Yeni
                                Ekle</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('home.Deactives')  }}"><i class="fa fa-trash"></i>
                                Çöp Kutusu</a></li>
                    </ul>
                </li>
                @else
                    <a class="navbar-brand" href="#">Yönetim Paneli</a>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.Logout')  }}">Çıkış yap</a>
                </li>
            </ul>
            @if (Auth::user()->role == '1')
            <form class="d-flex" action="/" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="search" placeholder="Ara" aria-label="Search">
                    <button class="btn btn-outline-success input-group-text" type="submit"><i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
            @endif
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>
</html>
