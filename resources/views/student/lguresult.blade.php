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
        <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
               <h2><b>SCHOLARS PER MUNICIPALITY</b></h2></div>
            </div>
            <div class="container">
                    <table class="table table-bordered">
                        <thead align="center">
                            <th width="150px" align="center">MUNICIPALITY</th>
                            <th width="50px">No. of Scholars</th>
                        </thead>
            @for($i=1;$i<=23;$i++)
            <tr>
                <td align="center">{{ $townname[$i]}}</td>
                <td align="center"> {{ $towncount[$i]}}</td>
            </tr>
            
            @endfor
            <tr>
                    <td align="center">TOTAL</td>
                    <td align="center">{{ $total }}</td>
                </tr>
                </table>
        </div>
          
        <br><br><br>
        @if($stype==4)
        <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
               <h3><b>SCHOLARS PER SCHOOLS</b></h3></div>
            </div>
            <div class="container">
            <table class="table table-bordered">
                <thead>
                    <th>SCHOOLS NAME</th>
                    <th>No. of Scholars</th>
                </thead>
            @for($i=1;$i<=$counter;$i++)
                @if($schoolsname[$i]!="")
                <tr>
                <td>{{ $schoolsname[$i]}}</td>
                <td>{{ $schoolcount[$i]}}</td>
                </tr>
                @endif
            @endfor
            <tr>
                <td align="center">TOTAL</td>
                <td>{{ $total }}</td>
            </tr>
            </table>
        </div>
        @endif
</body>                      
</html>