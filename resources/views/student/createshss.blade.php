@extends('main')
@section('head')

@endsection

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-10" align="center"> 
                    <p><h4><b>Add Senior High Schools</b></h4></p>
            </div>
            <div class="row">
                <div class="col-md-1">
                </div>
               <div class="col-md-9">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul class="list-inline">
                              @foreach ($errors->all() as $error)
                                  <li class="list-inline-item">{{ $error }}</li>
                              @endforeach
                          </ul>
                    </div>
                  @endif
                </div>
          </div>
            <br><br><br><br>
        </div>
            <form class="form" action="/shschools" method="POST">                
                {{ csrf_field() }}
                
                <div class="row">
                    <div class="form-group">
                            <div class="col-md-10">
                            <div class="input-group-inline">
                                    <label for="remd">School Name</label>               
                                    <input id="sname" type="text" class="form-control" name="sname" placeholder="School Name ...." size="50">
                                  </div>
                            </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10" align="center">
                            <a href="/remark/" class="btn btn-danger" role="button">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form>
        </div>
	

@endsection

@section('scripts')

@endsection
