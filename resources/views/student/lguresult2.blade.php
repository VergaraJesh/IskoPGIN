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
                    width: 80px;
                    border: 3px solid black;
                    padding: 1px;
                }
                </style>
    </head>
<body>
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
            <b>PRESPECTIVE LIST OF 
                @if($stype==1)
                    ACADEMIC
                @elseif($stype==3)
                    TECHVOC
                @else
                    SENIOR HIGH SCHOOL
                @endif

                SCHOLARS<br>
            {{$sem}} SEMESTER S.Y. 
            @foreach($sy as $ys)
                {{$ys->from}}-{{$ys->to}}
            @endforeach
            </b>
            </h5>
        </div>
        <br>
        <div class="container">
                <table class="table table-bordered">
                        <thead>
                                <tr>
                                  <th>No.</th>
                                  <th width="40%">NAME</th>
                                  <th>School</th>                                  
                                  <th>Barangay</th>
                                  <th>Municipality</th>
                                </tr>
                              </thead>
                              <tbody>
                            @foreach($students as $s)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{ $s['lname'] }}, {{ $s['fname'] }}</td>  
                                <td>{{ $s['scl'] }}</td>                              
                                <td>{{ $s['brgy'] }}</td>
                                <td>{{ $s['mun'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        
</body>                      
</html>