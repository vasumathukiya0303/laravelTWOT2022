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
<div class="offset-3 col-md-6 offset-3 pt-5">
    <div class="card">
        <div class="mt-1 mx-2">
            @if(auth()->user()->is_admin == 1)
        {{ Breadcrumbs::render('editprofile') }}
            @endif
                @if(auth()->user()->is_admin == 0)
                    {{ Breadcrumbs::render('editprofileuser') }}
                @endif
        </div>
        <div class="card-header">
            <h4 class="card-title">Edit User Details :~ </h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="form-body">
                    <div class="row">
                        <form method="post" action="{{ route('editprofiles',$contactData->id) }}">
                            @csrf
                            <input type="hidden" name="id" class="form-control"
                                   id="id-icon" value="{{$contactData->id}}" readonly>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Name</label>
                                    <div class="position-relative">
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Name" id="first-name-icon" value="{{$contactData->name}}">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Email</label>
                                    <div class="position-relative">
                                        <input type="text" name="email" class="form-control" placeholder="Email"
                                               id="email-id-icon" value="{{$contactData->email}}">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="mobile-id-icon">Phone</label>
                                    <div class="position-relative">
                                        <input type="text" name="phone" class="form-control" placeholder="Mobile Number"
                                               id="mobile-id-icon" value="{{$contactData->phone}}">
                                        <div class="form-control-icon">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="city-id-icon">City</label>
                                    <div class="position-relative">
                                        <input type="text" name="city" class="form-control" placeholder="City"
                                               id="city-id-icon" value="{{$contactData->city}}">
                                        <div class="form-control-icon">
                                            <i class="bi bi-geo-alt"></i>
                                        </div>
                                    </div>
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary me-1 mb-1">Update</button>
                                @if(auth()->user()->is_admin == 1)
                                    <a class="btn btn-light-secondary me-1 mb-1"
                                       href="{{ route('admindashboard',$contactData) }}">
                                        {{ __('Cancel') }}
                                    </a>
                                @else
                                    <a class="btn btn-light-secondary me-1 mb-1" href="{{ route('dashboard') }}">
                                        {{ __('Cancel') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                        <form method="post" action="{{ route('editpassword') }}">
                            @csrf
                            <input type="hidden" name="id" class="form-control"
                                id="id-icon" value="{{$contactData->id}}" readonly>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder="Password"
                                               id="password-id-icon" name="password">
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="cpassword-id-icon">Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder="Confirm Password"
                                               id="cpassword-id-icon" name="cpassword">
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                    {!! $errors->first('cpassword', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class='form-check'>
                                    <div class="checkbox mt-2">
                                        <input type="checkbox" id="remember-me-v" class='form-check-input'
                                               checked>
                                        <label for="remember-me-v">Remember Me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                @if(auth()->user()->is_admin == 1)
                                    <a class="btn btn-light-secondary me-1 mb-1"
                                       href="{{ route('admindashboard',$contactData) }}">
                                        {{ __('Cancel') }}
                                    </a>
                                @else
                                    <a class="btn btn-light-secondary me-1 mb-1" href="{{ route('dashboard') }}">
                                        {{ __('Cancel') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
