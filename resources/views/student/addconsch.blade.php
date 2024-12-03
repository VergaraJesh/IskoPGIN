@extends('main')
@section('head')

@endsection

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-10" align="center"> 
                    <p><h4><b>ADD SCHOOL CONTACT INFO</b> 						
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
            <form class="form" action="/addconsgo" method="POST">  
                <input type="hidden" value="{{ $sc->sc_id }}" name="scid" id="scid" />    
                <input type="hidden" value="{{ $sc->sc_name }}" name="scname" id="scname" />      
                <input type="hidden" value="{{ $sc->district }}" name="dis" id="dis" />      
                <input type="hidden" value="{{ $sc->sc_type }}" name="type" id="type" />    
                {{ csrf_field() }}
                <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                        <div class="input-group">
                                                <span class="input-group-addon"><b>School Head</b></span>
                                                <input type="text" id="schead" name="schead" class="form-control mx-sm-1" value="">
                                            </div>
                                    </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <div class="input-group">
                                                <span class="input-group-addon"><b>School Contact</b></span>
                                                <input type="text" id="sccon" name="sccon" class="form-control mx-sm-1" value="">
                                            </div>
                                    </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <div class="input-group">
                                                <span class="input-group-addon"><b>School Email</b></span>
                                                <input type="email" id="sce" name="sce" class="form-control mx-sm-1" value="">
                                            </div>
                                    </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-3" align="center">
                                        <div class="form-group">
                                                        <div class="form-group">
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon"><b>Official</b></span>
                                                                        <select id="otype" name="otype" class="form-control">
                                                                        <option value="">------</option>
                                                                        <option value="1">Head</option>
                                                                        <option value="2">Staff</option>
                                                                        </select>
                                                                    </div>
                                                    </div>
                        </div>
                </div>        
                        
                <div class="row">
                    <div class="col-md-10" align="center">
                            <a href="/screcord/" class="btn btn-danger" role="button">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form>
        </div>
	

@endsection

@section('scripts')

@endsection
