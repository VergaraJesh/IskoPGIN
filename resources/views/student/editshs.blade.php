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
        <form class="form-inline" id="regForm" method="POST" action="{{ route('shschools.update',[$shs->id])}}" enctype="multipart/form-data">
                {{ csrf_field()}}
                <input type="hidden" name="_method" value="put">   
                
        <div class="row">
                <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">Course Name</span>
                                <input id="school" type="text" class="form-control" name="school" placeholder="Course Name" size="35">
                              </div>
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

    </div>
	

@endsection

@section('scripts')

@endsection
