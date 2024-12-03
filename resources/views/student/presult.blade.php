<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Schoolar Form</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
        <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

        <!--Navbar-->
        
        <style>
                .right {
                    position: absolute;
                    right: 0px;
                    width: 80px;
                    border: 3px solid black;
                    padding: 1px;
                }
                </style>
    </head>
<body>

                        <div class="right">
                                <p>PED-003-0</p>
                              </div>

    <div class="row" align="center">
            <img src="<?php echo asset("ilocosnortelogo.png")?>" class="rounded mx-auto d-block" alt="..." width="70px" length="70px" >	
            <font face="Arial" size="2">
                    <br>Republic of the Phillipines<br>
                    <b>PROVINCE OF ILOCOS NORTE</b><br>
                    Laoag City 2900
            </font>
            <br>
            <h5><b>PROVINCIAL EDUCATION OFFICE</b>
            <br>
            <br>
            @if($stype==1)
            <b>LIST OF SIRIB ACADEMIC SCHOLARS<br>
            @elseif($stype==3)
            <b>LIST OF TECH-VOC SCHOLARS<br>
            @else
            <b>LIST OF SENIOR HIGH SCHOOL SCHOLARS<br>
            @endif
            
            {{$semester}} SEMESTER S.Y. 
            @foreach($syear as $ys)
                {{$ys->from}}-{{$ys->to}}
            @endforeach
            </b>
            </h5>
        </div>
    <br><br>
    <br>
    <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-11">
    <h4>COUNT</h4>
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-11">
    <h4>FEMALE: {{$female}}</h4>
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-11">
    <h4>MALE: {{$male}}</h4>
    </div>
    </div><br>
    <div class="container-fluid">
    <table class="table table-bordered">
            <thead>
                <th>No.</th>              
                
                <th>LAST NAME</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>GENDER</th>
                <th>SY</th>
                <th class="text-center">SCHOOL</th>
                @if($stype==4)
                <th>STRAND</th>
                <th>GRADE LEVEL</th>
                @else
                <th>COURSE</th>
                <th>YEAR LEVEL</th>
                @endif                
                <th class="text-center">Date of Birth</th>
                <th class="text-center">CONTACT INFO</th>
                <th class="text-center">Municipality</th>
                <th class="text-center">Barangay</th>
                <th class="text-center">Mothers Name</th>
                <th class="text-center">Fathers Name</th>
                <th class="text-center">Guardians Name</th>
              
                <th class="text-center">Scholars</th>
                <th class="text-center">GWA</th>
                <th class="text-center">Community Service</th>
                 
            </thead>
            <tbody>
            @foreach($students as $users)
              <tr>
                <td>{{++$i}}</td>
                <td>{{ $users['lname'] }}</td>   
                <td>{{ $users['fname'] }}</td>   
                <td>{{ $users['mname'] }}</td>                   
                <td>{{ $users['gen'] }}</td>
                <td>
                        @foreach($syear as $ys)
                              {{$ys->from}}-{{$ys->to}}
                        @endforeach
                </td>
                <td>{{ $users['school'] }}</td>
                <td>{{ $users['course'] }}</td>
                <td>{{ $users['yl'] }}</td>
                <td>{{ $users['dob'] }}
                @if($users['c1']!="") <td>{{ $users['c1'] }} @else <td align="center"> N/A @endif
                  @if($users['c2']!="N/A" && $users['c2']!="" && $users['c2']!=0)
                      /{{ $users['c2'] }}
                  @endif
                </td>
                <td>{{ $users['mun'] }}</td>
                <td>{{ $users['brgy'] }}</td>
                <td>   {{ strtoupper($users['mother']) }}</td>
                <td>    {{ strtoupper($users['father']) }}</td>
                <td>    {{ strtoupper($users['guardian']) }}</td>
           
                 
              </tr>
            @endforeach
            </tbody>
          </table>
         
</body>                      
</html>