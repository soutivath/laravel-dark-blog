@extends('layout/structure')
@section('content')

<div class="jumbotron bg-dark mt-3">
    <h4 class="display-4 font-weight-bolder text-white text-center">Contact-Me</h4>
</div>
@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@if(Session::has('msg'))
<div class="alert alert-success">
    <ul>
        <li>{{Session::get('msg')}}</li>
    </ul>
</div>
@endif
<form class="mt-3 text-white form-prevent-multiple-submit" action="{{url('/contact')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" rows="5"></textarea>
    </div>
    <input type='submit' name="submit" class="btn btn-secondary button-prevent-multiple-submit">
</form>
    
@endsection
@section('script')
<script src="{{asset('js/submit.js')}}"></script>
 @endsection