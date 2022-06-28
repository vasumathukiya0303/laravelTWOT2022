<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blogPost(Request $request){
//        $title = $request->title;
//        echo $title;
        $id = $request->id;
            $blog = Blog::find($id);
            $blog -> name = $request -> name;


            $blog -> save();
//            dd($blog);
    }
}
