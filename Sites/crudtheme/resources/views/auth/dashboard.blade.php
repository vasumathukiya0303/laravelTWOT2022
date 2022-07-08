<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/custom.css')}}" >
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.svg')}}" type="image/x-icon">
    <script src="{{asset('/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/assets/js/mazer.js')}}"></script>
</head>
<body>
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a class="btn btn-primary pt-2 mt-3" href="{{ route('signout') }}"
               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('signout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <a class="navbar-brand dlogo float-end ms-5">
                <div class="avatar me-3">
                    <i class="bi bi-person-circle" style="font-size:40px"></i>
                </div>
            </a>
            <div></div>
            <div class="dropdown float-end mt-2">
                <button type="button" class="btn btn-primary dropdown-toggle"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('showprofile',$showDisplayData)}}">User Profile Details</a>
                    <a class="dropdown-item" href="{{route('editprofile',$showDisplayData)}}">Edit Profile</a>
                    <a class="dropdown-item" href="#">Setting</a>
                    @if(auth()->user()->is_admin == 1)
                        <a class="dropdown-item" href="{{route('showprofile',$showDisplayData)}}">Admin Profile Details</a>
                        <a class="dropdown-item" href="{{route('userslist')}}">User's List</a>
                        <a class="dropdown-item" href="#">Setting</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <div class="pt-3 pb-1">

    </div>
    <div class="jumbotron">
        <h5>Welcome, {{ auth()->user()->email }}</h5>
        @if(session('feedback'))
            <div class="alert alert-success alert-dismissible show fade">
                {{session('feedback')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('failed'))
            <div class="alert alert-danger alert-dismissible show fade">
                {{session('failed')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="display-3">Mazer Theme</h1>
        <p class="lead">This is a simple auth starter setup for laravel 8 theme integration</p>
        <hr class="my-4">
        <h2>Features:</h2>
        <ul>
            <li>User Login</li>
            <li>User Registration</li>
            <li>Email Verification</li>
            <li>Forget Password</li>
            <li>Reset Password</li>
        </ul>
    </div>
</div>
</body>

