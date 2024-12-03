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
            <b>LIST OF SCHOOLS CONTACT FOR @if($dis!="") {{strtoupper($dis)}} @endif ILOCOS NORTE<br>
            </b>
            </h5>
        </div>
    <br><br>
    <div class="container-fluid">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>       
                <th>NAME</th>
                <th>DISTRICT</th>
                <th>TYPE</th>
                <th>HEAD</th>
                <th>CONTACT</th>
                <th>EMAIL</th>
              </tr>
            </thead>
            <tbody>
                @foreach($sc as $s)
                <tr>
                    <td>{{ $s->sc_id}}</td>
                    <td>{{ $s->sc_name}}</td>
                    <td>{{ $s->district}}</td>
                    <td>@if($s->sc_type==1)
                            Elemenetary
                        @else
                            High School
                        @endif
                    </td>
                    <td>{{ $s->sc_head}}</td>
                    <td>{{ $s->sc_contact}}</td>
                    <td>{{ $s->sc_email}}</td>
                </tr>
                @endforeach
                                   
            </tbody>
          </table>
          
</body>                      
</html>