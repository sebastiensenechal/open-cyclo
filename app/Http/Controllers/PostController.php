<?php

namespace App\Http\Controllers;

use App\Post;
// use Illuminate\Http\Request;
use App\Http\Requests\Post as PostRequest;
// use App\Repositories\PostRepository;
// use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    // protected $postRepository;
    //
    // protected $nbrPerPage = 4;
    //
    // public function __construct(PostRepository $postRepository)
  	// {
    // 		$this->middleware('auth', ['except' => 'index']);
    // 		$this->middleware('admin', ['only' => 'destroy']);
    //
    // 		$this->postRepository = $postRepository;
  	// }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
   	{
     		// $posts = $this->postRepository->getPaginate($this->nbrPerPage);
     		// $links = $posts->render();
        //
     		// return view('liste', compact('posts', 'links'));

        $posts = Post::paginate(8);
        return view('liste', compact('posts'));
   	}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(PostRequest $postRequest)
     {
       Post::create($postRequest->all());
       return redirect()->route('posts.index')->with('info', 'Le film a bien été créé');
     }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('show', compact('post'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('edit', compact('post'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $postRequest, Post $post)
    {
        $post->update($postRequest->all());
        return redirect()->route('posts.index')->with('info', 'Le film a bien été modifié');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Post $post)
   	 {
       $post->delete();
       return back()->with('info', 'Le film a bien été supprimé dans la base de données.');
   	 }
}
