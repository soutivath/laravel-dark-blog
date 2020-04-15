@extends('layout/structure')
@section('content')
<div class="row mt-5">
    <div class="container col-md-8 mx-auto">
    <form action="{{url('/view/comment/'.$comment->comment_id)}}" method="POST" class="form-prevent-multiple-submit">
        {{csrf_field()}}
        {{ method_field("PUT") }}
            <div class="form-group">
                <label for="comment" class="font-weight-bolder text-white text-lg-center">Edit Your comment</label>
            <textarea name="comment" id="comment" rows="5" class="form-control">{{ $comment->body }}</textarea>
            </div>
            <input type="submit" class="btn btn-primary button-prevent-multiple-submit">
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('js/submit.js')}}"></script>
 @endsection