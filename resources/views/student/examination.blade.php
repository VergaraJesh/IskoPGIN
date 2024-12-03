<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@if($student->scholartype==1) Academic @else Senior High @endif Scholarship Examination</title>
        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
        <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
        <!--Navbar-->
        
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
      background-color: #000EFC;
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
      background-color: #000EFC;
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
    .big{ width: 1.5em; height: 1.5em; }
    }
    </style>       
    </head>
<body>
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
              <h3>
                <div class="col-md-10" align="left">
                    Name:<b>{{$student->fname}} {{$student->mname}} {{$student->lname}} {{$student->suffix}}</b>
                    </div>
                    <div class="col-md-2" align="right">
                        <b><div id="javascript_countdown_time"></div></b>
                    </div>
              </h3>
            </div>
          </nav>
       
        <br><br>
        <div class="row">
          <div class="col-md-12">
            
          </div>
          
          <script type="text/javascript">
            var javascript_countdown = function () {
              var time_left = 10; //number of seconds for countdown
              var output_element_id = 'javascript_countdown_time';
              var keep_counting = 1;
              var no_time_left_message = 'Finish Up!';
             
              function countdown() {
                if(time_left < 2) {
                  keep_counting = 0;
                }
             
                time_left = time_left - 1;
              }
             
              function add_leading_zero(n) {
                if(n.toString().length < 2) {
                  return '0' + n;
                } else {
                  return n;
                }
              }
             
              function format_output() {
                var hours, minutes, seconds;
                seconds = time_left % 60;
                minutes = Math.floor(time_left / 60) % 60;

             
                seconds = add_leading_zero( seconds );
                minutes = add_leading_zero( minutes );
             
                return 'Timer:'+ minutes + ':' + seconds;
              }
             
              function show_time_left() {
                document.getElementById(output_element_id).innerHTML = format_output();//time_left;
              }
             
              function no_time_left() {
                document.getElementById(output_element_id).innerHTML = no_time_left_message;
              }
             
              return {
                count: function () {
                  countdown();
                  show_time_left();
                },
                timer: function () {
                  javascript_countdown.count();
             
                  if(keep_counting) {
                    setTimeout("javascript_countdown.timer();", 1000);
                  } else {
                    no_time_left();
                  }
                },
                //Kristian Messer requested recalculation of time that is left
                setTimeLeft: function (t) {
                  time_left = t;
                  if(keep_counting == 0) {
                    javascript_countdown.timer();
                  }
                },
                init: function (t, element_id) {
                  time_left = t;
                  output_element_id = element_id;
                  javascript_countdown.timer();
                }
              };
            }();
             
            //time to countdown in seconds, and element ID
            javascript_countdown.init(2700, 'javascript_countdown_time');
            
            </script>
          </div>
        <br><br><br>
        <form id="regForm" method="post" action="{{ route('exam.examdone') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="student" value="{{ $student->id }}" />
        <input type="hidden" name="stype" value="{{ $student->scholartype }}" />
        <input type="hidden" name="sem" value="{{ $sem }}" />
        <input type="hidden" name="sy" value="{{ $sy }}" />
        <div class="tab" >
        <div class="row">
                <b>Answer the Question click the circle before the answer choice youve chosen.</b>
        </div> 
        <br>
        <div class="row">
                <b>Instructions: Choose the correct word/verb to complete the sentence</b>
        </div> 
        <br>
        <table class="table table-borderless">            
                @foreach($q1 as $q1)                
                  <tr>
                  <td class="col-md-5">{{++$i}}. {{ $q1['quest']}}</td>
                  <input type="hidden" name="{{ $q1['id'] }}" value="true" />
                  <td class="col-md-1">   
                      <label class="form-check-label">
                      <input type="radio" class="big" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt1']}}">
                      {{ $q1['opt1']}}</label>
                  </td>

                  <td class="col-md-1">
                      <label class="form-check-label">
                      <input type="radio" class="big"  id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt2']}}">
                      {{ $q1['opt2']}}</label>
                  </td>

                  <td class="col-md-1">
                      <label class="form-check-label">
                      <input type="radio" class="big"  id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt3']}}">
                      {{ $q1['opt3']}}</label>
                </td>

                  <td class="col-md-1">  
                      <label class="form-check-label">
                      <input type="radio" class="big" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt4']}}">
                      {{ $q1['opt4']}}</label>
                                   </td>

                  </tr>
                @endforeach
        </table>
        <br>
        
        <div class="row">
                <b>Instructions: Choose the best antonym for each word.</b>
        </div> 
        <br>
        <table class="table table-borderless">            
                @foreach($q2 as $q1)                
                  <tr>
                  <td class="col-md-5">{{++$i}}. {{ $q1['quest']}}</td>
                  <input type="hidden" name="{{ $q1['id'] }}" value="true" />
                  <td class="col-md-1">  
                      <label class="form-check-label">          
                      <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt1']}}">
                      {{ $q1['opt1']}}</label>
                  </td>

                  <td class="col-md-1">
                      <label class="form-check-label">
                      <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt2']}}">
                      {{ $q1['opt2']}}</label>
                  </td>

                  <td class="col-md-1">
                      <label class="form-check-label">
                      <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt3']}}">
                      {{ $q1['opt3']}}</label>
                </td>

                  <td class="col-md-1"> 
                      <label class="form-check-label">
                      <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt4']}}">
                      {{ $q1['opt4']}}</label>
                    
                  </td>
                  </tr>
                @endforeach
        </table>
        <br>
       
        <div class="row">
                <b>Analogy and Logic Questions and Answers<br>Test your analogy skills by choosing the best word that expresses similar relationship to the given set of words.</b>
        </div> 
        <br>
          <table class="table table-borderless">            
              @foreach($q3 as $q1)                
                <tr>
                <td class="col-md-5">{{++$i}}. {{ $q1['quest']}}</td>
                <input type="hidden" name="{{ $q1['id'] }}" value="true" />
                <td class="col-md-1">     
                    <label class="form-check-label">
                    <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt1']}}">
                    {{ $q1['opt1']}}</label>
                </td>

                <td class="col-md-1">
                    <label class="form-check-label">
                    <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt2']}}">
                    {{ $q1['opt2']}}</label>
                </td>

                <td class="col-md-1">
                    <label class="form-check-label">
                    <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt3']}}">
                    {{ $q1['opt3']}}</label>
              </td>

                <td class="col-md-1">  
                    <label class="form-check-label">
                    <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt4']}}">
                    {{ $q1['opt4']}}</label>               
                </td>

                </tr>
              @endforeach
      </table>
        <br>
        <div class="row">
                <b>Instructions: Choose the best synonym for each word.</b>
        </div> 
        <br>
        <table class="table table-borderless">            
            @foreach($q4 as $q1)                
              <tr>
              <td class="col-md-5">{{++$i}}. {{ $q1['quest']}}</td>
              <input type="hidden" name="{{ $q1['id'] }}" value="true" />
              <td class="col-md-1">                      
                  <label class="form-check-label">
                  <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt1']}}">
                  {{ $q1['opt1']}}</label>
              </td>

              <td class="col-md-1">
                  <label class="form-check-label">
                  <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt2']}}">
                  {{ $q1['opt2']}}</label>
              </td>

              <td class="col-md-1">
                  <label class="form-check-label">
                  <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt3']}}">
                  {{ $q1['opt3']}}</label>
            </td>

              <td class="col-md-1">  
                  <label class="form-check-label">
                  <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt4']}}">
                  {{ $q1['opt4']}}</label>               
              </td>

              </tr>
            @endforeach
    </table>
        <br>
        <div class="row">
                <b>Numerical Reasoning<br>Instruction: Solve the following Math quizzes.</b>
        </div> 
        <br>
            <table class="table table-borderless">            
                @foreach($q5 as $q1)                
                  <tr>
                  <td class="col-md-5">{{++$i}}. {{ $q1['quest']}}</td>
                  <input type="hidden" name="{{ $q1['id'] }}" value="true" />
                  <td class="col-md-1">          
                      <label class="form-check-label">
                      <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt1']}}">
                      {{ $q1['opt1']}}</label>
                  </td>

                  <td class="col-md-1">
                      <label class="form-check-label">
                      <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt2']}}">
                      {{ $q1['opt2']}}</label>
                  </td>

                  <td class="col-md-1">
                      <label class="form-check-label">
                      <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt3']}}">
                      {{ $q1['opt3']}}</label>
                </td>

                  <td class="col-md-1">  
                      <label class="form-check-label">
                      <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt4']}}">
                     {{ $q1['opt4']}}</label>               
                  </td>

                  </tr>
                @endforeach
        </table>
        </div>
        
        <div class="tab" >
                <br>
                <div class="row">
                        <b>All About ILOCOS NORTE<br>Instruction: Choose the answer which best relates to the word given in each item.</b>
                </div> 
                <br>
                
                    @foreach($q6 as $q1)   
                    <div class="row">                    
                      <div class="col-md-10">
                        {{++$i}}. {{ $q1['quest']}}
                        <input type="hidden" name="{{ $q1['id'] }}" value="true" />
                      </div>
                    </div>
                    <div class="row"> 
                      <div class="col-md-3">      
                          <label class="form-check-label">              
                          <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt1']}}">
                          {{ $q1['opt1']}}</label>
                      </div>
                      <div class="col-md-3">        
                          <label class="form-check-label">
                          <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt2']}}">
                          {{ $q1['opt2']}}</label>
                        </div>
                        <div class="col-md-3">    
                            <label class="form-check-label">
                          <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt3']}}">
                         {{ $q1['opt3']}}</label>
                        </div>
                        <div class="col-md-3">    
                            <label class="form-check-label">
                          <input type="radio" class="big" class="form-check-input" id="ans{{ $q1['id'] }}" name="ans{{ $q1['id'] }}" value="{{ $q1['opt4']}}">
                          {{ $q1['opt4']}}</label>               
                        </div>
                    </div>
                    <br>
                    @endforeach
            
        </div>
 
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
                
              </div>
        </form>
        
    </div>
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
</body>                      
</html>