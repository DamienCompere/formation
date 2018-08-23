<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Input;

class FrontController extends Controller
{
    public function index(){
        
        $posts = Post::published()->limit(2)->get();
        // $posts = Post::orderBy( 'start_date','DESC')->paginate(2)->get();
        // $posts = DB::table('posts')->orderBy('start_date','desc')->paginate(2)->get();

        return view('front.index', ['posts'=>$posts]);
    }

    public function show(int $id){
        //On cherche le post en question
        $post = Post::find($id);
        return view('front.show', ['post'=>$post]);
    }

    public function showStage(){
        // On récupère les posts avec le champs stage
        $posts= Post::where('post_type', '=', 'stage')->get();
        // $posts = DB::table('posts')->where('post_type', 'stage')->get();

        return view('front.stage', ['posts'=>$posts]);
    }

    public function showFormation(){
        // $posts = DB::table('posts')->where('post_type', 'formation')->get();
        $posts = Post::where('post_type', "=", 'formation')->get();
        return view('front.formation', ['posts'=>$posts]);
        
    }

    public function search(){
        $q = Input::get('q');
        if($q != ' '){
            $posts = Post::where('title', 'LIKE', '%' . $q . '%')
            ->orWhere('description', 'LIKE', '%' . $q . '%')
            ->get();

            if(count($posts) > 0){
                return view('front.search')->withDetails($posts)->withQuery($q);
            }
        }
        return view('front.search')->withMessage('Rien trouvé Antoine !');
    }
}
