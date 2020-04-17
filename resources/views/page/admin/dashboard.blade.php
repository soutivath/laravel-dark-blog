@extends('page.admin.structure.structure')
@section('content')
    <div class="row">
        <div class="container">
            <div class="text-center">
                <h1 class="font-weight-bolder">WELCOME TO ADMIN PANEL</h1>
                 <h2 class="font-weight-bolder text-uppercase">YOU ARE : {{ auth()->user()->name }}</h2>
                 <hr>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
          

            <div class="jumbotron">
                <h1 class="font-weight-bolder text-center mb-3">Statistics</h1>
                <hr>
                <div class="row w-100">
                        <div class="col-md-3 mb-4">
                            <div class="card border-info mx-sm-1 p-3">

                                <div class="card border-info shadow text-info p-3 my-card " >
                                 <div class="row">
                                   <div class="container-fluid text-center">
                                    <svg class="bi bi-newspaper" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 2A1.5 1.5 0 011.5.5h11A1.5 1.5 0 0114 2v12a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 010 14V2zm1.5-.5A.5.5 0 001 2v12a.5.5 0 00.5.5h11a.5.5 0 00.5-.5V2a.5.5 0 00-.5-.5h-11z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M15.5 3a.5.5 0 01.5.5V14a1.5 1.5 0 01-1.5 1.5h-3v-1h3a.5.5 0 00.5-.5V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                        <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                                      </svg>
                                    </div>
                                </div>
                            </div>
                                <div class="text-info text-center mt-3"><h4>Posts</h4></div>
                                <div class="text-info text-center mt-2"><h1>{{$allstate['posts']}}</h1></div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <div class="card border-success mx-sm-1 p-3">
                                <div class="card border-success shadow text-success p-3 my-card">
                                    <div class="row">
                                        <div class="container-fluid text-center">
                                        <svg class="bi bi-tag" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.5 2A1.5 1.5 0 012 .5h4.586a1.5 1.5 0 011.06.44l7 7a1.5 1.5 0 010 2.12l-4.585 4.586a1.5 1.5 0 01-2.122 0l-7-7A1.5 1.5 0 01.5 6.586V2zM2 1.5a.5.5 0 00-.5.5v4.586a.5.5 0 00.146.353l7 7a.5.5 0 00.708 0l4.585-4.585a.5.5 0 000-.708l-7-7a.5.5 0 00-.353-.146H2z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M2.5 4.5a2 2 0 114 0 2 2 0 01-4 0zm2-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                                      </svg>
                                    </div>
                                </div>
                            </div>
                                <div class="text-success text-center mt-3"><h4>Categories</h4></div>
                                <div class="text-success text-center mt-2"><h1>{{$allstate['types']}}</h1></div>
                        </div>
                    </div>

                        <div class="col-md-3 mb-4">
                            <div class="card border-danger mx-sm-1 p-3">
                                <div class="card border-danger shadow text-danger p-3 my-card" >
                                    <div class="row">
                                        <div class="container-fluid text-center">
                                            <svg class="bi bi-people" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 00.014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 00.022.004zm7.973.056v-.002.002zM11 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zM6.936 9.28a5.88 5.88 0 00-1.23-.247A7.35 7.35 0 005 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 015 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 116 0 3 3 0 01-6 0zm3-2a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd"/>
                                              </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-danger text-center mt-3"><h4>Members</h4></div>
                                <div class="text-danger text-center mt-2"><h1>{{$allstate['users']}}</h1></div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card border-warning mx-sm-1 p-3">
                                <div class="card border-warning shadow text-warning p-3 my-card" >
                                    <div class="row">
                                        <div class="container-fluid text-center">
                                            <svg class="bi bi-chat-square-dots" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v8a1 1 0 001 1h2.5a2 2 0 011.6.8L8 14.333 9.9 11.8a2 2 0 011.6-.8H14a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v8a2 2 0 002 2h2.5a1 1 0 01.8.4l1.9 2.533a1 1 0 001.6 0l1.9-2.533a1 1 0 01.8-.4H14a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                                                <path d="M5 6a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                                              </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-warning text-center mt-3"><h4>Comments</h4></div>
                                <div class="text-warning text-center mt-2"><h1>{{$allstate['comments']}}</h1></div>
                            </div>
                        </div>
                     </div>
                </div>

        </div>
    </div>



@endsection