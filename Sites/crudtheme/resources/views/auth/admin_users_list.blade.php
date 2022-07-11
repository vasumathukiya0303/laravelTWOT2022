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
    <link rel="stylesheet" href="{{asset('/assets/css/custom.css')}}">
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.svg')}}" type="image/x-icon">
    <script src="{{asset('/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/assets/js/mazer.js')}}"></script>
</head>
<body>
<div class="container">
<div class="row p-5" id="table-striped">
    <div class="col-12 p-0">
        <div class="card">
            <div class="row m-0 card-header">
                <div class="col-3"><h3 class="card-title bold">User's List</h3></div>
                <div class="search-container col-6">
                    <ul class="pagination justify-content-center">
                        <form action="{{ route('search') }}" method="post" role="search">
                            @csrf
                            <div class="row">
                                <div class="col-9 p-0"> <input type="text" placeholder="Search.." name="search" class="form-control"></div>
                                <div class="col-3 p-0"><button type="submit" class="btn btn-primary">
                                        <i class="bi bi-search"></i>
                                    </button></div>


                            </div>
                        </form>
                    </ul>
                </div>
                <div class="col-3 ">
                    <a class="btn btn-primary float-end mx-4" href="{{route('newuser')}}">
                        <i class="bi bi-person-plus-fill" style='font-size:16px;'></i> Add New User
                    </a>
                </div>
            </div>
            <div>
                @if(session('feedback'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{session('feedback')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{session('status')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="mx-2">
            {{ Breadcrumbs::render('userslist') }}
            </div>
            <div class="card-content">
                <!-- table striped -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="table-primary">
                            <th>@sortablelink('id')</th>
                            <th>@sortablelink('name')</th>
                            <th>@sortablelink('email')</th>
                            <th>@sortablelink('phone')</th>
                            <th>@sortablelink('city')</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userslist as $user)
                            <tr class="table-primary">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->city}}</td>
                                <td><a href="{{route('showprofile',$user->id)}}" title="View User">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                            View
                                        </button>
                                    </a>
                                    <a href="{{route('editprofile',$user->id)}}" title="Edit User">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                  aria-hidden="true"></i> Edit
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ url('deleteprofile',$user->id) }}"
                                          accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact"
                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row pt-3" style="margin:0;">
                        <div class="offset-1 col-5">
                        {{ $userslist->links() }}
                        </div>
                        <div class="col-5 offset-1 mx-2">
                        <a class="btn btn-primary float-end"
                           href="{{route('admindashboard',$user->id)}}">
                            <i class="bi bi-arrow-left-circle" style='font-size:11px;'></i> Back
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
