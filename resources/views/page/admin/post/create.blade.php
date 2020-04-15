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
<div class="row ">
<div class='col-md-10 mx-auto shadow-lg p-3 mb-5 bg-white rounded font-weight-bolder'>
    <h1 class=" text-center ">Create a New Post</h1>
    <hr>
<form class="mt-5 ml-5" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data" class="form-prevent-multiple-submit" >
    
     {{ csrf_field() }}
    <div class="form-group">
        <label for='title'>Title:</label>
        <input type="input" name="title" class="form-control">
    </div>
    <hr>
    <div class="form-group">
        <label for='body'>Body: </label>
        <textarea name="body" class="form-control" rows="20" id="body" autocomplete="on" > {{old('body')}} </textarea>
    </div>
    <hr>
    <div class="form-group">
        <label for='coverImage'>Cover Image:</label>
        <input type="file" name="coverImage" class="form-control" accept="image/png, image/jpeg ,image/jpg">
    </div>
    <hr>
    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" id="type" name="type">
        @foreach($types as $type)
        <option value="{{$type->type_id}}">{{$type->name}}</option>
        @endforeach
        </select>
    </div>
    
      <input type="submit" name="submit" class="btn btn-primary mt-4 full-width  btn-block button-prevent-multiple-submit">
   
</form>
</div>
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
