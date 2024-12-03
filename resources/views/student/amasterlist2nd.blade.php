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
            <b>LIST OF JUNIOR and SENIOR HIGH SCHOOL  @if($stype==6) ARTS  @else Agriculture and Fishery @endif SCHOLARS<br>
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
                <th scope="col">NAME</th>   
                  <th scope="col">SCHOOL</th>               
                  <th class="text-center">GRADE LEVEL</th>
                  @if($stype==6)
                  <th class="text-center">STRAND</th>
                  @endif
                  
                <th scope="col">GWA</th>  
                @if($in==1)
                  <th class="text-center">Municipality/City</th>
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
                          @if($users['statss']==0)
                          <font color="red">{{++$i}}</font>
                          @else
                          {{++$i}}
                          @endif
                        </td>
                      <td>
                          @if($users['reqs']==0)  
                          <font color="red">{{  $users['name'] }}</font>
                          @else
                          {{  $users['name'] }} 
                          @endif  
                          </td>                      
                        <td>{{ $users['school'] }}</td>           
                      <td  align="center">{{ $users['yl'] }}</td>   
                      @if($stype==6)
                      <td  align="center"> 
                      @foreach($users['levelss'] as $lv)                        
                            @if($lv->course!='')
                                 {{ $lv->course }}
                              
                            @else
                                N/A                     
                            @endif
                      @endforeach
                      </td>       
                      @endif     
                      <td class="text-center align-middle">{{ $users['gwa'] }}</td> 
                      @if($in==1)
                      <td class="text-center align-middle">{{ $users['mun'] }}</td> 
                      <td class="text-center align-middle">{{ $users['gender'] }}</td> 
                      <td class="text-center align-middle">{{ $users['c1'] }} @if($users['c2']!="N/A") / {{ $users['c2'] }} @endif</td> 
                      <td class="text-center align-middle">{{ $users['dob'] }}</td> 
                      <td class="text-center align-middle">@if($users['cs']==0) - @else {{ $users['cs'] }} @endif</td> 
                      @endif
                  </tr>              
            @endforeach
            </tbody>
          </table>
          <br><br>
          <p></p><br><br>

            <br><br>
</body>                      
</html>