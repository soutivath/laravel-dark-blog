<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Auth;
use App\Post;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
        $this->middleware('admin')->only('index','destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        $post = Post::find($post_id);
        $comments = Comment::where('post_id',$post_id)->paginate(10);
      //$comments = Post::find($post_id)->with('comments')->get();
      
        return view('page/admin/post/comment')->with('comments',$comments)->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {
        $request->validate([
            'body' => 'required|max:255|min:1|string'
        ]);
        $comment = new Comment(
            [
                'body' => $request->input('body'),
                'user_id' => Auth::user()->user_id,
                'post_id' => $post_id,
                
            ]
        );
        $comment->save();
        return redirect()->route('view',$post_id)->with('vpMsg','Post a Comment Successfully');
     // return redirect()->back();
    // return redirect()->intended(route('post.show',$post_id));
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->delete();
        return redirect()->back()->with('Mmsg','Delete a Comment Successfully');
        //->route('post.comment',$post_id);
    }
}
