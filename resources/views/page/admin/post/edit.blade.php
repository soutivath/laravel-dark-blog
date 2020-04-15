@extends('page.admin.structure.structure')
@section('content')

@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
     @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
     @endforeach
    </ul>
</div>
@endif
<div class='col-md-10'>
    <h1 class="text-center card bg-dark">Update a Post</h1>
<form class="mt-5 ml-5" method="post" action="{{ route('post.update',$posts->post_id) }}" enctype="multipart/form-data" class="form-prevent-multiple-submit">
     {{ csrf_field()}}
    {{ method_field("PUT") }}
    <div class="form-group">
        <label for='title'>Title</label>
        <input type="input" name="title" class="form-control" value="{{$posts->title}}">
    </div>
    <div class="form-group">
        <label for='body'>Body</label>
    <textarea name="body" class="form-control" id="body" rows="10" >{{$posts->body}}</textarea>
    </div>
    <div class="form-group">
        <label for='coverImage'>CoverImage</label>
        <input type="file" name="coverImage" class="form-control"  accept="image/png, image/jpeg ,image/jpg">
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" name="type" id="type">
            @foreach($types as $type)
        <option {{ $type->type_id==$currentType?'selected':'' }} value="{{ $type->type_id }}">{{ $type->name}}</option>
            @endforeach
        </select>
    </div>
      <input type="submit" name="submit" class="btn btn-primary button-prevent-multiple-submit">
   
</form>
</div>
@endsection
@section('script')
<script src="https://cdn.tiny.cloud/1/fiq53rhg7twzytmzfnr6txniek811g9j2cyj16ha2azv05od/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#body',
    });
  </script>
<script src="{{asset('js/submit.js')}}"></script>
 @endsection

