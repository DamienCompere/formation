<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view ('back.post.index', ['posts'=>$posts]); // Affiche tous les formations
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //formulaire de creation 
        $categories = Category::pluck('name', 'id')->all();
        $posts = Post::groupBy('post_type')->pluck('post_type');

        return view ('back.post.create', compact('categories', 'posts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation des champs dans le formulaire
       
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required', 
            'start_date'=>'required', 
            'end_date'=>'required |after:start_date',
            'price'=>'required',
            'nb_max'=>"required",
            'status'=>'required'
        ]);

        $post = Post::create($request->all());

        //gestion de l'image 
        $im = $request->file('picture');

        if(!empty($im)){
            //methode store retourne une link hash securisé
            $link = $request->file('picture')->store('images');

            //mettre à jour la table picture 
            $post->picture()->create([
                'link'=> $link,
                'title'=>$request->title_image ?? $request->title
            ]);
        }
        // Attache les catégories avec les posts
        $post->categories()->attach($request->categories);
        return redirect()->route('post.index')->with('message', 'sucess');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view ('back.post.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   //On récupère les infos du poste
        $post = Post::find($id);
        //On récupère les catégories
        $categories = Category::pluck('name', 'id');
        //on récupère les post_type
        $posts = Post::groupBy('post_type')->pluck('post_type');

        return view ('back.post.edit', compact('post', 'categories', 'posts'));
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //On récupère le post a modifier 
        $post = Post::find($id);
        
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required', 
            'start_date'=>'required', 
            'end_date'=>'required |after:start_date',
            'price'=>'required',
            'nb_max'=>"required",
            'status'=>'required'
        ]);
       
        $new_pic = $request->file('picture');

        if($new_pic != null ){
            $link = $request->picture->store('');

            if($post->picture()->exists()):
            Storage::disk('local')->delete($post->picture->link); // supprimer physiquement l'image

            //mettre à jour la table picture 
            $post->picture()->update([
                'link'=> $link,
            ]);
            else:
                $post->picture()->create([
                    'link'=> $link,
                ]);
            endif;
        }

        $post->update($request->except('picture')); //mettre à jour les données d'un post
        $post->categories()->sync($request->categories); //synchronise les données avec la table de liaison
        $post->save();

        return redirect()->route('post.index')->with('message','sucess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //On récupère le post 
        $post = Post::find($id);

        //On supprime le post en question
        $post->delete();

        return redirect()->route('post.index')->with('message', 'sucess');
    }

    public function searchback(Request $request){

        $this->validate($request, [
            'word' => 'string|required|max:200'
        ]);
        
        $word = $request->word;
        $posts = Post::where('title', 'like', "%$word%")
            ->orWhere('description', 'like', "%$word%")
            ->orWhereHas('categories', function($q) use ($word) { 
                $q->where('name', 'like', "%$word%");
            })
            ->paginate(5);

        $posts->appends(['word' => $word]);

        $message = (count($posts) > 0 )? 'Nous avons des résultats' : 'Nous avons rien trouvé, désolé';

        return view('back.post.searchback', compact('posts'))->with($message);
    
    }
    
}
