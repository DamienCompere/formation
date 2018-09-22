<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// use Illuminate\Support\Facades\Input;
use Mail;

class FrontController extends Controller
{


    public function index(){
        
        $posts = Post::published()->limit(2)->get();
        
        return view('front.index', ['posts'=>$posts]);

    }

    public function show(int $id){
        //On cherche le post en question
        $post = Post::find($id);

        return view('front.show', ['post'=>$post]);
    }

    public function showStage(){
        // On récupère les posts avec le champs stage
        $posts= Post::where('post_type', '=', 'stage')->where('status', '=', 'published')->get();
        // $posts = DB::table('posts')->where('post_type', 'stage')->get();

        return view('front.stage', ['posts'=>$posts]);
    }

    public function showFormation(){
        // $posts = DB::table('posts')->where('post_type', 'formation')->get();
        $posts = Post::where('post_type', "=", 'formation')->where('status', '=', 'published')->get();
        
        return view('front.formation', ['posts'=>$posts]);
        
    }

    public function search(Request $request){

            $this->validate($request, [
                'word' => 'string|required|max:200'
            ]);
            
            $word = $request->word;
            $posts = Post::where('title', 'like', "%$word%")->where('status', '=', 'published')
                ->orWhere('description', 'like', "%$word%")->where('status', '=', 'published')
                ->orWhereHas('categories', function($q) use ($word) { 
                    $q->where('name', 'like', "%$word%");
                })->where('status', '=', 'published')
                ->paginate(5);

            $posts->appends(['word' => $word]);
    
            $message = (count($posts) > 0 )? 'Nous avons des résultats' : 'Nous avons rien trouvé, désolé';

            return view('front.search', compact('posts'))->with($message);
        
    }

    public function contact(){

        return view ('front.contact');
    }

    public function mailer(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'message'=>'required'
        ]);

        Mail::send('emails.contact-message',[
            'msg' => $request->message,
            'email_adress'=>$request->email
        ], function($mail) use($request){
            $mail->from($request->email);

            $mail->to('compere@contact.com')->subject('Contact message');
        });

        return redirect()->back()->with('message', 'Votre mail a été envoyé avec succès');
    }
}
