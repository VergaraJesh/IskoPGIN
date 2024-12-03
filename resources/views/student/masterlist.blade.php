@extends('main')
@section('head')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@endsection

@section('content')
<h2>Master List Generator</h2>
<form method="post" action="{{ route('student.mlresult') }}" target="_blank">
    <div class="row">
            <div class="col-md-1">
                </div>
            <div class="col-md-8" align="center">
                    <h4 align="center">SCHOLARSHIP TYPE</h4>
                    <h5>
                   <label class="radio-inline">
                      <input type="radio" id="scholarship" name="scholarship" value="1" checked="true" onclick="Acad()">
                      <b>ACADEMIC</b>
                    </label>     
                    <label class="radio-inline">
                      <input type="radio" id="scholarship" name="scholarship" value="2" onclick="TechVoc()">
                      <b>CAAP</b>
                    </label>            
                    <label class="radio-inline">
                      <input type="radio" id="scholarship" name="scholarship" value="3" onclick="TechVoc()">
                      <b>TECH. VOC</b>
                    </label>
                    <label class="radio-inline">
                    <input type="radio" id="scholarship" name="scholarship" value="4">
                          <b>Senior High</b>
                    </label>
                    <label class="radio-inline">
                    <input type="radio" id="scholarship" name="scholarship" value="5">
                          <b>DoM</b>
                    </label>
                    <label class="radio-inline">
                    <input type="radio" id="scholarship" name="scholarship" value="6">
                      <b>Arts</b>
                    </label><label class="radio-inline">
                    <input type="radio" id="scholarship" name="scholarship" value="7">
                      <b>Agri</b>
                    </label>
                    </label><label class="radio-inline">
                    <input type="radio" id="scholarship" name="scholarship" value="8">
                      <b>LAW</b>
                    </label>
                    </h5>
                    
                  </div>
    </div>
     <div class="row">
        <div class="col-md-1">
        </div>
       
          <div class="form-group col-md-2">
              {{ csrf_field() }}
            <label for="sy">School Year</label>
             <select id="sy" name="sy" class="form-control">
                        <option value="">- Select-SY -</option>
                        @foreach ($sy as $sy)
                            <option value="{{$sy->id}}">{{ $sy->from }}-{{$sy->to}}</option>
                        @endforeach
                    </select>
          </div>
          
          <div class="col-md-1">
          </div>
          <div class="form-group col-md-2">
           <div class="form-group">
            <label for="sem">Semester</label>
            <select id="sem" name="sem" class="form-control">
              <option value="">-- Select Sem --</option> 
              <option value="1">1st</option>
              <option value="2">2nd</option>
            </select>
          </div>
          </div>
          <div class="form-group col-md-2">
            <div class="form-group">
             <label for="scl">Scholars</label>
             <select id="scl" name="scl" class="form-control">
               <option value="">-- Select Sem --</option> 
               <option value="1">Old/OTI</option>
               <option value="2">New</option>
             </select>
           </div>
           </div>
           <div class="form-group col-md-2">
            <div class="form-group">
             <label for="g1">With GWA</label>
             <select id="g1" name="g1" class="form-control">
               <option value="2">No</option>
               <option value="1">Yes</option>
             </select>
           </div>
           </div>

           <div class="form-group col-md-2">
            <div class="form-group">
             <label for="rep11">For Agri and Arts</label>
             <select id="rep11" name="rep11" class="form-control">
               <option value="">-- Pick --</option> 
               <option value="0">Secondary</option>
               <option value="1">Tertiary</option>
             </select>
             </select>
           </div>
           </div>
        </div>
        <div class="row">
        <div class="form-group col-md-1">
        </div>
            <div class="col-md-2">
            <div class="form-group">
             <label for="gx">Legend</label>
             <select id="gx" name="gx" class="form-control">    
               <option value="0">None</option>          
               <option value="1">New</option>
               <option value="2">Old</option>
             </select>
           </div>
            </div> 
            <div class="form-group col-md-2">
            <div class="form-group">
             <label for="g2">Options</label>
             <select id="g2" name="g2" class="form-control">               
               <option value="1">Default</option>
               <option value="0">Seperate</option>
             </select>
           </div>
           </div>
           <div class="form-group col-md-2">
            <div class="form-group">
             <label for="go1">Information's</label>
             <select id="go1" name="go1" class="form-control">               
               <option value="0">No</option>
               <option value="1">Yes</option>
             </select>
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
