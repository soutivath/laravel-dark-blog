@extends('layout.structure')
@section('content')
    <div class="row">
        <div class="container mt-4 text-bold text-white-50">
            <h1>Change your password</h1>

            @if(Session::has('errorChange'))
            <div class="alert alert-danger">
                {{Session::get('errorChange')}}
            </div>
            @endif
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form method="Post" action="{{url('/change/password')}}"class="form-prevent-multiple-submit">
            @csrf
                <div class="form-group">
                    <label for="old_password">Old password</label>
                    <input type="password" name="old_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_password">new Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_password-comfirm">Comfirm new password</label>
                    <input type="password" name="new_password_confirmation" id="new_password-comfirm" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary button-prevent-multiple-submit">
            </form>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('js/submit.js')}}"></script>
 @endsection