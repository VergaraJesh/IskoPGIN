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
            <b>LIST OF SENIOR HIGH SCHOOL @if($tear>1) @if($ei==1)
                    (NEW)
                    @else
                   (OLD)
                    @endif 
                    
                    @endif
                                        SCHOLARS<br>
            {{$semester}} SEMESTER S.Y. 
            @foreach($syear as $ys)
                {{$ys->from}}-{{$ys->to}}
            @endforeach
            </b>
            </h5>
        </div>
    <div class="container">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center align-middle">No.</th>
                <th class="text-center align-middle">NAME</th>
                <th class="text-center align-middle">SCHOOL</th>
                <th class="text-center align-middle">STRAND</th>
                <th class="text-center align-middle">GRADE LVL</th>
                @if($g1==1)
                <th class="text-center align-middle">GWA</th>
                @endif
                @if($in==1)
                <th class="text-center align-middle">Municipality/City</th>                
                <th class="text-center">Gender</th>
                  <th class="text-center">Contact Info</th>
                  <th class="text-center">Date of Birth</th>
                  <th class="text-center">CS</th>
                @endif
              </tr>
            </thead>
            <tbody>
            @foreach($students as $users)
            <tr>
                <td>
                    {{++$i}}
                </td>
                <td>{{ $users['name']}} 
                @if($tear==0) 
                  @if($legends==1)
                    @if($users['x']==1) 
                    <font color=black size="4" face='Arial'> <b>*</b> </font> 
                    @endif 
                  @elseif($legends==2)
                    @if($users['x']==0) 
                    <font color=black size="4" face='Arial'> <b>*</b> </font> 
                    @endif 
                  @endif
                @endif</td>
                <td>{{ $users['schl'] }}</td>
                <td align="center">{{ $users['course'] }}</td>
                <td align="center">{{ $users['gl'] }}</td>
                @if($g1==1)
                <td align="center">{{ $users['gwa'] }}</td>
                @endif
                @if($in==1)
                <td align="center">{{ $users['mun'] }}</td>                
                <td class="text-center align-middle">{{ $users['gender'] }}</td> 
                      <td class="text-center align-middle">{{ $users['c1'] }} @if($users['c2']!="N/A") / {{ $users['c2'] }} @endif</td> 
                      <td class="text-center align-middle">{{ $users['dob'] }}</td> 
                      <td class="text-center align-middle">@if($users['cs']==0) - @else {{ $users['cs'] }} @endif</td> 
                @endif
            </tr>
            @endforeach
            </tbody>
          </table>
          <br>
          @if($tear==0)  
          @if($legends>0)
                  LEGEND:<br>
          @endif
                  @if($legends==2)
                  <font size=5><b>* </b></font>Renewed Scholars
                  @elseif($legends==1)
                  <font size=5><b>* </b></font>New Scholars
                  @endif
                  
                  <br>                  
            @endif
          <br>
          
    </div>
</body>                      
</html>