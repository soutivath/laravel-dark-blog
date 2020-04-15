<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use Storage;
use App\Post;
class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session()->forget('edit');
        $types = Type::orderBy('type_id','desc')->paginate(10);
        return view('page/admin/type/Typeindex',compact('types',$types));
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
    public function store(Request $request)
    {
        $request->validate(
        [
            'Type_Name' => 'required|min:3|max:30|string',
            'description'=>'required|min:3|max:100|string',
        ]);
        $type = new Type(
            [
                'name' => $request->input('Type_Name'),
                'description' => $request->input('description')
            ]
            );
        $type->save();

        return redirect()->route('type.index')->with('Tmsg','Add new type successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $types = Type::orderBy('type_id','desc')->paginate(10);
        $stype = Type::find($id);
        session()->flash('edit','editnable');
        return view('page/admin/type/Typeindex',compact('types',$types))->with('stype',$stype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'Type_Name' => 'required|min:3|max:30|string',
                'description'=>'required|min:3|max:100|string',
            ]
        );
        $type = Type::find($id);
        $type->name = $request->input('Type_Name');
        $type->description = $request->description;
        $type->save();
        return redirect()->route('type.index')->with('Tmsg','Edit a type successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $type = Type::find($id);
      /* if($posts = Post::where('type_id','=',$id)->comments('post_id')->get())
       {
          $posts->each->delete();
       }*/
      
      // $type->posts->each->delete(); 
      $posts = $type->posts->each->coverImage;
      foreach($posts as $post)
      {
        $checkDefault = $post->coverImage;
        $path = public_path().'/cover_image/'.$post->coverImage;
        if(\file_exists($path)&&$checkDefault!="default_image.jpg")
        {
         unlink(public_path().'\cover_image/'.$post->coverImage);
         if(\file_exists($path)&&$checkDefault!="default_image.jpg")
         {
          unlink(public_path().'\cover_image/'.$post->coverImage);
         }
        }
      }
      $type->delete();
        return redirect()->route('type.index')->with('Tmsg','Delete a type successfully');;



    //  $paths = public_path().'/cover_image/'.$type->posts->coverImage;
    //  $checkDefault = $type->posts->coverImage;
    /* if(\file_exists($path)&&$checkDefault!="default_image.jpg")*/
     // {
      // unlink(public_path().'\cover_image/'.$type->posts->coverImage);
     // }

       
    }
}
