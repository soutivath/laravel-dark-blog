<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Hash;
use App\Comment;
use App\Type;
use Auth;
use App\Replycomment;
use App\User;
use Mail;
use Session;

class mainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','showPost','about','showCategory','showReply');
    }
   
    public function index()
    {
        $posts = Post::orderBy('post_id','desc')->paginate(8);
        $types = Type::with('posts')->get();
        
        return view('page.main',\compact('posts',$posts))->with('types',$types);
    }
    public function showPost($post_id)
    {
        $comments = Comment::where('post_id',$post_id)->paginate(10);
        $posts = Post::find($post_id);
        return view('page/user_view',compact('posts',$posts))->with('comments',$comments);
    }
    public function contact()
    {
        return view('page.contact');
    }
    public function about()
    {
        return view('page.about');
    }
    public function showCategory($type_id)
    {
        $typeName = Type::find($type_id);
        $types = Type::with('posts')->get();
      $Cposts = Post::where('type_id',$type_id)->orderBy('post_id','desc')->paginate(10);
       //$Cposts = Type::find($type_id)->with('posts')->get();
     
        return view('page/show_category',compact('Cposts',$Cposts))->with('types',$types)->with('typeName',$typeName);
    }
    public function showAccount()
    {
        return view('page/show_account');
    }
    public function deleteComment($comment_id)
    {
        $currentUser = Auth::id();
        $OwnerComment = Comment::find($comment_id)->users->user_id;
        if($currentUser===$OwnerComment)
        {
            $comment = Comment::find($comment_id)->delete();
            return redirect()->back()->with('vpMsg','Delete Comment successfully');;
        }
        else
        {
            return redirect()->back();
        }
       
    }
    public function editComment($comment_id)
    {
        $currentUser = Auth::id();
        $OwnerComment = Comment::find($comment_id)->users->user_id;
        if($currentUser===$OwnerComment)
        {
          
            $comment = Comment::find($comment_id);
            return view('page/editComment')->with('comment',$comment);
        }
        else
        {
            return redirect()->back();
        }
      
    }
    public function updateComment(Request $request,$comment_id)
    {
        $request->validate(
            [
                'comment' => 'required|min:1|max:255|string'
            ]
        );
        $currentUser = Auth::id();
        $OwnerComment = Comment::find($comment_id)->users->user_id;
        $comment = Comment::find($comment_id);
        if($currentUser===$OwnerComment)
        {
          
            $comment->body = $request->input('comment');
            $comment->save();
            return redirect()->route('view',$comment->posts->post_id)->with('vpMsg','Edit Comment successfully');;
        }
        else
        {
            return redirect()->route('view',$comment->posts->post_id);
        }
       
    }
    public function showReply($comment_id)
    {
        $comment = Comment::find($comment_id);
      $replies = Replycomment::where('comment_id',$comment_id)->get();
          return view('page/reply',compact('comment',$comment))->with('replies',$replies);
      
       
    }
    public function storeReply(Request $request,$comment_id)
    {
        $request->validate(
            [
                'body'=>'required|min:1|max:255|string',
                
            ]
        );
        $reply = new Replycomment(
            [
                'body'=>$request->input('body'),
                'comment_id'=>$comment_id,
                'user_id'=>Auth::id(),
            ]
        );
       $reply->save();
        return redirect('/view/comment/reply/'.$comment_id)->with('ryMsg','Reply Comment successfully');;

    }
    public function editReply($reply_id)
    {
        $reply = Replycomment::find($reply_id);
        return view('page/edit_reply')->with('reply',$reply);
    }
    public function updateReply(Request $request,$reply_id)
    {
        $request->validate(
            [
                'reply'=>'required|min:1|max:255|string'
            ]
        );
        $reply = Replycomment::find($reply_id);
        $comment_id = $reply->comment_id;
        $currentUser=Auth::id();
        $replyUser = $reply->user_id;
        if($currentUser===$replyUser)
        {
            $reply->body = $request->input('reply');
            $reply->save();
            return redirect('/view/comment/reply/'.$comment_id)->with('ryMsg','Edit Reply successfully');;
        }
        else
        {
             return redirect('/view/comment/reply/'.$comment_id);
        }

       
       
    }
    public function destroyReply($reply_id)
    {
        $reply = Replycomment::find($reply_id);
        $comment_id = $reply->comment_id;
        $currentUser = Auth::id();
        $ownerUser = $reply->user_id;
        if($currentUser===$ownerUser)
        {
            $reply->delete();
            return redirect('/view/comment/reply/'.$comment_id)->with('ryMsg','Delete Reply successfully');;
        }
        else{
            return redirect('/view/comment/reply/'.$comment_id);
        }
    }
    public function changePassword(Request $request)
    {
        $request->validate(
            [
                'old_password' =>'required|min:8|string|max:50',
                'new_password'=>'required|min:8|confirmed|max:50|string',
                
            ]
            );
            $currentPassword = Auth::user()->password;
            if(Hash::check($request->old_password,$currentPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->new_password);
                $user->save();
                Auth::logout();
                return redirect()->route('login')->with('resetComplete','Change password successfully');
            }
            else
            {
                session()->flash('msg','Your password is invalid');
                return redirect()->back()->with('errorChange','your password is invalid');
            }
    }
    public function contactSend(Request $request)
    {
        $request->validate(
            [
                'subject'=>'required|min:5|string|max:255',
                'content'=>'required|min:5|string|max:255'
            ]
        );
        $email = Auth::user()->email;
        $data = array(
            'email' =>$email,
            'subject' =>$request->subject,
            'content'=>$request->content
        );
       Mail::send('page.email.context',$data,function($message) use($data)
    {
        $message->from($data['email']);
        $message->to('www.soutivath2012@gmail.com');
        $message->subject($data['subject']);
    });
   
    Session::flash('msg','Your email is send Successfully');
    return redirect()->back();
    }
    public function password_change()
    {
        return view('page.password_change');
    }
   



}
