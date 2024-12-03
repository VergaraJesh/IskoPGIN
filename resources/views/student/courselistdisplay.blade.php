@extends('main')
@section('head')

@endsection

@section('content')
	<div class="container">
        <br><br>
        <div class="row" align="center">
            <div class="col-md-10">
            <h2><b>{{ $msg }}</b></h2>
            </div>
        </div>
        <br><br>
        <div class="row">
            <b>
            <div class="col-sm-1">
                No.
            </div>
            <div class="col-md-3">
                Course Name
            </div>
            <div class="col-md-3">
                    Course Abreviation
            </div>
            <div class="col-md-2">
                    Functions
            </div>
            </b>
        </div>
                    @foreach($courses as $courses)
                    <div class="row">
                            <div class="col-sm-1">
                                    <b>{{$i++}}.</b>
                            </div>
                            <div class="col-md-3">
                                    <p>{{$courses->name}}</p>
                            </div>
                            <div class="col-md-3">
                                    {{$courses->abvr}}
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-2" align="left">
                                            <a class="btn btn-info" href="/admins/{{ $courses->id}}/{{$type}}/edit" role="button">Update</a>
                                        </div>
                                     <div class="col-md-2" align="left">
                                             <form class="delete" action="{{ route('admins.destroy', $courses->id) }}" method="POST">
                                                     <input type="hidden" name="_method" value="DELETE">
                                                     <input type="hidden" name="type" value="{{$type}}">
                                                     <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                     <input type="submit" value="Delete" class="btn btn-danger">
                                                 </form>
                                                 
                                         </div>
                                </div>
                            </div>
                        </div>          
                    @endforeach
                    <script>
                            $(".delete").on("submit", function(){
                                return confirm("Do you want to delete this item?");
                            });
                        </script>

    </div>
	

@endsection

@section('scripts')

@endsection
