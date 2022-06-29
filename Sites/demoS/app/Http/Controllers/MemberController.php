<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;

class MemberController extends Controller
{
    function addData(Request $request){
        $member = new member;
        $member->id=$request->id;
        $member->role=$request->role;
        $member->join_date=$request->date;
        $member->name=$request->name;
        $member->save();
        return redirect('add');
    }
}
