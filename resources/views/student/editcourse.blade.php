@extends('main')
@section('head')

@endsection

@section('content')
	<div class="container">
        <br><br>
        <div class="row" align="center">
            <div class="col-md-10">
            <h2><b>Edit Course</b></h2>
            </div>
        </div>
        <br><br>
        <form class="form-inline" id="regForm" method="POST" action="{{ route('admins.update',[$course->id])}}" enctype="multipart/form-data">
                {{ csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="type" value="{{$t}}">
            <div class="row" align="justify">
                    <div class="form-group">
                            <div class="input-group">
                                    <span class="input-group-addon">Old Course Name</span>
                                    <input id="" type="text" class="form-control" name="" disabled size="35" value="{{ $course->name}}">
                                    </div>
                        </div>
                        <div class="form-group">
                                <div class="input-group">
                                        <span class="input-group-addon">Old Course Abreviation</span>
                                        <input id="" type="text" class="form-control" name="" disabled value="{{ $course->abvr}}" size="35">
                                      </div>
                        </div>
                        <br><br>     
        <div class="row">
                <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">Course Name</span>
                                <input id="cname" type="text" class="form-control" name="cname" placeholder="Course Name" size="35">
                              </div>
                </div>
                <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">Course Abreviation</span>
                                <input id="abvr" type="text" class="form-control" name="abvr" placeholder="Abreviation" size="35">
                              </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

    </div>
	

@endsection

@section('scripts')

@endsection
