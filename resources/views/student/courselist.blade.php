@extends('main')
@section('head')

@endsection

@section('content')
	<div class="container">
        <br><br>
        <div class="row" align="center">
            <div class="col-md-10">
            <h2><b>Select Scholarship Type</b></h2>
            </div>
        </div>
            <div class="row" align="center">
                <div class="col-md-10">
                    @include('student.flash-message')
                </div>
            </div>
        <div class="row" align="center">
                <div class="col-md-10" align="center">
                    <a class="btn btn-success" href="/admins/1" role="button">Academic</a>                
                    <a class="btn btn-success" href="/admins/3" role="button">Tech Voc</a>
                    </div>
        </div>
    </div>
	

@endsection

@section('scripts')

@endsection
