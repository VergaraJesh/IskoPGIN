@extends('main')
@section('head')

@endsection

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-10" align="center"> 
                <h4>Create Course</h4>
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
            <form class="form-inline" action="/admins" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-10" align="center">
                            <h4 align="center">SCHOLARSHIP TYPE</h4>
                            <h5>
                           <label class="radio-inline">
                              <input type="radio" id="scholarship" name="scholarship" value="1">
                              <b>ACADEMIC</b>
                            </label>
                            <label class="radio-inline">
                              <input type="radio" id="scholarship" name="scholarship" value="3">
                              <b>TECH. VOC</b>
                            </label>
                            
                            </h5>
                          </div>
            </div>
                
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
