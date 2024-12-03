<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Scholarship Examination</title>
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
    <div class="container">
        <br><br>
        <div class="row" align="center">
        <h3>Scholarship Examination</h3>
        </div>
        <br><br>
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                Either Already took the Exam/No ID entered
            </div>
        @endif
        <form method="post" action="{{ route('exam.examstart') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <br><br>
        <div class="row">
            <div class="col-md-12" align="center">
                <div class="form-group form-inline">
                    <label for="student">Enter Examination(Code):</label>
                    <input type="text" class="form-control"  id="student" name="student">
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-md-4">
                </div>
                  <div class="form-group col-md-2">
                    <label for="sy">School Year</label>
                     <select id="sy" name="sy" class="form-control" >
                            @foreach($sy as $sy)
                                @if($sy->id>10)
                                     <option value="{{$sy->id}}">{{$sy->from}}-{{$sy->to}}</option>  
                                @endif
                            @endforeach                              
                            </select>
                  </div>
                  <div class="col-md-1">
                  </div>
                  <div class="form-group col-md-2">
                   <div class="form-group">
                    <label for="sem">Semester</label>
                    <select id="sem" name="sem" class="form-control" >
                      <option value="1">1st</option>
                      <option value="2">2nd</option>
                    </select>
                  </div>
                  </div>
    
                </div>
        <br>
        <div class="row" align="center">
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
        </div>
        </form>
    </div>
</body>                      
</html>