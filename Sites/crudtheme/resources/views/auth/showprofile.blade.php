{{--@yield('content')--}}
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
<div  class="offset-3 col-6 offset-3 pt-5 align-center">
    @if(auth()->user()->is_admin == 1)
        <h3 class="text-center">~: ADMIN DETAIlS :~</h3>
    @else
        <h3 class="text-center">~: USER DETAIlS :~</h3>
    @endif
    <div class="card-content ">
        <div class="card-body">
            <div class="list-group">
                <span class="list-group-item"><label>Id : </label> {{$contactData->id}} </span>
                <span class="list-group-item"><label>Name : </label> {{$contactData->name}} </span>
                <span class="list-group-item"><label>Email : </label> {{$contactData->email}} </span>
                <span class="list-group-item"><label>Phone : </label> {{$contactData->phone}} </span>
                <span class="list-group-item"><label>City : </label> {{$contactData->city}} </span>
            </div>
        </div>
    </div>
    <div>
        @if(auth()->user()->is_admin == 1)
            @if(auth()->user()->id == $showData && auth()->user()->is_admin == 1)
            <a class="btn btn-primary float-end" href="{{route('admindashboard',$showData)}}">
                <i class="bi bi-arrow-left-circle" style='font-size:11px;'></i> Back to Dashboard
            </a>
            @else
            <a class="btn btn-primary float-end" href="{{route('userslist')}}">
                <i class="bi bi-arrow-left-circle" style='font-size:11px;'></i> Back to User's List
            </a>
            @endif
        @else
            <a class="btn btn-primary float-end" href="{{route('dashboard')}}">
                <i class="bi bi-arrow-left-circle" style='font-size:11px;'></i> Back to Dashboard
            </a>
        @endif
    </div>
</div>
</body>
