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
    <style>
        .side-nav {
            width: 250px;
            height: calc(100vh - 80px);
            position: fixed;
            top: 80px;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            z-index: 1000;
        }
        .side-nav .nav-link {
            color: #fff;
            padding: 15px 20px;
            border-bottom: 1px solid #4b545c;
        }
        .side-nav .nav-link:hover {
            background-color: #4b545c;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            margin-top: 80px;
        }
        .no-sidebar {
            margin-left: 0;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <!-- Top Navigation Bar -->
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" 
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <!-- Side Navbar will be separate -->
                
                <ul class="navbar-nav ml-md-auto d-md-flex">
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
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
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

    <!-- Side Navigation Bar - Only show when admin is logged in -->
    @auth('admin')
    <div class="side-nav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admins.dashboard') }}">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Admins
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Hotels
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Rooms
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Bookings
                </a>
            </li>
        </ul>
    </div>
    @endauth

    <!-- Main Content Area -->
    <div class="container-fluid @guest('admin') no-sidebar @endguest" style="margin-top: 80px;">
        <main class="py-4">
            <!-- Content will be displayed here -->
            @if(auth()->guard('admin')->check())
                <div class="row">
                    <div class="col-12">
                        <h1>Admin Dashboard</h1>
                        <p>Welcome to the admin panel!</p>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Dashboard Overview</h5>
                                <p class="card-text">You are successfully logged in as admin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- This content will show on login page -->
                @yield('content')
            @endif
        </main>
    </div>
</div>
</body>
</html>