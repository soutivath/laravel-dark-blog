<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Type;
use App\User;
use App\Comment;
use Image;
use Storage;
use Purifier;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function main()
    {
        $allcomment = count(Comment::all());
        $allpost = count(Post::all());
        $allType = count(Type::all());
        $allmember = count(User::all());
        $allstate = array('posts'=>$allpost,'comments'=>$allcomment,'types'=>$allType,'users'=>$allmember);
        return view('page/admin/adminindex')->with('allstate',$allstate);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('post_id','desc')->paginate(20);
        return view('page/admin/post/adminindex',compact('posts',$posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $types = Type::all();
        return view('page/admin/post/create',compact('types',$types));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255|string',
            'body' => 'required|min:10|max:65500|string',
            'coverImage' =>'sometimes|image|mimes:jpeg,png,jpg,PNG|max:8192',
            'type'=> 'required',
            
        ]);
        $defaultImage = "default_image.jpg";
        if($request->hasFile('coverImage'))
        {
            $image = $request->file('coverImage');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = 'cover_image_'.time().'.'.$fileExtension;
            $location = public_path("/cover_image/".$fileName);
            Image::make($image)->resize(800,600,function($c) { $c->aspectRatio(); })->save($location);
            $defaultImage= $fileName;
        }
        $posts = new Post(
            [
                'title' => $request->input('title'),
                'body' => Purifier::clean($request->input('body')),
                'coverImage' => $defaultImage,
                'type_id'=> $request->type,
                'user_id'=>Auth::id()
            ]
        );
        $posts->save();
        return redirect('admin/post')->with('Pmsg','Create Post successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('view',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        $currentType = $posts->types->type_id;
        $types = Type::all();
        return view('page/admin/post/edit',compact('posts',$posts))->with('currentType',$currentType)->with('types',$types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|min:5|max:255|string',
            'body' => 'required|min:10|max:65500|string',
            'coverImage' =>'sometimes|image|mimes:jpeg,png,jpg,PNG|max:8192',
            'type'=> 'required',
        ]);
        $posts = Post::find($id);
        $posts->title = $request->input('title');
        $posts->body = Purifier::clean($request->input('body'));
        $posts->type_id = $request->type;
        if($request->hasFile('coverImage'))
        {
            $path = public_path().'/cover_image/'.$posts->coverImage;
            $checkDefault = $posts->coverImage;
           if(\file_exists($path)&&$checkDefault!="default_image.jpg")
            {
             unlink(public_path().'\cover_image/'.$posts->coverImage);
            }
            $getFile = $request->file('coverImage');
            $getFileExtension = $getFile->getClientOriginalExtension();
            $getFullFileName = 'cover_image'.time().'.'.$getFileExtension;
            $location = public_path('cover_image/'.$getFullFileName);
            Image::make($getFile)->resize(1366,768,function($c) { $c->aspectRatio(); })->save($location);
            $posts->coverImage = $getFullFileName;
        }
        

       
        
        $posts->save();
        return redirect('admin/post')->with('Pmsg','Update Post successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
       $path = public_path().'/cover_image/'.$post->coverImage;
       $checkDefault = $post->coverImage;
      if(\file_exists($path)&&$checkDefault!="default_image.jpg")
       {
        unlink(public_path().'\cover_image/'.$post->coverImage);
       }
        $post->delete();
        return redirect('admin/post')->with('Pmsg','Delete Post successfully');;
    }
}
