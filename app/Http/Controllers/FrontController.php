<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{
    public function index(){
        
        $posts = Post::all();
        return view('front.index', ['posts'=>$posts]);
    }

    public function show(int $id){
        return Post::find($id);
    }
}
