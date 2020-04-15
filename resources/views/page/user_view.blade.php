@extends('layout.structure')
@section('css')

<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection
@section('content')

@if(Session::has('vpMsg'))
<div class="alert alert-success">
    <ul>
    <li> {{Session::get('vpMsg')}}</li>
    </ul>
</div>
@endif

<div class="text-right m-3">
    <div class="form-group">
        <label class="text-primary" for="darkmode">Dark mode </label>
        <input type="checkbox" id="toggle-event" checked data-toggle="toggle" data-onstyle="dark" data-offstyle="light" data-style="border" class="pt-3" name="darkmode" class="form-control" >
    </div>

</div>
 <div clsss="title">
 <h1 class="text-center mt-4 text-white">{{ $posts->title  }}</h1>
 <small class="font-weight-bolder text-white p-3" style="display:block;" >Writed by: {{ $posts->users->name}} || updated_at:{{ $posts->updated_at }}</small>
 
</div>

<div class="container ">
    <div class="row">
 <div class="col-md-9 mx-auto  p-1 mb-5 bg-dark rounded">
 <img src="{{ asset('cover_image/'.$posts->coverImage) }}" class="img-fluid " style="height:100%; width:100%;background-size: cover;" alt="Cover_image" onclick="darkFunction">
 </div>
    </div>
</div>


 <div class="contrainer text-white">
     <p>
         {!! $posts->body !!}
     </p>
 </div>


                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            
