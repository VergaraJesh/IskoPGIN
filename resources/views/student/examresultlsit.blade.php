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
            <h2>Exam Result for @if($stype==1) ACADEMIC @else SENIOR HIGH SCHOOL @endif
                for the School year @foreach($sy as $ys)
                                      {{$ys->from}}-{{$ys->to}}
                                  @endforeach - {{$sem}}</h2> 
        </div>
    <br>
    <div class="container">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Sentence</th>
                <th>Antonyms</th>
                <th>Analogy</th>
                <th>Synonym</th>
                <th>Numeric Reasoning</th>
                <th>Ilocos Norte</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
            @foreach($students as $users)
              <tr>
                  <td> {{++$i}}</td>
                  <td> {{$users['name']}}</td>
                  <td> {{$users['t1']}}</td>
                  <td> {{$users['t2']}}</td>
                  <td> {{$users['t3']}}</td>
                  <td> {{$users['t4']}}</td>
                  <td> {{$users['t5']}}</td>
                  <td> {{$users['t6']}}</td>
                  <td> {{$users['total']}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        
</body>                      
</html>