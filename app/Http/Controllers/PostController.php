<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Post;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    protected $redirectPath = '/auth/login';
    protected $postPath = '/post/show/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $author_user_id = Auth::user()->id;
        $recipient_user_id = $request->recipient_user_id;
        $post_content = $request->post_content;

        Post::createPost($author_user_id, $recipient_user_id, $post_content);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $post_id
     * @return Response
     */
    public function show($post_id)
    {
        $post = Post::getPost($post_id);

        return view('post.post', [ 'user' => Auth::user(), 'post' => $post ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
