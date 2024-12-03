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
                    <a class="btn btn-success" href="/shschools/create" role="button">Add Schools</a>                
                    <a class="btn btn-success" href="/shschools/1" role="button">Edit Schools</a>
                    </div>
        </div>
    </div>
	

@endsection

@section('scripts')

@endsection
