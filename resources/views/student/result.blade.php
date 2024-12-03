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
            <b>LIST OF ACADEMIC SCHOLARS @if($sst==1)
                        (OLD)
                    @endif
                    @if($sst==2)
                        (NEW)
                    @endif<br>
            {{$semester}} SEMESTER S.Y. 
            @foreach($syear as $ys)
                {{$ys->from}}-{{$ys->to}}
            @endforeach
            </b>
            </h5>
        </div>
    <br><br>
@if($sep==0)
    <div class="container">
        <div class="row">
                <div class="col-md-12" align="center">
                        <b>MARIANO MARCOS STATE UNIVERSITY</b>
                </div>
        </div>
    <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>NAME</th>
                <th>SCHOOL</th>
                <th>COLLEGE</th>        
                <th>COURSE</th>
                <th>YEAR LEVEL</th>
                @if($g1==1)
                <th>GWA</th>
                @endif
                
              </tr>
            </thead>
            <tbody>
            @foreach($students as $users)
              <tr>
                <td>{{++$i}}</td>
                <td>{{ strtoupper($users['lname']) }}, {{ strtoupper($users['fname']) }} @if($users['tem']==1) * @endif</td>     
                <td>{{ $users['school'] }}</td>
                <td>{{ $users['coll'] }}</td>
                <td>{{ $users['course'] }}</td>
                <td>{{ $users['yl'] }}</td>
                @if($g1==1)
                <td>@foreach($users['gwa'] as $gwa)
                    {{ $gwa}}
                    @endforeach
                @endif
                </td>                 
              </tr>
            @endforeach
            </tbody>
          </table>
          <br><br>
          <p></p><br><br>
          <div class="row">
                        <div class="col-md-12" align="center">
                                <b>PRIVATE INSTITUTIONS</b>
                        </div>
                </div>
            <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NAME</th>
                        <th style="width: 90px;">SCHOOL</th>
                        <th>COURSE</th>
                        <th>YEAR LEVEL</th>
                        @if($g1==1)
                        <th>GWA</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($students1 as $users)
                      <tr>
                        <td>{{++$j}}</td>
                        <td>{{ strtoupper($users['lname']) }}, {{ strtoupper($users['fname']) }} @if($users['tem']==1)  * @endif</td>  
                        <td>{{ $users['school'] }}  </td>
                        <td>{{ $users['course'] }}</td>
                        <td>{{ $users['yl'] }}</td>
                        @if($g1==1)
                        <td>@foreach($users['gwa'] as $gwa)
                            {{ $gwa}}
                            @endforeach
                        @endif
                      </tr>
                    @endforeach
                    </tbody>
                  </table>   <b>
                  <br>
@else
<div class="container">
<table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>NAME</th>                
                <th>SCHOOL</th>      
                <th>COURSE</th>
                <th>YEAR LEVEL</th>
                @if($g1==1)
                <th>GWA</th>
                @endif
                @if($in==1)
                <th>Municipality/City</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Contact Info</th>
                <th class="text-center">Date of Birth</th>
                <th class="text-center">CS</th>
                @endif
              </tr>
            </thead>
            <tbody>
            <tbody>
            @foreach($students2 as $users)
              <tr>
                <td>{{++$i}}</td>
                <td>{{ strtoupper($users['lname']) }}, {{ strtoupper($users['fname']) }} @if($users['tem']==1) * @endif</td>     
               
                <td>@if($users['school']=="MMSU") {{ $users['school'] }}-{{ $users['coll'] }} @else {{ $users['school'] }}  @endif</td>
                <td>{{ $users['course'] }}</td>                
                <td>{{ $users['yl'] }}</td>
                @if($g1==1)
                <td>@foreach($users['gwa'] as $gwa)
                    {{ $gwa}}
                    @endforeach
                @endif
                @if($in==1) 
                <td>{{ $users['municipality']}}</td>
                <td class="text-center align-middle">{{ $users['gender'] }}</td> 
                      <td class="text-center align-middle">{{ $users['c1'] }} @if($users['c2']!="N/A") / {{ $users['c2'] }} @endif</td> 
                      <td class="text-center align-middle">{{ $users['dob'] }}</td> 
                      <td class="text-center align-middle">@if($users['cs']==0) - @else {{ $users['cs'] }} @endif</td> 
                @endif
                </td>                 
              </tr>
            @endforeach
            </tbody>
          </table>
@endif

                  @if($users['tem']!=1 && $users['op']==0)  
                  LEGEND:<br>
                  <font size=5>* </b></font>New Scholars
                  <br>                  
                   @endif
                




</body>                      
</html>