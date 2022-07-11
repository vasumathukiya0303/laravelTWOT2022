<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

//Admin Dashboard
Breadcrumbs::for('admindashboard', function ($trail) {
    $trail->push('admindashboard', route('admindashboard'));
});
//Admin User List
Breadcrumbs::for('userslist', function ($trail) {
    $trail->parent('admindashboard');
    $trail->push('userslist', route('userslist'));
});
//Admin Edit User
Breadcrumbs::for('editprofile', function ($trail) {
    $trail->parent('userslist');
    $trail->push('editprofile', route('editprofile'));
});
//User Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('dashboard', route('dashboard'));
});
//User Edit
Breadcrumbs::for('editprofileuser', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('editprofile', route('editprofile'));
});
