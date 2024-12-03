@extends('main')
@section('head')

@endsection

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-10" align="center"> 
                    <p><h4><b>Remarks for:</b> 
						{{ucfirst($student->fname)}} {{ucfirst($student->lname)}}</h4></p>
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
            <form class="form" action="/createrem" method="POST">
                <input type="hidden" value="{{ $student->id }}" name="student" id="student" />
                {{ csrf_field() }}
                
                <div class="row">
                    <div class="form-group">
                            <div class="col-md-10">
                            <div class="input-group-inline">
                                    <label for="remd">Title: </label>               
                                    <input id="title" type="text" class="form-control" name="title" placeholder="Title" size="50">
                                  </div>
                            </div>
                    </div>
                </div>
                <br>
                <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                    <label for="remd">Remarks: </label>                   
                                    <textarea id="remd"  class="form-control" name="remd"  rows="5" placeholder="Remarks..."></textarea>
                            </div> 
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-10" align="center">
                            <a href="/remark/{{$student->id}}" class="btn btn-danger" role="button">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form>
        </div>
	

@endsection

@section('scripts')

@endsection
