@extends('page.admin.structure.structure')
@section('content')
    <h1 class="text-center font-weight-bolder">All post</h1>
    @if(Session::has('Pmsg'))
    <div class="alert alert-success">
      <h2>{{Session::get('Pmsg')}}</h2>
    </div>
    @endif
    <a class="btn btn-primary mb-2 font-weight-bolder" href="{{ route('post.create')}}">Create New Post</a>
    <div class="row">
   <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Write_By</th>
                <th scope="col">Type</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
               
                @foreach ($posts as $post)
                <tr>
                <td scope="row">{{ $post->post_id }}</td>
                <td scope="row"> {{ $post->title }} </td>
                <td scope="row">{{$post->users->name}}</td>
                <td scope="row">{{$post->types['name']}}</td>
                <td scope="row">{{ $post->created_at }}</td>
                <td scope="row">{{ $post->updated_at }}</td>
                <td scope="row">
                    <div class="btn-group" role="group">
                        <button id="btnActionGroup" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnActionGroup">
                          <a class="dropdown-item bg-secondary text-white" href="{{route('post.comment',$post->post_id)}}">View Comment</a>
                          <a class="dropdown-item bg-secondary text-white" href="{{route('post.show',$post->post_id)}}">View Post</a>
                          <a class="dropdown-item text bg-secondary text-white" href="{{URL::to("/admin/post/$post->post_id/edit")}}">Edit</a>
                          <form method="POST" action="{{route('post.destroy',$post->post_id)}}" class="form-prevent-multiple-submit">
                            {{method_field("DELETE")}}
                            {{csrf_field()}}
                            <a class="dropdown-item text bg-secondary"><input type="submit" name="submit" value="Delete" class="border-0 p-0 bg-secondary mt-0 text-center mt-1 text-danger button-prevent-multiple-submit" style="border:none !important;background-color:Transparent !important;"></a>
                          </form>
                        </div>
                      </div>
                </td>
            </tr>
            @endforeach
           
           
            </tbody>
        </table>
     
        <div class="pagination">
            {!! $posts->render() !!}
        </div>

      </div>
   </div> <!-- End rows -->
@endsection
@section('script')
<script src="{{asset('js/submit.js')}}"></script>
 @endsection
