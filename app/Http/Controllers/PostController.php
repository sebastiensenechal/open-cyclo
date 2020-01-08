<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Post;
use App\{Post, User};
use Auth;
use App\Http\Requests\Post as PostRequest;
// use App\Repositories\PostRepository;
// use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
   	{
        // $posts = Post::paginate(5);
        $posts = Post::oldest('titre')->paginate(10);
        return view('liste', compact('posts'));
   	}



    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $this->authorize('create', new Post);
        return view('create');
    }




    /**
     * Store a newly created resource in storage.
     * @param  App\Http\Requests\PostRequest  $postRequest
     * @return \Illuminate\Http\Response
     */
     public function store(PostRequest $postRequest, User $user)
     {
         $this->authorize('store', new Post);

         $user = auth()->user();
         $data = $postRequest->all();
         $data['user_id']=$user->id;

         Post::create($data);

         return redirect()->route('posts.index')->with('info', 'Votre article a bien été créé');
     }




    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('show', compact('post'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, User $user)
    {
        $this->authorize('edit', new Post);

        return view('edit', compact('post'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Http\Requests\PostRequest  $postRequest
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $postRequest, Post $post, User $user)
    {
        $this->authorize('update', new Post);

        $post->update($postRequest->all());
        return redirect()->route('posts.index')->with('info', 'Votre article a bien été modifié');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
     public function destroy(Post $post, User $user)
   	 {
        $this->authorize('destroy', new Post);

        $post->delete();
        return redirect()->route('posts.index')->with('info', 'Votre article a bien été supprimé avec succès.');
   	 }
}
