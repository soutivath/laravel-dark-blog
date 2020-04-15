@extends('page.admin.structure.structure')
@section('content')


    <h1 class="text-lg-center font-weight-bolder">Type Management</h1>
    @if(Session::has('Tmsg'))
    <div class="alert-success width-10px">
        <li>{{Session::get('Tmsg')}}</li>
    </div>
  @endif
    @if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <div class="row mt-5">
       
        <div class="col-md-4 order-md-2 miniEdit">
         <div class="shadow-lg p-3 mb-5 bg-white rounded"> 
             <h2 class="font-weight-bolder">MiniForm</h2>
         <form action="{{Session::has('edit')?route('type.update',$stype->type_id):route('type.store')}}" method="POST" class="form-prevent-multiple-submit">
                 {{ csrf_field() }}
                 @if(Session::has('edit'))
                 {{ method_field("PUT")}}
                 <div class="form-group">
                    <label for='Type_Name'> Edit Type name</label>
                <input type="input" name="Type_Name" class="form-control" value="{{ $stype->name }}">
                </div>
                 <div class="form-group">
                    <label for='description'> Edit Description</label>
                 <textarea name="description" class="form-control" row="3">{{$stype->description}}</textarea>
                </div>
                 <input type="submit" name="submit" class="btn btn-info button-prevent-multiple-submit " value="Edit" >
                 <a class="btn btn-danger" href="{{ route('type.index') }}">Cancel</a>
                 @else
                <div class="form-group">
                    <label for='Type_Name'>Type name</label>
                <input type="input" name="Type_Name" class="form-control" >
                </div>
                <div class="form-group">
                    <label for='description'> Add Description</label>
                <textarea name="description" class="form-control" row="3"></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-info button-prevent-multiple-submit" value="ADD">
                @endif

             </form>
         </div>
        </div>
        
        <div class="col-md-8 order-md-1 TypeTable">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                    <tr>
                    <td scope="row">{{ $type->type_id }}</td>
                    <td scope="row"> {{$type->name}} </td>
                    <td scope="row"> {{$type->description}} </td>
                    <td scope="row">
                        <div class="btn-group" role="group">
                            <button id="btnActionGroup" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnActionGroup">
                            <a class="dropdown-item text bg-secondary  font-weight-bold text-dark" href="{{ url('admin/type/'.$type->type_id.'/edit')}}"> Edit</a>
                            <form method="POST" action="{{route('type.destroy',$type->type_id)}}" class="form-prevent-multiple-submit">
                                {{method_field("DELETE")}}
                                {{csrf_field()}}
                                <a class="dropdown-item text bg-secondary"><input type="submit" name="submit" value="Delete" class="bg-secondary border-0 bg-secondary text-center mt-1 text-danger button-prevent-multiple-submit" style="background-color:transparent !important;"></a>
                              </form>
                            </div>
                          </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {!! $types->render()!!}
        </div>
    </div>
@endsection
@section('script')
<script src="{{asset('js/submit.js')}}"></script>
 @endsection
