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
<div class="row" id="table-striped">
    <div class="col-12">
        <div class="card">
            <div class="row card-header">
                <div class="col-6"><h3 class="card-title bold">User's List</h3></div>
                <div class="col-6 ">
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
            <div class="card-content">
                <!-- table striped -->
                <div class="table-responsive">
                    <table class="table mb-0 table-bordered">
                        <thead>
                        <tr class="table-primary">
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>CITY</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userslist as $user)
                            <tr class="table-primary">
                                <td>{{$user->id}}</td>
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
                    <div class="pt-3 mx-5 pb-3">
                        <a class="btn btn-primary float-end" href="{{route('admindashboard',$user->id)}}">
                            <i class="bi bi-arrow-left-circle" style='font-size:11px;'></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
