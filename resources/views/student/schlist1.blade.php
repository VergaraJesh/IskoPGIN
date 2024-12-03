@extends('main')
@section('head')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@endsection

@section('content')
<h2>Search School Info</h2>
<form method="post" action="{{ route('student.screcordresult2') }}" target="_blank">
      <br><br>
      
     <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-2">
                <div class="form-group">
                        {{ csrf_field() }}
                    <div class="input-group">
                    <span class="input-group-addon"><b>Type</b></span>
                    <select id="type" name="type" class="form-control">
                    <option value="">------</option>
                    <option value="1">Elem</option>
                    <option value="2">HS</option>
                    </select>
                </div>
              </div>
      </div>
        <div class="form-group col-md-3">
                  <div class="form-group">
                      <div class="input-group">
                      <span class="input-group-addon"><b>District</b></span>
                      <select id="sy" name="sy" class="form-control">
                          <option value="">- All District -</option>
                          @foreach ($sy as $sy)
                              <option value="{{$sy->district}}">{{$sy->district}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
      </div>
      <div class="form-group col-md-3">
                  <div class="form-group">
                      <div class="input-group">
                      <span class="input-group-addon"><b>School Year</b></span>
                      <select id="sy2" name="sy2" class="form-control">
                          <option value="">- All SY -</option>
                          @foreach ($sy2 as $sy)
                              <option value="{{$sy->id}}">{{$sy->from}}-{{$sy->to}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
      </div>
        </div>

        <div class="row">
            <div class="col-md-8" align="center">
              <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </div> 
        </div>
</form>
@endsection

@section('scripts')

@endsection
