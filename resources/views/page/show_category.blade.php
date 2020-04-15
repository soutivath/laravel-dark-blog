@extends('layout/structure')
@section('css')
<link rel="stylesheet" href="{{asset('css/blogpost.css')}}" type="text/css" >
<link rel="stylesheet" href="{{asset('css/paginate.css')}}" type="text/css" >
@endsection
@section('content')
<div class="container-fluid >
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron jumbotron-fluid ">
           <div class="container">
           <h1 class="display-4 text-center font-weight-bolder hh1 ">Category: {{$typeName->name}}  </h1>
           <p class="lead text-sm-center font-weight-lighter hh1"> {{$typeName->description}}</p>
          </div>
       </div>
   </div>
</div> <!-- endHead row div -->
</div>

<div class="container">
<div class="row">
    <div class="col-md-8">
            <div class="row mb-4">
           
                @foreach($Cposts as $post)
                <div class="card col-md-6 mb-2 border-dark postcard" style="width: 18rem;">
                <a   href="{{ url('/view/'.$post->post_id) }}"><img class="card-img-top mt-2" src="{{asset('cover_image/'.$post->coverImage)}}" alt="COVER_IMAGE"></a>
                    <div class="card-body">
                    <h5 class="card-text"><a class="links" href="{{ url('/view/'.$post->post_id) }}">{{ $post->title }}</a></h5>
                    </div>
                    <div class="card-footer ">
                        <small class="text-right text-muted">Create: {{$post->created_at}}</small>
                      </div>
                  </div>
                  @endforeach
                 

             </div> <!-- end rows -->
             
            
              <!--  {//!! $Cposts->render() !!} -->
              

    </div>
            <div class="ml-1 col-md-3">
                <div class="card1">
                <h2 class="text-secondary  text-xl-center ">Category  <svg class="bi bi-tag" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M.5 2A1.5 1.5 0 012 .5h4.586a1.5 1.5 0 011.06.44l7 7a1.5 1.5 0 010 2.12l-4.585 4.586a1.5 1.5 0 01-2.122 0l-7-7A1.5 1.5 0 01.5 6.586V2zM2 1.5a.5.5 0 00-.5.5v4.586a.5.5 0 00.146.353l7 7a.5.5 0 00.708 0l4.585-4.585a.5.5 0 000-.708l-7-7a.5.5 0 00-.353-.146H2z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M2.5 4.5a2 2 0 114 0 2 2 0 01-4 0zm2-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                  </svg></h2>
                <ul>
                    @foreach($types as $type)
                <li class="lit" ><a class="links" href="{{url("/category/".$type->type_id)}}">{{ $type->name }}</a>  ({{$type->posts->count()}})</li>
                    @endforeach
                </ul>
            </div>
            </div>
</div>
</div>
@endsection