<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="wrapper" style="margin-left: 30px; padding: 0px 10px 0px;">
        <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    @auth('admin')
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.dashboard') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Admins</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Hotels</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Rooms</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bookings</a>
                            </li>
                        </ul>
                    @endauth

                    <ul class="navbar-nav ml-auto">
                        @auth('admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::guard('admin')->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('view.login') }}">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid" style="margin-top: 80px;">
            <main class="py-4">
                @if (auth()->guard('admin')->check())
                    <!-- Dashboard Content -->
                    <div class="row">
                        <div class="col-12">
                            <h1>Admin Dashboard</h1>
                            <p>Welcome to the admin panel!</p>
                        </div>
                    </div>

                    <!-- Dashboard Cards -->
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Hotels</h5>
                                    <h2 class="display-4">8</h2>
                                    <p class="card-text">number of hotels: 8</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-success">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Rooms</h5>
                                    <h2 class="display-4">4</h2>
                                    <p class="card-text">number of rooms: 4</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card text-white bg-info">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Admins</h5>
                                    <h2 class="display-4">3</h2>
                                    <p class="card-text">number of admins: 3</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Dashboard Overview</h5>
                            <p class="card-text">You are successfully logged in as admin.</p>
                        </div>
                    </div>
                @else
                    @yield('content')
                @endif
            </main>
        </div>
    </div>
</body>

</html>
