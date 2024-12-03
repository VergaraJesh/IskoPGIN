<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Schoolar Form</title>
        <!-- Fonts -->
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('js\bootstrap-3.3.0\dist\css\bootstrap.min.cc') }}" rel="stylesheet">
        

        <script src="{{ asset('js\jquery-3.3.1.js')}}"></script> 
        <script src="{{ asset('js\bootstrap-3.3.0\dist\js\bootstrap.min.js')}}"></script> 
        <script src="{{ asset('js\bootstrap-3.3.0\dist\js\bootstrap.js')}}"></script> 

        <!--Navbar-->
        
        <style>
                .right {
                    position: absolute;
                    right: 0px;
                    width: 90px;
                    border: 3px solid black;
                    padding: 1px;
                }
                </style>
    </head>
<body>
             <div class="right">
              <p> PED-003-0 </p>
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
            <b>LIST OF @if($stype==1) SIRIB ACADEMIC SCHOLARS @else SENIOR HIGH SCHOOL SCHOLARS @endif(NEW)<br>
            {{$semester}} SEMESTER S.Y. 
            @foreach($syear as $ys)
                {{$ys->from}}-{{$ys->to}}
            @endforeach
            </b>
            </h5>
        </div>
    <br><br>
    <div class="container">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>LAST NAME</th>
                <th>FIRST NAME</th>
                <th>MUN</th>
                <th>SCHOOL</th>
                @if($stype==1)                        
                        <th>COLLEGE</th>
                        <th>COURSE</th>
                        <th>YEAR LEVEL</th>
                        <th>GWA</th>
                @else
                        <th class="text-center align-middle">STRAND</th>
                        <th class="text-center align-middle">GRADE LEVEL</th>
                        <th class="text-center align-middle">Overall Rating(%)<br>(GWA,Exam,Interviews)</th>
                @endif
                
                
              </tr>
            </thead>
            <tbody>
            @foreach($students as $users)
              <tr>
                <td><font face="calibri" size="2pt">{{++$i}}</font></td>
                <td><font face="calibri"  size="2pt">{{ $users['lname'] }}</font></td>
                <td><font face="calibri"  size="2pt"><p>{{ $users['fname'] }}</p></font></td>
                <td><font face="calibri"  size="2pt">{{ $users['mun'] }}</font></td>
                <td><font face="calibri"  size="2pt">{{ ucwords($users['school']) }}</font></td>
                @if($stype==1)                        
                        <td><font face="calibri" size="2pt">{{ $users['coll'] }}</font></td>
                        <td class="text-center align-middle"><font face="calibri" size="2pt">{{ $users['course'] }}</font></td>
                        <td class="text-center align-middle"><font  face="calibri"  size="2pt">{{ $users['yl'] }}</font></td>
                        <td class="text-center align-middle">@foreach($users['gwa'] as $gwa)
                                <font  face="calibri" size="2pt">{{ $gwa}}</font>
                                @endforeach
                        </td>
                @elseif($stype==4)
                        
                        <td class="text-center align-middle"><font face="calibri" size="2pt">{{ $users['course'] }}</font></td>
                        <td class="text-center align-middle"><font  face="calibri"  size="2pt">{{ $users['yl'] }}</font></td>
                        <td class="text-center align-middle">
                                <font  face="calibri" size="2pt">{{ $users['total']}}</font>
                               
                        </td>
                @endif
                
              </tr>
            @endforeach
            </tbody>
          </table>
          
</body>                      
</html>