@extends('main')
@section('head')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@endsection

@section('content')
<h2>SCHOOL INFO BOARD</h2>
<div class="container">
  <div class="row">
      <a href="/screcord/create" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Add School</a>
      <a href="/screcordshow" class="btn btn-danger btn-lg" role="button" aria-pressed="true">Show School</a>
      <a href="/screcordshow2" class="btn btn-default btn-lg" role="button" aria-pressed="true">Show School Records</a>
      <a href="/schoolsearches" class="btn btn-warning btn-lg" role="button" aria-pressed="true"><span class="glyphicon glyphicon-search"></span> Search School</a>
      
  </div>
</div>
@endsection

@section('scripts')

@endsection
