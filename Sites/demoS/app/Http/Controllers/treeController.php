<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tree;
use Illuminate\Support\Facades\Http;

class treeController extends Controller
{
    function index(){
        return Tree::all();

//        $tree = new Tree;
//        $tree->name="PHP";
//        $tree->email="aa343bibi@gmail.com";
//        $tree->address="Jatipura";
//        $tree->save();

        // Integer convert into boolean for specific row find by ID
//          $tree = Tree::find(2);
//          dd($tree->is_publish);

        //name convert into encrypted ...
//        Tree::create([
//            'name'=>'AADDDERRFGFFGG',
//        ]);

//        $posts = Http::request('https://jsonplaceholder.typicode.com/posts');
//        return response($posts->json(),200);
//
//    }
//    public function all_posts(){
//        $response = $this->getJson('api/posts')->dump()->assertOk();
    }
}
