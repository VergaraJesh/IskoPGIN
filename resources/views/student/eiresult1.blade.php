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
            <b>LIST OF  @if($stype==1) ACADEMIC  @else SENIOR HIGH SCHOOL @endif SCHOLARS<br>
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
              <tr valign="middle">
                <th>No.</th>
                @if($stype==1)
                <th scope="col">ID</th>
                @endif
                <th scope="col">NAME</th>
                @if($stype==1)
                  <th>COLLEGE</th>
                  <th>COURSE</th>
                  <th scope="col">YEAR LEVEL</th>  
                @else
                  <th scope="col">SCHOOL</th>
                  
                  <th class="text-center">GRADE LEVEL</th>
                @endif                
                <th>MUNICIPALITY</th>
                <th>Barangay</th>
                <th>Primary Contact</th>
                <th>Secondary Contact</th>
              </tr>
            </thead>
            <tbody>
            @foreach($students as $users)               
                    <tr>
                      <td> 
                          @if($users['statss']==0)
                          <font color="red">{{++$i}}</font>
                          @else
                          {{++$i}}
                          @endif
                        </td>
                        @if($stype==1)
                          <td> {{  $users['sid'] }}</td>
                        @endif
                      <td>
                          @if($users['reqs']==0)  
                          <font color="red">{{  $users['lname'] }},{{ $users['fname'] }} {{ $users['mname'] }}</font>
                          @else
                          {{  $users['lname'] }},{{ $users['fname'] }} {{ $users['mname'] }}
                          @endif
                        
                        
                      </td>
                      @if($stype==1)
                        <td>{{ $users['coll'] }}</td>
                        <td>{{ $users['course'] }}</td>
                        <td>{{ $users['yl'] }}</td>
                      @else
                      <td>{{ ucwords($users['school']) }}</td>                      
                      <td>{{ $users['yl'] }}</td>                      
                      @endif                       
                      <td>{{ $users['mun'] }}</td>
                      <td>{{ $users['brgy'] }}</td>
                      <td>{{ $users['c1'] }}</td>
                      <td>{{ $users['c2'] }}</td>
                  </tr>              
            @endforeach
            </tbody>
          </table>
          <br><br>
          <p></p><br><br>

            <br><br>
</body>                      
</html>