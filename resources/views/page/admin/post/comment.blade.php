@extends('page.admin.structure.structure')
@section('content')
<h1>Comment From post: {{ $post->title }}</h1>

<div class="container-fluid mt-5">
    <div class="row">
		<div class="col-md-12 ">
        
            <!-- Fluid width widget -->        
    	    <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @if(Session::has('Mmsg'))
                        <div class="alert-success w-5px">
                        <h2>{{Session::get('Mmsg')}}</h2>
                        </div>
                        @endif
                        <span class="glyphicon glyphicon-comment"></span> 
                        All Comment
                    </h3>
                </div>
                <div class="panel-body">
                    @if(count($comments)>0)
                    <ul class="media-list mt-3">
                      @foreach ($comments as $comment)
                        <li class="media shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="media-left mr-3">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading mb-0">
                                  {{$comment->users->name}}
                                </h4>
                            <small class="text-left">Post at:{{$comment->created_at}}</small>
                            <form class="float-right form-prevent-multiple-submit" method="post" action="{{url('admin/post/comment/'.$comment->comment_id)}}" >
                                {{method_field("DELETE")}}
                                @csrf
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm button-prevent-multiple-submit">
                            </form>
                                <p class='font-weight-bolder'>
                                    {{$comment->body}}
                                </p>
                            </div>
                        </li>
                        <hr>
                        @endforeach
                    </ul>
                 @else
                 <h6 class="text-left text-black-50 font-weight-bolder mt-4 ml-5"><svg class="bi bi-exclamation-triangle" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.938 2.016a.146.146 0 00-.054.057L1.027 13.74a.176.176 0 00-.002.183c.016.03.037.05.054.06.015.01.034.017.066.017h13.713a.12.12 0 00.066-.017.163.163 0 00.055-.06.176.176 0 00-.003-.183L8.12 2.073a.146.146 0 00-.054-.057A.13.13 0 008.002 2a.13.13 0 00-.064.016zm1.044-.45a1.13 1.13 0 00-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" clip-rule="evenodd"/>
                    <path d="M7.002 12a1 1 0 112 0 1 1 0 01-2 0zM7.1 5.995a.905.905 0 111.8 0l-.35 3.507a.552.552 0 01-1.1 0L7.1 5.995z"/>
                  </svg> No Comment</h6>
                 @endif
                   
                </div>
            </div>
@endsection
@section('script')
<script src="{{asset('js/submit.js')}}"></script>
 @endsection