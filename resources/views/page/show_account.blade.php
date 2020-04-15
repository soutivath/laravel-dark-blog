@extends('layout.structure')
@section('content')
<div class="text-center pt-5">
<h2 class="font-weight-bolder text-white">Account Information</h2>
  <div class="panel panel-default shadow-lg p-3 mb-5 bg-white rounded">
    <div class="panel-body">
    <ul class="text-left">
    <li> <b>Username: </b> {{ Auth()->user()->name}}</li>
    <li> <b>Email: </b> {{ Auth()->user()->email}}</li>
    <li> <b>Password: </b> ***************</li>
    </ul>
    <hr>
  <a class="btn btn-danger" href="{{url('/change')}}"> Change your password </a>
    </div>
  </div>
</div>
@endsection

