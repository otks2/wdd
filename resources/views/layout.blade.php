<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AEC LEGO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style type="text/css">
        .hop {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
        }

        .hoprow {
            display: grid;
        }

        .hopitem {
            background-color: #eee;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3">
        <a href="{{route('legos.index')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">AEC LEGO</span>
        </a>
        <ul class="nav nav-pills">
            @if(session('username'))
                <li class="nav-item dropdown">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-dark" id="adminDropdown" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ session('username') }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                            @if (session('role') == 'Admin')
                            <li><a class="dropdown-item" href="{{route('dashboard.index')}}">Admin Dashboard</a>
                            @endif
                            <form action="/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                        </ul>
                    </div>
                </li>
            @else
                <li class="nav-item"><a href="/login" class="nav-link text-dark">Login</a></li>
            @endif
        </ul>
    </header>
</div>
<div class="container" style="background-color: #BED7DC;">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="{{route('legos.index')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4 text-dark ">Home</span>
        </a>
        <ul class="nav nav-pills">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="search">
                <button type="submit">Search</button>
            </form>
        </ul>
    </header>
</div>
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
