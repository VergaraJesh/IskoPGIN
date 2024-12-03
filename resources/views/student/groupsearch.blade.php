@extends('main')
@section('head')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@endsection

@section('content')
<h2>Filtered Search Student</h2>
<form method="post" action="{{ route('student.result') }}" target="_blank">
    <div class="row">
            <div class="col-md-1">
                </div>
            <div class="col-md-6" align="center">
                    <h4 align="center">SCHOLARSHIP TYPE</h4>
                    <h5>
                   <label class="radio-inline">
                      <input type="radio" id="scholarship" name="scholarship" value="1" checked="true" onclick="Acad()">
                      <b>ACADEMIC</b>
                    </label>
                        
                   <label class="radio-inline">
                      <input type="radio" id="scholarship" name="scholarship" value="2">
                      <b>ATHLETIC</b>
                    </label>
                    
                    <label class="radio-inline">
                      <input type="radio" id="scholarship" name="scholarship" value="3" onclick="TechVoc()">
                      <b>TECH. VOC</b>
                    </label>
                    <label class="radio-inline">
                            <input type="radio" id="scholarship" name="scholarship" value="4" onclick="TechVoc()">
                            <b>Senior High</b>
                          </label>
                    </h5>
                  </div>
                  <script>
                    function TechVoc() {
                        document.getElementById("schl").disabled = true;
                        document.getElementById("colle").disabled = true;
                        document.getElementById("acourse").disabled = true;

                        document.getElementById("tschl").disabled = false;
                        document.getElementById("tcolle").disabled = false;
                        document.getElementById("tcourse").disabled = false;
                    }
                    
                    function Acad() {
                        document.getElementById("schl").disabled = false;
                        document.getElementById("colle").disabled = false;
                        document.getElementById("acourse").disabled = false;

                        document.getElementById("tschl").disabled = true;
                        document.getElementById("tcolle").disabled = true;
                        document.getElementById("tcourse").disabled = true;
                    }
                    </script>
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
          <div class="form-group col-md-1">
               <div class="form-group">
                <label for="ylvl">YearLevel</label>
                <select id="ylvl" name="ylvl" class="form-control">
                    <option value="">---</option>
                    <option value="1">I</option>
                    <option value="2">II</option>
                    <option value="3">III</option>
                    <option value="4">IV</option>
                    <option value="5">V</option>
                </select>
              </div>
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
          
        </div>

        <div class="row">
        <div class="col-md-1">
        </div>
 
         <div class="form-group col-md-2">
            <label for="schl">Academic School</label>
             <select id="schl" name="schl" class="form-control">
                    <option value="">-School-</option>
                    <option value="MMSU">MMSU</option>
                    <option value="NWU">NWU</option>
                    <option value="DCCP">DCCP</option>
                    <option value="NCC">NCC</option>
                </select>
          </div>   
          
        <div class="form-group col-md-2">
           <div class="form-group">
            <label for="colle">Academic College</label>
            <select id="colle" name="colle" class="form-control">
              <option value="">- College -</option> 
              <option value="CBEA">CBEA</option>
              <option value="COE">COE</option>
              <option value="CAS">CAS</option>
              <option value="CAFSD">CAFSD</option>
              <option value="CTE">CTE</option>
              <option value="CIT">CIT</option>
            </select>
          </div>
          </div>
          <div class="form-group col-md-5">
                <div class="form-group">
                 <label for="acourse">Academic Course</label>
                 <select id="acourse" name="acourse" class="form-control">
                   <option value="">- Course -</option> 
                        @foreach($cor as $cor)
                            <option value="{{$cor->id}}">{{$cor->name}}</option>
                        @endforeach
                 </select>
               </div>
               </div>
        </div>

        <div class="row">
                <div class="col-md-1">
                </div>
         
                 <div class="form-group col-md-2">
                    <label for="tschl">Tech Voc School</label>
                     <select id="tschl" name="tschl" class="form-control" disabled>
                            <option value="">-School-</option>
                            <option value="MMSU">MMSU</option>
                            <option value="NWU">NWU</option>
                            <option value="DCCP">DCCP</option>
                            <option value="NCC">NCC</option>
                        </select>
                  </div>   
                  
                <div class="form-group col-md-2">
                   <div class="form-group">
                    <label for="tcolle">Tech Voc College</label>
                    <select id="tcolle" name="tcolle" class="form-control" disabled>
                      <option value="">- College -</option> 
                      <option value="CIT">CIT</option>
                    </select>
                  </div>
                  </div>
                  
                  <div class="form-group col-md-5">
                    <div class="form-group">
                     <label for="tcourse">Academic Course</label>
                     <select id="tcourse" name="tcourse" class="form-control">
                            <option value="">- Course -</option> 
                                 @foreach($tcor as $cor)
                                     <option value="{{$cor->id}}">{{$cor->name}}</option>
                                 @endforeach
                          </select>
                   </div>
                   </div>

                </div>

        <div class="row">
                <div class="col-md-1">
                    </div>
                <div class="form-group col-md-2">
                        <label for="state1">Municipality</label>
                         <select id="state1" name="state1" class="form-control">
                                    <option value="">- Select-Town -</option>
                                    @foreach ($municipalities as $sy)
                                        <option value="{{$sy->id}}">{{ $sy->name }}</option>
                                    @endforeach
                                </select>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="city1">Barrangay</label>
                           <select id="city1" name="city1" class="form-control">
                                
                           </select>
                         </div>   
                 
                           <script type="text/javascript">
                             $(document).ready(function() {
                                 $('select[name="state1"]').on('change', function() {
                                     var stateID = $(this).val();
                                     if(stateID) {
                                         $.ajax({
                                             url: '/student/ajax/'+stateID,
                                             type: "GET",
                                             dataType: "json",
                                             success:function(data) {
                                                 $('select[name="city1"]').empty();
                                                 $('select[name="city1"]').append('<option value="">-- Select Barrangay --</option>');
                                                 $.each(data, function(key, value) {
                                                     $('select[name="city1"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                 });
                                             }
                                         });
                                     }else{
                                         $('select[name="city"]').empty();
                                     }
                                 });
                             });
                         </script>
        </div>
        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-4">
             <div class="form-check form-check-inline">
                <label class="form-check-label" for="grad"><u><b>BY:</b></u></label>
                <input class="form-check-input" type="radio" id="grad" name="grad" id="inlineRadio1" value="all" checked="true">
                <label class="form-check-label" for="grad">ALL</label>
                <input class="form-check-input" type="radio" id="grad" name="grad" id="inlineRadio1" value="ngrad">
                <label class="form-check-label" for="grad">Non-Graduating</label>
                <input class="form-check-input" type="radio" id="grad" name="grad" id="inlineRadio1" value="grad">
                <label class="form-check-label" for="grad">Graduating</label>
              </div>
          </div>
        <div class="col-md-4">
           <div class="form-group">
            <label for="sort" class="col-sm-2 control-label">Year:</label>
            <div class="col-sm-5">
                <select class="form-control " name="fr" id="fr">
                    <option value="">-From-</option>
                    @for($i=2012,$y=1;$i<=date("Y");$i++,$y++)
                      <option  value="{{$y}}">{{$i}}</option>
                    @endfor
                </select>
             </div>
             <div class="col-sm-5">
                <select class="form-control " name="to" id="to">
                    <option value="">-To-</option>
                    @for($i=2012,$y=1;$i<=date("Y");$i++,$y++)
                      <option  value="{{$y}}">{{$i}}</option>
                    @endfor
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
