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
    <div class="row" align="center">
            <h5>Contact for @if($stype==3)
                              Tech Voc Scholar
                            @else
                              Senior High School
                            @endif 
                            @foreach($syear as $syear){{$syear->from}}-{{$syear->to}}@endforeach {{$semester}} Semester</h5>
        </div>
    <br>
    <div class="container">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th width="15%">No.</th>                                                   
                <th width="30%">NAME</th>  
                <th width="30%">SCHOOL</th>                 
              </tr>
            </thead>
            <tbody>
            @foreach($students as $users)
              <tr align="center">
                    <td> {{++$i}}</td>
                    <td>{{ $users['name'] }}</td>
                    <td>{{ $users['school'] }}</td>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        
</body>                      
</html>