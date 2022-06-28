<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Members extends Controller
{

    function dbOperation(){
//Aggregate method in min
//        $users = DB::table('users')->min('id');
//        return $users;

//Aggregate method in max
//        $users = DB::table('users')->max('id');
//        return $users;

//Aggregate method in sum
//        $users = DB::table('users')->sum('id');
//        return $users;

//Aggregate method in avg
//        $users = DB::table('users')->avg('id');
//        return $users;


//The skip & take Methods
//        $users = DB::table('users')
//            ->offset(3)
//            ->limit(2)
//            ->get();
//        return $users;

//whereNotNull method
//        $first = DB::table('users')
//            ->whereNotNull('email_verified_at')
//            ->get();
//        return $first;

//whereNotIn method
//        $users = DB::table('users')
//            ->whereNotIn('is_admin', [1, 2, 21])
//            ->get();
//        return $users;

//whereIn method
//        $users = DB::table('users')
//            ->whereIn('is_admin', [1, 2, 21])
//            ->get();
//        return $users;

//Additional Where Clauses whereBetween method
//        $users = DB::table('users')
//            ->whereBetween('is_admin', [1, 100])
//            ->get();
//        return $users;

//Or Where Clauses
//        $users = DB::table('users')
//            ->where('is_admin', '=', 1)
//            ->orWhere('name', 'Reno')
//            ->get();
//        return $users;

//Where Clauses
//        $users = DB::table('users')
//            ->where('is_admin', '>=', 1)
//            ->where('password', '=', 123456789)
//            ->get();
//        return $users;

//Unions using where null method
//        $first = DB::table('users')
//            ->whereNull('email_verified_at');
//
//        $users = DB::table('users')
//            ->whereNull('created_at')
//            ->union($first)
//            ->get();
//        return $users;

//Group By Raw Query
//        return DB::table('emp')
//            ->select('role', 'name')
//            ->groupByRaw('role, name')
//            ->get();

//Order By Raw Query
//        return DB::table('emp')
//            ->orderByRaw('join_date')
//            ->get();


//Join with crossJoin Query
//        return DB::table('users')
//            ->crossJoin('emp')
//            ->get();
//returns the Cartesian product of rows from the rowsets in the join

//Join with rightJoin Query
//        return DB::table('users')
//            ->rightJoin('emp', 'users.id', '=', 'emp.id')
//            ->get();
//show all data of right table(emp) and matching data of right table(users)

//Join with leftjoin Query
//        return DB::table('users')
//            ->leftJoin('emp', 'users.id', '=', 'emp.id')
//            ->get();
//show all data of left table(users) and matching data of right table(emp)

//Join Query
//        return DB::table('users')
//            ->join('emp','users.id',"=",'emp.id')
//            ->get();

//Join with select Query
//        return DB::table('users')
//            ->join('emp','users.id',"=",'emp.id')
//            ->select('users.*')
////            ->select('emp.*')
//            ->get();

//Join with where Query
//        return DB::table('users')
//            ->join('emp','users.id',"=",'emp.id')
//            ->where('users.id',1)
//            ->get();

//Delete Query
//        return DB::table('users')
//            ->where('id',34)
//            ->delete();

//Update Query
//        return DB::table('users')
//            ->where('id',4)
//            ->update([
//                    'name'=>'frizzy',
//                    'email'=>'frizzy659856@gmail.com',
//                    'password'=>'213125356165',
//                    'remember_token'=>'',
//                    'is_admin'=>'11'
//                    ]);

//Insert Query
//        return DB::table('users')
//            ->insert([
//                    'name'=>'finch',
//                    'email'=>'finch0777@gmail.com',
//                    'password'=>'8985465132',
//                    'remember_token'=>'',
//                    'is_admin'=>'1'
//                    ]);

//Using Count
//        return DB::table('users')->count();


//Using Find
//        return DB::table('users')->find(3);

//Where Condition
//        return DB::table('users')
//            ->where('id',2)
//            ->get();

//Show Data
        $data = DB::table('users')->get();
        return view('list',['data'=>$data] );
    }
}
