<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $land = Land::with('contact')->first();
//        dd($land->toArray());
//        return $land->contact;
        return $land->all();
//           $land = Land::with(['contact'])->find(1);
//           return $land->toArray();
    }
}