@auth
 <div class="container-fluid mt-4 shadow-lg p-3 mb-5 bg-white rounded">
     @if(count($errors)>0)
     <div class="alert alert-warning">
         <ul>
            @foreach($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
        
     </div>
     @endif
 <form action="{{ url('/post/comment/'.$posts->post_id)}}" class="form-prevent-multiple-submit" method="POST">
         @csrf
         <div class="form-group">
             <label for='body'><h2><svg class="bi bi-pen" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391L10.086 2.5a2 2 0 012.828 0l.586.586a2 2 0 010 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 011.414 0l.586.586a1 1 0 010 1.414L5 13l-3 1 1-3z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 00-.708 0L5.854 5.855a.5.5 0 01-.708-.708L8.44 1.854a1.5 1.5 0 012.122 0l.293.292a.5.5 0 01-.707.708l-.293-.293z" clip-rule="evenodd"/>
                <path d="M13.293 1.207a1 1 0 011.414 0l.03.03a1 1 0 01.03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
              </svg>
                  Post Your Comment</h2></label>
             <textarea class="form-control" name="body" rows="5"></textarea>
         </div>
         <hr>
         <button type="submit" name="submit" class="btn btn-primary button-prevent-multiple-submit">Post  </button>
     </form>
 </div>
 @else
 <div class="container-fluid mt-4 shadow-lg p-3 mb-5 bg-secondary rounded">
   <h1 class="text-center">You are not member</h1>
 <p class="text-center">Please <a href="{{route('login')}}">Login </a>or <a href="{{route('register')}}">Register </a>to comment</p>
   <span class="text-center">
       <div class="container mt-4"><svg class="bi bi-chat-square-dots-fill" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M0 2a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2h-2.5a1 1 0 00-.8.4l-1.9 2.533a1 1 0 01-1.6 0L5.3 12.4a1 1 0 00-.8-.4H2a2 2 0 01-2-2V2zm5 4a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm3 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
  </svg></span></div>
    </div>

 @endauth



<div class="container mt-5">
    <div class="row">
		<div class="col-md-6 col-md-offset-4">
        
            <!-- Fluid width widget -->        
    	    <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title font-weight-bolder text-white">
                        <span class="glyphicon glyphicon-comment"></span> 
                        <svg class="bi bi-chat-square-dots" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v8a1 1 0 001 1h2.5a2 2 0 011.6.8L8 14.333 9.9 11.8a2 2 0 011.6-.8H14a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v8a2 2 0 002 2h2.5a1 1 0 01.8.4l1.9 2.533a1 1 0 001.6 0l1.9-2.533a1 1 0 01.8-.4H14a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                            <path d="M5 6a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                          </svg>  Recent Comments
                    </h3>
                </div>
                <div class="panel-body">
                    @if(count($comments)>0)
                    <ul class="media-list mt-3">
                      @foreach($comments as $comment)
                        <li class="media shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="media-left mr-3">
                                <img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->users->email)))."?s=60&d=mp"}}" class="rounded-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading mb-0">
                                    {{$comment->users->name}}
                                </h4>
                            <small>Post at: {{ $comment->created_at }}</small>
                            <hr>
                                <p>
                                     {{ $comment->body }}
                                </p>
                                <hr>
                                <div class="btn-group">
                                <button style="border:none !important; background:transparent;" ><a href="{{url('/view/comment/reply/'.$comment->comment_id)}}">
                                    <svg class="bi bi-reply" width="2em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9.502 5.013a.144.144 0 00-.202.134V6.3a.5.5 0 01-.5.5c-.667 0-2.013.005-3.3.822-.984.624-1.99 1.76-2.595 3.876C3.925 10.515 5.09 9.982 6.11 9.7a8.741 8.741 0 011.921-.306 7.403 7.403 0 01.798.008h.013l.005.001h.001L8.8 9.9l.05-.498a.5.5 0 01.45.498v1.153c0 .108.11.176.202.134l3.984-2.933a.494.494 0 01.042-.028.147.147 0 000-.252.494.494 0 01-.042-.028L9.502 5.013zM8.3 10.386a7.745 7.745 0 00-1.923.277c-1.326.368-2.896 1.201-3.94 3.08a.5.5 0 01-.933-.305c.464-3.71 1.886-5.662 3.46-6.66 1.245-.79 2.527-.942 3.336-.971v-.66a1.144 1.144 0 011.767-.96l3.994 2.94a1.147 1.147 0 010 1.946l-3.994 2.94a1.144 1.144 0 01-1.767-.96v-.667z" clip-rule="evenodd"/>
                                      </svg>Reply ({{count($comment->replycomments)}})
                                </a></button>
                                @if($comment->user_id===Auth::id())
                            
                            <button style="border:none; background:transparent;" data-toggle="tooltip" data-placement="top" title="Edit"><a href="{{url('view/comment/'.$comment->comment_id)}}"> <svg class="bi bi-pencil-square" width="2em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
                                  </svg></a>
                                </button>
                                <form action="{{url('/view/comment/'.$comment->comment_id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" style="border:none; background:transparent;" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <a href="{{url('/view/comment/'.$comment->comment_id)}}" ><svg class="bi bi-trash" width="2em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                                          </svg></a>
                                    </button>
                                  </form>
                                
                                @endif
                                </div>
                            </div>
                        </li>
                        <hr>
                        @endforeach
                    </ul>
                    {!! $comments->render() !!}
                    @else
                    <h6 class="text-left text-white font-weight-bolder mt-4 ml-5"><svg class="bi bi-exclamation-triangle" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.938 2.016a.146.146 0 00-.054.057L1.027 13.74a.176.176 0 00-.002.183c.016.03.037.05.054.06.015.01.034.017.066.017h13.713a.12.12 0 00.066-.017.163.163 0 00.055-.06.176.176 0 00-.003-.183L8.12 2.073a.146.146 0 00-.054-.057A.13.13 0 008.002 2a.13.13 0 00-.064.016zm1.044-.45a1.13 1.13 0 00-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" clip-rule="evenodd"/>
                        <path d="M7.002 12a1 1 0 112 0 1 1 0 01-2 0zM7.1 5.995a.905.905 0 111.8 0l-.35 3.507a.552.552 0 01-1.1 0L7.1 5.995z"/>
                      </svg> No Comment</h6>
                    @endif
                </div>
            </div>
            <!-- End fluid width widget --> 
            
		</div>
	</div>
</div>


@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{asset('js/submit.js')}}"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e96debca1dda017"></script>

 @endsection
