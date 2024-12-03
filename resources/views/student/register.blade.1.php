@extends('main')
@section('head')
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">

<style type="text/css">

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
</style>

@endsection

@section('content')
  <form id="regForm" method="POST" action="/student">
     <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-9">
             <h2>Register Student:</h2>
           </div>
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
    <!-- One "tab" for each step in the form: -->
    <div class="tab">
      <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
             <h3 align="justify">I. Basic Info</h3>
            </div>
          </div>
      <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-2">
              <label for="img">Picture</label>
                <div class="form-group">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Browse… <input type="file" id="img" name="img">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                  </div>
              </div>
          </div>
        <div class="col-md-6" align="center">
          <h4 align="center">SCHOLARSHIP TYPE</h4>
          <h5>
         <label class="radio-inline">
            <input type="radio" id="scholarship" name="scholarship" value="1" >
            <b>ACADEMIC</b>
          </label>
              
         <label class="radio-inline">
            <input type="radio" id="scholarship" name="scholarship" value="2" >
            <b>ATHLETIC</b>
          </label>
          
          <label class="radio-inline">
            <input type="radio" id="scholarship" name="scholarship" value="3">
            <b>TECH. VOC</b>
          </label>
          <label class="radio-inline">
              <input type="radio" id="scholarship" name="scholarship" value="4" checked="true">
              <b>SENIOR HIGH</b>
            </label>
          </h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-1">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
        </div>
        <div class="form-group col-md-3">
           <label for="fname">First Name</label>
           <input id="fname" name="fname" class="form-control mx-sm-3 " placeholder="First Name" >
          </div>
        <div class="form-group col-md-1">
           <label for="mi">M.I.</label>
           <input id="mi" name="mi" class="form-control mx-sm-1" placeholder="M.I.">
          </div>
          <div class="form-group col-md-2">
            <label for="lname">Last Name</label>
            <input  class="form-control" id="lname" name="lname" placeholder="Last Name">
          </div>
          <div class="form-group col-md-1">
            <label for="suf">Suffix</label>
            <input  class="form-control" id="suf" name="suf" placeholder="JR">
          </div>
          <div class="form-group col-md-2">
           <label for="sex">Gender</label>
            <select class="form-control" id="sex" name="sex" class="form-control mx-sm-2" style="width: 100px">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>  

        </div>

      <div class="row">
         <div class="col-md-1">
        </div>

        <div class="form-group col-md-2">
          <label for="dob">Birth Date</label>
          <input class="datepicker1 form-control" type="date" id="dob" name="dob">  
          </div>
        <div class="form-group col-md-2">
          <label for="dob">Civil Status</label>
          <select class="form-control" id="cs" name="cs" class="form-control mx-sm-2" style="width: 100px">
              <option value="0">Single</option>
              <option value="1">Married</option>
            </select> 
          </div> 
        <div class="form-group col-md-1">
           <label for="contact">Age</label>
           <input id="age" name="age" class="form-control mx-sm-3" placeholder="00">
          </div>
        <div class="form-group col-md-3">
           <label for="monthly">Monthly Family Income</label>
           <input id="monthly" name="monthly" class="form-control mx-sm-3" placeholder="0.00">
          </div>
        <div class="form-group col-md-1">
           <label for="gwa">GWA/Grade</label>
           <input id="gwa" name="gwa" class="form-control mx-sm-1" placeholder="Place Grade">
          </div>
          
      </div>

      <div class="row">
         <div class="col-md-1">
        </div>
        <div class="form-group col-md-4">
           <label for="contact">Contact Number</label>
           <input id="contact" name="contact" class="form-control mx-sm-3" placeholder="Contact Info" min="0" max="13">
          </div>
        <div class="form-group col-md-4">
           <label for="contact1">Alternate Contact</label>
           <input id="contact1" name="contact1" class="form-control mx-sm-3" placeholder="Contact Info" min="0" max="13">
          </div>
          <div class="form-group col-md-2">
              <label for="sex">IP</label>
               <select class="form-control" id="ip" name="ip" class="form-control mx-sm-2" style="width: 100px">
                 <option value="0">No</option>
                 <option value="1">Yes</option>
               </select>
             </div>  
      </div>     
      <div class="row">
         <div class="col-md-1">
        </div>
        <div class="col-md-3">
          <h4>Permanent Address</h4>
        </div>
         <div class="col-md-2">
        </div>
        <div class="col-md-2">
          <h4>Boarding Address</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-2">
          <label for="town">Town</label>
          <select id="state" name="state" class="form-control">
                      <option value="">- Select Town -</option>
                      @foreach ($town1 as $key => $value)
                          <option value="{{$key}}">{{ $value }}</option>
                      @endforeach
                  </select>
        </div> 
        <div class="form-group col-md-3">
         <label for="city">Barrangay</label>
          <select id="city" name="city" class="form-control" >
            <option value="">- Select Town First -</option>
          </select>
        </div>   

        <script type="text/javascript">
          $(document).ready(function() {
              $('select[name="state"]').on('change', function() {
                  var stateID = $(this).val();
                  if(stateID) {
                      $.ajax({
                          url: '/student/ajax/'+stateID,
                          type: "GET",
                          dataType: "json",
                          success:function(data) {
                              $('select[name="city"]').empty();
                              $.each(data, function(key, value) {
                                  $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                              });
                          }
                      });
                  }else{
                      $('select[name="city"]').empty();
                  }
              });
          });
        </script>

       <div class="form-group col-md-2">
         <label for="state1">Town</label>
         <select id="state1" name="state1" class="form-control">
                    <option value="">- Select Town -</option>
                    @foreach ($town2 as $key => $value)
                        <option value="{{$key}}">{{ $value }}</option>
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
        <div class="form-group col-md-11">
           <label for="skills">Special Skills/Hobbies :</label>
           <input type="skills" name="skills" placeholder="Skills" class="tm-input form-control tm-input-info"/>
          </div>
          <script type="text/javascript">
            $(".tm-input").tagsManager();
          </script>
        </div>
    </div>

    <div class="tab" >
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-11">
        <h3 align="justify">II. FAMILY BACK GROUND</h3>
      </div>
    </div>
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-3">
           <label for="fparent">Fathers Name</label>
           <input name="fparent" id="fparent" class="form-control mx-sm-3" placeholder="Fathers Name">
          </div>
          <div class="form-group col-md-1">
           <label for="fcontact">Age</label>
           <input name="fage" id="fage" class="form-control mx-sm-1" placeholder="0">
          </div>
        <div class="form-group col-md-2">
           <label for="fcontact">Fathers Address</label>
           <select id="fadd" name="fadd" class="form-control">
                    <option value="">- Select Town -</option>
                    @foreach ($town1 as $key => $value)
                        <option value="{{$key}}">{{ $value }}</option>
                    @endforeach
                </select>
          </div>
        <div class="form-group col-md-2">
           <label for="fcontact">Fathers Contact</label>
           <input name="fcontact" id="fcontact" class="form-control mx-sm-1" placeholder="0">
          </div>
          <div class="form-group col-md-2">
            <label for="foccupation">Fathers Occupation</label>
            <input class="form-control" id="foccupation" name="foccupation" placeholder="Fathers Occupation">
          </div>
        </div>
        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-3">
           <label for="mparent">Mothers Name</label>
           <input name="mparent" id="mparent" class="form-control mx-sm-3" placeholder="Mothers Name">
          </div>
        <div class="form-group col-md-1">
           <label for="fcontact">Age</label>
           <input name="mage" id="mage" class="form-control mx-sm-1" placeholder="0">
          </div>
        <div class="form-group col-md-2">
           <label for="mcontact">Mothers Address</label>
           <select id="madd" name="madd" class="form-control">
                    <option value="">- Select Town -</option>
                    @foreach ($town1 as $key => $value)
                        <option value="{{$key}}">{{ $value }}</option>
                    @endforeach
                </select>
          </div>
        <div class="form-group col-md-2">
           <label for="mcontact">Mothers Contact</label>
           <input name="mcontact" id="mcontact" class="form-control mx-sm-1" placeholder="09">
          </div>
          <div class="form-group col-md-2">
            <label for="moccupation">Mothers Occupation</label>
            <input class="form-control" id="moccupation" name="moccupation" placeholder="Mothers Occupation">
          </div>
        </div>

        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-3">
           <label for="gparent">Guardian Name</label>
           <input name="gparent" id="gparent" class="form-control mx-sm-3" placeholder="Guardian Name">
          </div>
        <div class="form-group col-md-1">
           <label for="fcontact">Age</label>
           <input name="gage" id="gage" class="form-control mx-sm-1" placeholder="0">
          </div>
        <div class="form-group col-md-2">
           <label for="mcontact">Guardian Address</label>
           <select id="gadd" name="gadd" class="form-control">
                    <option value="">- Select Town -</option>
                    @foreach ($town1 as $key => $value)
                        <option value="{{$key}}">{{ $value }}</option>
                    @endforeach
                </select>
          </div>
        <div class="form-group col-md-2">
           <label for="mcontact">Guardian Contact</label>
           <input name="gcontact" id="gcontact" class="form-control mx-sm-1" placeholder="09">
          </div>
          <div class="form-group col-md-2">
            <label for="moccupation">Guardian Occupation</label>
            <input class="form-control" id="goccupation" name="goccupation" placeholder="Guardian Occupation">
          </div>
        </div>

        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-3">
           <label for="mparent">Siblings Name</label>
          </div>
        <div class="form-group col-md-1">
           <label for="fcontact">Age</label>
          </div>
          <div class="form-group col-md-2">
           <label for="mcontact">Siblings Address</label>
          </div>
        <div class="form-group col-md-2">
           <label for="mcontact">Siblings Contact</label>
          </div>
        <div class="form-group col-md-2">
            <label for="moccupation">Siblings Occupation</label>
          </div>
        </div>

        @for($i=0;$i<5;$i++)
        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-3">
           <input name="sname{{$i}}" id="sname{{$i}}" class="form-control mx-sm-3" placeholder="Sibling Name">
          </div>
        <div class="col-md-1">
           <input name="sage{{$i}}" id="sage{{$i}}" class="form-control mx-sm-1" placeholder="0">
          </div>
        <div class="col-md-2">           
            <select id="saddress{{$i}}" name="saddress{{$i}}" class="form-control">
                    <option value="">- Select Town -</option>
                    @foreach ($town1 as $key => $value)
                        <option value="{{$key}}">{{ $value }}</option>
                    @endforeach
                </select>
          </div>
        <div class="col-md-2">
           <input name="scontact{{$i}}" id="scontact{{$i}}" class="form-control mx-sm-1" placeholder="09">
          </div>
        <div class="col-md-2">
            <input class="form-control" id="soccupation{{$i}}" name="soccupation{{$i}}" placeholder="Sibling Occupation">
          </div>
        </div>
        @endfor

    </div>


    <div class="tab" >
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-8">
          <h3 align="justify">III. Educational Background</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-4">
           <label for="elem">Elementary School</label>
           <input id="elem" name="elem" class="form-control mx-sm-3" placeholder="Name of School..">
          </div>
        <div class="form-group col-md-1">
          </div>
          <div class="form-group col-md-4">
            <label for="elemgrad">Year Graduated in Elementary</label>
            <input  class="form-control" id="elemgrad" name="elemgrad" placeholder="Year Graduated">
          </div>
        </div>

        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-4">
           <label for="fname">High/Junior High School</label>
           <input id="hs" name="hs" class="form-control mx-sm-3" placeholder="Name of School..">
          </div>
        <div class="form-group col-md-1">
          </div>
          <div class="form-group col-md-4">
            <label for="hsgrad">Year Graduated in High/Junior High School</label>
            <input  class="form-control" id="hsgrad" name="hsgrad" placeholder="Year Graduated">
          </div>
        </div>
        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-4">
           <label for="fname">Senior High School</label>
           <input id="sh" name="sh" class="form-control mx-sm-3" placeholder="Name of School..">
          </div>
        <div class="form-group col-md-3">
            <label for="fname">Track</label>
            <select id="track" name="track" class="form-control">
                <option value="0">-- Select Track --</option> 
                <option value="GAS">General Academic Strand</option>
                <option value="HUMMS">Humanities and Social Sciences Strand</option>
                <option value="STEM">Science, Technology, Engineering and Mathematics Strand</option>
                <option value="ABM">Accountancy, Business and Management Strand</option>
                <option value="TVL">Technical-Vocational-Livelihood</option>     
                <option value="AD">Arts and Design</option>        
              </select>
          </div>
          <div class="form-group col-md-4">
            <label for="shgrad">Year Graduated in Senior High School</label>
            <input  class="form-control" id="shgrad" name="shgrad" placeholder="Year Graduated">
          </div>
        </div>

        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-3">
           <div class="form-group">
            <label for="acadcoll">University(ACADEMIC)</label>
            <select id="acadcoll" name="acadcoll" class="form-control">
              <option value="0">-- Select School --</option> 
              <option value="MMSU">Mariano Marcos State University</option>
              <option value="NWU">Northwestern University</option>
              <option value="DCCP">Data Center College of the Philippines</option>
              <option value="NCC">Northern Christian College</option>         
            </select>
          </div>
          </div>
        
          <div class="form-group col-md-2">
           <div class="form-group">
            <label for="tvcoll">University(TECHVOC)</label>
            <select id="tvcoll" name="tvcoll" class="form-control">
              <option value="0">-- Select School --</option>
              <option value="DWCL">Divine Word College of Laoag</option>
              <option value="ICFI">IGAMA Colleges Found Inc.</option> 
              <option value="MMSU">MMSU College of Industrial Tech.</option> 
              <option value="OTI">Overseas Tech. Ins.</option> 
              <option value="MAIS">Marcos Agro-Industrial SChool-Tesda</option> 
              <option value="INCAT">Ilocos Norte College of Arts and Trades</option> 
              <option value="BIT">Bangui Institute of Technology</option>
              <option value="SGI">Saint Gabriel International</option>  
              <option value="DATA">Data Comm</option>  
              <option value="AIE">Asian Institure of E-commerce</option> 
            </select>
          </div>
          </div>

          <div class="form-group col-md-3">
            <label for="collgrad">Year Expected to Graduate</label>
            <input  class="form-control" id="collgrad" name="collgrad" placeholder="Year Expected to Graduate">
          </div>
        <div class="form-group col-md-2">
           <div class="form-group">
            <label for="colle">College</label>
            <select id="colle" name="colle" class="form-control">
              <option value="0">- College -</option> 
              <option value="CBEA">CBEA</option>
              <option value="COE">COE</option>
              <option value="CAS">CAS</option>
              <option value="CAFSD">CAFSD</option>
              <option value="CTE">CTE</option>
              <option value="CIT">CIT</option>
              <option value="CASAT">CASAT</option>
            </select>
          </div>
          </div>
        </div>
        
        <div class="row">
          <div class="form-group col-md-1">
          </div>
          <div class="form-group col-md-5">
             <label for="coursetv">Course(TECH VOC)</label>
             <select id="coursetv" name="coursetv" class="form-control">
              <option value="0">- Select Course -</option> 
              @foreach($tcor as $tcor)
                <option value="{{ $tcor->id }}">{{$tcor->name}}</option> 
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-5">
             <label for="courseacad">Course(ACADEMIC)</label>
             <select id="courseacad" name="courseacad" class="form-control">
              <option value="0">- Select Course -</option> 
              @foreach($cor as $cor)
                <option value="{{ $cor->id }}">{{$cor->name}}</option> 
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
            <div class="form-group col-md-1">
              </div>
              <div class="form-group col-md-3">
                  <label for="sy">School Year</label>
                   <select id="sy" name="sy" class="form-control">
                              <option value="">-Select-</option>
                              @foreach ($sy as $sy)
                                  <option value="{{$sy->id}}">{{ $sy->from }}-{{$sy->to}}</option>
                              @endforeach
                          </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="sem">Semester</label>
                     <select id="sem" name="sem" class="form-control"> 
                                <option value="">-Select-</option>                    
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                            </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="yl">Year Level</label>
                     <select id="yl" name="yl" class="form-control">   
                                <option value="">-Select-</option>                  
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="4">IV</option>
                                <option value="5">V</option>
                            </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="gk">Grade Level</label>
                     <select id="gl" name="gl" class="form-control">  
                                <option value="">-Select-</option>                   
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                  </div>
        </div>
    </div>

  

    <br>
    <div style="overflow:auto;">
      <div style="float" align="center">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-success">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary">Next</button>
      </div>
    </div>

    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>

    </form>

@endsection

@section('scripts')
<script type="text/javascript">

  var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = true;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>

@endsection