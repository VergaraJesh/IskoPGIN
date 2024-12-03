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
        <style type="text/css" media="print">
                .landscape { 
                    width: 100%; 
                    height: 100%; 
                    margin: 0% 0% 0% 0%; filter: progid:DXImageTransform.Microsoft.BasicImage(Rotation=1); 
                } 
                </style>
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
            <b>LIST OF SIRIB ACADEMIC SCHOLARS(NEW)<br>
            {{$semester}} SEMESTER S.Y. 
            @foreach($syear as $ys)
                {{$ys->from}}-{{$ys->to}}
            @endforeach
            </b>
            </h5>
        </div>
    <br><br>
    <div class="container-fluid">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th><font face = "Times New Roman">No.</font></th>
                <th><font face = "Times New Roman">NAME</font></th>
                <th><font face = "Times New Roman">Community Service</font></th>
              </tr>
            </thead>
            <tbody>
            @foreach($students as $users)
              <tr>
                
                <td><font face = "Times New Roman" size = "-1">{{++$i}}</font></td>
                <td><font face = "Times New Roman" size = "-1">{{ $users['lname'] }}, {{ $users['fname'] }} </font></td>
                <td><font face = "Times New Roman" size = "-1">{{ $users['cs'] }} hours</font></td>
                
                <td>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <br><br>
          <p></p><br><br>

            <br><br>
  

</body>                      
</html>